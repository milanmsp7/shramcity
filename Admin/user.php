<?php 
$ac = 'user';
include_once "header.php";
   
?>

      <div class="page-content">
        <div class="page-header">
          <a class="btn btn-success" href="register.php">Register</a>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-padnote"></i></div><strong>Users </strong>
                    </div>
                    <?php 
                     $query = "SELECT COUNT(*) as total FROM user";  
                     $result = mysqli_query($db, $query); 
                      while($row1 = mysqli_fetch_assoc($result))  
                  {  
                  ?> 
                <div class="number dashtext-1"><?php echo $row1['total']; ?></div>
         
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: <?php echo count($row1); ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                <?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                  <!-- <div class="title"><strong> Register Table</strong></div> -->
                  <div class="table-responsive"> 
                    <table class="table table-striped">
                      <thead>
                        <tr>
                             
                          <th>id</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>email</th>
                          <th>Gender</th>
                          <th>mobile</th>
                          <th>city</th>
                          <th>category</th>
                          <!-- <th>address</th> -->
                          <th>Action</th>
                           
                        </tr>
                      </thead>
                      <tbody>
  <tr>
  <?php  
  include("db.php"); 
  $i = 1;  
  $ret=mysqli_query($db,"SELECT *,(SELECT name FROM category WHERE id = user.category_id) as category_name , (SELECT name FROM city WHERE id = user.city_id) as city_name FROM `user`");

  while ($row=mysqli_fetch_array($ret)) {
    // print_r($row);

  ?>              
  </tr>
                          <th scope=><?php echo $i++; ?></th>
                          <td><img width="50px" id="img" height="50px" style="vertical-align: sub;" src="user_images/<?php echo $row['image']; ?>"></td>
                          <td><?php  echo $row['name'];?></td>
                          <td><?php  echo $row['email'];?></td>
                          <td><?php  echo isset($row['gender']) && $row['gender'] == '1' ? 'Female':'Male';?></td>
                          <td><?php  echo $row['mobile'];?></td>  
                          <td><?php  echo $row['city_name'];?></td>     
                          <td><?php  echo $row['category_name'];?></td>     
                          
                          
                        
                          <td>
                            <a href="register_edit.php?del=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa fa-edit" title="Edit"></i></a>
                            <a href="delete_regi.php?del=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-remove" title="Delete"></i></a>
                          </td>
    <?php } ?>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php include 'footer.php'; ?>
