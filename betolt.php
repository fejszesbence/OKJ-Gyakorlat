<?php
require_once './MySqlDB.php';
$mySqlDB = new MySqlDB();
$eredmeny = $mySqlDB->lekerdez("todo_listak");
$sorok = "";
while ($sor = $eredmeny->fetch_assoc()) {
    $ID = $sor['ID'];
    $todo = $sor['todo'];
    $datum = $sor['datum'];
    $allapot = $sor['allapot'];
    if ($allapot == 1) {
        $todo = "<s>".$todo."</s>";
    }
    $sorok.="<li id='".$ID."'><p>".$todo."</p><p>".$datum."</p>"
            . "<button onclick='torol(".$ID.")' id='btnTorol' type='button'>&#128465;</button>"
            . "<button onclick='kesz(".$ID.")' id='btnAllapot' type='button'>&check;</button></li>";
}
echo $sorok;