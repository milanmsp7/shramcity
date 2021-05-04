<?php 
$ac = 'category';
include_once "header.php";
   $c_id=$_GET['del'];

  $sql="SELECT * FROM `category` WHERE id='$c_id'";
  $result = mysqli_query($db,$sql);
   
  $row = mysqli_fetch_array($result);
  
  if (isset($_POST["submit"])) 
  {
    $c_id=$_GET['del'];
    $c_name = $_POST['c_name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $path = "category_images/";

        
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
        $sql="UPDATE `category` SET name ='$c_name',description = '$description',image = '$image'  WHERE id='$c_id'";
      }
      else    
      {
          $sql="UPDATE `category` SET name='$c_name',description = '$description'  WHERE id='$c_id'";
      }
    mysqli_query($db,$sql);
    
    echo "<script>window.location = 'category.php';</script>";
  }
  
  if(isset($_POST['delete_img']))
  {
      $id = $_POST['id'];
      echo json_encode($id);
      exit;
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
                        <label class="form-control-label"> Category Name</label>
                        <input type="text" name="c_name" value="<?php echo $row['name']; ?>" placeholder="Name" class="form-control">
                      </div>
                       <div class="form-group">
                        <label class="form-control-label"> Category Description</label>
                        <input type="text" name="description" value="<?php echo $row['description']; ?>" placeholder="link" class="form-control">
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
                      
                      <center><div class="form-group">       
                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
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