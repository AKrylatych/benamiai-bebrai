<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Negalima prisijungti</title>
    <link rel="stylesheet" href="connection_err.css">
    <style>
        .container {
            background-image: url("/images/dog_in_field.jpg");
        }
    </style>
</head>
<body>
<div class="container">
    <div class="white-box">
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

    $userctl = new usercontrol();
    $userctl->addUser($vartotojo_vardas, $vartotojo_slaptazodis, $vartotojo_elpastas);
    echo "user added successfully.<br>";
} else {
    echo "Netinkami duomenys.<br>Bandykite is naujo.";
} ?>
    </div>
</div>
</body>
</html>



