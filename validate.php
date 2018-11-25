<?php
$username = $_POST['username'];
$password = $_POST['password'];
require('db.php');

$sql = "SELECT UserId,password From users Where username=:username";
$cmd = $db->prepare($sql);
$cmd->bindParam('username',$username,'PDO::PARAM_STR', 50 );
$cmd->execute();

$cmd=$cmd->fetch();
if (!$password_verify($password,$user['password'])){
    header('location:login.php?invalid=true');
    exit();
}
else{
    session_start();
    $_SESSION['userId']=$user['userID'];
    $_SESSION['username']=$username;
    header('location:songs.php');

}
$db= null;
?>