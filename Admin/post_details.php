<?php 

include_once "header.php";
   
?>

      <div class="page-content">
        <div class="page-header">
          <a class="btn btn-success" href="add_post.php">Add Post</a>
        </div>
        
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-grid"></i></div><strong>POST</strong>
                    </div>
                    <?php 
                     $query = "SELECT COUNT(*) as total FROM post";  
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
                  <div class="title"><strong>Post Table</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped">
                      <thead>
                        <tr>
                         
                          <th>Sr.no</th>
                          <th>image</th>
                          <th>Category</th>
                          <th>City</th>
                          <th>User</th>
                          <th>Description</th>
                          <th>status</th>
                          <th>is_verify</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
  <tr>
  <?php  
  include("db.php"); 
  $i = 1;  
  $ret=mysqli_query($db,"SELECT * FROM `post`");
  while ($row=mysqli_fetch_array($ret)) {
          
  ?>              
  </tr>
                          <th scope=><?php echo $i++; ?></th>
                          <td><img width="50px" id="img" height="50px" style="vertical-align: sub;" src="post_images/<?php echo $row['image']; ?>"></td>
                          <td><?php  echo $row['category_id'];?></td>
                          <td><?php  echo $row['city_id'];?></td>
                          <td><?php  echo $row['user_id'];?></td>
                          <td><?php  echo $row['description'];?></td>
                          
                          <td>
                            <?php if ($row['status'] == '0') { ?>
                            <a href="approve.php?unApprovec_post_id=<?php echo $row['id']; ?>" class="btn btn-warning">Deactive</a>
                            <?php } else { ?>
                            <a href="approve.php?Approvec_post_id=<?php echo $row['id']; ?>" class="btn btn-success">Active</a>
                            <?php } ?>
                          </td>
                          <td><?php  echo $row['is_verify'];?></td>
                           <td>
                            <a href="post_edit.php?del=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa fa-edit" title="Edit"></i></a>
                            <a href="delete_post.php?del=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-remove" title="Delete"></i></a>
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
