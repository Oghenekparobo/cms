<?php include "includes/header.php"; ?>


<!-- Navigation -->

<?php include "includes/navigation.php"; ?>

<?php

if (isset($_POST['submit'])) {

    $username =trim($_POST['username']);
    $password =trim($_POST['password']);
    $email =trim($_POST['email']);

    $error = [
        'username'=> '',
        'password'=>'',
        'email'=>'' ,
    ];

    if(strlen($username) < 4){ 
        $error['username'] = 'username to short';

    }

    if(empty($username)){ 
        $error['username'] = 'username cannot be empty';
    }

    if(strlen($password) < 4){ 
        $error['password'] = 'password to short';

    }

    if(empty($password)){ 
        $error['password'] = 'password cannot be empty';
    }


    if(usernameExists($username)){ 
        $error['username'] = 'username already taken , please <a href="index.php">please login</a>';
    }


  

    if(empty($email)){ 
        $error['email'] = 'email cannot be empty';
    }

    if(emailExists($username)){ 
        $error['email'] = 'email already taken , please <a href="index.php">please login</a>';
    }
    

    foreach ($error as $key => $value) {
       if(empty($value)){
           unset($error[$key]);
      
       }

       if(empty($error)){ 
          registerUser($username , $email, $password);
           loginUser($username, $password);

       }


    }
    
    
}

?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
         
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="on">
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on" value="<?php echo isset($username)? $username: '' ?>">
                                <p><?php echo isset($error['username'])? $error['username']: '' ?></p>
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" value="<?php echo isset($email)? $email: '' ?>">
                                <p><?php echo isset($error['email'])? $error['email']: '' ?></p>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                <p><?php echo isset($error['password'])? $error['password']: '' ?></p>
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php"; ?>