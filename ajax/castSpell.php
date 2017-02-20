<?php
include_once("../Scripts/db.php");
@session_start();
$sql="select PAB_A,PAB_SZ,AB_NEV,AB_MANA,AB_AP,AB_FAJTA,AB_MIT,AB_DMG from play_ab,ability where PAB_P='".$_COOKIE['cid']."' and PAB_A=AB_ID and PAB_P=".$_GET['id']."";

$res=$GLOBALS['conn']->query($sql) or die("hiba a kezdő story lekérdezésében1 ");
$szam=$res->num_rows;
if($szam<1)
{
	echo "3";
}
else
{
while($spells=$res->fetch_array(MYSQLI_BOTH))
{

		
	
}
}

?>