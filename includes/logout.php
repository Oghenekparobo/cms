<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php
    $_SESSION['user_lastname']=null;
    $_SESSION['user_role']=null;
    $_SESSION['user_email']=null;
    $_SESSION['user_password']=null;
    header('location: ../index.php');
?>