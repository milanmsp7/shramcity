<?php  

include("db.php"); 
$delete_id=$_GET['del'];  

$res = mysqli_query($db,"select * from post where id = '$delete_id'");
while ($row = mysqli_fetch_assoc($res)) 
{
	$img = $row['image'];
}

unlink("post_images/$img");

$delete_query="delete  from post WHERE id='$delete_id'";
$run=$db->query($delete_query);  
 if($run)
 {
	 header("location:post_details.php");
}
?>  