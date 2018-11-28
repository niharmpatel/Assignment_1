<?php
try{
// start session
session_start();
session_destroy();
// end session
header('location:login.php');
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
?>