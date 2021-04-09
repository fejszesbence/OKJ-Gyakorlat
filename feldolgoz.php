<?php
require_once './MySqlDB.php';
$mySqlDB = new MySqlDB();
$todoNev = $_POST['todoNev'];
$todoDatum = $_POST['todoDatum'];
$lekerdezResult = $mySqlDB->lekerdez("todo_listak", "ID = (select max(ID) from todo_listak)");
$lekerdezSor = $lekerdezResult->fetch_assoc();
if ($lekerdezSor == null) {
    $maxIDSzam = 0;
}
else {
    $maxIDSzam = $lekerdezSor["ID"];
}
$IDSzam = $maxIDSzam + 1;
$siker = $mySqlDB->ujRekord("todo_listak", "(ID, todo, datum, allapot)", 
        "( ".$IDSzam.", '".$todoNev."', '".$todoDatum."', 0 )");
$valasz = "";
if ($siker) {
    $valasz = "<li id='".$IDSzam."'><p>".$todoNev."</p><p>".$todoDatum."</p>"
            . "<button onclick='torol(".$IDSzam.")' id='btnTorol' type='button'>&#128465;</button>"
            . "<button onclick='kesz(".$IDSzam.")' id='btnAllapot' type='button'>&check;</button></li>";
}
echo $valasz;