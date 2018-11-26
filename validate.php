<?php
$username = $_POST['username'];
$password = $_POST['password'];
require('db.php');
$sql = "SELECT userId,password FROM users WHERE username=:username";
$cmd = $db->prepare($sql);
$cmd->bindParam(':username',$username,PDO::PARAM_STR, 50 );
$cmd->execute();
$user=$cmd->fetch();
if (!password_verify($password, $user['password'])){
    header('location:login.php?invalid=true');
    exit();
}
else{
    session_start();
    $_SESSION['userId']=$user['userId'];
    $_SESSION['username']=$username;
    header('location:songs.php');
}
$db= null;
?>