<?php
include "dbcontrol.php";
class guicontrol
{
    public function spawnlogout() {
        echo '<form action="index.html">';
        echo '<input type="submit" value="Prisijungti">';
        echo '</form>';
    }
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
            $rowid = 0;
            foreach ($row as $value) {
                switch ($colnum) {
                    case 0:
                        echo "<td>" . $value . "</td>";
                        $rowid = $value;
                        break;
                    case 3:
                        echo "<td> * * * </td>";
                        break;
                    case 4:
                        echo "<td>" . $value . "</td>";
                        echo "<td><form><input type='button' name='delete_row' value='Trinti'></form></td>";
                        echo "<td><form><input type='button' name='edit_row' value='Redaguoti'></form></td>";
                        break;
                    default:
                        echo "<td>" . $value . "</td>";
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