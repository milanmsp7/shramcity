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
                      <div class="icon"><i class="icon-grid"></i></div><strong>POST Interest</strong>
                    </div>
                    <?php 
                     $query = "SELECT COUNT(*) as total FROM post_interest";  
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
                  <div class="title"><strong>POST INTEREST</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped">
                      <thead>
                        <tr>
                         
                          <th>Sr.no</th>
                          <!-- <th>post id</th>
                          <th>user id</th> -->

                          <th>Image</th>
                          <th>Post Owner</th>
                          <th>UserName</th>
                          <th>Mobile No.</th>
                          
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
  <tr>
  <?php  
  include("db.php"); 
  $i = 1;  
  $ret=mysqli_query($db,"SELECT post_interest.*,user.name,user.mobile,post.image,(SELECT name FROM user WHERE id=post.user_id) as post_owner FROM post_interest
       LEFT JOIN user
       ON user.id = post_interest.user_id
       LEFT JOIN post
       ON post.id = post_interest.post_id");
  while ($row=mysqli_fetch_array($ret)) {
          
  ?>              
  </tr>
                         <th scope=><?php echo $i++; ?></th>
                         <th><img width="50px" id="img" height="50px" style="vertical-align: sub;" src="post_images/<?php echo $row['image']; ?>"></th>
                         <td><?php  echo $row['post_owner'];?></td>
                          
                         <td><?php  echo $row['name'];?></td>
                         <td><?php  echo $row['mobile'];?></td>
                          
                         <td>
                            
                            <a href="delete_post_interest.php?del=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-remove" title="Delete"></i></a>
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
