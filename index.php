<?php
include('dbcreds.php');
echo "Testing environment variables.\n";
echo "Servername: $servername\n";
echo "DBName: $dbname\n";
echo "Username: $username\n";
echo "Password: $password\n";

try {
    $conn = new PDO("mysql:host=$servername:3306;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully. \n Hooray!";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
