<?php  

include("db.php"); 
$delete_id=$_GET['del'];  
$delete_query="delete  from user_master WHERE u_id='$delete_id'";
$run=$db->query($delete_query);  
 if($run)
 {
	 header("location:index.php");
}
?>  