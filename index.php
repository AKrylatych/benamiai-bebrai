<?php
//include('dbcreds.php');
//$servername = "mysql:3306"; // Or the IP address of the Docker container
$servername = getenv('Server'); // Or the IP address of the Docker container
$username = getenv('Username');
$password = getenv('Password');
$database = "userdb"; // Replace with the actual database name

echo "Testing environment variables.<br>";
echo "Servername: $servername<br>";
echo "DBName: $database<br>";
echo "Username: $username<br>";
echo "Password: $password<br>";
try {
    $conn = new PDO("mysql:host=$servername:3306;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully. \n Hooray!";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
