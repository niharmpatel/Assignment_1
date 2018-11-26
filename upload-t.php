<?php
$title="Upload Test";
require ('header.php');
?>
<form method="post" action="upload-ts.php" enctype="multipart/form-data">
    <input name="testFile" id="testFile"  type="file"/>
    <button>upload</button>
</form>
</body>
</html>