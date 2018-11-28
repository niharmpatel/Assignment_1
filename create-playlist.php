<?php
require ('header.php');
require ('auth.php');
// adding variable to store vale from user
$name=$_POST['name'];
$artist=$_POST['artist'];
$album=$_POST['album'];
$songType= $_POST['songType'];
$songid=$_POST['sondid'];
$logo=null;
// validate each field of input
$ok = true;
if (empty($name)) {
    echo "Name is Required.<br/>";
    $ok = false;
}
if (empty($artist)) {
    echo "Artist name is Required.<br/>";
    $ok = false;
}
if (empty($album)) {
    echo "Album name is Required.<br/>";
    $ok = false;
}
if (empty($songType)) {
    echo "Song type is Required.<br/>";
    $ok = false;
}
if(isset($_FILES['logo'])){
    $logoFile=$_FILES['logo'];
    if($logoFile['size']>0){
        $logo=session_id() ."-" .$logoFile['name'];

        $fileType =null;
        $finfo= $finfo_open(FILEINFO_MIME_TYPE);
        $fileType=$finfo_file($finfo,$logoFile['tmp_name']);

        if(($fileType !="image/jpeg") &&($fileType != "image/png")){
            echo 'Please upload JPG or PNG file<br />';
            $ok=false;
        }
        else{
            move_uploaded_file($logoFile['tmp_name'],"img/{$logo}");
        }
    }
}
// only save if no errors found
if ($ok) {
    //connect to the database
     require ('db.php');
     // add  query in database
    if(empty($songid)){
        $sql = "INSERT INTO song (name,artist,album,songType,logo) VALUES(:name,:artist,:album,:songType,:logo)";
    }
    else {
        $sql = " UPDATE song SET name=:name,artist=:artist,album=:album, songType=:songType, logo=:logo WHERE songid=:songid";
    }
    $cmd = $db->prepare($sql);
    // Setting parameter for each variable
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 30);
    $cmd->bindParam(':artist', $artist, PDO::PARAM_STR, 40);
    $cmd->bindParam(':album', $album, PDO::PARAM_STR, 30);
    $cmd->bindParam(':songType', $songType, PDO::PARAM_STR, 50);
    $cmd->bindParam(':logo',$logo,PDO::PARAM_STR,100);
    if(!empty($songid)){
        $cmd->bindParam(':songid',$songid,PDO::PARAM_INT);
    }
// execute
    $cmd->execute();
    // disconnect to database
    $db = null;
    //print the data for verification
    echo "Song added to playlist";
    header('location:playlist.php');
}
?>
</body>
</html>