<?php
// security function to esape and prevent sql injection
function escape($string){
    global $connection;
   return mysqli_real_escape_string($connection , trim($string));

}

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

// this is a function that resets views count
function resetViews(){ 
    if(isset( $_GET['reset'])){ 
        global $connection;
        $GET_ID = $_GET['reset'];
        $query = "UPDATE posts SET post_views =post_views * 0 WHERE post_id =$GET_ID";
        $reset_post_query = mysqli_query($connection , $query);
        header("location: posts.php");
        if(!$reset_post_query){ 
            die('failed to reset posts'.mysqli_error($connection));
        }
        
    }
}

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





// comments section
// function to delete comments

function deleteComments(){ 
    global $connection;

    if(isset($_GET['trash'])){ 
        
        $trash = $_GET['trash'];

        $query = "DELETE FROM comments WHERE comment_id = $trash";
        $del_com_query = mysqli_query($connection , $query);
        header("location: comments.php");
        if(!$del_com_query){ 
            die('failed succesfully'.mysqli_error($connection));
        }

        
    }
}

// function to unapprove comments
function unapprove(){ 
    global $connection;
    if(isset($_GET['unapprove'])){ 
        
        $unapprove = $_GET['unapprove'];

        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $unapprove";
        $unapp_com_query = mysqli_query($connection , $query);
        header("location: comments.php");
        if(!$unapp_com_query){ 
            die('failed succesfully'.mysqli_error($connection));
        }

        
    }
}

// function to approve comments
function approve(){ 
    global $connection;
    if(isset($_GET['approve'])){ 
        
        $approve = $_GET['approve'];

        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve";
        $unapp_com_query = mysqli_query($connection , $query);
        header("location: comments.php");
        if(!$unapp_com_query){ 
            die('failed succesfully'.mysqli_error($connection));
        }

        
    }
}




// function to display all users
function displayUsers(){ 

    global $connection;

    $query = "SELECT * FROM users";
    $users_query = mysqli_query($connection , $query);

    if(!$users_query){ 
        die('error fetching users'.mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($users_query)){
        $user_id = $row['user_id']; 
        $user_username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        $user_date = $row['user_date'];
        // $user_date = $_POST['users_date'];
        ?>
         <tr>
                                <td><?php echo  $user_id ?></td>
                                <td><?php echo  $user_username  ?></td>
                                <td><?php echo  $user_firstname  ?></td>
                                <td><?php echo  $user_lastname  ?></td>
                                <td><?php echo  $user_email ?></td>
                                <td><?php echo  $user_image ?></td>
                                <td><?php echo  $user_role ?></td>
                                <td> <a href="users.php?admin=<?php echo $user_id ?> ">user is an admin</a></td>
                                <td> <a href="users.php?subscriber=<?php echo $user_id ?> ">user is a subscriber</a></td>
                                <td> <a href="users.php?source=edit_users&edit_id= <?php echo $user_id ?> ">edit</a></td>
                                <td> <a onclick="prompt('are you sure you want to delete)" href="users.php?delete=<?php echo $user_id ?> ">Delete</a></td>
                                <td><?php echo  $user_date ?></td>
                            </tr>    
  <?php  }






}

// function to delete Users

function deleteUsers(){ 
    global $connection;

    if(isset($_GET['delete'])){ 
        
        $delete_users = $_GET['delete'];

        $query = "DELETE FROM users WHERE user_id = $delete_users";
        $del_users_query = mysqli_query($connection , $query);

        header("location: users.php");

        if(!$del_users_query){ 
            die('failed succesfully'.mysqli_error($connection));
        }

        
    }
}



// function to change users to admin
function admin(){ 
    global $connection;
    if(isset($_GET['admin'])){ 
        
        $admin = $_GET['admin'];

        $query = "UPDATE users SET user_role = 'admin' WHERE user_id =  $admin";
        $admin_user_query = mysqli_query($connection , $query);
        header("location: users.php");
        if(!$admin_user_query){ 
            die('failed succesfully'.mysqli_error($connection));
        }

        
    }
}

// function to change users to subscriber
function subscriber(){ 
    global $connection;
    if(isset($_GET['subscriber'])){ 
        
        $subscriber = $_GET['subscriber'];

        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id =  $subscriber";
        $subscriber_user_query = mysqli_query($connection , $query);

        header("location: users.php");
        if(!$subscriber_user_query){ 
            die('failed succesfully'.mysqli_error($connection));
        }

        
    }
}


function checkQuery($query){ 
    global $connection;
    if(!$query){ 
        die('operation failed'.mysqli_error($connection));
    }

}

// new registration system functions

// checking what user role is in admin user section
function isAdmin($username){ 
    global $connection;

    $sql = "SELECT user_role FROM users WHERE username = '$username'";
    $query = mysqli_query($connection,$sql);
    checkQuery($query);

    $row = mysqli_fetch_array($query);
    if($row['user_role'] === 'admin'){ 
        return true;

    }else{
        return false;
    }

}


// checking if username already exists in database
function usernameExists($username){ 
    global $connection;

    $sql = "SELECT username FROM users WHERE username = '$username'";
    $query = mysqli_query($connection , $sql);
    $count = mysqli_num_rows($query);

    if($count > 0){   
        return true;
    }else{ 
       
        return false;
    }

}


// checking if email already exists in database
function emailExists($email){ 
    global $connection;

    $sql = "SELECT username FROM users WHERE user_email = '$email'";
    $query = mysqli_query($connection , $sql);
    $count = mysqli_num_rows($query);

    if($count > 0){   
        return true;
    }else{ 
       
        return false;
    }

}


// funcction to redirect users to a specific page
function redirect($location){ 
return header('location:'.$location);
}

// function to register user
function registerUser($username , $email ,$password){ 
global $connection;


$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
$email = mysqli_real_escape_string($connection, $email);



$password = password_hash($password  , PASSWORD_BCRYPT , array('cost' => 5 )); //new system encrypting system


    if (!empty($username) && !empty($password) && !empty($email)) {


    $query = "INSERT INTO users(username, user_password , user_email , user_role )";
    $query .= "VALUES('$username' , '$password' , '$email' , 'subscriber')";

    $register_query = mysqli_query($connection, $query);

   checkQuery($register_query);

    
    }
}

// login function
function loginUser($username, $password){
    global $connection;
 
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
  
    $query = "SELECT * FROM users WHERE username = '$username'";
  
    $login_query = mysqli_query($connection, $query);
  
    if (!$login_query) {
      die('query failed' . mysqli_error($connection));
    }
  
  
  
    while ($row = mysqli_fetch_assoc($login_query)) {
      $db_id = $row['user_id'];
      $db_username = $row['username'];
      $db_user_firstname = $row['user_firstusername'];
      $db_user_lastname = $row['user_lastname'];
      $db_user_role = $row['user_role'];
      $db_email = $row['user_email'];
      $db_password = $row['user_password'];
    }
  
  
  
  
    if (password_verify($password,  $db_password) && $username === $db_username ) {
      $_SESSION['user_id'] = $db_id;
      $_SESSION['username'] = $db_username;
      $_SESSION['user_firstname'] = $db_user_firstname;
      $_SESSION['user_lastname'] = $db_user_lastname;
      $_SESSION['user_role'] = $db_user_role;
      $_SESSION['user_email'] = $db_email;
      $_SESSION['user_password'] = $db_password;
  
      redirect('/cms/admin');
    } else {
      header('/cms');
      
    }
}
?>