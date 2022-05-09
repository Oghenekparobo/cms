<?php 

// this function is for any error while inserting posts
function insertPostError($error){ 
        global $connection;
        if(!$error){  
          die('query failed'.mysqli_error($connection));
        }
    
}

// function to delete posts from table
function deletePost(){ 
    if(isset( $_GET['drop'])){ 
        global $connection;
        $GET_ID = $_GET['drop'];
        $query = "DELETE FROM posts WHERE post_id ='$GET_ID'";
        $delete_post_query = mysqli_query($connection , $query);
        header("location: posts.php");
        if(!$delete_post_query){ 
            die('failed to delete posts'.mysqli_error($connection));
        }
        
    }
}

// this is a function that updates posts
// function updatePosts(){
 
     
       
    
    
// }

// insert categhories into the datbase
function insert_category(){ 
global $connection;
    if(isset($_POST['submit'])){ 
        $category_title = $_POST['cat_title'];
        if($category_title == '' || empty($category_title)){ 
            echo "<p style='color:red'>this feild should not be empty</p>";
        }else{ 
            $query = "INSERT INTO categories(cat_title)";
            $query .="VALUE('$category_title')";

            $cat_query = mysqli_query($connection , $query);
            if(!$cat_query){ 
                die('query failed'.mysqli_error($connection));
            }
        }
        
    }
    
}



// find_all categories
function findAll_categories(){ 
    global $connection;
    $query = "SELECT * FROM categories";
    $category_query = mysqli_query($connection , $query);

       while($row = mysqli_fetch_assoc($category_query)){ 
           $cat_id = $row['cat_id'];
           $cat_title = $row['cat_title'];
           
       
   ?>
   <tr>
       <td><?php echo $cat_id  ?></td>
       <td><?php echo $cat_title  ?></td>
       <td><a href="categories.php?delete=<?php echo $cat_id?>">Delete</a></td>
       <td><a href="categories.php?update=<?php echo $cat_id?>">Edit</a></td>

   </tr>
<?php } 

}

// deleting categories
function delete(){ 
    global  $connection;
    if(isset($_GET['delete'])){ 
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM  categories WHERE cat_id = $the_cat_id";
        $delete_query = mysqli_query($connection , $query);
        header("location: categories.php");
        if(!$delete_query){ 
            die('failed succesfully'.mysqli_error($connection));
        }

    }
}


?>