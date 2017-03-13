<?php
include_once("../Scripts/db.php");
@session_start();
$mi=$_GET['id'];
$exp=explode(",",$mi);
$sql="select I_ID from itemek where I_FID=".$exp[0]." and I_FAJ='".$exp[1]."' and I_ON='0' and I_PID='".$_COOKIE['cid']."'  limit 1";
$res=$GLOBALS['conn']->query($sql) or die("hiba az item lekérdezésében ");
$szam=$res->num_rows;
//van e ilyen itemje
if($szam>0)
{
$item=$res->fetch_array(MYSQLI_BOTH);
switch ($exp[1])
{
	case "F":
		levesz(1,"fegyverek",$exp,$item);
	break;
	case "P":
		levesz(1,"pancel",$exp,$item);
	break;
	case "GY":
		levesz(2,"gyuruk",$exp,$item);
	break;
	case "NY":
		levesz(1,"nyaklanc",$exp,$item);
	break;
	case "PO":
		megisz($exp,$item);
	break;
	
}

}
else
{}

function levesz($limit,$honnan,$exp,$item)
{
	$ellen="select I_ID from itemek where I_FAJ='".$exp[1]."' and I_ON='1' and I_PID='".$_COOKIE['cid']."'";
	$resEllen=$GLOBALS['conn']->query($ellen) or die("hiba az item lekérdezésében ");
	$szamEllen=$resEllen->num_rows;
	//echo $szamEllen."->".$limit;
	if($szamEllen==$limit)
	{
		$sqlEllen="select I_ID,I_FID,I_FAJ from  itemek  where  I_FAJ='".$exp[1]."' and I_PID='".$_COOKIE['cid']."' and I_ON='1' limit 1";
		$resEllen=$GLOBALS['conn']->query($sqlEllen);
		$itemEllen=$resEllen->fetch_array(MYSQLI_BOTH);
		$sqlitem="select ".$exp[1]."_SZAM,".$exp[1]."_MIT from ".$honnan." where ".$exp[1]."_ID=".$itemEllen['I_FID']." ";
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
		$sqlEllen="update itemek set I_ON='0' where  I_ID='".$itemEllen['I_ID']."'";
		//echo $sqlEllen;
		$GLOBALS['conn']->query($sqlEllen);
	}
	$sqlitem="select ".$exp[1]."_SZAM,".$exp[1]."_MIT,".$exp[1]."_KASZT from ".$honnan." where ".$exp[1]."_ID=".$exp[0]." ";
	//echo $sqlitem;
	$resitem=$GLOBALS['conn']->query($sqlitem) or die("hiba a ".$honnan." lekérdezésében ");
	$items=$resitem->fetch_array(MYSQLI_BOTH);
	//lekérdezem a kasztját a  karakternek
	$sqlKaszt="select KAR_KASZT from karakterl where KAR_ID='".$_COOKIE['cid']."'";
	$kasztRes=$GLOBALS['conn']->query($sqlKaszt) or die("hiba a kaszt lekérdezésében ");
	$kaszt_a=$kasztRes->fetch_array(MYSQLI_BOTH);
	$kasztok=explode(",",$items[2]);
	$van=0;
	for($i=0;$i<count($kasztok);$i++)
	{
		if(($kaszt_a['KAR_KASZT']==$kasztok[$i]) or ($kasztok[$i]==="any"))
		{
			$van=1;
			break;
		}
	}
	if($van==1)
	{
	 $mit=explode(",",$items[0]);
	$elojel=$mit[0];
	$mennyit=$mit[1];
	$mennyit=substr($mennyit, 0, -1);
	$sqlUpdate="update itemek set I_ON='1' where I_FID='".$exp[0]."' and I_FAJ='".$exp[1]."' and i_PID='".$_COOKIE['cid']."'";
	$GLOBALS['conn']->query($sqlUpdate) or die("hiba az item felvételében ");
	$egyeb="";
	if($honnan=="fegyverek")
	{
		$egyeb=",K_WEAPONS=".$exp[0]."";
	}
	if($honnan=="pancel")
	{
		$egyeb=",K_ARMOR=".$exp[0]."";
	}
	$sqlUpdate="update karakterl set K_".$items[1]."=(K_".$items[1]."".$elojel."".$mennyit.")".$egyeb." where KAR_ID='".$_COOKIE['cid']."'";
	//echo $sqlUpdate;
	$GLOBALS['conn']->query($sqlUpdate) or die("hiba a karakterlap szerkesztésében ");
	}
	else
	{
		echo "1";
	}
}
function megisz($exp,$item)
{
	
	$sqlitem="select PO_SZAM,PO_MIT from potion where PO_ID=".$exp[0]." ";
	$resitem=$GLOBALS['conn']->query($sqlitem) or die("hiba a potion lekérdezésében ");
	$items=$resitem->fetch_array(MYSQLI_BOTH);
	$mit=explode(",",$items["PO_SZAM"]);
	$elojel=$mit[0];
	$mennyit=$mit[1];
	$mennyit=substr($mennyit, 0, -1);
	$sqlUpdate="delete from  itemek where I_ID='".$item['I_ID']."'";
	$GLOBALS['conn']->query($sqlUpdate) or die("hiba az item törlésénél ");
	$sqlUpdate="update karakterl set K_".$items[1]."=(K_".$items[1]."".$elojel."".$mennyit.") where KAR_ID='".$_COOKIE['cid']."'";
	echo $sqlUpdate;
	$GLOBALS['conn']->query($sqlUpdate) or die("hiba a karakterlap szerkesztésében ");
}
?>