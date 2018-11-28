<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script Src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <a   class="navbar-brand" href="default.php">Song Playlist </a>
        <ul class="nav navbar-nav nav-pills navbar-dark">
            <li><a href="playlist.php">Playlist</a> </li>
            <li><a href="songs.php">Adding songs</a> </li>
        </ul>
        </div>
        <ul class="nav navbar-nav nav-justified  navbar-right">

            <?php
            try{
            // start the session
            session_start();
            // check if user is login or not and display information accordingly
            if (empty($_SESSION['userId'])){
                echo '<li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>';
            }
            else{
                echo ' <a href="logout.php">Logout</a>';
            }
            }
            catch (Exception $e){
                mail('niharmpatel@gmail.com','Assignment error', $e);
                header('location:error.php');
            }
            ?>
        </ul>
    </div>
</nav>