<?php  

include("db.php"); 
$delete_id=$_GET['del'];  

$res = mysqli_query($db,"select * from category where id = '$delete_id'");
while ($row = mysqli_fetch_assoc($res)) 
{
	$img = $row['image'];
}

unlink("category_images/$img");

$delete_query="delete  from category WHERE id='$delete_id'";
$run=$db->query($delete_query);  
 if($run)
 {
	 header("location:category.php");
}
?>  