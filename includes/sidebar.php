

<div class="col-md-4">


<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input type="text" name="search" class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" name="submit" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>   <!-- search-form -->
    <!-- /.input-group -->
</div>

<!-- login -->

<div class="well">
   <?php
   
   if(isset($_SESSION['user_role'])){
       ?>
       <h1>logged in as <?php echo $_SESSION['username']; ?></h1>
       <?php
    
   }
   else{ 
       ?>
    <h4>Login</h4>

    <form action="includes/login.php" method="post">
    <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="enter your username or email address">

    </div>

    <div class="input-group">
    <input type="password" name="password" class="form-control" placeholder="enter your password">
        <span class="input-group-btn">
            <input class="btn btn-danger" name="login" type="submit" value="login">
        </span>
    </div>
    </form>   <!-- search-form -->
    <!-- /.input-group -->
    <?php
   }
   ?>

</div>


<!-- Blog Categories Well -->
<div class="well">

                  <?php 
                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection , $query);     
                    ?>


    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12 text-center">
            <ul class="list-unstyled">
                <?php 
                  while($row = mysqli_fetch_assoc($select_all_categories_query)){ 
                    $cat_title =  $row['cat_title'];
                    $cat_id =  $row['cat_id'];

                    echo "<li> <a href='category.php?category= $cat_id '>{$cat_title}</a></li>";
                }
                
                ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
       
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->

<?php include 'widget.php' ?>

</div>
