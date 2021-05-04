<?php
include "Admin/db.php";
include "function.php";


header('Access-Control-Allow-Origin: *');
if(isset($_POST))
{
	$response = array('status'=>false,'data'=>null);
	if(isset($_GET['register']) && !empty($_GET['register']) && $_GET['register'] == '1')
	{
		$name = isset($_POST['name'])?xss_clean($_POST['name']):'';
		
	    $email = isset($_POST['email'])?xss_clean($_POST['email']):'';
	    $mobile = isset($_POST['mobile'])?xss_clean($_POST['mobile']):'';
	    $gender = isset($_POST['gender'])?xss_clean($_POST['gender']):'';
	    $city_id = isset($_POST['city_id'])?xss_clean($_POST['city_id']):'';
	    $image = $_FILES['image']['name'];
	    $address = isset($_POST['address'])?xss_clean($_POST['address']):'';
	    $password = md5($_POST['password']);

	    if ($name == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please enter name';
	    	echo json_encode($response);exit;
	    }
	 
	    // if ($email == "") {
	    // 	$response['status']=false;
	    // 	$response['data']['message']='Please enter email';
	    // 	echo json_encode($response);exit;
	    // }
	    if ($mobile == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please enter mobile';
	    	echo json_encode($response);exit;
	    }
	    if ($gender == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please choose gender';
	    	echo json_encode($response);exit;
	    }
	    if ($city_id == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please select city';
	    	echo json_encode($response);exit;
	    }
	    $sql = "SELECT * FROM user WHERE email = '$email' && mobile = '$mobile'";
	    $result = mysqli_query($db,$sql);
	    $count = mysqli_num_rows($result);

	    if($count == 0)
	    {
	    	if(isset($image) && $image !="")
		    {
		          $path = "Admin/user_images/";

		          if(!is_dir($path))
		          {
		               mkdir($path);
		               chmod($path,0755);
		          }

		          $img = basename($image);
		          $filename = $path.$img;
		          move_uploaded_file($_FILES['image']['tmp_name'],$filename);
		    }else{
		    	$image ="";
		    }
	    
	     	$sql="INSERT INTO user(name, email, mobile, gender, image, address, password,city_id)VALUES('$name','$email','$mobile','$gender','$img','$address','$password','$city_id')"; 
	    	$query = mysqli_query($db,$sql); 
	    	if ($query != "") 
	    	{
	    	  	$response['status']=true;
		    	$response['data']['message']='Register successfully';
		    	echo json_encode($response);exit;
	    	} 
	    }
	    else
	    {
	    	$response['status']=false;
	    	$response['data']['message']='Email or Mobile number already exist';
	    	echo json_encode($response);exit;
	    }
	     
	    
		echo json_encode($response);exit;
	   
	}
	if(isset($_GET['already_exists']) && !empty($_GET['already_exists']) && $_GET['already_exists'] == '1')
	{
		
	    $mobile = isset($_POST['mobile'])?xss_clean($_POST['mobile']):'';	 
	    if ($mobile == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please enter mobile';
	    	echo json_encode($response);exit;
	    }
	    
	    $sql = "SELECT * FROM user WHERE mobile = '$mobile'";
	    $result = mysqli_query($db,$sql);
	    $count = mysqli_num_rows($result);

	    if($count == 0)
	    {
	    	$response['status']=true;
	    	$response['data']['message']='Verify your mobile number';
	    	echo json_encode($response);exit;
	    }
	    else
	    {
	    	$response['status']=false;
	    	$response['data']['message']='Mobile number already exist';
	    	echo json_encode($response);exit;
	    }
	     
	    
		echo json_encode($response);exit;
	   
	}

	if(isset($_GET['login']) && !empty($_GET['login']) && $_GET['login'] == '1')
	{
	    $email = $_POST['email'];
	    $password = md5($_POST['password']);

	    $login_check = "SELECT *,id as user_id,CONCAT('http://".$_SERVER['SERVER_NAME']."/shramcity/admin/user_images/',image) as image,(SELECT name from city WHERE id = user.city_id) as city_name FROM user WHERE (email = '$email' OR mobile = '$email') AND password = '$password' ";
	    $check_result = mysqli_query($db,$login_check);
	    $count_user = mysqli_fetch_assoc($check_result);
	    // echo "<pre>";print_r($count_user);exit;

	    unset($count_user['password']);
	    if(!empty($count_user))
	    {
	    	$response['status']=true;
		    $response['data']['message']='Login successfully';
		    $response['data']=$count_user;
		    echo json_encode($response);exit;
	    }
	    else
	    {
	    	$response['status']=false;
		    $response['data']['message']='Invalid Login information';
		    echo json_encode($response);exit;
	    }
	    
	}
	if(isset($_GET['get_category']) && !empty($_GET['get_category']) && $_GET['get_category'] == '1')
	{
		
	    $category = "SELECT *,CONCAT('http://".$_SERVER['SERVER_NAME']."/shramcity/admin/category_images/',image) as image FROM category WHERE status = 1";
	    $check_result = mysqli_query($db,$category);
	    // $category_list = mysqli_fetch_assoc($check_result);
	    
	    $category_list=[];
	    while ($category = mysqli_fetch_assoc($check_result)) {
	    	$category_list['category_info'][] = $category;
	    }
	    // echo "<pre>";print_r($category_list);exit;
	    if(!empty($category_list))
	    {
	    	$response['status']=true;
		    $response['data']=$category_list;
		    $response['data']['message']='Category found successfully';
		    echo json_encode($response);exit;
	    }
	    else
	    {
	    	$response['status']=false;
		    $response['data']['message']='No category found';
		    echo json_encode($response);exit;
	    }    	
	   
	}
	if(isset($_GET['get_city']) && !empty($_GET['get_city']) && $_GET['get_city'] == '1')
	{
		
	    $city = "SELECT id,name FROM city WHERE 1=1";
	    $check_result = mysqli_query($db,$city);
	    $city_list=[];
	    while ($city = mysqli_fetch_assoc($check_result)) {
	    	$city_list['city_info'][] = $city;
	    }
	    
	    // echo "<pre>";print_r($city_list);exit;
	    if(!empty($city_list))
	    {
	    	$response['status']=true;
		    $response['data']=$city_list;
		    $response['data']['message']='city found successfully';
		    echo json_encode($response);exit;
	    }
	    else
	    {
	    	$response['status']=false;
		    $response['data']['message']='No city found';
		    echo json_encode($response);exit;
	    }    	
	   
	}
	echo json_encode($response);exit;
}
?>