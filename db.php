<?php
try{
// connecting with database
$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200396470' ,'gc200396470','gU7vAlAkOm');
//$db = new PDO ('mysql:host=localhost; dbname=songTable', 'root', '1234');
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
?>
