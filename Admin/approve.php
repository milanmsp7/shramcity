<?php
include 'db.php'; 

 if(isset($_GET['unApprovec_id'])){
 $unApprovec_id = $_GET['unApprovec_id'];
 
	$update = "UPDATE category SET status = '1' WHERE id = '".$unApprovec_id."'";
	$clientmast12lt = mysqli_query($db,$update);
	
	header("Location: category.php");
	}
	else if(isset($_GET['Approvec_id'])){
		$Approvec_id = $_GET['Approvec_id'];
 
	$update = "UPDATE category SET status = '0' WHERE id = '".$Approvec_id."'";
	$clientmast12lt = mysqli_query($db,$update);
	
	header("Location: category.php");
	}

?>