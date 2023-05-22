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
        $user = new usercontrol();
        if (isset($_POST['vardas']) &&
            isset($_POST['slaptazodis'])
        ) {
            $vartotojo_vardas = $_POST['vardas'];
            $vartotojo_slaptazodis = $_POST['slaptazodis'];
            $user = new usercontrol();
            $user->loginUser($vartotojo_vardas, $vartotojo_slaptazodis);

        } else {
            echo "No params, failed login.";
            $user->back_to_login();
        } ?>
    </div>
</div>
</body>
</html>