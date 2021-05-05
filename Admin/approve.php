<?php
include 'db.php'; 

 	if(isset($_GET['unApprovec_id'])){
 	$unApprovec_id = $_GET['unApprovec_id'];
 
	$update = "UPDATE category SET status = '1' WHERE id = '".$unApprovec_id."'";
	$clientmast12lt = mysqli_query($db,$update);
	
	header("Location: category.php");
	}
	if(isset($_GET['Approvec_id'])){
		$Approvec_id = $_GET['Approvec_id'];
 
	$update = "UPDATE category SET status = '0' WHERE id = '".$Approvec_id."'";
	$clientmast12lt = mysqli_query($db,$update);
	
	header("Location: category.php");
	}


	if(isset($_GET['unApprovec_post_id'])){
 	$unApprovec_post_id = $_GET['unApprovec_post_id'];
 
	$update = "UPDATE post SET status = '1' WHERE id = '".$unApprovec_post_id."'";
	$clientmast12lt = mysqli_query($db,$update);
	
	header("Location: post_details.php");
	}
	if(isset($_GET['Approvec_post_id'])){
		$Approvec_post_id = $_GET['Approvec_post_id'];
 
	$update = "UPDATE post SET status = '0' WHERE id = '".$Approvec_post_id."'";
	$clientmast12lt = mysqli_query($db,$update);
	
	header("Location: post_details.php");
	}


	if(isset($_GET['unApprovec_advertise_id'])){
	 	$unApprovec_advertise_id = $_GET['unApprovec_advertise_id'];
	 
		$update = "UPDATE advertisement SET status = '1' WHERE id = '".$unApprovec_advertise_id."'";
		$clientmast12lt = mysqli_query($db,$update);
		
		header("Location: advertise_detail.php");
	}
	if(isset($_GET['Approvec_advertise_id'])){
		$Approvec_advertise_id = $_GET['Approvec_advertise_id'];
 
		$update = "UPDATE advertisement SET status = '0' WHERE id = '".$Approvec_advertise_id."'";
		$clientmast12lt = mysqli_query($db,$update);
		
		header("Location: advertise_detail.php");
	}

?>