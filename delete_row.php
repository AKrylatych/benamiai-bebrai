<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Moderatoriaus įrašo trynimas</title>
    <link rel="stylesheet" href="pages/user_ui.css">
</head>
<body>
<div class="container">
    <div class="content">
        <div class="users">
            <h1>Įrašo trynimas</h1>
            <?php
            include "guicontrol.php";
            print_r($_POST);
            $rowid = $_POST['rowid'];
            $guictl = new guicontrol($_POST['username'], $_POST['usertype']);
            echo "Vartotjas: ", $guictl->username, "<br>";
            $userctl = new usercontrol();
            print_r($userctl->deleteUserbyUID($rowid));
            //            $dbctl = new dbcontrol();
//            $row = $dbctl->getRowbyID($rowid);
            $guictl->spawnBackToGUI();
            ?>
        </div>

    </div>
</div>
</body>
</html>
