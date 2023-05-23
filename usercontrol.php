<?php
include "hashcontrol.php";
include "dbcontrol.php";
class usercontrol {
    public function addUser($name, $insecure_passwd, $email):void  { // Naujas vartotojas
        $hashctl = new hashcontrol();
        $dbctl = new dbcontrol();
        if ($this->findUserbyName($name)->num_rows == 0) { // Tikrinama ar yra tokiu vartotoju
            $hashed_passwd = $hashctl->get_hashed_password($insecure_passwd);  // Slaptazodzio hashavimas
            echo "Atnaujinama duomenų bazė...<br>";
            $dbctl->insertNormalUser($name, $hashed_passwd, $email); //
        } else {
            echo "<br><br>Toks vartotojas jau yra, prašome naudoti kitą vardą.<br><br>";
        }
    }
    public function loginUser($name, $insecure_passwd):void {
        $hashctl = new hashcontrol();
        if ($this->findUserbyName($name)->num_rows == 0) { // Tikrinama ar yra tokiu vartotoju
            echo "<br><br>Tokio vartotojo nėra arba duomenys neteisingi.<br><br>";
        } else {
            $database_password= $this->getUserPasswordbyName($name);
            if ($database_password == 0) {
                echo "<br><br>Tokio vartotojo nėra arba duomenys neteisingi.<br><br>";
            } else {
                echo "Tikrinami duomenys...<br>";
                if ($hashctl->check_hashed_password($insecure_passwd, $database_password)) {
                    echo "Viskas gerai, tinka.";

                } else {
                    echo "<br><br>Tokio vartotojo nėra arba duomenys neteisingi.<br><br>";
                }
            }
        }
    }
    protected function findUserbyName($name):mysqli_result { // Ieskomas vartotojas pagal varda
        $dbctl = new dbcontrol();
        return $dbctl->findValueinColumn($name, "Vardas", $dbctl->usertable);
    }

    public function getUserTypebyName($name) {
        $dbctl = new dbcontrol();
        $result = $dbctl->findTypebyName($name);
        $row = $result->fetch_assoc();
        return $row['Tipas'];
    }
    protected function getUserPasswordbyName($name) {

        $dbctl = new dbcontrol();
        $result = $dbctl->findPasswordbyName($name);
        if ($result->num_rows == 0) {
            return 0;
        } else {
            $row = $result->fetch_assoc();
            return $row['Slaptazodis'];
        }
    }

    public function updateUser($UID, $userType, $userName, $userEmail):mysqli_result {
        $dbctl = new dbcontrol();
        return $dbctl->updateUserRow($UID, $userType, $userName, $userEmail);
    }
    public function back_to_login_timeout():void {
        echo "<script>
            setTimeout(function() {
                window.location.href = 'index.html';
            }, 4000);
             </script>";
    }
}
