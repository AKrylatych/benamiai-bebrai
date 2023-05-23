<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Moderatoriaus sąsaja</title>
    <link rel="stylesheet", href="../pages/user_ui.css">
</head>
<body>
<div class="container">
    <div class="content">
        <div class="users">
            <?php
            include "dbcontrol.php";
            $dbctl = new dbcontrol();
            $table = $dbctl->selectTable($dbctl->usertable);
            $columns = $table->fetch_fields();
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            foreach ($columns as $column) {
                echo '<th>' . $column->name . '</th>';
            }
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            echo '</table>';
            ?>
        </div>

    </div>
</div>
</body>
</html>
