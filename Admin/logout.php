<?php
session_start();
unset($_SESSION['admin_email_id']);
header("location:login.php");
?>