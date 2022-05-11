<?php 

   if (isset($_GET['p_id'])) {
    $GET_ID = $_GET['p_id'];
  }

$query = "SELECT * FROM posts WHERE post_id = '$GET_ID'";
$update_post_query = mysqli_query($connection, $query);

if (!$update_post_query) {
    die('query failed'.mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($update_post_query)) {
    $post_id = $row['post_id'];
    $post_category_id = $row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags= $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
}

if(isset($_POST['update_post'])){ 

    $post_category_id = $_POST['post_category_id'];
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_date = date('d-m-y');
    $post_image = $_FILES['post_image']['name'];
    $post_image_tmp_name= $_FILES['post_image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags= $_POST['post_tags'];
    // $post_comment_count = 4;
    $post_status = $_POST['post_status'];

    move_uploaded_file($post_image_tmp_name, "../images/$post_image");

    if(empty($post_image)){ 
      $query = "SELECT * FROM posts WHERE post_id = '$GET_ID'";
      $empty_image_query = mysqli_query($connection , $query);

      if(!$empty_image_query){ 
      die('no image'.mysqli_error($connection));
      }

      while($row = mysqli_fetch_assoc($empty_image_query)){ 
        $post_image= $row['post_image'];
      }
    }
    
    $query = "UPDATE posts SET post_category_id = '$post_category_id', post_title = '$post_title', post_author = '$post_author', post_date = now(), post_image = '$post_image', post_content = '$post_content', post_tags = '$post_tags', post_status = '$post_status' WHERE post_id = '$GET_ID' ";

    $edit_query = mysqli_query($connection ,$query);

    if(!$edit_query){ 
      die('query failed'.mysqli_error($connection));
    }
    

}

?>

<form action="" method="post" enctype="multipart/form-data">

 <div class="form-group">
    <label>post title</label>
    <input value="<?php echo $post_title ?>" type="text" class="form-control" name="post_title">
  </div>

  <div class="form-group">
    <label>post category id</label>
        <select name="post_category_id" id="post_category_id">
            <?php
            
            
                $query = "SELECT * FROM categories";
                $update_cat_query = mysqli_query($connection , $query);
            
                if(!$update_cat_query){ 
                    die('FAILED TO UPDATE CATEGORY ID'.mysqli_error($connection));
                }
            
                while ($row = mysqli_fetch_assoc($update_cat_query)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                   
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
                  
            ?>
        
        </select>
  </div>

  <div class="form-group">
    <label>post author</label>
    <input value="<?php echo $post_author ?>" type="text" class="form-control" name="post_author">
  </div>

  <div class="form-group">
    <label>post status</label>
    <input value="<?php echo $post_status ?>" type="text" class="form-control" name="post_status">
  </div>

  <div class="form-group">
  <img src="../images/<?php echo $post_image ?>"  width="100" alt="image">
  <input type="file" name="post_image" >
  </div>

  <div class="form-group">
    <label>post tags</label>
    <input value="<?php echo $post_tags ?>" type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label>post content</label>
    <textarea " name="post_content" class="form-control"><?php echo $post_content ?></textarea>
  </div>

  <div class="form-group">
    <input type="submit" class="form-control btn btn-success" name="update_post" value="update post">
  </div>

</form>