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
        $this->back_to_login();
    }
    public function loginUser($name, $insecure_passwd):void {
        $hashctl = new hashcontrol();
        if ($this->findUserbyName($name)->num_rows == 0) { // Tikrinama ar yra tokiu vartotoju
            echo "<br><br>Tokio vartotojo nėra arba duomenys neteisingi.<br><br>";
        } else {
            $database_password = $this->getUserPasswordbyName($name);
            echo "Tikrinami duomenys...<br>";
            if ($hashctl->check_hashed_password($insecure_passwd, $database_password)) {
                echo "Viskas gerai, tinka.";
            } else {
                echo "<br><br>Tokio vartotojo nėra arba duomenys neteisingi.<br><br>";
            }
        }
        $this->back_to_login();
    }
    protected function findUserbyName($name):mysqli_result { // Ieskomas vartotojas pagal varda
        $dbctl = new dbcontrol();
        return $dbctl->findValueinColumn($name, "Vardas", $dbctl->usertable);
    }

    protected function getUserPasswordbyID($UID):mysqli_result { // Gaunamas vartotojo slaptazodis pagal varda.
        $dbctl = new dbcontrol();
        return $dbctl->getValuebyID($UID, "Slaptazodis", $dbctl->usertable);
    }
    protected function getUserPasswordbyName($name) {
        $dbctl = new dbcontrol();
        echo "Jungiamasi prie DB...<br>";
        $result = $dbctl->findValueinColumn($name, "Vardas", $dbctl->usertable);
        $encrypted_passwd = $result->fetch_column(3);
        echo "Get encrypted password<br>";
        print_r($encrypted_passwd);
        return $encrypted_passwd;
    }
    public function back_to_login():void {
        echo "<script>
            setTimeout(function() {
                window.location.href = 'index.html';
            }, 4000);
             </script>";
    }
}
