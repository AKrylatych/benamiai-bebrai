<?php
include "dbcontrol.php";
class guicontrol
{
    public function __construct()
    {
        echo "constructing...";
    }

    public function draw_usertable() {
        $dbctl = new dbcontrol();
        $table = $dbctl->selectUserTable();
        echo "dbget<br>";
        print_r($table);
        $columns = $table->fetch_fields();
        echo "tablefetch<br>";
        echo "<table>";

        echo "<thead>";
        echo "<tr>";
        foreach ($columns as $column) {
            echo '<th>' . $column->name . '</th>';
        }

        echo "</tr>";
        echo "</thead>";


        echo "<tbody>";

        echo "</tbody>";

        echo "</table>";
    }
}