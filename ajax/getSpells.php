<?php
include_once("../Scripts/db.php");
@session_start();
$sql="select AB_NEV,AB_ID from play_ab,ability where PAB_P='".$_COOKIE['cid']."' and PAB_A=AB_ID ";
$res=$GLOBALS['conn']->query($sql) or die("hiba a kezdő story lekérdezésében1 ");
while($spells=$res->fetch_array(MYSQLI_BOTH))
{

		echo '<a href="#" class="list-group-item border2" onclick="spell('.$spells['AB_ID'].')">'.$spells['AB_NEV'].'</a>';
	
}

?>