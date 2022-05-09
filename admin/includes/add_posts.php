
<?php 
;
if(isset($_POST['create_post'])) {
    $post_category_id = $_POST['post_category_id'];
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_date = date('d-m-y');
    $post_image = $_FILES['post_image']['name'];
    $post_image_tmp_name= $_FILES['post_image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags= $_POST['post_tags'];
    $post_comment_count = 4;
    $post_status = $_POST['post_status'];

    // function to put images in a temporary folder
    move_uploaded_file($post_image_tmp_name, "../images/$post_image");

    $query = "INSERT INTO posts( post_category_id , post_title , post_author , post_date , post_image , post_content , post_tags , post_comment_count , post_status)";
    $query .= "VALUES( '$post_category_id ', '$post_title' ,  '$post_author' , now(), '$post_image' , '$post_content' , '$post_tags' , '$post_comment_count' ,'$post_status')";
    $add_post_query = mysqli_query($connection, $query);

    insertPostError($add_post_query);
}
?>




<form action="" method="post" enctype="multipart/form-data">

 <div class="form-group">
    <label>post title</label>
    <input type="text" class="form-control" name="post_title">
  </div>

  <div class="form-group">
    <label>post category id</label>
    <input type="text" class="form-control" name="post_category_id">
  </div>

  <div class="form-group">
    <label>post author</label>
    <input type="text" class="form-control" name="post_author">
  </div>

  <div class="form-group">
    <label>post status</label>
    <input type="text" class="form-control" name="post_status">
  </div>

  <div class="form-group">
    <label>post image</label>
    <input type="file" class="form-control-file" name="post_image">
  </div>

  <div class="form-group">
    <label>post tags</label>
    <input type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label>post content</label>
    <textarea name="post_content" class="form-control"></textarea>
  </div>

  <div class="form-group">
    <input type="submit" class="form-control btn btn-success" name="create_post" value="publish post">
  </div>

</form>