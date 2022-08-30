<?php include 'admin/includes/functions.php'; ?>
<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {
   $username = $_POST['username'];
    $password = $_POST['password'];
    loginUser($username , $password);


}


?>