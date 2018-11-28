<?php
try{
// adding header
$title="Save-file";
require("header.php");
//printing image file information
$file=$_FILES['testFile'];
echo "Name: {$file['name']}<br/>";
echo "Size: {$file['size']}<br/>";
echo"Temp Location:{$file['tmp_name']}<br/>";
$finfo=finfo_open(FILEINFO_MIME_TYPE);
echo "Type:" . finfo_file($finfo,$file['tmp_name']) . "<br/>";
//move file from temporary location to permanent location
move_uploaded_file($file['tmp_name'], "uploads/{$file('name')}");
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
?>
<link rel="stylesheet" >
</body>
</html>