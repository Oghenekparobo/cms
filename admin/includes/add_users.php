<?php
if (isset($_POST['add_user'])) {

  $username = $_POST['username'];
  $user_password = $_POST['user_password'];
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $user_email = $_POST['user_email'];
  // $user_image = $_FILES['user_image']['name'];
  // $user_image_tmp = $_FILES['user_image']['tmp_name'];
  $user_role = $_POST['user_role'];
  $user_date = date('d-m-y');

  // function to put images in a temporary folder
  // move_uploaded_file($post_image_tmp_name, "../images/$user_image");
  $user_password= password_hash($user_password , PASSWORD_BCRYPT , array('cost' => 5 )); //new system encrypting system
    
  $query = "INSERT INTO users( username , user_password , user_firstname , user_lastname , user_email , user_role , user_date)";
  $query .= "VALUES('$username' , '$user_password' , '$user_firstname' , '$user_lastname' , '$user_email' , '$user_role' , now())";

  $add_users_query = mysqli_query($connection, $query);

  if (!$add_users_query) {
    die('error adding users' . mysqli_error($connection));
  } else {
    echo "User Created:" . "." . "<a href='users.php'>View users</a>";
  }
}
?>




<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" name="username">
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="user_password">
  </div>
  </div>



  <div class="form-group">

    <select name="user_role" id="user_role">
      <option value="null">Select your role</option>
      <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option>
    </select>
  </div>


  <div class="form-group">
    <label>Firstname</label>
    <input type="text" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
    <label>Lastname</label>
    <input type="text" class="form-control" name="user_lastname">
  </div>

  <div class="form-group">
    <label>Image</label>
    <input type="file" class="form-control-file" name="user_image">
  </div>

  <div class="form-group">
    <label>User email</label>
    <input type="text" class="form-control" name="user_email">
  </div>


  <div class="form-group">
    <input type="submit" class="form-control btn btn-success" name="add_user" value="Add user">
  </div>

</form>