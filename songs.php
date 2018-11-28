<?php
try{
$title = "Song Playlist Form";
// adding header
require ('header.php');
//user authentification
require ('auth.php');
//declaring variable
$name=null;
$artist=null;
$album=null;
$songType=null;
$songId=null;
$logo =null;
//condition for edit or update
if (!empty($_GET['songId'])){
    $songId=$_GET['songId'];
//connect to data base
    require ('db.php');
    // query for selecting table
    $sql= "SELECT * FROM song WHERE songId=:songId";
    $cmd=$db->prepare($sql);
    // binding parameter
    $cmd->bindParam('songId',$songId,PDO::PARAM_INT);
    //execute the query
    $cmd->execute();
    // fetch the data
    $s=$cmd->fetch();
    $name=$s['name'];
    $artist=$s['artist'];
    $album=$s['album'];
    $songType=$s['songType'];
    $logo =$s['logo'];
    // disconnect database
    $db= null;
}
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
// HTML form
?>
<form class="form-text" method="post" action="create-playlist.php" enctype="multipart/form-data">
    <!taking inputs from user>
<fieldset class="form-control-plaintext">
    <label for="name">Name:</label>
    <input name="name" id="name" value="<?php echo $name;?>">
</fieldset>
<fieldset class="form-control-plaintext">
    <label For="artist"> Artist:</label>
    <input name="artist" id="artist" value="<?php echo $artist;?>">
</fieldset>
<fieldset class="form-control-plaintext">
    <label for="album">Album:</label>
    <input name="album" id="album" value="<?php echo $album;?>">
</fieldset>
    <fieldset class="form-control-plaintext">
        <label for="songType">Type:</label>
        <select name="songType" id="songType" value="<?php echo $songType;?>">
            <?php
            try {
                //connect to database
                require('db.php');
                //adding  query to the database
                $sql = "SELECT * FROM so ORDER BY songType";
                //$sql = "SELECT * FROM songTypes ORDER BY songType";
                $cmd = $db->prepare($sql);
                //execute the data
                $cmd->execute();
                //fetch the data
                $types = $cmd->fetchAll();
                //loop the data
                foreach ($types as $t) {
                    if ($t['songType'] == $songType) {
                        echo "<option selected>{$t['songType']}</option>";
                    } else {
                        echo "<option>{$t['songType']}</option>";
                    }
                }
                //disconnect with database
                $db = null;
            }
            catch (Exception $e){
                mail('niharmpatel@gmail.com','Assignment error', $e);
                header('location:error.php');
            }
            ?>
        </select>
    </fieldset>
    <fieldset class="form-control-plaintext">
        <label for="logo" class="form-group">Logo:</label>
        <input type="file" name="logo" id="logo" />
    </fieldset>
    <div class="btn-primary">
    <?php
    try{
//condition to check logo is there or not
        if(isset($logo)) {
            //print image
            echo "<img src=\"img/$logo\" alt=\"Logo\"/>";
        }
    }
    catch (Exception $e){
        mail('niharmpatel@gmail.com','Assignment error', $e);
        header('location:error.php');
    }
        ?>
    </div>
<button class="badge-success"> Save </button>
   <input  type="hidden" name="songId" id="songId" value"<?php echo $songId; ?>"  />
</form>
</body>
</html>