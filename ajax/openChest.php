<?php
include_once("../Scripts/db.php");
@session_start();
$loot=array();
$lvl=$_COOKIE['lvl'];
	$szam=rand(0,1);
	//nyaklánc?
	if($szam=='1')
	{
		$fer=getLoot('NY','nyaklanc',$lvl);
		array_push($loot,$fer);
	}
	$szam=rand(0,1);
	//gyuru?
	if($szam=='1')
	{
		$fer=getLoot('GY','gyuruk',$lvl);
		array_push($loot,$fer);
	}
	$szam=rand(0,1);
	//pancel?
	if($szam=='1')
	{
		$fer=getLoot('P','pancel',$lvl);
		array_push($loot,$fer);
	}
	$szam=rand(0,1);
	//fegyver?
	if($szam=='1')
	{
		$fer=getLoot('F','fegyverek',$lvl);
		array_push($loot,$fer);
	}
	//potion?
	if($szam=='1')
	{
		$fer=getLoot('PO','potion',$lvl);
		array_push($loot,$fer);
	}
	$szam=rand(0,($lvl*100))+1;
	array_push($loot,"M,penz,".$szam.",.-Trefu");
	//LOOT összeállítása
	echo'<div> <h1> A láda tartalma:<br>
<table><tr><td><img src=img/chest.png  width=400px height=400px/></td><td>';
for ($i=0;$i<count($loot);$i++)
{
	$exp=explode(',',$loot[$i]);
	if($exp[0]=='M')
	{
	echo $exp[2].''.$exp[3].'<br>';
	}
	else
	{
	echo $exp[2].'<br>';
	}
}
echo'</td></tr></table>';
endDungeon($loot);

	
function getLoot($prefix,$db,$lvl)
{
	$sql="select ".$prefix."_ID,".$prefix."_NEV from ".$db." where ".$prefix."_SZINT<=".$lvl."";
	$res=$GLOBALS['conn']->query($sql);
	$szam=$res->num_rows;
	$num=rand(1,$szam);
	$i=1;
	while ($sor=$res->fetch_array(MYSQLI_BOTH)){
	if($i==$num)
	{
		$string=$prefix.",".$sor[$prefix.'_ID'].",".$sor[$prefix.'_NEV'];
	}
		$i++;
	}
	return $string;
}

function endDungeon($loot)
{
for($i=0;$i<count($loot);$i++)
		{
			$loot_a=explode(',',$loot[$i]);
			if($loot_a[0]=='M')
			{
				$sql='update karakterl set K_PENZ=K_PENZ+'.$loot_a[2].' where KAR_ID='.$_COOKIE['cid'];
				$GLOBALS['conn']->query($sql);
			}
			else
			{
				$sql='insert into itemek (I_PID,I_FID,I_FAJ,I_ON) values ("'.$_COOKIE['cid'].'","'.$loot_a[1].'","'.$loot_a[0].'","0")';
				//echo $sql;
				$GLOBALS['conn']->query($sql);
			}
		}
	$sql="update game set P_X=".$_GET['i'].", P_Y=".$_GET['j']." where G_ID=".$_SESSION['dname']."";
	$GLOBALS['conn']->query($sql);
	$sql="update chest set EL=0 where C_X=".$_GET['i']." and C_Y=".$_GET['j']." and G_ID=".$_SESSION['dname']."";
	//echo $sql;
	$GLOBALS['conn']->query($sql);
	 
}