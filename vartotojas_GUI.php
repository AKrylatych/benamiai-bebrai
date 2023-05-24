<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vartotojo sąsaja</title>
    <link rel="stylesheet" href="pages/user_ui.css">
</head>
<body>
<div class="container">
    <div class="content">
        <h1>Vartotojo sąsaja</h1>
        <?php
        echo "Sveikas, ", $_POST['username'], "!<br>";
        echo "Tipas: ", $_POST['usertype'], "<br>";
        ?>
    </div>
</div>
</body>
</html>
