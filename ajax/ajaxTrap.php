<?php
@session_start();
include_once("../Scripts/db.php");
$charok=array();
		$sql="SELECT  `K_REF`, 
		`K_INT` FROM `karakterl` WHERE KAR_ID='".$_COOKIE['cid']."'";
		$res=$GLOBALS['conn']->query($sql);
		$sor=$res->fetch_array(MYSQLI_BOTH);	
$perc=$sor['K_REF']+$sor['K_INT'];
$playerPerception=rand(1,20)+$perc;
$trapPerception=rand(1,20)+$perc;
$sebzes=rand(1,10)+2;
if($trapPerception>=$playerPerception)
{
	echo "1,".$sebzes;
	//echo"<h2>"</h2>";
}
else
{
	echo "0,0";
	//echo"<h2></h2>";
}
$sql="select P_X,P_Y from game where G_ID='".$_SESSION['dname']."'";
$res=$GLOBALS['conn']->query($sql) or die("gond volt a pozició lekérdezésénél");
$sor=$res->fetch_array(MYSQLI_BOTH);
$x=$sor['P_X'];
$y=$sor['P_Y'];
$jel=$_GET['jel'];
$lepes=$_GET['move'];
if($lepes==1)
		{
			if($jel=='m' && ($y-1)>0)
			{
			
			$y=$y-1;
			}	
			
			if($jel=="p" && ($y+1)<100)
			{
				$y=$y+1;
			}	
		}
		
		if($lepes==100)
		{
			if($jel=='m' && ($x-1)>0)
			{
			$x=$x-1;
			}	
			
			if($jel=="p" && ($x+1)<100)
			{
			$x=$x+1;
			}	
		}
$sql1="update game set P_X='".$x."', P_Y='".$y."' where G_ID= '".$_SESSION['dname']."'";
	//echo $sql1;
	$GLOBALS['conn']->query($sql1);