<?php
class hashcontrol // Klase hashavimo algoritmams.
{
    public function get_hashed_password($insecure_passwd): string {
        return password_hash($insecure_passwd, PASSWORD_BCRYPT);
    }
    public function check_hashed_password($insecure_passwd, $username): bool {
        return 0;
    }
}