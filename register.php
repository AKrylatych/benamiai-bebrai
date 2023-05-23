<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
    <link rel="stylesheet" href="/pages/connection_err.css">
    <style>
        .container {
            background-image: url("/images/blue_field_dog.jpg");
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
            echo "Kuriamas naujas vartotojas...<br>";
            $userctl = new usercontrol();

            $userctl->addUser($vartotojo_vardas, $vartotojo_slaptazodis, $vartotojo_elpastas);
            $this->back_to_login();
        } else {
            echo "Netinkami duomenys.<br>Bandykite is naujo.";
            $userctl = new usercontrol();
            $userctl->back_to_login();
        }
        ?>
    </div>
</div>
</body>
</html>