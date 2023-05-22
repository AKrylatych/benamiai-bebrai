<?php
include "hashcontrol.php";
include "dbcontrol.php";
class usercontrol {
    public function addUser($name, $insecure_passwd, $email)  { // Naujas vartotojas
        $hashctl = new hashcontrol();
        $dbctl = new dbcontrol();
//        if ($this->findUserbyName($name)->num_rows == 0) {
        $searchresult = $this->findUserbyName($name);
        if ($searchresult->num_rows == 0) {
            echo "<br><br>No rows found! you're good to go!<br><br>";
        } else {
            echo "<br><br>Hey we found some rows! in fact, . $searchresult->num_rows . !<br><br>";
        }
        $hashed_passwd = $hashctl->get_hashed_password($insecure_passwd);
        $dbctl->insertNormalUser($name, $hashed_passwd, $email);
        echo "finding user by name <br>";
        echo "<br>END find<br>";
//        } else {
//            echo "Toks vartotojas jau egzistuoja. Prasome naudoti kita varda.";
//            sleep (4);
//            header("Location: index.html");
//        }
    }
    public function loginUser($name, $insecure_passwd) {
//        TODO: Logins
    }
    protected function findUserbyName($name) { // Ieskomas vartotojas pagal varda
        $dbctl = new dbcontrol();
        $finduservar = $dbctl->findValueinColumn($name, "Vardas", "vartotojai2");
        echo "finduservar: <br>";
        print_r($finduservar);
        echo "<br><br>";
        return $finduservar;
    }

    protected function getUserPasswordbyID($UID) { // Gaunamas vartotojo slaptazodis pagal varda.
        $this->getValuebyID($UID, "Slaptazodis", "vartotojai2");
    }
}
