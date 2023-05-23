<?php /** @noinspection SqlResolve */

/** @noinspection SqlNoDataSourceInspection */

class dbcontrol
{
    protected string $servername;
    protected string $username;
    protected string $password;
    protected string $database;

    private mysqli $conn;
    public string $usertable = "vartotojai2";

    public function __construct() {   // Gaunami aplinkos kintamieji is konteinerio
        $this->servername = getenv('Server');
        $this->username = getenv('Username');
        $this->password = getenv('Password');
        $this->database = getenv('Database');

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) { // Bandoma jungtis prie DB
            header("Location: /pages/connection_err.html");
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getValuebyID($ID, $column, $tablename):mysqli_result {
        $query = "SELECT $column FROM $tablename WHERE VartotojoID = $ID";
        return $this->conn->query($query);
    }
    public function getRowbyID($ID):mysqli_result {
        $query = "SELECT * FROM $this->usertable WHERE VartotojoID = $ID";
        return $this->conn->query($query);
    }
    public function findValueinColumn($searchstring, $column, $tablename):mysqli_result {
        $query = "SELECT $column FROM $tablename WHERE $column LIKE '%$searchstring'";
        return $this->conn->query($query);
    }
    public function findPasswordbyName($name):mysqli_result {
        $query = "SELECT Slaptazodis FROM $this->usertable WHERE Vardas LIKE '%$name'";
        return $this->conn->query($query);
    }
    public function findTypebyName($name):mysqli_result {
        $query = "SELECT Tipas FROM $this->usertable WHERE Vardas LIKE '%$name'";
        return $this->conn->query($query);
    }
    public function selectUserTable():mysqli_result {
        $query = "SELECT * FROM $this->usertable";
        return $this->conn->query($query);
    }

    public function insertNormalUser($name, $hashedpasswd, $email):void {
        $query = "INSERT INTO $this->usertable (Vardas, Slaptazodis, Elpastas) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            echo "Klaida ruošiant užklausą: " . $this->conn->error;
            return;
        }
        $stmt->bind_param("sss", $name, $hashedpasswd, $email);
        if ($stmt->execute()) {
            echo "Vartotojas sukurtas sekmingai!";
        } else {
            echo "Error: " , $query , "<br>" , $stmt->error;
        }
    }

    public function updateUserRow($UID, $type, $name, $email):bool {
        $query = "UPDATE $this->usertable SET Tipas = '$type', Vardas = '$name', Elpastas = '$email' WHERE VartotojoID = $UID";
        return $this->conn->query($query);
    }

}