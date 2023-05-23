<?php
include "usercontrol.php";
class guicontrol extends usercontrol
{
    public string $username;
    public string $usertype;
    public function __construct($name, $type) {
        $this->username = $name;
        $this->usertype = $type;
    }
    public function spawnlogout():void {
        echo '<form action="index.html">';
        echo '<input type="submit" value="Atsijungti">';
        echo '</form>';
    }
    public function spawnBackToGUI():void {
        $url = match ($this->usertype) {
            'Gaudytojas' => "gaudytojas_GUI.php",
            'Moderatorius' => "moderatorius_GUI.php",
            'Vartotojas' => "vartotojas_GUI.php",
            default => "index.html",
        };
        echo "<form action='$url' method='post'>";
        echo '<input type="submit" value="Grįžti">';
        echo "<input type='hidden' name='username' value='$this->username'>";
        echo "<input type='hidden' name='usertype' value='$this->usertype'>";
        echo '</form>';
    }
    public function draw_tablerow($rowid):void {
        $dbctl = new dbcontrol();
        $selected_row = $dbctl->getRowbyID($rowid);
        $columns = $selected_row->fetch_fields();
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        foreach ($columns as $column) { // Spausdinami antrastiniai duomenys
            echo '<th>' . $column->name . '</th>';
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
        $row = $selected_row->fetch_assoc();
        foreach ($row as $value) { // pavyzdinis
            echo "<td>$value</td>";
        }
        echo "</tr>";
        echo " rowprint: ", print_r($row);
        echo "<tr>"; // Duomenys keitimui
        echo "<td></td><form action='update_row_result.php' method='post'>";
        echo "<td><select name='new_vartotojo_tipas'>"; // Vartotojo tipas
        echo "<option value='Gaudytojas'>Gaudytojas</option>";
        echo "<option value='Moderatorius'>Moderatorius</option>";
        echo "<option value='Vartotojas'>Vartotojas</option>";
        echo "</select></td>";

//        $row = $selected_row->fetch_assoc();
        echo "<td><input name='new_vartojo_vardas' type='text' value='" . $row['Vardas'] . "'></td>"; // Vardas

        echo "<td> * * *</td>"; // Praleisti slaptazodi

        echo "<td><input name='new_vartotojo_elpastas' type='text' value='" . $row['Elpastas'] . "'></td>"; // Elpastas
        echo "<td>";
        echo "<input type='hidden' name='rowid' value='$rowid'>";
        echo "<input type='submit' value='Keisti' name='confirm_edit'>";
        echo "</form></tr>";
        echo "</tbody></table>";

    }
    public function draw_usertable():void {
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
//            $colnum = 0;
            $rowid = 0;
            echo "<td>" . $row['VartotojoID'] . "</td>";
            echo "<td>" . $row['Tipas'] . "</td>";
            echo "<td>" . $row['Vardas'] . "</td>";
            echo "<td> * * * </td>";
            echo "<td>" . $row['Elpastas'] . "</td>";
            echo "<td><form action='delete_row.php' method='post'>";
            echo "<input type='submit' value='Trinti'><input type='hidden' name='rowid' value='$rowid'>";
            echo "<input type='hidden' name='username' value='$this->username'>";
            echo "<input type='hidden' name='usertype' value='$this->usertype'>";
            echo "<input type='hidden' name='rowid' value='$rowid'>";
            echo "</form></td>";

            echo "<td><form action='update_row.php' method='post'>";
            echo "<input type='submit' value='Redaguoti'>";
            echo "<input type='hidden' name='username' value='$this->username'>";
            echo "<input type='hidden' name='usertype' value='$this->usertype'>";
            echo "<input type='hidden' name='rowid' value='$rowid'>";
            echo "</form></td>";
//                        $rowid = $value;
//            foreach ($row as $value) {
//                switch ($colnum) {
//                    case 0:
//                        echo "<td>" . $value . "</td>";
//                        $rowid = $value;
//                        break;
//                    case 3:
//                        echo "<td> * * * </td>";
//                        break;
//                    case 4:
//                        echo "<td>" . $value . "</td>";
//                        echo "<td><form action='delete_row.php' method='post'>";
//                        echo "<input type='submit' value='Trinti'><input type='hidden' name='rowid' value='$rowid'>";
//                        echo "<input type='hidden' name='username' value='$this->username'>";
//                        echo "<input type='hidden' name='usertype' value='$this->usertype'>";
//                        echo "<input type='hidden' name='rowid' value='$rowid'>";
//                        echo "</form></td>";
//
//                        echo "<td><form action='update_row.php' method='post'>";
//                        echo "<input type='submit' value='Redaguoti'>";
//                        echo "<input type='hidden' name='username' value='$this->username'>";
//                        echo "<input type='hidden' name='usertype' value='$this->usertype'>";
//                        echo "<input type='hidden' name='rowid' value='$rowid'>";
//                        echo "</form></td>";
//                        break;
//                    default:
//                        echo "<td>" . $value . "</td>";
//                        break;
//                }
//                $colnum++;
//            }
            echo "<tr>";
        }
        echo "</tbody>";
        echo "</table>";

    }
}