<?php
include_once("../Scripts/db.php");
@session_start();
$sql="select ID,E_ID,E_X,E_Y from enemy where G_ID='".$_SESSION['dname']."' and EL=1";
$res=$GLOBALS['conn']->query($sql) or die("hiba az enemy lekérdezésében1 ");
while ($row=$res->fetch_array(MYSQLI_BOTH))
{
$sql="select * from beast where B_ID='".$row['E_ID']."'";
$res2=$GLOBALS['conn']->query($sql) or die("hiba a  beast lekérdezésében1 ");
$beast=$res2->fetch_array(MYSQLI_BOTH);
$agi=$beast['B_AGI'];
$merre=rand(1,10);
if($merre % 4== 0 )
{
	$ertek="+";
}
else
{
	$ertek="-";
}
if($merre % 3== 0 )
{
	$irany=1;//vizszintes
}
else
{
	$irany=2;//függőleges
}
$id=$_SESSION['dn'];
$myfile = fopen('../dungeons/'.$id, "r") or die("Unable to open file!");
$json_dn=fread($myfile,filesize('../dungeons/'.$id));
fclose($myfile);
//print_r($json_dn)."dn<br>";
$dn=json_decode($json_dn);
$i=$row['E_X'];
$j=$row['E_Y'];
while($agi>-1)
{
	if($ertek=="+")
	{
		if($irany==1)
		{
		if(($j+1)<100)
		{
		if($dn[$i][($j+1)]!=0)
		{
		$sql="update enemy set E_X='".$i."', E_Y='".($j+1)."' where ID='".$row['ID']."'";
		$GLOBALS['conn']->query($sql) or die("hiba a mozgás közben ");
		}
		}
		}
		else
		{
		if(($i+1)<100)
		{
		if($dn[($i+1)][$j]!=0)
		{
		$sql="update enemy set E_X='".($i+1)."', E_Y='".$j."' where ID='".$row['ID']."'";
		$GLOBALS['conn']->query($sql) or die("hiba a mozgás közben ");
		}	
		}
		}
	}
	else
	{
		if($irany==1)
		{
		if(($j-1)>0)
		{
		if($dn[$i][($j-1)]!=0)
		{
		$sql="update enemy set E_X='".$i."', E_Y='".($j-1)."' where ID='".$row['ID']."'";
		$GLOBALS['conn']->query($sql) or die("hiba a mozgás közben ");
		}
		}
		}
		else
		{
		if(($i-1)>0)
		{
		if($dn[($i-1)][$j]!=0)
		{
		$sql="update enemy set E_X='".($i-1)."', E_Y='".$j."' where ID='".$row['ID']."'";
		$GLOBALS['conn']->query($sql) or die("hiba a mozgás közben ");
		}
		}		
		}
	}
	$agi--;
		
}
}

?>
