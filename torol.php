<?php
require_once './MySqlDB.php';
$mySqlDB = new MySqlDB();
$torlendoTennivalo = $_POST['IDSzam'];
$siker = $mySqlDB->torol("todo_listak", "ID = '".$torlendoTennivalo."'");
if ($siker) {
    echo 'Sikeres törlés!';
}