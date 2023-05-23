<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Moderatoriaus sąsaja</title>
    <link rel="stylesheet" href="pages/user_ui.css">
</head>
<body>
<div class="container">
    <div class="content">
        <div class="users">
            <h1>Moderatoriaus sąsaja</h1>
            <?php
            include "guicontrol.php";
            $username = $_POST['username'];
            $usertype = $_POST['usertype'];
            echo "Sveikas, ", $username, "!<br>";
            echo "Tipas: ", $usertype, "<br>";
            $guictl = new guicontrol();
            echo "<br>";
            $guictl->spawnlogout();
            $guictl->draw_usertable();
            ?>
        </div>

    </div>
</div>
</body>
</html>
