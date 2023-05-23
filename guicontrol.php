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
            $colnum = 0;
            foreach ($row as $value) {
                switch ($colnum) {
                    case 3:
                        echo "<td> * * * </td>";
                        break;
                    case 4:
                        echo "<td>" . $value . "</td>";
                        echo "<td>Trinti</td>";
                        echo "<td>Redaguoti</td>";
                        break;
                    default:
                        echo "<td>" . $colnum . "|" . $value . "</td>";
                        break;
                }
                $colnum++;
            }
            echo "<tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}