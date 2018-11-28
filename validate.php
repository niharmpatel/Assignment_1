<?php
try{
//declaring variable
$username = $_POST['username'];
$password = $_POST['password'];
// connect to database
require('db.php');
// query to select data from database
$sql = "SELECT userId,password FROM users WHERE username=:username";
$cmd = $db->prepare($sql);
// bind parameter
$cmd->bindParam(':username',$username,PDO::PARAM_STR, 50 );
//execute
$cmd->execute();
//fetch
$user=$cmd->fetch();
// check that values are correct
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
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
?>