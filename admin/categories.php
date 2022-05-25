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
                           Categories
                            <small><?php echo  $_SESSION['username'] ?></small>
                        </h1>

                        <div class="col-xs-6">
                            <!-- insert category into data base -->
                            <?php insert_category(); ?>

                        <form action="" method="post">

                            <div class="form-group">
                                <label for="cat_title">Add category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                            </div>
                        </form>

                        <!-- edit categories -->
                        <?php
                       if(isset($_GET['update'])){ 
                        $cat_id = $_GET['update'];
                        include 'includes/update_category.php';

                       }
                       ?>

                        </div>

                        <div class="col-xs-6">
                            <!-- //add category -->
                          
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>category title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- find all category -->
                                    <?php findAll_categories()?>
                               <!-- deleting categories -->
                               <?php delete();?>
                               
                              
                           
                         

                                </tbody>
                            </table>

                        </div>




                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include 'includes/admin_footer.php'; ?>