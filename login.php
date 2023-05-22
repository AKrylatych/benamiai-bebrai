<?php
include("usercontrol.php");

if (isset($_GET['vardas']) && isset($_GET['slaptazodis'])) {
    $vartotojo_vardas = $_GET['vardas'];
    $vartotojo_slaptazodis = $_GET['slaptazodis'];
    $user = new usercontrol();
    $user->addTempUser($vartotojo_vardas, $vartotojo_slaptazodis);
} else {
    echo "No params, failed login.";
}

