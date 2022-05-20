<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>comment_id</td>
                                <td>author</td>
                                <td>email</td>
                                <td>content</td>
                                <td>In Response To</td>
                                <td>status</td>
                                <td>date</td>
                                <td>Approve</td>
                                <td>UnApprove</td>
                                <td>Delete</td>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                             
                             $query = "SELECT * FROM comments";
                             $comment_query = mysqli_query($connection , $query);
                             if(!$comment_query){ 
                                die('query failed'.mysqli_error($connection));
                             }

                             while($row = mysqli_fetch_assoc($comment_query)){ 
                                 
                                $com_id = $row['comment_id'];
                                $com_post_id = $row['comment_post_id'];
                                $com_author = $row['comment_author'];
                                $com_email = $row['comment_email'];
                                $com_content = $row['comment_content'];
                                $comment_status = $row['comment_status'];
                                $comment_date = $row['comment_date'];
                                
                                ?>
                                <tr>
                                <td><?php echo $com_id  ?></td>
                                <td><?php echo $com_post_id ?></td>
                                <td><?php echo $com_author ?></td>
                                <td><?php echo $com_email?></td>                          
                                <td><?php echo $com_content?></td>
                                <td><?php  

                                 $query = "SELECT * FROM posts WHERE post_id = '$com_post_id '";
                                 $response_query = mysqli_query($connection , $query);

                                 while($row = mysqli_fetch_assoc($response_query)){ 
                                 $post_id = $row['post_id'];
                                 echo  $post_title = $row['post_title'];

                                        }
                                
                                
                                
                                
                                
                                ?>
                                </td>
                                <td><?php echo $comment_status ?></td>
                                <td><?php echo $comment_date?></td>
                                <td><a href="comments.php?approve=<?php echo $com_id ?>">Approve</a></td>
                                <td><a href="comments.php?unapprove=<?php echo $com_id ?>">unApprove</a></td>
                                <td><a href="comments.php?trash=<?php echo $com_id ?>">trash</a></td>
                                
  

                            </tr>
                           <?php  } ?>
                            
                        </tbody>
                    </table>
                    <?php deleteComments(); ?>
                    <?php unApprove(); ?>
                    <?php approve(); ?>
                    
                    