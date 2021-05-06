<?php 
$ac = 'product';
include_once "header.php";
   $p_id=$_GET['del'];

  $sql="SELECT * FROM `advertisement` WHERE id='$p_id'";
  $result = mysqli_query($db,$sql);
   
  $row = mysqli_fetch_array($result);
  // print_r($row);
  
  if (isset($_POST["submit"])) 
  {
    $p_id=$_GET['del'];
    
    $category_id = $_POST['category_id'];
    $city_id = $_POST['city_id'];
    $user_id = $_POST['user_id'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $image = $_FILES['image']['name'];
    $path = "advertise_images/";

        
      if(isset($image) && !empty($image))
      {
        $image_old = $row['image'];
        if(isset($image_old) && !empty($image_old))
        {
          unlink("advertise_images/$image_old");

        }
        if(!is_dir($path))
        {
           mkdir($path);
           chmod($path,0755);
        }

        $img = time().basename($image);
        $filename = $path.$img;
        move_uploaded_file($_FILES['image']['tmp_name'],$filename);
        $sql="UPDATE `advertisement` SET category_id ='$category_id',city_id ='$city_id', user_id ='$user_id', description = '$description',image = '$img' , start_date = '$start_date' , end_date = '$end_date'  WHERE id='$p_id'";
      }
      else    
      {
          $sql="UPDATE `advertisement` SET category_id ='$category_id',city_id ='$city_id', user_id ='$user_id', description = '$description' , start_date = '$start_date' , end_date = '$end_date'  WHERE id='$p_id'";
      }
    mysqli_query($db,$sql);
    
    echo "<script>window.location = 'advertise_detail.php';</script>";
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
                        <label class="form-control-label">user</label>
                      <select name="user_id" class="form-control">
                        
                          <?php
                          $query="SELECT * FROM user";
                          $result=mysqli_query($db,$query);
                          while($row1=mysqli_fetch_array($result))
                          {

                            ?>
                            <option value="<?php echo $row1['id'] ?>" <?= (isset($row1['id']) && $row['user_id']==$row1['id'])?"selected":""; ?> ><?php echo $row1['name']?>
                            </option>
                            <?php
                          }
                          ?>
                          </select>
                        </div>

                     
                      
                      <div class="form-group">
                        <label class="form-control-label">Description</label>
                        <input type="text" placeholder="Description" name="description" value="<?php echo $row['description']; ?>" class="form-control">
                      </div>

                     
               <div class="form-group">
                  <label class="form-control-label">Image</label>
                  <input type="file" class="form-control-file" name="image" id ="file" value="Update" onchange="readURL(this);" >
                  
                  
                    <br>
                    <div class="container1" id="img_hide">
                      <img width="80px" id="img" height="80px" style="vertical-align: sub;" src="advertise_images/<?php echo $row['image']; ?>">
                      <br>
                      <?php echo $row['image']; ?>
                      <div class="middle">
                        <a href="#" class="text" onclick="delete_image(<?php echo $row['id']; ?>)">Remove</a>
                      </div>
                    </div>
               </div>

               <div class="form-group">
                        <label class="form-control-label">Start Date</label>
                        <input type="date" name="start_date" value="<?= $row['start_date']; ?>" class="form-control" required="">
                    </div>

              <div class="form-group">
                  <label class="form-control-label">End Date</label>
                  <input type="date" name="end_date"  value="<?= $row['end_date']; ?>" class="form-control" required="">
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
        var folder_name = "advertise_images";
        var delete_img = 'delete';
        var table_name = 'advertisement';
        $.ajax({
            type: 'POST',
            url: 'image_delete.php',
            data: {id:id,delete_img:delete_img,table_name:table_name, folder_name:folder_name},
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