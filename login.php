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
        if (isset($_POST['vardas_login']) &&
            isset($_POST['slaptazodis_login'])
        ) {
            $vartotojo_vardas = $_POST['vardas_login'];
            $vartotojo_slaptazodis = $_POST['slaptazodis_login'];
            $user = new usercontrol();
            echo "Prisijungiama...<br>";
            $user->loginUser($vartotojo_vardas, $vartotojo_slaptazodis);
        } else {
            echo "No params, failed login.";
            $user = new usercontrol();
            $user->back_to_login();
        } ?>
    </div>
</div>
</body>
</html>