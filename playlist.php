<?php
try{
$title = "Playlist";
// adding header
require ('header.php');
// authenticate user and adding link of web-page to save song in a playlist
if (isset($_SESSION['userId'])) {
    echo '<a href="songs.php">Add a new Song</a>';
}
 ?>
<h1> Playlist </h1>
<?php
// connect to the database
require('db.php');
//adding query to the database
$sql = "SELECT * FROM song";
$cmd = $db->prepare($sql);
$cmd->execute();
//fetch the data
$song = $cmd ->fetchAll();
//creating table to store value of database's table
echo '<table class="table-bordered table-responsive table-hover" ><thead> <th>Name</th><th>Logo</th> <th> Artist</th> <th>Album</th> <th>Type</th>';
// authenticate user and then display action column
if(isset($_SESSION['userId'])) {
    echo '<th>Actions</th>';
}
echo'</thead>';
//loop the data
foreach ($song as $s){
    echo "<tr>
          <td>{$s['name']}</td>
          <td>";
    if(isset($s['logo'])){
        //displaying image
        echo "<img src=\"img/{$s['logo']}\" alt=\"Logo\" height=\"50px\">";
    }

    echo"</td>  
          <td> {$s['artist']}</td>
          <td> {$s['album']}</td>
          <td> {$s['songType']}</td>
          <td>";
        if(isset($_SESSION['userId'])){
            //authenticate user and then allow to perform action
          echo "<a href=\"songs.php?songId={$s['songId']}\">Edit</a>|
          <a href=\"delete.php?songId={$s['songId']}\">Delete</a>";
        }
echo "</td></tr>";
}
echo '</table>';
// disconnect to database
$db =  null;
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
?>
</body>
</html>