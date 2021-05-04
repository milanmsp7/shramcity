<?php  

include("db.php"); 
$delete_id=$_GET['del'];  
$delete_query="delete  from order_detail WHERE o_detail_id='$delete_id'";
$run=$db->query($delete_query);  
 if($run)
 {
	 header("location:order_odetails.php");
}
?>  