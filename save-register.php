<?php
$title= "Saving Registration";
require ('header.php');
$username=$_POST['username'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
$ok=true;
if(empty($username)){
    echo 'Username is required';
    $ok=false;
}
if(strlen($password)<8){
    echo 'Password is invalid';
    $ok=false;
}
if($password != $confirm){
    echo 'Password do not match';
    $ok=false;
}
if($ok) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    require('db.php');
    $sql = "INSERT INTO users (username,password) VALUES(:username,:password)";
    $cmd = $db->prepare($sql);
    $cmd->bindParam('username', $username, PDO::PARAM_STR, 50);
    $cmd->bindParam('password', $hashedPassword, PDO::PARAM_STR, 255);
    $cmd->execute();
    $db = null;
    header('location:login.php');
}
?>
</body>
</html>