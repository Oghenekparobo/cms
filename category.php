
 <?php  include "includes/header.php"; ?>


<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>



<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        
        <div class="col-md-8">
           
         <?php
        $get_id = $_GET['category'];
         if(isset($_GET['category'])){ 
            $get_id = $_GET['category'];
         }

      
    $query = "SELECT * FROM posts WHERE post_category_id ='$get_id' AND post_status = 'published'";
    $select_all_posts_query = mysqli_query($connection,$query);

    $count = mysqli_num_rows($select_all_posts_query);

    if($count < 1){ 
        echo '<h1 class="text-center">eyah no category<h1/>';
    }

    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];        


    ?>
    
 

            <!-- First Blog Post -->

          

            <h2>
                <a href="post/<?php echo $post_id; ?>"><?php echo $post_title ?></a>
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
            <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
            

<?php } ?>

            
            
            
            
            

          


        </div>
        
          

        <!-- Blog Sidebar Widgets Column -->
        
        
        <?php include "includes/sidebar.php";?>
         

    </div>
    <!-- /.row -->



<?php include "includes/footer.php";?>
