<?php
$title="Save-file";

require('header.php');
$file=$_FILES['testFile'];
echo "Name: {$file['name']}<br/>";
echo "Size: {$file['size']}<br/>";
echo"Temp Location:{$file['tmp_name']}<br/>";
$finfo=finfo_open(FILEINFO_MIME_TYPE);
echo "Type:" . finfo_file($finfo,$file['tmp_name']) . "<br/>";
move_uploaded_file($file['tmp_name'], "uploads/{$file('name')}")
?>
<link rel="stylesheet" >
</body>
</html>