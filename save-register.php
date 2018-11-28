<?php
try{
// adding header
$title= "Saving Registration";
require ('header.php');
//declaring variable and get users input
$username=$_POST['username'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
// validate each field of input
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
// if all thing match then move further
if($ok) {
    // hashed the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    //connect to database
    require('db.php');
    //add  query in database to insert data to database
    $sql = "INSERT INTO users (username,password) VALUES(:username,:password)";
    $cmd = $db->prepare($sql);
    // Setting parameter for each variable
    $cmd->bindParam('username', $username, PDO::PARAM_STR, 50);
    $cmd->bindParam('password', $hashedPassword, PDO::PARAM_STR, 255);
    //execute
    $cmd->execute();
    //disconnect database
    $db = null;
    // redirects to login page
    header('location:login.php');
}
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
?>
</body>
</html>