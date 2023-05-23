<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Moderatoriaus sąsaja</title>
    <link rel="stylesheet" href="../pages/user_ui.css">
</head>
<body>
<div class="container">
    <div class="content">
        <div class="users">
            <h1>Moderatoriaus sąsaja</h1>
            <?php
            include "guicontrol.php";
            echo "Sveikas, ", $_POST['username'], "!<br>";
            echo "Tipas: ", $_POST['usertype'], "<br>";

            $guictl = new guicontrol($_POST['username'], $_POST['usertype']);
            $guictl->draw_usertable();
            ?>
        </div>

    </div>
</div>
</body>
</html>
