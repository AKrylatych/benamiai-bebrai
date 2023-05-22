<?php
include "hashcontrol.php";
include "dbcontrol.php";
class usercontrol {
//    public function adduser($name, $surname, $email, $insecure_passwd)  {
//        echo "name: $name";
//        echo "Inputted password: $insecure_passwd<br>";
////        echo "surname: $surname<br>";
////        echo "email: $email<br>";
//        $hashctl = new hashcontrol();
//        $hashed_passwd = $hashctl->get_hashed_password($insecure_passwd);
//        $this->insertUser($name, $hashed_passwd);
//
//    }

    public function addTempUser($name, $insecure_passwd) {
        echo "name: $name";
        echo "Inputted password: $insecure_passwd<br>";
//        echo "surname: $surname<br>";
//        echo "email: $email<br>";
        $hashctl = new hashcontrol();
        $hashed_passwd = $hashctl->get_hashed_password($insecure_passwd);
        echo "hashing password: $hashed_passwd";
        $dbctl = new dbcontrol();
        $dbctl>insertUser($name, $hashed_passwd);

    }
//
//    protected function checkuser($name, $insecure_password) {
//
//    }
//
//    protected function findUserbyName($name) {
//        return $this->findValueinColumn($name, "Vardas", "vartotojai");
//    }
//
//    protected function getUserPasswordbyID($UID) {
//        $this->getValuebyID($UID, "Slaptazodis", "vartotojai");
//    }
}
