<?php
$ac = 'home';
include_once "header.php";

?>
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
        </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <a href="user.php">
                                <div class="title">
                                    <div class="icon"><i class="icon-user-1"></i></div><strong>Users</strong>
                                </div>
                            </a>
                            <?php
                            $query = "SELECT COUNT(*) as total FROM user";
                            $result = mysqli_query($db, $query);
                            if(isset($result) && !empty($result)){
                            }
                            while($row1 = mysqli_fetch_assoc($result))
                            {
                            ?>
                                <div class="number dashtext-1"><?php echo $row1['total']; ?></div>
                                
                                </div>
                                <div class="progress progress-template">
                                <div role="progressbar" style="width: <?php echo count($row1); ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <a href="category.php">
                                <div class="title">
                                    <div class="icon"><i class="icon-bill"></i></div><strong>Category</strong>
                                </div>
                            </a>
                            <?php
                            $query = "SELECT COUNT(id) as total FROM category";
                            $result = mysqli_query($db, $query);
                            if(isset($result) && !empty($result)){
                            }
                            while($row1 = mysqli_fetch_assoc($result))
                            {
                            ?>
                                <div class="number dashtext-1"><?php echo $row1['total']; ?></div>
                                
                                </div>
                                <div class="progress progress-template">
                                <div role="progressbar" style="width: <?php echo count($row1); ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <a href="post_details.php">
                                <div class="title">
                                    <div class="icon"><i class="icon-list"></i></div><strong>POST</strong>
                                </div>
                            </a>
                            <?php
                            $query = "SELECT COUNT(*) as total FROM post";
                            $result = mysqli_query($db, $query);
                            if(isset($result) && !empty($result)){
                            }
                            while($row1 = mysqli_fetch_assoc($result))
                            {
                            ?>
                                <div class="number dashtext-1"><?php echo $row1['total']; ?></div>
                                
                                </div>
                                <div class="progress progress-template">
                                <div role="progressbar" style="width: <?php echo count($row1); ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <a href="advertise_detail.php">
                                <div class="title">
                                    <div class="icon"><i class="icon-flow-branch"></i></div><strong>Advertisement</strong>
                                </div>
                            </a>
                            <?php
                            $query = "SELECT COUNT(id) as total FROM advertisement";
                            $result = mysqli_query($db, $query);
                            if(isset($result) && !empty($result)){
                            }
                            while($row1 = mysqli_fetch_assoc($result))
                            {
                            ?>
                                <div class="number dashtext-1"><?php echo $row1['total']; ?></div>
                                
                                </div>
                                <div class="progress progress-template">
                                <div role="progressbar" style="width: <?php echo count($row1); ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>

