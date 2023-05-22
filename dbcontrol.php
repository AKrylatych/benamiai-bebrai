<?php
include "dbcreds.php";
class dbcontrol
{
    protected $conn;
    //    TODO: Remove noinspection for production
    /** @noinspection PhpUndefinedVariableInspection
     */
    public function __construct()
    {
        $this->conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";

    }

//    public function getValuebyID($ID, $column, $tablename) {
//        $query = "SELECT $column FROM $tablename WHERE ID = $ID";
//        return $this->conn->query($query);
//    }
//    public function findValueinColumn($searchstring, $column, $tablename) {
//        $query = "SELECT $column FROM $tablename WHERE $column LIKE '%$searchstring'";
//        return $this->conn->query($query);
//    }

    public function insertUser($name, $hashedpasswd) {
        echo "<br>inserting user<br>";

        $query = "INSERT INTO vartotojai (Vardas, Slaptazodis) VALUES (?, ?)";
//        $query = "INSERT INTO vartotojai (Vardas, Slaptazodis) VALUES ('$name', '$hashedpasswd')";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $name, $hashedpasswd);
        echo "stmt query: ", $stmt;
        echo "Query: $stmt<br>";
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " , $query , "<br>" , $stmt->error;
        }
        echo "inserted?";
    }

}