<?php
/*ezzel indítjuk el az első storyt mikor elkészül a karakter
*/
echo' <span id="selectCharakter" style="display:none;"></span>';
include_once("../Scripts/db.php");
@session_start();
$sql="select Story1 from s1 where ID=1";
$res=$GLOBALS['conn']->query($sql) or die("hiba a kezdő story lekérdezésében1 ");
$story1=$res->fetch_array(MYSQLI_BOTH);
$eleje=$story1['Story1'];

$sql="select Story2 from s2 where ID=1";
$res=$GLOBALS['conn']->query($sql) or die("hiba a kezdő story lekérdezésében2 ");
$story2=$res->fetch_array(MYSQLI_BOTH);
$kozepe=$story2['Story2'];

$sql="select Story3 from s3 where ID=1";
$res=$GLOBALS['conn']->query($sql) or die("hiba a kezdő story lekérdezésében3 ");
$story3=$res->fetch_array(MYSQLI_BOTH);
$vege=$story3['Story3'];
$files = scandir('../dungeons/');
$fajlok=array();
foreach($files as $file) {
array_push($fajlok,$file);
}
$id=$fajlok[2];
$myfile = fopen('../dungeons/'.$id, "r") or die("Unable to open file!");
$json_dn=fread($myfile,filesize('../dungeons/'.$id));
fclose($myfile);
$dn=json_decode($json_dn);
for($i=0;$i<100;$i++)
		{
		for($j=0;$j<100;$j++)
			{
				
					if($dn[$i][$j]!='0')
				{
					$px=$i;
					$py=$j;
					break 2;
					}
				}	
			}
		for($i=0;$i<100;$i++)
	{
	for($j=0;$j<100;$j++)
		{
			
				if($dn[$i][$j]=='1')
			{
				$ex=$i;
				$ey=$j;
				}
			}	
		}
		$dn[$ex][$ey]=8;
			$ch=array();
			$emy=array();
			$tr=array();
for($i=0;$i<100;$i++)
		{
		for($j=0;$j<100;$j++)
			{
				if($dn[$i][$j]==4)
				{
					array_push($emy,$i.",".$j);
				}	
				if($dn[$i][$j]==6)
				{
					array_push($tr,$i.",".$j);
				}		
			}
		}
			$dname=$id.$_COOKIE['pid'];
			$sql1="insert into game (`P_X`, `P_Y`, `G_NAME`) values('".$px."','".$py."','".$id."')";
$GLOBALS['conn']->query($sql1);	
$ret=$GLOBALS['conn']->insert_id;
	for($i=0;$i<count($emy);$i++)
{
	$sql="select B_ID from beast where B_LVL<=".$_COOKIE['lvl']." order by rand() limit 1"; 
	$ered=$GLOBALS['conn']->query($sql);
	$beast=$ered->fetch_array(MYSQLI_BOTH);
	$beast_id=$beast['B_ID'];
	$exp=explode(',',$emy[$i]);
	$sql1="INSERT INTO `enemy`(`E_ID`, `E_X`, `E_Y`,G_ID,EL) VALUES (".$beast_id.",".$exp[0].",".$exp[1].",".$ret.")";
	$GLOBALS['conn']->query($sql1);

}
for($i=0;$i<count($tr);$i++)
{
	$exp=explode(',',$tr[$i]);
	$sql1="INSERT INTO `trap`(`T_ID`, `T_X`, `T_Y`, `G_ID`) VALUES (1,".$exp[0].",".$exp[1].",".$ret.")";
	$GLOBALS['conn']->query($sql1);

}
$_SESSION['dn']=$id;	
$_SESSION['dname']=$ret;

echo "<div class=storyBCG><p class='story'>".$eleje." ".$kozepe." ".$vege."</p>";
echo '<span class="storyspan border2"><button onclick="firstStory()">Tovább</button></span></div>';
?>
