<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prisijungimas</title>
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
            $userType = $user->getUserTypebyName($vartotojo_vardas);
            switch ($userType) {
                case 'Gaudytojas':
                    $url = "sasajos/gaudytojas_GUI.php";
                    break;
                case 'Moderatorius':
                    $url = "sasajos/moderatorius_GUI.php";
                    break;
                case 'Vartotojas':
                    $url = "sasajos/vartotojas_GUI.php";
                    break;
                default:
                    echo "Bloga užklausa.";
                    $user->back_to_login();
                    break;
            }
            echo "<br>Vartotojo tipas: $userType";
            echo '<form action="'.$url.'" method="post">';
            echo '<input type="submit" value="Prisijungti">';
            echo '<input type="hidden" name="usertype" value="'.$userType.'">';
            echo '<input type="hidden" name="username" value="'.$vartotojo_vardas.'">';
            echo '</form>';

        } else {
            echo "No params, failed login.";
            $user = new usercontrol();
            $user->back_to_login();
        } ?>
    </div>
</div>
</body>
</html>