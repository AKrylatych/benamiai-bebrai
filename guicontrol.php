<?php

include dbcontrol::class;
class guicontrol
{
    protected $username;
    protected $usertype;
    public function __construct($username, $usertype)
    {
        $this->username = $username;
        $this->usertype = $usertype;
    }

    public function draw_usertable() {
        $dbctl = new dbcontrol();
        $table = $dbctl->selectTable("vartotojai2");
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

        echo "</tbody>";

        echo "</table>";
    }
}