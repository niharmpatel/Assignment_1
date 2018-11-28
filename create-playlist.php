<?php
try{
// adding header
require ('header.php');
//user authentification
require ('auth.php');
// adding variable to store vale from database
$name=$_POST['name'];
$artist=$_POST['artist'];
$album=$_POST['album'];
$songType= $_POST['songType'];
$songId=$_POST['songId'];
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
    if (isset($_FILES['logo'])) {
        $logoFile = $_FILES['logo'];
        if ($logoFile['size'] > 0) {
            // generate unique file name
            $logo = session_id() . "-" . $logoFile['name'];
            // check file type
            $fileType = null;
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $fileType = finfo_file($finfo, $logoFile['tmp_name']);
            // allow only jpeg & png
            if (($fileType != "image/jpeg") && ($fileType != "image/png")) {
                echo 'Please upload a valid JPG or PNG logo<br />';
                $ok = false;
            }
            else {
                // save the file
                move_uploaded_file($logoFile['tmp_name'], "img/{$logo}");
            }
        }
    }

// only save if no errors found
if ($ok) {
    //connect to the database
     require ('db.php');

      //add  query in database to insert and update data
    if(!empty($songId)){
        //$sql = "INSERT INTO song (name,logo,artist,album,songType) VALUES(:name,:logo,:artist,:album,:songType)";
        $sql = "UPDATE song SET name=:name,logo=:logo,artist=:artist,album=:album,songType=:songType WHERE songId=:songId";
    }
    else {
        //$sql = "UPDATE song SET name=:name,logo=:logo,artist=:artist,album=:album,songType=:songType WHERE songId=:songId";
        $sql = "INSERT INTO song (name,logo,artist,album,songType) VALUES(:name,:logo,:artist,:album,:songType)";

    }

    $cmd=$db->prepare($sql);
    // Setting parameter for each variable
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 30);
    $cmd->bindParam(':artist', $artist, PDO::PARAM_STR, 40);
    $cmd->bindParam(':album', $album, PDO::PARAM_STR, 30);
    $cmd->bindParam(':songType', $songType, PDO::PARAM_STR, 50);
    $cmd->bindParam(':logo',$logo,PDO::PARAM_STR,100);
    if(!empty($songId)){
        $cmd->bindParam(':songId',$songId,PDO::PARAM_INT);
    }
// execute
    $cmd->execute();
    // disconnect to database
    $db = null;
    //print the data for verification
    echo "Song added to playlist";
    // redirects to playlist page
    header('location:playlist.php');

}
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
?>
</body>
</html>