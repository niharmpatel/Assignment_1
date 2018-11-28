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
        <ul class="nav navbar-nav">
            <li><a href="playlist.php">Playlist</a> </li>
            <li><a href="songs.php">Adding songs</a> </li>
        </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php
            session_start();
            if (empty($_SESSION['userId'])){
                echo '<li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>';
            }
            else{
                echo '<li><a href="#"'. $_SESSION['username'] .'</a></li>
                <li> <a href="logout.php">Logout</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>