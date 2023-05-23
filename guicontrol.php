<?php
include "dbcontrol.php";
class guicontrol
{
    public function draw_usertable() {
        $dbctl = new dbcontrol();
        $table = $dbctl->selectUserTable();
        $columns = $table->fetch_fields();
        echo "<form>";
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
                        $rowid = $value;
                        break;
                    case 3:
                        echo "<td> * * * </td>";
                        break;
                    case 4:
                        echo "<td>" . $value . "</td>";
                        echo "<td><input type='button' name='delete_row' value='$rowid'>Trinti</input></td>";
                        echo "<td><input type='button' name='edit_row' value='$rowid'>Redaguoti</input></td>";
                        echo "<td>::Rowid - $rowid::</td>";
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
        echo "</form>";

    }
}