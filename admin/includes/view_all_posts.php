<?php
if (isset($_POST['checkboxarray'])) {

    foreach ($_POST['checkboxarray'] as $checkboxvalue) {
        $bulkoptions = $_POST['bulkoptions'];

        switch ($bulkoptions) {
            case 'published':
                
                $sql = "UPDATE posts SET post_status =' $bulkoptions' WHERE post_id ='$checkboxvalue'  ";
                $query = mysqli_query($connection , $sql);
                break;

            case 'draft':
                $sql = "UPDATE posts SET post_status =' $bulkoptions' WHERE post_id ='$checkboxvalue'  ";
                $query = mysqli_query($connection , $sql);
                break;

            case 'delete':
                $sql = "DELETE FROM posts  WHERE post_id ='$checkboxvalue'  ";
                $query = mysqli_query($connection , $sql);
                break;

            default:
                # code...
                break;
        }
    }
}
?>


<form action="" method="post">
    <table class="table table-bordered table-hover">
        <div class="buloptionscontainer col-xs-4 pb-4">
            <select name="bulkoptions" id="" class="form-control">
                <option value="">select options</option>
                <option value="published">publish</option>
                <option value="draft">draft</option>
                <option value="delete">delete</option>
            </select>
        </div>

        <div class="col-xs-4 pb-4">
            <input type="submit" class="btn btn-success " name="submit" value="apply">
            <a href="add_posts.php" class="btn btn-primary">Add new posts</a>
        </div>

        <thead>
            <tr>
                <td><input type="checkbox" id="selectallboxes"></td>
                <td>id</td>
                <td>author</td>
                <td>title</td>
                <td>category</td>
                <td>status</td>
                <td>image</td>
                <td>tags</td>
                <td>comments</td>
                <td>date</td>
                <td>delete</td>
                <td>edit</td>
            </tr>
        </thead>
        <tbody>
            <?php

            $query = "SELECT * FROM posts";
            $post_query = mysqli_query($connection, $query);
            if (!$post_query) {
                die('query failed' . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($post_query)) {

                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];
            ?>
                <tr>
                    <td><input type="checkbox" id="checkboxes" name="checkboxarray[]" value="<?php echo $post_id ?> "></td>
                    <td><?php echo $post_id  ?></td>
                    <td><?php echo $post_author ?></td>
                    <td><?php echo $post_title ?></td>
                    <td><?php
                        $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                        $sql_query = mysqli_query($connection, $query);


                        if (!$sql_query) {
                            die('FAILED TO UPDATE' . mysqli_error($connection));
                        }
                        while ($row = mysqli_fetch_assoc($sql_query)) {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo $cat_title;
                        }


                        ?>

                    </td>

                    <td><?php echo  $post_status ?></td>
                    <td><img width="100" src="../images/<?php echo   $post_image ?>" alt="images" c"></td>
                    <td><?php echo  $post_tags ?></td>
                    <td><?php echo  $post_comment_count ?></td>
                    <td><?php echo  $post_date ?></td>
                    <td><a href="posts.php?drop=<?php echo $post_id ?>">drop</a></td>
                    <td><a href="posts.php?source=edit_posts&p_id=<?php echo $post_id ?>">update</a></td>

                </tr>
            <?php  } ?>

        </tbody>
    </table>
</form>
<?php deletePost() ?>