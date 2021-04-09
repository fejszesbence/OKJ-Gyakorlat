<?php
require_once './MySqlDB.php';
$mySqlDB = new MySqlDB();
$keszTennivalo = $_POST['IDSzam'];
$siker = $mySqlDB->frissit("todo_listak", "allapot = 1", "ID = '".$keszTennivalo."'");
if ($siker) {
    echo 'Sikeres állapotváltoztatás!';
}