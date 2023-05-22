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
            isset($_POST['slaptazodis'])
        ) {
            $vartotojo_vardas = $_GET['vardas'];
            $vartotojo_slaptazodis = $_GET['slaptazodis'];
            $user = new usercontrol();
            $user->loginUser($vartotojo_vardas, $vartotojo_slaptazodis);

        } else {
            echo "No params, failed login.";
        } ?>
    </div>
</div>
</body>
</html>