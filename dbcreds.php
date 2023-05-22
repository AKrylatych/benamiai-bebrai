<?php
// TODO: REMOVE FOR PRODUCTION
//putenv("Server=mariadb-testing");
//putenv("Password=root");
//putenv("Username=root");
//
$servername = getenv('Server');
$username = getenv('Username');
$password = getenv('Password');
$user_database = "benamiai_bebrai";

//echo ":$servername<br>:$username<br>:$password<br>";
// TODO: Animal database
