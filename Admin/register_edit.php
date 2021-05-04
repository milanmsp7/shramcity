<?php 
$ac = 'product';
include_once "header.php";
   $p_id=$_GET['del'];

  $sql="SELECT * FROM `product_master` WHERE p_id='$p_id'";
  $result = mysqli_query($db,$sql);
   
  $row = mysqli_fetch_array($result);
  // print_r($row);
  
  if (isset($_POST["submit"])) 
  {
    $p_id=$_GET['del'];
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_qty = $_POST['p_qty'];
    $catname = $_POST['catname'];
    $p_description = $_POST['p_description'];
    $p_image1 = $_FILES['p_image1']['name'];
    $path="products/".$p_image1; 
    
        
    
  if(isset($p_image1) && !empty($p_image1))
  {
    move_uploaded_file($_FILES['p_image1']['tmp_name'],$path);
    $sql="UPDATE `product_master` SET p_name='$p_name',p_image1='$p_image1',p_price='$p_price',
    p_qty='$p_qty', p_description='$p_description', c_name='$catname'
    WHERE p_id='$p_id'";
      
  }
  else    
  {
      $sql="UPDATE `product_master` SET p_name='$p_name',p_price='$p_price',p_qty='$p_qty',p_description='$p_description',c_name='$catname'
      WHERE p_id='$p_id'";
      
  }
    mysqli_query($db,$sql);
    
    echo "<script>window.location = 'product.php';</script>";
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
                        <input type="text" name="p_name" value="<?php echo $row['p_name']; ?>" placeholder="Name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Price</label>
                        <input type="text" name="p_price" value="<?php echo $row['p_price']; ?>" placeholder="Price" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Quantity</label>
                        <input type="text" placeholder="Quantity" value="<?php echo $row['p_qty']; ?>" name="p_qty" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Description</label>
                        <input type="text" placeholder="Description" name="p_description" value="<?php echo $row['p_description']; ?>" class="form-control">
                      </div>

                       <div class="form-group">
                        <label class="form-control-label">Category</label>
                      <select name="catname" class="form-control">
                        
                          <?php
                          $query="SELECT * FROM category";
                          $result=mysqli_query($db,$query);
                          while($row1=mysqli_fetch_array($result))
                          {

                            ?>
                            <option value="<?php echo $row1['c_id'] ?>" <?= (isset($row1['c_id']) && $row['c_name']==$row1['c_id'])?"selected":""; ?> ><?php echo $row1['c_name']?>
                            </option>
                            <?php
                          }
                          ?>
                          </select>
                        </div>

               <div class="form-group">
                  <label class="form-control-label">Image</label>
                  <input type="file" class="form-control-file" name="p_image1" id ="file" value="Update" onchange="readURL(this);" >
                  
                  
                    <br>
                    <div class="container1" id="img_hide">
                      <img width="80px" id="img" height="80px" style="vertical-align: sub;" src="products/<?php echo $row['p_image1']; ?>">
                      <br>
                      <?php echo $row['p_image1']; ?>
                      <div class="middle">
                        <a href="#" class="text" onclick="delete_image(<?php echo $row['p_id']; ?>)">Remove</a>
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