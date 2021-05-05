<?php
include 'db.php';
if(isset($_POST['delete_img']))
	{
	    $id = $_POST['id'];
	    $image = '';
	    $sql = "update user set image = '$image' where id='$id'";
	    $fire = mysqli_query($db,$sql);
	    echo json_encode($sql);
	    exit;
	}
?>