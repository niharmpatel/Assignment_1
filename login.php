<?php
$title = "Login";
require ('header.php')
?>
<main class="container">
    <?php
    if (isset($_GET['invalid'])){
        echo '<div class="alert-danger">Invalid Login</div>';
    }
    else{
        echo '<div class="alert-danger">Please enter your credentials</div>';
    }
    ?>
    <form method="post" action="validate.php">
        <fieldset class="from-group">
            <label for="username" class="col-1">Username:</label>
            <input name="username" id="username" required type="email" placeholder="email@email.com"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="password" class="col-1">Password:</label>
            <input name="password" type="password" required />
        </fieldset>
            <fieldset class="col">
                <input type="submit" value="login" class="btn" />
            </fieldset>
    </form>
</main>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>