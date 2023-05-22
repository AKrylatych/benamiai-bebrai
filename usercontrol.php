<?php
include "hashcontrol.php";
include "dbcontrol.php";
class usercontrol {
    public function addUser($name, $insecure_passwd, $email)  { // Naujas vartotojas
        $hashctl = new hashcontrol();
        $dbctl = new dbcontrol();
        if ($this->findUserbyName($name)->num_rows == 0) {
            $hashed_passwd = $hashctl->get_hashed_password($insecure_passwd);
            $dbctl->insertNormalUser($name, $hashed_passwd, $email);
        } else {
            echo "Toks vartotojas jau egzistuoja. Prasome naudoti kita varda.";
            sleep (4);
            header("Location: index.html");
        }
    }
    public function loginUser($name, $insecure_passwd) {
//        TODO: Logins
    }
    protected function findUserbyName($name) { // Ieskomas vartotojas pagal varda
        $dbctl = new dbcontrol();
        $finduservar = $dbctl->findValueinColumn($name, "Vardas", "vartotojai2");
        echo "finduservar: ";
        echo $finduservar;
        echo "<br><br>";
        return $finduservar;
    }

    protected function getUserPasswordbyID($UID) { // Gaunamas vartotojo slaptazodis pagal varda.
        $this->getValuebyID($UID, "Slaptazodis", "vartotojai2");
    }
}
