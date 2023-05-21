<?php
//$servername = "mysql:3306"; // Or the IP address of the Docker container
$servername = $_ENV['Server']; // Or the IP address of the Docker container
$username = $_ENV['Username'];
$password = $_ENV['Password'];
$database = "userdb"; // Replace with the actual database name
?>
