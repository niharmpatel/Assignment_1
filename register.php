<?php
try {
// adding header
    $title = "Register";
    require('header.php');
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
?>
<main class="container-fluid">
    <div class="m-auto" id="message">Enter details to create your account</div>
    <form method="post" action="save-register.php">
        <fieldset class="form-control-plaintext">
            <label for="usename" class="col">Username: </label>
            <input name="username" id="username" required type="email" placeholder="email@email.com">
        </fieldset>
        <fieldset>
            <label for="password" class="form-control-plaintext">Password:</label>
            <input name="password" type="password" id="confirm" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
        </fieldset>
        <fieldset>
            <label for="confirm" class="form-control-plaintext">Confirm Password:</label>
            <input type="password" name="confirm" id="confirm" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
        </fieldset>
        <div class="btn">
            <input type="submit" value="Register" class="btn" />
        </div>
    </form>
</main>
</body>
</html>