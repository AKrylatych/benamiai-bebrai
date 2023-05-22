<?php
class dbcontrol
{
    protected $servername;
    protected $username;
    protected $password;
    protected $database;
    protected $conn;
    //    TODO: Remove noinspection for production
    /** @noinspection PhpUndefinedVariableInspection
     */
    public function __construct()
    {
        $this->servername = getenv('Server');
        $this->username = getenv('Username');
        $this->password = getenv('Password');
        $this->database = getenv('Database');

        $this->conn = new mysqli($servername, $username, $password, $database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
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
//        $localconn = $this->conn;
//        echo "<br>inserting user<br>";
        echo "querytest<br>";
//        $query = "INSERT INTO vartotojai (Vardas, Slaptazodis) VALUES (?, ?)";
//        echo "querytest2<br>";
////        $query = "INSERT INTO vartotojai (Vardas, Slaptazodis) VALUES ('$name', '$hashedpasswd')";
//        $stmt = $localconn->prepare($query);
//        if ($stmt === false) {
//            echo "Error preparing statement: " . $localconn->error;
//            return;
//        }
//        echo "querytest3<br>";
//        $stmt->bind_param("ss", $name, $hashedpasswd);
//        echo "querytest4<br>";
//        if ($stmt->execute()) {
//            echo "New record created successfully";
//        } else {
//            echo "Error: " , $query , "<br>" , $stmt->error;
//        }
        echo "querytest3<br>";
        $sql = "INSERT INTO vartotojai (Vardas, Slaptazodis) VALUES ('$name', '$hashedpasswd')";
        if ($this->conn->query($sql) === TRUE) {
            echo "New record! woohoo!";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
        echo "querytest4<br>";

    }

}