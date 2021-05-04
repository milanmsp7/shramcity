<?php  

include("db.php"); 
$delete_id=$_GET['del'];  
$delete_query="delete  from order_master WHERE u_id='$delete_id'";
$run=$db->query($delete_query);  
 if($run)
 {
	 header("location:order_master.php");
}
?>  