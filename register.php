<?php
include("usercontrol.php");

if (isset($_GET['vardas']) && isset($_GET['slaptazodis'])) {
    $vartotojo_vardas = $_GET['vardas'];
    $vartotojo_slaptazodis = $_GET['slaptazodis'];
    $userctl = new usercontrol();
    $userctl->addTempUser($vartotojo_vardas, $vartotojo_slaptazodis);

} else {
    echo "No params, failed login.";
}

