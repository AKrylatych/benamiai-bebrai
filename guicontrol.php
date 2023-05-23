<?php
include "dbcontrol.php";
class guicontrol
{
    public function draw_usertable() {
        $dbctl = new dbcontrol();
        $table = $dbctl->selectUserTable();
        $columns = $table->fetch_fields();
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        foreach ($columns as $column) {
            echo '<th>' . $column->name . '</th>';
        }
        echo "</tr>";
        echo "</thead>";

        echo "<tbody>";
        while ($row = $table->fetch_assoc()) {
            echo "<tr>";
            // Generuoja eilutes
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "<tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}