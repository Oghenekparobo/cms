<?php include 'includes/admin_header.php' ?>
<?php

if (isset($_SESSION['username'])) {
    $session_username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username = '$session_username'";
    $query = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
    }
}


?>

<?php 

if(isset($_POST['update_profile'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
  // $user_image = $_FILES['user_image']['name'];
  // $user_image_tmp = $_FILES['user_image']['tmp_name'];
    
  

  // function to put images in a temporary folder

  $query = "UPDATE users SET username = '$username',user_password = $password,user_firstname =' $firstname ',user_lastname = '$lastname',user_email = '$email' ,user_role = '$role' WHERE username = '$session_username'";
  $update_profile_query = mysqli_query($connection , $query);

  if(! $update_profile_query){ 
    die('error'.mysqli_error( $connection));
  }





}
?>


<div id="wrapper">

    <!-- Navigation -->
    <?php include './includes/admin_navigation.php' ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small><?php echo  $_SESSION['username'] ?></small>
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


                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" value="<?php echo $username ?>" name="username">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" value="<?php echo $user_password ?>" name="password">
                    </div>
            </div>



            <div class="form-group">

                <select name="role" id="user_role">
                    <option value="<?php echo  $user_role ?>"><?php echo  $user_role ?></option>
                    <?php

                    if ($user_role == 'admin') {
                        echo " <option value='subscriber'>subscriber</option>";
                    } else {
                        echo "<option value='admin'>admin</option>";
                    }



                    ?>



                </select>
            </div>


            <div class="form-group">
                <label>Firstname</label>
                <input type="text" class="form-control" value="<?php echo $user_firstname ?>" name="firstname">
            </div>

            <div class="form-group">
                <label>Lastname</label>
                <input type="text" class="form-control" value="<?php echo $user_lastname ?>" name="lastname">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control-file" name="image">
            </div>

            <div class="form-group">
                <label>User email</label>
                <input type="text" class="form-control" <?php echo $user_email ?>" name="email">
            </div>


            <div class="form-group">
                <input type="submit" class="form-control btn btn-success" name="update_profile" value="Update Profile">
            </div>

            </form>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include './includes/admin_footer.php' ?>