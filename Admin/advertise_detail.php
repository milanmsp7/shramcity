<?php 
$ac = 'advertisement';
include_once "header.php";
   
?>

      <div class="page-content">
        <div class="page-header">
          <a class="btn btn-success" href="add_advertise.php">Add advertisement</a>
        </div>
        
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-grid"></i></div><strong>advertisement</strong>
                    </div>
                    <?php 
                     $query = "SELECT COUNT(*) as total FROM advertisement";  
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
                  
                  <div class="table-responsive"> 
                    <table class="table table-striped">
                      <thead>
                        <tr>
                         
                          <th>Sr.no</th>
                          <th>image</th>
                          <th>Category</th>
                          <th>City</th>
                          <th>User</th>
                          
                          <th>Start date</th>
                          <th>End date</th>
                          <th>status</th>
                          
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
  <tr>
  <?php  
  include("db.php"); 
  $i = 1;  
  $ret=mysqli_query($db,"SELECT *,(SELECT name FROM category WHERE id = advertisement.category_id) as category_name , (SELECT name FROM city WHERE id = advertisement.city_id) as city_name, (SELECT name FROM user WHERE id = advertisement.user_id) as user_name FROM `advertisement`");
  while ($row=mysqli_fetch_array($ret)) {
          
  ?>              
  </tr>
                          <th scope=><?php echo $i++; ?></th>
                          <td><img width="50px" id="img" height="50px" style="vertical-align: sub;" src="advertise_images/<?php echo $row['image']; ?>"></td>
                          <td><?php  echo $row['category_name'];?></td>
                          <td><?php  echo $row['city_name'];?></td>
                          <td><?php  echo $row['user_name'];?></td>
                          
                          <td><?php  echo date("d-m-Y",strtotime($row['start_date']));?></td>
                          <td><?php  echo date("d-m-Y",strtotime($row['end_date']));?></td>
                          
                          <td>
                            <?php if ($row['status'] == '0') { ?>
                            <a href="approve.php?unApprovec_advertise_id=<?php echo $row['id']; ?>" class="btn btn-warning">Deactive</a>
                            <?php 
                         }
                         else 
                         { ?>
                            <a href="approve.php?Approvec_advertise_id=<?php echo $row['id']; ?>" class="btn btn-success">Active</a>
                            <?php } ?>
                          </td>
                         
                           <td>
                            <a href="advertise_edit.php?del=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa fa-edit" title="Edit"></i></a>
                            <a href="delete_advertise.php?del=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-remove" title="Delete"></i></a>
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
