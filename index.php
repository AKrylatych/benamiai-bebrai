<?php
//include('dbcreds.php');
//$servername = "mysql:3306"; // Or the IP address of the Docker container
$servername = $_ENV['Server']; // Or the IP address of the Docker container
$username = $_ENV['Username'];
$password = $_ENV['Password'];
$database = "userdb"; // Replace with the actual database name

echo "Testing environment variables.<br>";
echo "Servername: $servername<br>";
echo "DBName: $database<br>";
echo "Username: $username<br>";
echo "Password: $password<br>";
echo "<br><br>---";
print_r($_ENV);
echo "<br><br>---";
echo "<br>Testing environment variables Again.<br>";
echo "Servername:", getenv('Server'), "<br>";
echo "DBName: $database<br>";
echo "Username:", getenv('Username'), "<br>";
echo "Password:", getenv('Password'), "<br>";
try {
    $conn = new PDO("mysql:host=$servername:3306;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully. \n Hooray!";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
