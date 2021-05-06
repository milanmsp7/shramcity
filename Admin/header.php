<?php

session_start();
include_once "db.php";
if(!isset($_SESSION["admin_email_id"]))  
 {  
      header("location:login.php");  
 }
?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.php" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Admin</strong><strong>Panel</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">A</strong><strong>P</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>
           
            <div class="list-inline-item logout"> 
            <a id="logout" href="Logout.php" class="nav-link"> <span class="d-none d-sm-inline">Logout </span><i class="icon-logout"></i></a>
          </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/avatar-8.jpg" alt="..." class="img-fluid rounded-circle" height="200px"></div>
          <div class="title">
            <h1 class="h5"><?php echo $email=$_SESSION['admin_email_id'];?></h1>
            <p>Admin</p>
          </div>
        </div>
      <span class="heading">Main</span>
        <ul class="list-unstyled">
          <li class="<?php if($ac == 'home'){ echo "active"; }?>"><a href="index.php"><i class="icon-home"></i>Home </a></li>
          <li class="<?php if($ac == 'post'){ echo "active"; }?>"><a href="post_details.php"> <i class="icon-grid"></i>Posts </a></li>
          <li class="<?php if($ac == 'advertisement'){ echo "active"; }?>"><a href="advertise_detail.php"> <i class="fa fa-bar-chart"></i>Advertisement </a></li>
          <li class="<?php if($ac == 'user'){ echo "active"; }?>"><a href="user.php"> <i class="icon-user-1"></i>Register user </a></li>
          <li class="<?php if($ac == 'category'){ echo "active"; }?>"><a href="category.php"> <i class="icon-windows"></i>Category </a></li>
          <li class="<?php if($ac == 'post_interest'){ echo "active"; }?>" ><a href="post_interest.php"> <i class="icon-padnote "></i>Post Interested </a></li>
        </ul> 
      </nav>
