<?php
include_once("../Scripts/db.php");
@session_start();

$sql="update karakterl set K_STR=".$_GET['str'].",K_AGI=".$_GET['agi'].",K_REF=".$_GET['ref'].",
K_DEF=".$_GET['def'].",K_DEX=".$_GET['dex'].",K_INT=".$_GET['inte'].",K_LUC=".$_GET['luck'].",
K_CON=".$_GET['con'].",K_APOINT=".$_GET['kocka']." where KAR_ID='".$_COOKIE['cid']."'";
$GLOBALS['conn']->query($sql) or die("hiba a karakterlap updatelése közben savChar");
?>