<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);

  $query = "SELECT * FROM users WHERE username = '$username' AND user_password = '$password'";

  $login_query = mysqli_query($connection, $query);

  if (!$login_query) {
    die('query failed' . mysqli_error($connection));
  }


  while ($row = mysqli_fetch_assoc($login_query)) {
    $db_id = $row['user_id'];
    $db_username =$row['username'];
    $db_user_firstname =$row['user_firstusername'];
    $db_user_lastname =$row['user_lastname'];
    $db_user_role =$row['user_role'];
    $db_email = $row['user_email'];
    $db_password = $row['user_password'];
  }

  if($username === $db_username  && $password === $db_password){ 
    $_SESSION['user_id']=$db_id;
    $_SESSION['username']=$db_username;
    $_SESSION['user_firstname']=$db_user_firstname;
    $_SESSION['user_lastname']=$db_user_lastname;
    $_SESSION['user_role']=$db_user_role;
    $_SESSION['user_email']=$db_email;
    $_SESSION['user_password']=$db_password;
   
    header('location: ../admin');
  }else{ 
    header('location: ../index.php');
  }
}


?>