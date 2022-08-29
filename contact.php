<?php include "includes/header.php"; ?>


<!-- Navigation -->

<?php include "includes/navigation.php"; ?>

<?php

if (isset($_POST['submit'])) {
   $to = 'classicsteph11@gmail.com';
   $subject = $_POST['subject'];
   $body = $_POST['body'];

//    send mail
   if (mail($to, $subject, $body)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
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
                        <h1>Contact</h1>
                        <!-- <p class="text-center text-danger"><?php echo $message ?></p> -->
                        <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                          
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="sr-only">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="enter your subject">
                            </div>

                            <div class="form-group">
                                <textarea name="body" class="form-control" id="body" cols="50" rows="10">

                                </textarea>               
                              </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="contact">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php"; ?>