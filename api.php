<?php
include "Admin/db.php";
include "function.php";


header('Access-Control-Allow-Origin: *');
if(isset($_POST))
{
	$response = array('status'=>false,'message'=>'','data'=>null);
	if(isset($_GET['register']) && !empty($_GET['register']) && $_GET['register'] == '1')
	{
		$firstname = isset($_POST['firstname'])?xss_clean($_POST['firstname']):'';
		$lastname = isset($_POST['lastname'])?xss_clean($_POST['lastname']):'';
		$name = $firstname." ".$lastname;

	    $email = isset($_POST['email'])?xss_clean($_POST['email']):'';
	    $mobile = isset($_POST['mobile'])?xss_clean($_POST['mobile']):'';
	    $gender = isset($_POST['gender'])?xss_clean($_POST['gender']):'';
	    $city_id = isset($_POST['city_id'])?xss_clean($_POST['city_id']):'';
	    $image = $_FILES['image']['name'];
	    $address = isset($_POST['address'])?xss_clean($_POST['address']):'';
	    $password = md5($_POST['password']);

	    if ($firstname == "") {
	    	$response['status']=false;
	    	$response['message']='Please enter firstname';
	    	echo json_encode($response);exit;
	    }
	    if ($lastname == "") {
	    	$response['status']=false;
	    	$response['message']='Please enter lastname';
	    	echo json_encode($response);exit;
	    }
	    if ($email == "") {
	    	$response['status']=false;
	    	$response['message']='Please enter email';
	    	echo json_encode($response);exit;
	    }
	    if ($mobile == "") {
	    	$response['status']=false;
	    	$response['message']='Please enter mobile';
	    	echo json_encode($response);exit;
	    }
	    if ($gender == "") {
	    	$response['status']=false;
	    	$response['message']='Please choose gender';
	    	echo json_encode($response);exit;
	    }
	    if ($city_id == "") {
	    	$response['status']=false;
	    	$response['message']='Please select city';
	    	echo json_encode($response);exit;
	    }
	    $sql = "SELECT * FROM user WHERE email = '$email' && mobile = '$mobile'";
	    $result = mysqli_query($db,$sql);
	    $count = mysqli_num_rows($result);

	    if($count == 0)
	    {
	    	if(isset($image))
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
	    
	     	$sql="INSERT INTO user(name, email, mobile, gender, image, address, password,city_id)VALUES('$name','$email','$mobile','$gender','$img','$address','$password','$city_id')"; 
	    	$query = mysqli_query($db,$sql); 
	    	if ($query != "") 
	    	{
	    	  	$response['status']=true;
		    	$response['message']='Register successfully';
		    	echo json_encode($response);exit;
	    	} 
	    }
	    else
	    {
	    	$response['status']=false;
	    	$response['message']='Email or Mobile number already exist';
	    	echo json_encode($response);exit;
	    }
	     
	    
		echo json_encode($response);exit;
	   
	}
	if(isset($_GET['login']) && !empty($_GET['login']) && $_GET['login'] == '1')
	{
	    $email = $_POST['email'];
	    $password = md5($_POST['password']);

	    $login_check = "SELECT *,(SELECT name from city WHERE id = user.city_id) as city_name FROM user WHERE (email = '$email' OR mobile = '$email') AND password = '$password' ";
	    $check_result = mysqli_query($db,$login_check);
	    $count_user = mysqli_fetch_assoc($check_result);
	    // echo "<pre>";print_r($count_user);exit;
	    unset($count_user['password']);
	    if(!empty($count_user))
	    {
	    	$response['status']=true;
		    $response['message']='Login successfully';
		    $response['data']=$count_user;
		    echo json_encode($response);exit;
	    }
	    else
	    {
	    	$response['status']=false;
		    $response['message']='Invalid Login information';
		    echo json_encode($response);exit;
	    }
	    
	}
	if(isset($_GET['get_category']) && !empty($_GET['get_category']) && $_GET['get_category'] == '1')
	{
		
	    $category = "SELECT *,CONCAT('http://".$_SERVER['SERVER_NAME']."/shramcity/admin/category_images/',image) as image FROM category WHERE status = 1";
	    $check_result = mysqli_query($db,$category);
	    $category_list = mysqli_fetch_assoc($check_result);
	    
	    // echo "<pre>";print_r($category_list);exit;
	    if(!empty($category_list))
	    {
	    	$response['status']=true;
		    $response['message']='Category found successfully';
		    $response['data']=$category_list;
		    echo json_encode($response);exit;
	    }
	    else
	    {
	    	$response['status']=false;
		    $response['message']='No category found';
		    echo json_encode($response);exit;
	    }
	    


	    
    	
	   
	}
	echo json_encode($response);exit;

}
?>