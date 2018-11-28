<?php
$title= "Delete";
require('header.php');
require ('auth.php');
$songid = $_GET['songid'];
if(empty($songid)){
    header('location:playlist.php');
}
require('db.php');
$sql="SELECT logo FROM song WHERE songid=:songid";
$cmd=$db->prepare($sql);
$cmd->bindParam('songid',$songid,PDO::PARAM_INT);
$cmd->execute();
$logo=$cmd->fetchColumn();
$sql="DELETE FROM song WHERE songid=:songid";
$cmd=$db->prepare($sql);
$cmd->bindParam('songid',$songid,PDO::PARAM_INT);
$cmd->execute();
$db=null;

if(isset($logo)){
    unlink("img/$logo");
}
header('location:playlist.php');
?>


</body>
</html>