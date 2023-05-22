<?php
class dbcontrol
{
    protected $servername;
    protected $username;
    protected $password;
    protected $database;
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
        return $this->conn->query($query);
    }
    public function findValueinColumn($searchstring, $column, $tablename) {
        $query = "SELECT $column FROM $tablename WHERE $column LIKE '%$searchstring'";
        return $this->conn->query($query);
    }

    public function insertUser($name, $hashedpasswd) {
        $query = "INSERT INTO vartotojai (Vardas, Slaptazodis) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            echo "Error preparing statement: " . $this->conn->error;
            return;
        }
        $stmt->bind_param("ss", $name, $hashedpasswd);
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " , $query , "<br>" , $stmt->error;
        }
//        $sql = "INSERT INTO vartotojai (Vardas, Slaptazodis) VALUES ('$name', '$hashedpasswd')";
//        if ($this->conn->query($sql) === TRUE) {
//            echo "New record! woohoo!";
//        } else {
//            echo "Error: " . $sql . "<br>" . $this->conn->error;
//        }
    }

}