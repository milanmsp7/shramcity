<?php 

include_once "header.php";
   
?>

      <div class="page-content">
        <div class="page-header">
          
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-grid"></i></div><strong>Orders</strong>
                    </div>
                    <?php 
                     $query = "SELECT COUNT(*) as total FROM orders";  
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
                  <div class="title"><strong>Order Table</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Sr.no</th>
                          <th>user_id</th>
                          <th>name</th>
                          <th>mobile</th>
                          <th>address</th>
                          <th>status</th>
                          <th>payment_method</th>
                          <th>payment_status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
  <tr>
  <?php  
  include("db.php"); 
  $i = 1;  
  $ret=mysqli_query($db,"SELECT * FROM `orders`");
  while ($row=mysqli_fetch_array($ret)) {
  ?>              
  </tr>
                          <th scope=><?php echo $i++; ?></th>
                          <td><?php  echo $row['user_id'];?></td>
                          <td><?php  echo $row['name'];?></td>
                          <td><?php  echo $row['mobile'];?></td>
                          <td><?php  echo $row['address'];?></td>
                          <td><?php  echo $row['status'];?></td>
                          <td><?php  echo $row['payment_method'];?></td>
                          <td><?php  echo $row['payment_status'];?></td>
                          
                          <td>
                            <?php
                          if($row['status'] != 'Cancelled')
                          {
                          ?>
                            <a href="order_process.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa fa-spinner" aria-hidden="true" title="processing"></i></a>
                          <?php
                          }
                          else
                          {
                          ?>
                            <a href="#" class="btn btn-success disabled" ><i class="fa fa-spinner" aria-hidden="true" title="processing" ></i></a>
                          <?php
                          }
                          ?>

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
