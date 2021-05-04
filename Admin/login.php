
<?php
session_start();

include 'db.php'; 
error_reporting(0);

if(isset($_POST['login']))
{
   $admin_email_id=$_POST['admin_email_id'];
   //$pas=$_POST['pass'];
   $password=$_POST['password'];
  
  // $customer_query ="SELECT admin_email_id, password FROM `admin_master` where admin_email_id='$admin_email_id'";
  // $result = $db->query($customer_query);
  // $row = mysqli_fetch_array($result);
  
  if ($admin_email_id == "krima@gmail.com" && $password == 123123 )
  {
    // $_SESSION['user']=true;
    // $_SESSION['admin_email_id']='$admin_email_id';
    $_SESSION['admin_email_id']="krima@gmail.com";
    // $email=$_SESSION['admin_email_id'];
    die ('<script type="text/javascript"> window.location.href="index.php"; </script>');
  
  }
  else
  {
    echo $msg="Invalid Email And Password !"; 
  }
  
  
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
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            
            <!-- Form Panel    -->
            <div class="col-lg-12">

              <div class="form d-flex align-items-center">

                <div class="content">
             
                  <center><h1>Admin Login</h1></center>
                  <center><p style="color:red;"><?php echo $msg; ?></p></center>
                  <center><form method="POST" class="form-validate mb-4">
                    <div class="form-group">
                      <input id="login-username" type="text" name="admin_email_id" required data-msg="Please enter your Email" class="input-material">
                      <label for="login-username" class="label-material">Email</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required data-msg="Please enter your Password" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                  </form></center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>