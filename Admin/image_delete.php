<?php
include 'db.php';
if(isset($_POST['delete_img']))
	{
	    $id = $_POST['id'];
	    $table_name = $_POST['table_name'];
	    $folder_name = $_POST['folder_name'];

		$res = mysqli_query($db,"select * from $table_name where id = '$id'");
		while ($row = mysqli_fetch_assoc($res)) 
		{
			$img = $row['image'];
		}

		unlink("$folder_name/$img");

	    $image = '';
	    $sql = "update $table_name set image = '$image' where id='$id'";
	    $fire = mysqli_query($db,$sql);
	    echo json_encode($sql);
	    exit;
	}
?>