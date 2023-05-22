<?php
class dbcontrol
{
    protected $servername;
    protected $username;
    protected $password;
    protected $database;


//    const ANIMALTABLE=;
    protected $conn;

    public function __construct()
    {
        $this->servername = getenv('Server');
        $this->username = getenv('Username');
        $this->password = getenv('Password');
        $this->database = getenv('Database');

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            header("Location: /pages/connection_err.html");
            die("Connection failed: " . $this->conn->connect_error);

        }
        echo "Connected successfully";

    }

    public function getValuebyID($ID, $column, $tablename) {
        $query = "SELECT $column FROM $tablename WHERE ID = $ID";
        $result = $this->conn->query($query);
        return $result;
    }
    public function findValueinColumn($searchstring, $column, $tablename) {
        $query = "SELECT $column FROM $tablename WHERE $column LIKE '%$searchstring'";
        $query_result = $this->conn->query($query);
        echo "<br>findvaluequery<br>";
        print_r($query_result);
        return $query_result;
    }

    public function insertNormalUser($name, $hashedpasswd, $email) {
        // TODO: Make a proper variable for the user table
        $query = "INSERT INTO vartotojai2  (Vardas, Slaptazodis, Elpastas) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            echo "Error preparing statement: " . $this->conn->error;
            return;
        }
        $stmt->bind_param("sss", $name, $hashedpasswd, $email);
        if ($stmt->execute()) {
            echo "Vartotojas sukurtas sekmingai!";
        } else {
            echo "Error: " , $query , "<br>" , $stmt->error;
        }
    }

}