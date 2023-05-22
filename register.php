<html>
<body>
<?php
include("usercontrol.php");
echo "i am registering.";
//if (isset($_GET['vardas']) && isset($_POST['slaptazodis'])) {
    $vartotojo_vardas = $_POST['vardas'];
    $vartotojo_slaptazodis = $_POST['slaptazodis'];
    echo "vartotojo vardas; $vartotojo_slaptazodis";
    echo "<br> Vartotojo ivestas slaptazodis: $vartotojo_slaptazodis<br>";
    $userctl = new usercontrol();
    $userctl->addTempUser($vartotojo_vardas, $vartotojo_slaptazodis);
    echo "user added successfully.<br>";

//
//} else {
//    echo "No params, failed login.";
//}

?>
</body>
</html>

