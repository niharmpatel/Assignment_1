<?php
$title = "Playlist";
require ('header.php');
?>
<! adding link of web-page to save song in a playlist ->
<a href="songs.php">Add a new Song</a>
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
//creating table to store value of database's tabel
echo '<table ><thead> <th>Name</th> <th> Artist</th> <th>Album</th> <th>Type</th><th>Action</th></thead>';
//loop the data
foreach ($song as $s){

    echo "<tr><td>  {$s['name']}
          </td><td> {$s['artist']}
          </td><td> {$s['album']}
          </td><td> {$s['songType']}
          </td><td>  <a href=\"songs.php?songid={$s['songid']}\">Edit</a> |
          <a href=\"delete.php?songid={$s['songid']}\" class='alert-danger confirmation'>Delete</a>
          </td></tr>";

}
echo '</table>';
// disconnect to database
$db =  null;
?>
</body>
</html>