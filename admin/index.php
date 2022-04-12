<?php include "includes/admin_header.php"; ?>

<!-- Navigation -->
<?php include "includes/admin_nav.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Admin Dashboard



                    <small><?php echo $_SESSION['username']; ?></small>
                </h1>

            </div>
        </div>
        <!-- /.row -->

        <?php

        $query = "SELECT * FROM posts";
        $querySend = mysqli_query($connection, $query);
        $post_count = mysqli_num_rows($querySend);

        queryCheck($querySend);

        $query = "SELECT * FROM comments";
        $querySend = mysqli_query($connection, $query);
        $comment_count = mysqli_num_rows($querySend);

        queryCheck($querySend);

        $query = "SELECT * FROM users";
        $querySend = mysqli_query($connection, $query);
        $user_count = mysqli_num_rows($querySend);

        queryCheck($querySend);

        $query = "SELECT * FROM categories";
        $querySend = mysqli_query($connection, $query);
        $category_count = mysqli_num_rows($querySend);

        queryCheck($querySend);

        $query = "SELECT * FROM posts WHERE post_status = 'published'";
        $querySend = mysqli_query($connection, $query);
        $active_post_count = mysqli_num_rows($querySend);

        queryCheck($querySend);

        $query = "SELECT * FROM posts WHERE post_status = 'draft'";
        $querySend = mysqli_query($connection, $query);
        $draft_post_count = mysqli_num_rows($querySend);

        queryCheck($querySend);

        $query = "SELECT * FROM comments WHERE comment_status = 'approved'";
        $querySend = mysqli_query($connection, $query);
        $active_comment_count = mysqli_num_rows($querySend);

        queryCheck($querySend);

        $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
        $querySend = mysqli_query($connection, $query);
        $draft_comment_count = mysqli_num_rows($querySend);

        queryCheck($querySend);

        $query = "SELECT * FROM users WHERE user_role = 'admin'";
        $querySend = mysqli_query($connection, $query);
        $admin_count = mysqli_num_rows($querySend);

        queryCheck($querySend);

        $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
        $querySend = mysqli_query($connection, $query);
        $sub_count = mysqli_num_rows($querySend);

        queryCheck($querySend);



        ?>

        <!-- /.row -->

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $post_count; ?></div>
                                <div>Posts</div>
                            </div>
                        </div>
                    </div>
                    <a href="posts.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $comment_count; ?></div>
                                <div>Comments</div>
                            </div>
                        </div>
                    </div>
                    <a href="comments.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $user_count; ?></div>
                                <div> Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="users.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $category_count; ?></div>
                                <div>Categories</div>
                            </div>
                        </div>
                    </div>
                    <a href="categories.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Data', 'Count'],
                        ['Active Posts', <?php echo $active_post_count; ?>],
                        ['Draft Posts', <?php echo $draft_post_count; ?>],
                        ['Active Comments', <?php echo $active_comment_count; ?>],
                        ['Unnapproved Comments', <?php echo $draft_comment_count; ?>],
                        ['Admins', <?php echo $admin_count; ?>],
                        ['Subscribers', <?php echo $sub_count; ?>],
                        ['Categories', <?php echo $category_count; ?>],
                    ]);

                    var options = {
                        chart: {
                            title: '',
                            subtitle: '',
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            </script>
            <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
        </div>





    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->




<?php include "includes/admin_footer.php"; ?>