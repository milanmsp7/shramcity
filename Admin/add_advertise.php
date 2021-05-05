<?php 
$ac = 'product';
include_once "header.php";
  
  if (isset($_POST["submit"])) 
  {

    $city_id = $_POST['city_id'];
    $user_id = $_POST['user_id'];
    $category_id = $_POST['category_id'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    // echo date("Y-m-d",strtotime($_POST['start_Date']));
    

    
     if(isset($image))
     {
          $path = "advertise_images/";

          if(!is_dir($path))
          {
               mkdir($path);
               chmod($path,0755);
          }

          $img = basename($image);
          $filename = $path.$img;
          move_uploaded_file($_FILES['image']['tmp_name'],$filename);
     }
    
     $sql="INSERT INTO advertisement(category_id , city_id , user_id , description , image , start_date , end_date)VALUES('$category_id','$city_id','$user_id','$description','$img','$start_date','$end_date')"; 
    $query = mysqli_query($db,$sql);   
   if($query != "")
   {
    echo "<script>window.location = 'advertise_detail.php';</script>";

   }
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
                  <div class="title"><strong>POST</strong></div>
                  <div class="table-responsive"> 
                   <div class="col-lg-12">
                <div class="block">
                  <div class="block-body">
                      
                    <form method="post" enctype="multipart/form-data">

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
                        <label class="form-control-label">City</label>
                        
                        <select name="city_id" class="form-control">
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
                        <label class="form-control-label">User</label>
                        
                        <select name="user_id" class="form-control">
                          <?php
                          $query="SELECT * FROM user";
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
                        <label class="form-control-label">Description</label>
                        <input type="text" name="description"  placeholder="Advertisement Description" class="form-control" required="">
                    </div>

                      
                    <div class="form-group">
                        <label class="form-control-label">Image</label> 
                        <input type="file" class="form-control-file" name="image" value="Update" >
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Start Date</label>
                        <input type="date" name="start_date"  placeholder="start date " class="form-control" required="">
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">End Date</label>
                        <input type="date" name="end_date"  placeholder="end date" class="form-control" required="">
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
