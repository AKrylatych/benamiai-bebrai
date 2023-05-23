<?php
include "dbcontrol.php";
class guicontrol
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
    public function spawnBackToGUI() {
        switch ($this->usertype) {
            case 'Gaudytojas':
                $url = "gaudytojas_GUI.php";
                break;
            case 'Moderatorius':
                $url = "moderatorius_GUI.php";
                break;
            case 'Vartotojas':
                $url = "vartotojas_GUI.php";
                break;
            default:
                $url = "index.html";
                break;
        }
        echo "<form action='$url'>";
        echo '<input type="submit" value="Grįžti">';
        echo "<input type='hidden' name='username' value='$this->username'>";
        echo "<input type='hidden' name='usertype' value='$this->usertype'>";
        echo '</form>';
    }
    public function draw_tablerow($rowid):void {
        $dbctl = new dbcontrol();
        echo "i'm doing things <br>";
        $selected_row = $dbctl->getRowbyID($rowid);
        $columns = $selected_row->fetch_fields();
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        foreach ($columns as $column) {
            echo '<th>' . $column->name . '</th>';
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        $row = $selected_row->fetch_assoc();
        echo "<tr>";
        foreach ($row as $value) { // pavyzdinis
            echo "<td>$value</td>";
        }
        echo "</tr>";

        echo "<tr>"; // Duomenys keitimui
        echo "<td><select>"; // Vartotojo tipas
        echo "<option value='Gaudytojas'>Gaudytojas</option>";
        echo "<option value='Moderatorius'>Moderatorius</option>";
        echo "<option value='Vartotojas'>Vartotojas</option>";
        echo "</select></td>";

        echo "<td><input type='text' value='$row[2]'></td>"; // Vardas

        echo "<td></td>"; // Praleisti slaptazodi

        echo "<td><input type='text' value='$row[4]'></td>"; // Elpastas
        echo "</tr>";
//        while ($row = $selected_row->fetch_assoc()) {
//        <tr>
//            switch ($colnum) {
//                case 1:
//                    // combobox
//                    break;
//                case 2:
//                    // textbox
//                    break;
//                case 3:
//                    // skip
//                    break;
//                case 4:
//
//                default:
//                    echo "<tr>";
//                    break;
//            }
//            echo "<tr>";
//
//            $colnum++;
//        }
//        echo "</tr>";
        echo "</tbody>";
        echo "</table>";

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