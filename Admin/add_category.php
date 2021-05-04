<?php
$ac = 'category';
include_once "header.php";

if (isset($_POST["submit"]))
{
    $c_name = $_POST['c_name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    if(isset($image))
    {
        $path = "category_images/";

        if(!is_dir($path))
        {
           mkdir($path);
           chmod($path,0755);
        }

        $img = basename($image);
        $filename = $path.$img;
        move_uploaded_file($_FILES['image']['tmp_name'],$filename);
    }


    $query = mysqli_query($db,"INSERT INTO `category`(`name`,`description`,`image`) VALUES ('".$c_name."','".$description."','".$image."')");

    echo "<script>window.location = 'category.php';</script>";
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
            <div class="title"><strong>Add Category</strong></div>
            <div class="table-responsive">
              <div class="col-lg-12">
                <div class="block">
                  <div class="block-body">
                    <form method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="form-control-label">Category Name</label>
                        <input type="text" name="c_name"  placeholder="Category Name" class="form-control" required="">
                      </div>

                       <div class="form-group">
                        <label class="form-control-label">Description</label>
                        <input type="text" name="description"  placeholder="Category Description" class="form-control" required="">
                      </div>


                      <div class="form-group">
                        <label class="form-control-label">Image</label> 
                        <input type="file" class="form-control-file" name="image" value="Update" >
                      </div>
                      
                      
                      <div class="form-group">
                        <input type="submit" name="submit" value="Insert" class="btn btn-primary">
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