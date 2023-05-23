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
            include "dbcontrol.php";
            include "guicontrol.php";

            $rowid = $_POST['rowid'];
            $guictl = new guicontrol($_POST['username'], $_POST['usertype']);
            $guictl->draw_tablerow($rowid);
            $guictl->spawnBackToGUI();

            ?>
        </div>

    </div>
</div>
</body>
</html>
