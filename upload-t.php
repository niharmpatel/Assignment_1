<?php
try {
// adding header
    $title = "Upload Test";
    require('header.php');
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
    // html form
?>
<form method="post" action="upload-ts.php" enctype="multipart/form-data">
    <input name="testFile" id="testFile"  type="file"/>
    <button class="btn-group-toggle">upload</button>
</form>
</body>
</html>