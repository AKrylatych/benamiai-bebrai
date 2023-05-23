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
            echo "Sveikas, ", $_POST['username'], "!<br>";
            echo "Tipas: ", $_POST['usertype'], "<br>";
            ?>
        </div>

    </div>
</div>
</body>
</html>
