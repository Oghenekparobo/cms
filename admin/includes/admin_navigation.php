<?php function users_online()
{

    if (isset($_GET['onlineusers'])) {
        global $connection;

        if (!$connection) {
            session_start();
            include("../includes/db.php");
            // getting the number of users online
            $session = session_id(); //gets the id of the current session  -->
            $time = time();
            $time_out_seconds = 05;
            $time_out = $time - $time_out_seconds;


            $sql = "SELECT * FROM  users_online WHERE sessions = '$session'";
            $query = mysqli_query($connection, $sql);
            $sessions = mysqli_num_rows($query);

            if ($sessions == NULL) {
                $valid_sql = "INSERT INTO users_online(sessions, time) VALUES('$session', '$time')";
                $valid_query = mysqli_query($connection, $valid_sql);
            } else {
                $v_sql = "UPDATE  users_online SET time= '$time' WHERE sessions = '$session'";
                $v_query = mysqli_query($connection, $v_sql);
            }

            $s_sql = "SELECT * FROM users_online WHERE time > '$time_out'";
            $s_query = mysqli_query($connection, $s_sql);
            echo $count_users = mysqli_num_rows($s_query);
        }
    }
}



?>
<?php users_online() ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">CMS Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <!-- <li><a href="../index.php">users online:<?php echo users_online() ?></a></li>comment -->
        <li><a href="../index.php">users online: <span class="users-online"></span></a></li>
        <li><a href="../index.php">Home</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle bg-danger text-white" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['username'] ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>


                <li class="divider"></li>
                <li>
                    <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v">

                    </i> posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts_dropdown" class="collapse">
                    <li>
                        <a href="posts.php">view all posts</a>
                    </li>
                    <li>
                        <a href="posts.php?source=add_posts">Add post</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> categories</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo">
                    <i class="fa fa-fw fa-arrows-v"></i> users<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="users.php">View all Users</a>
                    </li>
                    <li>
                        <a href="users.php?source=add_users">Add users</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="comments.php"><i class="fa fa-fw fa-file"></i> comments</a>
            </li>
            <li>
                <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> profile</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>