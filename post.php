
 <?php  include "includes/header.php"; ?>


<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>



<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        
        <div class="col-md-8">
           
         <?php

    if(isset($_GET['p_id'])){ 
        $p_id = $_GET['p_id'];
        
    }
      

    $query = "SELECT * FROM posts WHERE post_id = $p_id";
    $select_all_posts_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content =  $row['post_content'];        


    ?>
    
 

            <!-- First Blog Post -->

          

            <h2>
                <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
            </h2>
            <p class="lead">
                by <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
            <hr>
            
            
            <a href="post.php?p_id=<?php echo $post_id; ?>">
            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
            </a>
            
            
            
            <hr>
            <p><?php echo $post_content ?></p>

            <hr>
            

<?php } ?>

            
             <!-- Comments Form -->
             <div class="well">

             <?php 
             if(isset($_POST['submit_content'])){ 

                $p_id = $_GET['p_id'];
                $com_email =  $_POST['comment_email'];
                $com_author =  $_POST['comment_author'];
                $com_content =  $_POST['comment_content'];
                
                

                $query = "INSERT INTO comments (comment_post_id , comment_author , comment_email , comment_content , comment_status , comment_date)";
                $query .= " VALUES('$p_id' , '$com_author' , '$com_email' , '$com_content' , 'unapproved' , now() )";

                $com_query = mysqli_query($connection , $query);

                if(!$com_query){ 
                    die('sorry failed inserting comments'.mysqli_error($connection));
                }

             }
             
            // working on the comment count
            
               
            $query = "UPDATE posts SET  post_comment_count = post_comment_count + 1 WHERE post_id = $p_id";
           
            $post_comment_count_query = mysqli_query($connection , $query);
            if(!$post_comment_count_query ){ 
               die('query failed'.mysqli_error($connection));
            }

             
             
             
             
             ?>
                    <h4>Leave a Comment:</h4>

                    <form method="post" role="form">
                        
                        <div class="form-group">
                          <input type="text" class="form-control" name="comment_author" placeholder="Author">
                        </div>

                        <div class="form-group">
                          <input type="text" class="form-control" name="comment_email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit_content" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->


                        <?php 
                        
                        
                        
                        $query = "SELECT * FROM comments WHERE comment_post_id = $p_id AND comment_status = 'approved'";
                        $query .= "ORDER BY comment_id DESC";
                        $comment_query = mysqli_query($connection , $query);
                        if(!$comment_query){ 
                           die('query failed'.mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_assoc($comment_query)) {
                            $com_id = $row['comment_id'];
                            $com_post_id = $row['comment_post_id'];
                            $com_author = $row['comment_author'];
                            $com_email = $row['comment_email'];
                            $com_content = $row['comment_content'];
                            $comment_status = $row['comment_status'];
                            $comment_date = $row['comment_date'];

                            ?>
                            

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $com_author?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                    <p><?php echo $com_content ?></p>                    </div>
                </div>

             
                      <?php  }  ?>


                      




        </div>
        
          

        <!-- Blog Sidebar Widgets Column -->
        
        
        <?php include "includes/sidebar.php";?>
         

    </div>
    <!-- /.row -->



<?php include "includes/footer.php";?>
