<?php
$title = "Songs Playlist";
require ('header.php');
require ('auth.php');
$name=null;
$artist=null;
$album=null;
$songType=null;
$songid=null;
$logo =null;
if (!empty($_GET['songid'])){
    $songid=$_GET['songid'];

    require ('db.php');
    $sql= "SELECT * FROM song WHERE songid=:songid";
    $cmd=$db->prepare($sql);
    $cmd->bindParam('songid',$songid,PDO::PARAM_INT);
    $cmd->execute();
    $s=$cmd->fetch();
    $name=$s['name'];
    $artist=$s['artist'];
    $album=$s['album'];
    $songType=$s['songType'];
    $logo =$s['logo'];
    $db= null;
}
?>
<form class="form-control-plaintext" method="post" action="create-playlist.php" enctype="multipart/form-data">
    <!taking inputs from user>
<fieldset>
    <label for="name">Name:</label>
    <input name="name" id="name" value="<?php echo $name;?>">
</fieldset>
<fieldset>
    <label For="artist"> Artist:</label>
    <input name="artist" id="artist" value="<?php echo $artist;?>">
</fieldset>
<fieldset>
    <label for="album">Album:</label>
    <input name="album" id="album" value="<?php echo $album;?>">
</fieldset>
    <fieldset>
        <label for="songType">Type:</label>
        <select name="songType" id="songType" value="<?php echo $songType;?>">
            <?php
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
                }
                else {
                    echo "<option>{$t['songType']}</option>";
                }
            }
            //disconnect with database
            $db= null;
            ?>
        </select>
    </fieldset>
    <fieldset>
        <label for="logo" class="col">Logo:</label>
        <input type="file" name="logo" id="logo"/>
    </fieldset>
    <div >
        <?php
        if(isset($logo)){
            echo "<img src=\"img/$logo\" alt=\"Logo\"/>" ;
        }
        ?>
    </div>
<button class="btn-toolbar"> Save </button>
   <input  type="hidden" name="songid" id="songid" value"<?php echo $songid; ?>"  />
</form>
</body>
</html>