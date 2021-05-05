<?php  

include("db.php"); 
$delete_id=$_GET['del'];  
$delete_query="delete  from post WHERE id='$delete_id'";
$run=$db->query($delete_query);  
 if($run)
 {
	 header("location:post_details.php");
}
?>  