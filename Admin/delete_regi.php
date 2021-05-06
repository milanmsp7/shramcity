<?php  

include("db.php"); 
$delete_id=$_GET['del'];  

$res = mysqli_query($db,"select * from user where id = '$delete_id'");
while ($row = mysqli_fetch_assoc($res)) 
{
	$img = $row['image'];
}

unlink("user_images/$img");

$delete_query="delete  from user WHERE id='$delete_id'";
$run=$db->query($delete_query);  
 if($run)
 {
	 header("location:user.php");
}
?>  