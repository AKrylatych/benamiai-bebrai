<?php
include("usercontrol.php");

if (isset($_GET['vardas']) && isset($_GET['slaptazodis'])) {
    $vartotojo_vardas = $_GET['vardas'];
    $vartotojo_slaptazodis = $_GET['slaptazodis'];
    echo "vartotojo vardas; $vartotojo_slaptazodis";
    echo "<br> Vartotojo ivestas slaptazodis: $vartotojo_slaptazodis<br>";
    $userctl = new usercontrol();
    $userctl->addTempUser($vartotojo_vardas, $vartotojo_slaptazodis);
    echo "user added successfully.<br>";

} else {
    echo "No params, failed login.";
}

