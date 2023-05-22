<?php

class hashcontrol
{
    public function get_hashed_password($insecure_passwd) {
        return password_hash($insecure_passwd, PASSWORD_BCRYPT);
    }
//    public function check_hashed_password($insecure_passwd, $username) {
//
//    }
}