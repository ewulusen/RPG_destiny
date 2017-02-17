<?php
include ('headlogin.php');
$doit=new Event_e;
$loot=array();
if($_COOKIE['end']=='1')
{
$ret=$doit->endDungeon($_GET['xp'],'L',$loot);

echo'<div> <h1> Sajnálom hogy így alakúlt, vesztettél '.$_GET['xp'].' xp!</h1><br>';
}
else
{
	echo'<div> <h1>Már meg megtörtént a baj ne tetézd</h1>';
}
include ('footer.php');
?>