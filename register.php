<?php
include "usercontrol.php";
if (isset($_POST['vardas']) &&
    isset($_POST['slaptazodis']) &&
    isset($_POST['elpastas'])
) {
    // Nustatomi vartotojo duomenys
    $vartotojo_vardas = $_POST['vardas'];
    $vartotojo_slaptazodis = $_POST['slaptazodis'];
    $vartotojo_elpastas = $_POST['elpastas'];

    echo "vartotojo vardas; $vartotojo_slaptazodis";
    echo "<br> Vartotojo ivestas slaptazodis: $vartotojo_slaptazodis<br>";
    $userctl = new usercontrol();
    echo "new usercontrol";
    $userctl->addTempUser($vartotojo_vardas, $vartotojo_slaptazodis);
    echo "user added successfully.<br>";
} else {
    echo "Netinkami duomenys.<br>Bandykite is naujo.";
}

