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
	    $category_id = isset($_POST['category_id'])?xss_clean($_POST['category_id']):'';
	    $image = isset($_FILES['image']['name'])?$_FILES['image']['name']:'';
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
	    if ($category_id == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please select category';
	    	echo json_encode($response);exit;
	    }
	    $category_find = mysqli_query($db,"SELECT * FROM category WHERE id = '$category_id'");
	    $result = mysqli_num_rows($category_find);
	    if($result == 0 && empty($result))
	    {
	    	$response['status']=false;
		    $response['data']['message']='Category not Found';
		    echo json_encode($response);exit;
	    }
	    $sql = "SELECT * FROM user WHERE email = '$email' && mobile = '$mobile'";
	    $result = mysqli_query($db,$sql);
	    $count = mysqli_num_rows($result);

	    if($count == 0)
	    {

	    	if(isset($image) && !empty($image))
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
		    }
		    else
		    {
		    	$img="";
		    	// $response['status']=false;
			    // $response['data']['message']='Select Image';
			    // echo json_encode($response);exit;
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
		    $response['data']=$count_user;
		    $response['data']['message']='Login successfully';
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
	     
	}

	if(isset($_GET['post']) && !empty($_GET['post']) && $_GET['post'] == '1')
	{

		$city_id = isset($_POST['city_id'])? xss_clean($_POST['city_id']):'';
	    $user_id = isset($_POST['user_id'])?  xss_clean($_POST['user_id']):'';
	    $category_id = isset($_POST['category_id'])? xss_clean($_POST['category_id']):'';
	    $image = isset($_FILES['image']['name'])?$_FILES['image']['name']:'';
	    $description = isset($_POST['description'])? xss_clean($_POST['description']):'';

	    if ($city_id == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please select city';
	    	echo json_encode($response);exit;
	    }
	    if ($user_id == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please select user';
	    	echo json_encode($response);exit;
	    }
	    if ($category_id == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please select category';
	    	echo json_encode($response);exit;
	    }
	    if ($description == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please enter description';
	    	echo json_encode($response);exit;
	    }
	    
	    
    	if(isset($image) && !empty($image))
	    {
          	$path = "Admin/post_images/";

	        if(!is_dir($path))
	        {
	            mkdir($path);
	            chmod($path,0755);
	        }

		    $img = basename($image);
		    $filename = $path.$img;
	        move_uploaded_file($_FILES['image']['tmp_name'],$filename);
	    }
	    else
	    {
	    	$response['status']=false;
		    $response['data']['message']='Select Image';
		    echo json_encode($response);exit;
	    }

	    // $category_find = "SELECT * FROM category WHERE id = '$category_id'";
	    $category_find = mysqli_query($db,"SELECT * FROM category WHERE id = '$category_id'");
	    $result = mysqli_num_rows($category_find);
	    if($result == 0 && empty($result))
	    {
	    	$response['status']=false;
		    $response['data']['message']='Category not Found';
		    echo json_encode($response);exit;
	    }

	    $city_find = mysqli_query($db,"SELECT * FROM city WHERE id = '$city_id'");
	    $result = mysqli_num_rows($city_find);
	    if($result == 0 && empty($result))
	    {
	    	$response['status']=false;
		    $response['data']['message']='City not Found';
		    echo json_encode($response);exit;
	    }

	    $user_find = mysqli_query($db,"SELECT * FROM user WHERE id = '$user_id'");
	    $result = mysqli_num_rows($user_find);
	    if($result == 0 && empty($result))
	    {
	    	$response['status']=false;
		    $response['data']['message']='User not Found';
		    echo json_encode($response);exit;
	    }
	    
	    $sql="INSERT INTO post(category_id , city_id , user_id , description , image)VALUES('$category_id','$city_id','$user_id','$description','$img')"; 
	    $query = mysqli_query($db,$sql);   
    	
    	if ($query != "") 
    	{
    	  	$response['status']=true;
	    	$response['data']['message']='Post applied for approval';
	    	echo json_encode($response);exit;
    	} 
	    echo json_encode($response);exit;
	   
	}

	if(isset($_GET['advertisement']) && !empty($_GET['advertisement']) && $_GET['advertisement'] == '1')
	{

		$city_id = isset($_POST['city_id'])? xss_clean($_POST['city_id']):'';
	    $user_id = isset($_POST['user_id'])?  xss_clean($_POST['user_id']):'';
	    $category_id = isset($_POST['category_id'])? xss_clean($_POST['category_id']):'';
	    $image = isset($_FILES['image']['name'])?$_FILES['image']['name']:'';
	    $description = isset($_POST['description'])? xss_clean($_POST['description']):'';
	    $start_date = isset($_POST['start_date'])? xss_clean($_POST['start_date']):'';
	    $end_date = isset($_POST['end_date'])? xss_clean($_POST['end_date']):'';

	    if ($city_id == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please select city';
	    	echo json_encode($response);exit;
	    }
	    if ($user_id == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please select user';
	    	echo json_encode($response);exit;
	    }
	    if ($category_id == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please select category';
	    	echo json_encode($response);exit;
	    }
	    if ($description == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please enter description';
	    	echo json_encode($response);exit;
	    }
	    if ($start_date == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please enter start date';
	    	echo json_encode($response);exit;
	    }
	    if ($end_date == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please enter end date';
	    	echo json_encode($response);exit;
	    }
	    
	    
    	if(isset($image) && !empty($image))
	    {
          	$path = "Admin/advertise_images/";

	        if(!is_dir($path))
	        {
	            mkdir($path);
	            chmod($path,0755);
	        }

		    $img = basename($image);
		    $filename = $path.$img;
	        move_uploaded_file($_FILES['image']['tmp_name'],$filename);
	    }
	    else
	    {
	    	$response['status']=false;
		    $response['data']['message']='Select Image';
		    echo json_encode($response);exit;
	    }

	    // $category_find = "SELECT * FROM category WHERE id = '$category_id'";
	    $category_find = mysqli_query($db,"SELECT * FROM category WHERE id = '$category_id'");
	    $result = mysqli_num_rows($category_find);
	    if($result == 0 && empty($result))
	    {
	    	$response['status']=false;
		    $response['data']['message']='Category not Found';
		    echo json_encode($response);exit;
	    }

	    $city_find = mysqli_query($db,"SELECT * FROM city WHERE id = '$city_id'");
	    $result = mysqli_num_rows($city_find);
	    if($result == 0 && empty($result))
	    {
	    	$response['status']=false;
		    $response['data']['message']='City not Found';
		    echo json_encode($response);exit;
	    }

	    $user_find = mysqli_query($db,"SELECT * FROM user WHERE id = '$user_id'");
	    $result = mysqli_num_rows($user_find);
	    if($result == 0 && empty($result))
	    {
	    	$response['status']=false;
		    $response['data']['message']='User not Found';
		    echo json_encode($response);exit;
	    }
	    

	    $sql="INSERT INTO advertisement(category_id , city_id , user_id , description , image , start_date , end_date)VALUES('$category_id','$city_id','$user_id','$description','$img','$start_date','$end_date')"; 
    	$query = mysqli_query($db,$sql);   
    	
    	if ($query != "") 
    	{
    	  	$response['status']=true;
	    	$response['data']['message']='Advertisement applied for approval';
	    	echo json_encode($response);exit;
    	} 
	    echo json_encode($response);exit;
	   
	}
	if(isset($_GET['post_interest']) && !empty($_GET['post_interest']) && $_GET['post_interest'] == '1')
	{

		$post_id = isset($_POST['post_id'])? xss_clean($_POST['post_id']):'';
	    $user_id = isset($_POST['user_id'])?  xss_clean($_POST['user_id']):'';
	    
	    if ($post_id == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please select post';
	    	echo json_encode($response);exit;
	    }
	    if ($user_id == "") {
	    	$response['status']=false;
	    	$response['data']['message']='Please select user';
	    	echo json_encode($response);exit;
	    }
	   
	   
	    $post_find = mysqli_query($db,"SELECT * FROM post WHERE id = '$post_id'");
	    $result = mysqli_num_rows($post_find);
	    if($result == 0 && empty($result))
	    {
	    	$response['status']=false;
		    $response['data']['message']='Post not Found';
		    echo json_encode($response);exit;
	    }

	    $user_find = mysqli_query($db,"SELECT * FROM user WHERE id = '$user_id'");
	    $result = mysqli_num_rows($user_find);
	    if($result == 0 && empty($result))
	    {
	    	$response['status']=false;
		    $response['data']['message']='User not Found';
		    echo json_encode($response);exit;
	    }
	    
	     $sql="INSERT INTO post_interest( post_id , user_id )VALUES('$post_id','$user_id')"; 
	    $query = mysqli_query($db,$sql);   
    	
    	if ($query != "") 
    	{
    	  	$response['status']=true;
	    	$response['data']['message']='Interest Added';
	    	echo json_encode($response);exit;
    	} 
	    echo json_encode($response);exit;

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