<?php
include_once("../Scripts/db.php");
@session_start();
$sql="select PAB_A,PAB_SZ,AB_NEV,AB_MANA,AB_AP,AB_FAJTA,AB_MIT,AB_DMG from play_ab,ability where PAB_P='".$_COOKIE['cid']."' and PAB_A=AB_ID and PAB_P=".$_GET['spellID']."";
$res=$GLOBALS['conn']->query($sql) or die("hiba a kezdő story lekérdezésében1 ");
//echo $sql;
$szam=$res->num_rows;
//echo $szam."szám";
while($spells=$res->fetch_array(MYSQLI_BOTH))
{
$dmg=$spells['AB_DMG'];
$mana=$spells['AB_MANA'];
$mit=$spells['AB_MIT'];
$fajta=$spells['AB_FAJTA'];	
}

if($szam!='1')
{
	$return="1,0,0,0,0";//neki nincs ilyen spellje
}
else
{
	$kocka=rand(0,19)+1;
		if ($kocka==1)
		{
			$return="4,".$fajta.",".$mit.",".$mana.",".$dmg;//balsiker
		}
		else
		{
			if($kocka==20)
			{
				$return="5,".$fajta.",".$mit.",".$mana.",".$dmg;//natural 20
			}
			if ($kocka>1 && $kocka <20)
			{
				$return="2,".$fajta.",".$mit.",".$mana.",".$dmg.",".$kocka;//normál dobás
			}
		}
}

echo $return;

?>