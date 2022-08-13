

   <?php

    include '../includes/db.php';

    $json = file_get_contents('php://input' , true);
    $data = json_decode($json);
    var_dump($data);
    exit;
    foreach ($data as $key =>  $value) {
        echo $value[0];
    }
  

    // $post_id = $_POST['id'];
    // $post_category_id = $_POST['category_id'];
    // $post_title = $_POST['title'];
    // $post_author = $_POST['author'];
    // $post_image = $_FILES['image']['name'];
    // $post_image_tmp_name = $_FILES['image']['tmp_name'];
    // $post_content = $_POST['content'];
    // $post_tags = $_POST['tags'];
    // $post_status = $_POST['status'];

    // move_uploaded_file($post_image_tmp_name, "../images/$post_image");

    // $query = "INSERT INTO posts( post_category_id , post_title , post_author , post_image , post_content , post_tags ,  post_status)";
    // $query .= "VALUES( '$post_category_id ', '$post_title' ,  '$post_author' , '$post_image' , '$post_content' , '$post_tags' ,'$post_status')";
    // $add_post_query = mysqli_query($connection, $query);

    // if (!$add_post_query) {
    //     echo json_encode('failed to perform operation');
    // } else {
    //     $query = "SELECT * FROM posts WHERE post_id = $post_id  ";
    //     $post_query = mysqli_query($connection, $query);

    //     if (!$post_query) {
    //         echo json_encode('failed to perform operation');
    //     } else {
    //         header("Content-Type:application/json");
    //         $image_path = " http://localhost/cms/images/";

    //         while ($row = mysqli_fetch_assoc($post_query)) {
    //             $response['id'] = $row['post_id'];
    //             $response['category_id'] = $post_category_id;
    //             $response['title'] =  $post_title;
    //             $response['author'] =  $post_author;
    //             $response['image'] = $image_path . $post_image;
    //             $response['content'] = $post_content;
    //             $response['tags'] = $post_tags;
    //             $response['status']  = $post_status;

    //             echo json_encode($response);
    //         }
    //     }
    // }

    // ?>