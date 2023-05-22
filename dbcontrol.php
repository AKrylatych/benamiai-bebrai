<?php
include('dbcreds.php');
class dbcontrol
{
    protected $conn;
    //    TODO: Remove noinspection for production
    /** @noinspection PhpUndefinedVariableInspection
     */
    public function __construct()
    {
        $this->conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
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
        $query = "INSERT INTO vartotojai (Vardas, Slaptazodis) VALUES ($name, $hashedpasswd)";
        if ($this->conn->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
        }
    }

}