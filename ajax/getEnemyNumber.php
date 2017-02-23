<?php

include_once("../Scripts/db.php");
@session_start();
$sql="select count(ID) as szam from enemy where G_ID='".$_SESSION['dname']."' and EL=1";
$res=$GLOBALS['conn']->query($sql) or die("hiba a kezdő story lekérdezésében1 ");
$row=$res->fetch_array(MYSQLI_BOTH);
echo $row['szam'];
?>
