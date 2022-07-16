<?php


if (isset($_GET['edit_id'])) {
  $edit_id = $_GET['edit_id'];

  $sql = "SELECT * FROM users WHERE user_id = $edit_id";
  $query = mysqli_query($connection, $sql);

  if (!$query) {
    die('query failed' . mysqli_error($connection));
  }

  while ($row = mysqli_fetch_assoc($query)) {

    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];

    // $user_image = $_FILES['user_image']['name'];
    // $user_image_tmp = $_FILES['user_image']['tmp_name'];


    // function to put images in a temporary folder
    // move_uploaded_file($post_image_tmp_name, "../images/$user_image");



  }
}



if (isset($_POST['edit_user'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  // $user_image = $_FILES['user_image']['name'];
  // $user_image_tmp = $_FILES['user_image']['tmp_name'];

  $query = " SELECT Randsalt from users";
  $randsalt_query = mysqli_query($connection, $query);
  if (!$randsalt_query) {
    die('query failed' . mysqli_error($connection));
  }

  $row = mysqli_fetch_array($randsalt_query);
  $salt = $row['Randsalt'];
  $hash_password = crypt($password, $salt);


  $query = "UPDATE users SET username = '$username',user_password = '$hash_password',user_firstname =' $firstname ',user_lastname = '$lastname',user_email = '$email' ,user_role = '$role' WHERE user_id = $edit_id";
  $edit_users_query = mysqli_query($connection, $query);

  if (!$edit_users_query) {
    die('error' . mysqli_error($connection));
  }
}
?>




<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label>Enter New Username</label>
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

      if ($user_role === 'admin') {
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
    <input type="submit" class="form-control btn btn-success" name="edit_user" value="update user">
  </div>

</form>