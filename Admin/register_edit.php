<?php 
$ac = 'product';
include_once "header.php";
   $p_id=$_GET['del'];

  $sql="SELECT * FROM `user` WHERE id='$p_id'";
  $result = mysqli_query($db,$sql);
   
  $row = mysqli_fetch_array($result);
  // print_r($row);
  
  if (isset($_POST["submit"])) 
  {
    $p_id=$_GET['del'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $city_id = $_POST['city_id'];
    $category_id = $_POST['category_id'];
    $image = $_FILES['image']['name'];
    $address = $_POST['address'];
    $path = "user_images/";


    if(isset($image) && !empty($image))
      {

        if(!is_dir($path))
        {
           mkdir($path);
           chmod($path,0755);
        }

        $img = basename($image);
        $filename = $path.$img;
        move_uploaded_file($_FILES['image']['tmp_name'],$filename);
        $sql="UPDATE `user` SET name='$name' , email = '$email' , mobile = '$mobile' , gender = '$gender' , city_id = '$city_id' , category_id = '$category_id' , image = '$img' , address = '$address'  WHERE id='$p_id'";
      }
      else    
      {
          $sql="UPDATE `user` SET name='$name' , email = '$email' , mobile = '$mobile' , gender = '$gender' , city_id = '$city_id' , category_id = '$category_id' , address = '$address'  WHERE id='$p_id'";
      }

    $result = mysqli_query($db,$sql);
    if($result != "")
    {
         echo "<script>window.location = 'user.php';</script>";
    }
    
  }
  
  if(isset($_POST['delete_img']))
  {
      $id = $_POST['p_id'];
      echo json_encode($id);
      // exit;
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
                  <div class="title"><strong>Edit Product</strong></div>
                  <div class="table-responsive"> 
                   <div class="col-lg-12">
                <div class="block">
                  <div class="block-body">
                    <form method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="form-control-label">Name</label>
                        <input type="text" name="name" value="<?= $row['name'];?>" class="form-control">
                      </div>

                       <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="text" name="email" value="<?= $row['email'];?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label class="form-control-label">Mobile no.</label>
                        <input type="number" name="mobile" value="<?= $row['mobile'];?>" class="form-control">
                      </div>

                         <div class="form-group">
                             <label class="form-control-label">Gender</label><br>
                             <input type="radio" name="gender" class="form-check-inline" value="0" <?= ($row['gender'] == 0) ? 'checked' : '' ?>  >Male<br>
                             <input type="radio" name="gender" class="form-check-inline" value="1" <?= ($row['gender'] == 1) ? 'checked' : '' ?> >Female
                         </div>
                     
                  
                      <div class="form-group">
                        <label class="form-control-label">Address</label>
                        <textarea name="address" class="form-control" value><?= $row['address']; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Category</label>
                       <select name="category_id" class="form-control">
                        
                          <?php
                          echo $query="SELECT * FROM category";
                          $result=mysqli_query($db,$query);
                          while($row1=mysqli_fetch_array($result))
                          {

                            ?>
                            <option value="<?php echo $row1['id'] ?>" <?= (isset($row1['id']) && $row['category_id']==$row1['id'])?"selected":""; ?> ><?php echo $row1['name']?>
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
                          while($row1=mysqli_fetch_array($result))
                          {

                            ?>
                            <option value="<?php echo $row1['id'] ?>" <?= (isset($row1['id']) && $row['city_id']==$row1['id'])?"selected":""; ?> ><?php echo $row1['name']?>
                            </option>
                            <?php
                          }
                          ?>
                          </select>
                        </div>

               <div class="form-group">
                  <label class="form-control-label">Image</label>
                  <input type="file" class="form-control-file" name="image" id ="file" value="Update" onchange="readURL(this);" >
                  
                  
                    <br>
                    <div class="container1" id="img_hide">
                      <img width="80px" id="img" height="80px" style="vertical-align: sub;" src="user_images/<?php echo $row['image']; ?>">
                      <br>
                      <?php echo $row['image']; ?>
                      <div class="middle">
                        <a href="#" class="text" onclick="delete_image(<?php echo $row['id']; ?>)">Remove</a>
                      </div>
                    </div>
               </div>
                      <div class="form-group">       
                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
                      </div>
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
<script>
    function delete_image(id)
    {
     
        var delete_img = 'delete';
        $.ajax({
            type: 'POST',
            url: 'image_delete.php',
            data: {id:id,delete_img:delete_img},
            dataType: 'json',
            success:function(data)
            {
                $('#img_hide').hide();
                $('#img_span').hide();
            }
        });
    }

    function readURL(input) 
     {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#img').attr('src', e.target.result);
             }

             reader.readAsDataURL(input.files[0]);
         }
     }
</script>