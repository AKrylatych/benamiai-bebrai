<?php
include "hashcontrol.php";
include "dbcontrol.php";
class usercontrol {
    public function addUser($name, $insecure_passwd, $email)  { // Naujas vartotojas
        $hashctl = new hashcontrol();
        $dbctl = new dbcontrol();
        if ($this->findUserbyName($name)->num_rows == 0) { // Tikrinama ar yra tokiu vartotoju
            $hashed_passwd = $hashctl->get_hashed_password($insecure_passwd);
            $dbctl->insertNormalUser($name, $hashed_passwd, $email);
        } else {
            echo "<br><br>Toks vartotojas jau yra, prašome naudoti kitą vardą.<br><br>";
        }
        echo "<script>
            setTimeout(function() {
                window.location.href = 'index.html';
            }, 4000);
             </script>";
    }
    public function loginUser($name, $insecure_passwd) {
//        TODO: Logins
    }
    protected function findUserbyName($name) { // Ieskomas vartotojas pagal varda
        $dbctl = new dbcontrol();
        return $dbctl->findValueinColumn($name, "Vardas", "vartotojai2");
    }

    protected function getUserPasswordbyID($UID) { // Gaunamas vartotojo slaptazodis pagal varda.
        $this->getValuebyID($UID, "Slaptazodis", "vartotojai2");
    }
}
