<?php
include_once("../Scripts/db.php");
@session_start();
$mi=$_GET['id'];

$sql="select I_FID,I_FAJ from itemek where I_ID=".$mi." and I_PID='".$_COOKIE['cid']."'  limit 1";
$res=$GLOBALS['conn']->query($sql) or die("hiba az item lekérdezésében ");
$szam=$res->num_rows;
if($szam>0)
{
$item=$res->fetch_array(MYSQLI_BOTH);
switch ($item[1])
{
	case "F":
		levesz("fegyverek",$item,$mi);
	break;
	case "P":
		levesz("pancel",$item,$mi);
	break;
	case "GY":
		levesz("gyuruk",$item,$mi);
	break;
	case "NY":
		levesz("nyaklanc",$item,$mi);
	break;
	
}
}
function levesz($honnan,$item,$mi)
{
		$sqlitem="select ".$item[1]."_SZAM,".$item[1]."_MIT from ".$honnan." where ".$item[1]."_ID=".$item[0]." ";
		$resitem=$GLOBALS['conn']->query($sqlitem) or die("hiba a ".$honnan." lekérdezésében ");
		$items=$resitem->fetch_array(MYSQLI_BOTH);
		$mit=explode(",",$items[0]);
		$elojel=$mit[0];
		$mennyit=$mit[1];
		$mennyit=substr($mennyit, 0, -1);
		$egyeb="";
		if($elojel=="+")
		{
			$elojel="-";
		}
		else
		{
			$elojel="+";
		}
		if($honnan=="fegyverek")
		{
		$egyeb=",K_WEAPONS='0'";
		}
		if($honnan=="pancel")
		{
		$egyeb=",K_ARMOR='0'";
		}
	$sqlUpdate="update karakterl set K_".$items[1]."=(K_".$items[1]."".$elojel."".$mennyit.")".$egyeb." where KAR_ID='".$_COOKIE['cid']."'";
	$GLOBALS['conn']->query($sqlUpdate) or die("hiba a karakterlap szerkesztésében ");
		$sqlEllen="update itemek set I_ON='0' where  I_ID='".$mi."'";
		//echo $sqlEllen;
		$GLOBALS['conn']->query($sqlEllen);
}
?>	

