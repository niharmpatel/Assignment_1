<?php
// check user is login or not
try{
if (empty($_SESSION['userId'])){
    header('location:login.php');
    exit();
}
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
?>