<?php include 'includes/admin_header.php' ?>


<div id="wrapper">

    <!-- Navigation -->
    <?php include 'includes/admin_navigation.php' ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Comments
                        <small> <?php echo  $_SESSION['username'] ?></small>
                    </h1>

                    <?php


                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }





                    switch ($source) {
                        case 'add_posts':
                            include './includes/add_comments.php';
                            break;

                        case 'edit_posts':
                            include './includes/edit_comments.php';
                            break;


                        default:
                            include './includes/view_all_comments.php';
                            break;
                    }





                    ?>


                </div>
                <!--- end ->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include 'includes/admin_footer.php'; ?>