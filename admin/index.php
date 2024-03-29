<?php include 'includes/admin_header.php';?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include './includes/admin_navigation.php' ?>

    <div id="page-wrapper">

        <div class="container-fluid h-100">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small><?php echo  $_SESSION['username'] ?></small>
                    </h1>

                    <h1>

                      



                    </h1>

                    <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                </div>
            </div>
            <!-- /.row -->


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
                                    <?php
                                    $query = "SELECT * FROM posts";
                                    $select_all_post_query = mysqli_query($connection, $query);
                                    $post_counts = mysqli_num_rows($select_all_post_query);
                                    echo "<div class='huge'>{$post_counts}</div>";

                                    ?>

                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="./posts.php">
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

                                    <?php
                                    $query = "SELECT * FROM comments";
                                    $select_all_comments = mysqli_query($connection, $query);
                                    $comment_count = mysqli_num_rows($select_all_comments);
                                    echo "<div class='huge'>{$comment_count}</div>"
                                    ?>

                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="./comments.php">
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
                                    <?php
                                    $query = "SELECT * FROM users";
                                    $select_all_users = mysqli_query($connection, $query);
                                    $users_count = mysqli_num_rows($select_all_users);
                                    echo "<div class='huge'>{$users_count}</div>"
                                    ?>

                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="./users.php">
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
                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $select_all_categories = mysqli_query($connection, $query);
                                    $categories_count = mysqli_num_rows($select_all_categories);
                                    echo "<div class='huge'>{$categories_count}</div>";
                                    ?>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="./categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <?php

            $query = "SELECT * FROM posts WHERE post_status = 'published'";
            $select_publish_posts = mysqli_query($connection, $query);
            $publish_count = mysqli_num_rows($select_publish_posts);



            $query = "SELECT * FROM posts WHERE post_status = 'draft'";
            $select_draft_posts = mysqli_query($connection, $query);
            $draft_count = mysqli_num_rows($select_draft_posts);



            $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
            $select_unapprove_comments = mysqli_query($connection, $query);
            $unapprove_count = mysqli_num_rows($select_unapprove_comments);

            $query = "SELECT * FROM users WHERE user_role = 'admin'";
            $select_admin_users = mysqli_query($connection, $query);
            $admin_count = mysqli_num_rows($select_admin_users);

            $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
            $select_subscriber_users = mysqli_query($connection, $query);
            $subscriber_count = mysqli_num_rows($select_subscriber_users);






            ?>

            <div class="row">
                <div class="col-md-12">
                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['bar']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['data', 'count'],
                                <?php
                                $element_text = ['published', 'active posts', 'drafts',  'unapprove_comments', 'admins', 'subscribers', 'comments', 'users', 'categories'];
                                $element_count = [$publish_count, $post_counts, $draft_count, $unapprove_count, $admin_count, $subscriber_count, $comment_count, $users_count, $categories_count];

                                for ($i = 0; $i < 9; $i++) {
                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}] ,";
                                }

                                ?>
                                // ['post', 1000]
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
                    <div id="columnchart_material" style="width: auto; height: 500px;"></div>


                </div>

            </div>
            <!-- /.row -->








        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include './includes/admin_footer.php' ?>