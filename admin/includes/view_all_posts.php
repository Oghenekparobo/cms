<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>author</td>
                                <td>title</td>
                                <td>category</td>
                                <td>status</td>
                                <td>image</td>
                                <td>tags</td>
                                <td>comments</td>
                                <td>date</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                             
                             $query = "SELECT * FROM posts";
                             $post_query = mysqli_query($connection , $query);
                             if(!$post_query){ 
                                die('query failed'.mysqli_error($connection));
                             }

                             while($row = mysqli_fetch_assoc($post_query)){ 
                                 
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
                                ?>
                                <tr>
                                <td><?php echo $post_id  ?></td>
                                <td><?php echo $post_author ?></td>
                                <td><?php echo $post_title ?></td>
                                <td><?php echo  $post_category_id ?></td>
                                <td><?php echo  $post_status ?></td>
                                <td><img width="100" src="../images/<?php echo   $post_image ?>" alt="images" c"></td>
                                <td><?php echo  $post_tags ?></td>
                                <td><?php echo  $post_comment_count?></td>
                                <td><?php echo  $post_date?></td>
                                <td><a href="posts.php?drop=<?php echo $post_id ?>">drop</a></td>
                                <td><a href="posts.php?source=edit_posts&p_id=<?php echo $post_id ?>">update</a></td>

                            </tr>
                           <?php  } ?>
                            
                        </tbody>
                    </table>
                    <?php deletePost() ?>
                    