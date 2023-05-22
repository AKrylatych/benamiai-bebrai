<?php
include(usercontrol::class);

if (isset($_GET['vardas']) && isset($_GET['slaptazodis'])) {
    $vartotojo_vardas = $_GET['vardas'];
    $vartotojo_slaptazodis = $_GET['slaptazodis'];
    echo "vartotojo vardas; $vartotojo_slaptazodis";
    echo "<br> Vartotojo ivestas slaptazodis: $vartotojo_slaptazodis<br>";
    $user = new usercontrol();
    $user->addTempUser($vartotojo_vardas, $vartotojo_slaptazodis);
} else {
    echo "No params, failed login.";
}

