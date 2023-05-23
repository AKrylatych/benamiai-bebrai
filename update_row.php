<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Moderatoriaus įrašo redagavimas</title>
    <link rel="stylesheet" href="pages/user_ui.css">
</head>
<body>
<div class="container">
    <div class="content">
        <div class="users">
            <h1>Įrašo redagavimas</h1>
            <?php
            include "guicontrol.php";
            $guictl = new guicontrol($_POST['username'], $_POST['usertype']);
            echo "Sveikas, ", $guictl->username, "!<br>";

            if (isset($_POST['confirm_edit'])) {
                $userctl = new usercontrol();
                echo "Recieved values: <br>";
                echo "rowid: ", $_POST['rowid'];
                echo "vartipas: ", $_POST['new_vartotojo_tipas'];
                echo "varvardas: ", $_POST['new_vartojo_vardas'];
                echo "varpastas: ", $_POST['new_vartotojo_elpastas'];
                if ($userctl->updateUser($_POST['rowid'], $_POST['new_vartotojo_tipas'], $_POST['new_vartojo_vardas'], $_POST['new_vartotojo_elpastas'])) {
                    echo "Sėkmingai atnaujintas vartotojas!";
                } else {
                    echo "Klaida: Nepavyko atnaujinti vartotojo.";

                }
            } else {
                $rowid = $_POST['rowid'];
                $guictl->draw_tablerow($rowid);
            }
            $guictl->spawnBackToGUI();

            ?>
        </div>
    </div>
</div>
</body>
</html>
