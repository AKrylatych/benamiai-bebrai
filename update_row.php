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
            echo "debug0<br>";
            include "guicontrol.php";

            echo "debug1<br>";
            $guictl = new guicontrol($_POST['username'], $_POST['usertype']);
            echo "Sveikas, ", $guictl->username, "!<br>";
            echo "Tipas: ", $guictl->usertype, "<br>";

            echo "debug2<br>";
            $rowid = $_POST['rowid'];
            echo "selected rowid: $rowid";
            echo "debug3<br>";
            $guictl->draw_tablerow($rowid);
            echo "debug4<br>";
            $guictl->spawnBackToGUI();
            echo "debug5<br>";

            ?>
        </div>
    </div>
</div>
</body>
</html>
