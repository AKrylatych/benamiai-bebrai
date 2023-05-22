<?php
include "hashcontrol.php";
include "dbcontrol.php";
class usercontrol {
    public function addUser($name, $insecure_passwd, $email)  {
        $hashctl = new hashcontrol();
        $dbctl = new dbcontrol();
        if ($this->findUserbyName($name) != null) {
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
    protected function checkuser($name, $insecure_password) {

    }

    protected function findUserbyName($name) {
        return $this->findValueinColumn($name, "Vardas", "vartotojai2");
    }

    protected function getUserPasswordbyID($UID) {
        $this->getValuebyID($UID, "Slaptazodis", "vartotojai2");
    }
}
