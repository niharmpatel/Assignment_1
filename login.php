<?php
try{
// adding header
$title = "Login";
require ('header.php')
?>
<main class="container-fluid">
    <?php
    // check if wrong values are entered and print data accordingly
    if (isset($_GET['invalid'])){
        echo '<div class="alert-danger">Invalid Login</div>';
    }
    else{
        echo '<div class="m-auto">Please enter your credentials</div>';
    }
    }
    catch (Exception $e){
        mail('niharmpatel@gmail.com','Assignment error', $e);
        header('location:error.php');
    }
    ?>
    <form method="post" action="validate.php">
        <fieldset class="form-control-plaintext">
            <label for="username" class="col-1">Username:</label>
            <input name="username" id="username" required type="email" placeholder="email@email.com"/>
        </fieldset>
        <fieldset class="form-control-plaintext">
            <label for="password" class="col-1">Password:</label>
            <input name="password" type="password" required />
        </fieldset>
            <fieldset class="btn">
                <input type="submit" value="login" class="btn" />
            </fieldset>
    </form>
</main>
</body>
</html>