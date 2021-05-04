<?php
include 'db.php';
if(isset($_POST['delete_img']))
	{
	    $id = $_POST['id'];
	    $image = '';
	    $sql = "update product_master set p_image1 = '$image' where p_id='$id'";
	    $fire = mysqli_query($db,$sql);
	    echo json_encode($sql);
	    exit;
	}
?>