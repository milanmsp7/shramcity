<?php 
$ac = 'product';
include_once "header.php";
  
  if (isset($_POST["submit"])) 
  {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $category_id = $_POST['category_id'];
    $image = $_FILES['image']['name'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);

    
     if(isset($image))
     {
          $path = "user_images/";

          if(!is_dir($path))
          {
               mkdir($path);
               chmod($path,0755);
          }

          $img = time().basename($image);
          $filename = $path.$img;
          move_uploaded_file($_FILES['image']['tmp_name'],$filename);
     }
    
     $sql="INSERT INTO user(name, email, mobile, gender, image, address, password,city_id , category_id)VALUES('$name','$email','$mobile','$gender','$img','$address','$password','$city' , '$category_id')"; 
    $query = mysqli_query($db,$sql);   
   
    echo "<script>window.location = 'user.php';</script>";
  }
 
?>
<style>
.container1 {
  position: relative;
  width: 20%;
}
.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container1:hover .image {
  opacity: 0.3;
}

.container1:hover .middle {
  opacity: 1;
}

.text {
  background-color:#dd4b39;
  color: white;
  font-size: 10px;
  padding: 10px 12px;
}
</style>
      <div class="page-content">
        <div class="page-header">
          
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
          

              <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                  <div class="title"><strong>Registration</strong></div>
                  <div class="table-responsive"> 
                   <div class="col-lg-12">
                <div class="block">
                  <div class="block-body">
                      
                    <form method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="form-control-label">Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control">
                      </div>

                       <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="text" name="email" placeholder="email" class="form-control">
                      </div>

                      <div class="form-group">
                        <label class="form-control-label">Mobile no.</label>
                        <input type="number" name="mobile" placeholder="mobile number" class="form-control">
                      </div>

                      <div class="form-group">
                        <label class="form-control-label">Gender</label><br>
                        <input type="radio" name="gender" class="form-check-inline" value="0">Male<br>
                        <input type="radio" name="gender" class="form-check-inline" value="1">Female
                      </div>
                     
                      <div class="form-group">
                        <label class="form-control-label">City</label>
                        
                        <select name="city" class="form-control">
                          <?php
                          $query="SELECT * FROM city";
                          $result=mysqli_query($db,$query);
                          while($row=mysqli_fetch_array($result))
                          {
                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?>
                            </option>
                            <?php
                          }
                          ?>
                          </select>
                       
                      </div>

                      <div class="form-group">
                      <label class="form-control-label">Category</label>
                        
                        <select name="category_id" class="form-control">
                          <?php
                          $query="SELECT * FROM category";
                          $result=mysqli_query($db,$query);
                          while($row=mysqli_fetch_array($result))
                          {
                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?>
                            </option>
                            <?php
                          }
                          ?>
                          </select>
                       
                      </div>
                    
                       <div class="form-group">
                        <label class="form-control-label">Image</label> 
                        <input type="file" class="form-control-file" name="image" value="Update" >
                      </div>
                  
                      <div class="form-group">
                        <label class="form-control-label">Address</label>
                        <textarea name="address" placeholder="address" class="form-control"></textarea>
                      </div>

                      <div class="form-group">
                        <label class="form-control-label">password</label>
                        <input type="password" placeholder="password"  name="password" class="form-control">
                      </div>
                      

                     

                      <center><div class="form-group">       
                        <input type="submit" name="submit" value="Insert" class="btn btn-primary">
                      </div></center>
                    </form>
                  </div>
                </div>
              </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php include 'footer.php'; ?>
