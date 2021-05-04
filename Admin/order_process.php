<?php
include 'db.php';
$id = $_GET['id'];
echo $id;
$sql = "UPDATE orders SET status = 'processing' WHERE id = '$id' ";
$result =mysqli_query($db,$sql);
if($result!= "")
{
  
  header('location:order_master.php');
}

?>