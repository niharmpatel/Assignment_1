<?php
try{
// adding header
$title = "Songs Playlist";
require('header.php');
}
catch (Exception $e){
    mail('niharmpatel@gmail.com','Assignment error', $e);
    header('location:error.php');
}
?>
<main class="text-center">
    <h1 class="h1">Song Playlist</h1>
    <p class="container">
        This Website is created to fulfill all requirement of assignment 2 of PHP class and to learn many things such
        as creating a form, saving user’s input values into the database, displaying table, dropdown list, update and
        delete, user’s authentication, error handling, uploading images or icons in the database, etc.I have created
        this website by watching COMP1006 videos in youtube and using git-hub comp1006-barrie-eats file to find and
        solve error.All the css style and design is done with the help of bootstrap. References are given as follow:<br/>
         youtube= "https://www.youtube.com/results?search_query=comp1006"<br/>
         github link=" https://github.com/ifotn/comp1006-barrie-eats" <br/>
         bootstraps = "https://getbootstrap.com" <br/>
    </p>
</main>
</body>
</html>