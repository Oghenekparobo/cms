<form action="" method="post">

<div class="form-group">
    <label for="cat_title"Edit  category</label>
    <?php 
//    edit categories
if(isset($_GET['update'])){ 
    $cat_id = $_GET['update'];
    $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
    $update_query = mysqli_query($connection , $query);

    if(!$update_query){ 
        die('FAILED TO UPDATE'.mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($update_query)){ 
        $cat_id = $row['cat_id'];
       $cat_title = $row['cat_title'];
        ?>
<input  value=<?php if(isset($cat_title)){echo $cat_title;}?> type="text" class="form-control" name="cat_title">

   <?php }} ?>
   <!-- more on updating category -->
   <?php 
     if(isset($_POST['update_category'])){ 
        $the_cat_title = $_POST['cat_title'];
        $query = "UPDATE categories SET cat_title = ' $the_cat_title' WHERE cat_id = $cat_id";
        $update_query = mysqli_query($connection , $query);
        header("location: categories.php");
        if(!$update_query){ 
            die('failed succesfully'.mysqli_error($connection));
        }

    }
   
   ?>
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_category" value="Update_category">
</div>
</form>
