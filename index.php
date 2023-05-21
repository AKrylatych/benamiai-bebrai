<?php
include('dbcreds.php');
echo "Testing environment variables.<br>";
echo "Servername: $servername<br>";
echo "DBName: $dbname<br>";
echo "Username: $username<br>";
echo "Password: $password<br>";

try {
    $conn = new PDO("mysql:host=$servername:3306;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully. \n Hooray!";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
