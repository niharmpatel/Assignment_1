<?php
try{
// adding header
$title= "Delete";
require('header.php');
//user authentification
require ('auth.php');
// get id form database
$songId = $_GET['songId'];
//check id is empty or not
if(empty($songId)){
    header('location:playlist.php');
}
//connect to database
require('db.php');
// query for selecting table
$sql="SELECT logo FROM song WHERE songId=:songId";
$cmd=$db->prepare($sql);
// binding parameter
$cmd->bindParam('songId',$songId,PDO::PARAM_INT);
//execute the query
$cmd->execute();
// fetch the data
$logo=$cmd->fetchColumn();
// delete data from database
$sql="DELETE FROM song WHERE songId=:songId";
$cmd=$db->prepare($sql);
$cmd->bindParam('songId',$songId,PDO::PARAM_INT);
$cmd->execute();
// disconnect database
$db=null;
// unlink image
if(isset($logo)){
    unlink("img/$logo");
}
header('location:playlist.php');
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
?>
</body>
</html>