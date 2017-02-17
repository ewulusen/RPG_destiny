<?php
include_once('../controller/Event.php');
$doit=new Event_e;
$xp=$_COOKIE['xp'];
$getLoot=$doit->getLoot($_COOKIE['lvl']);
echo'<div> <h1> Gratulálunk hogy legyőzted az ellenfeled! Jutalamd '.$xp.' xp!</h1><br>
Ezen felül a láda tartalma:<br>
<table><tr><td><img src=img/chest.png  width=400px height=400px/></td><td>';
for ($i=0;$i<count($getLoot);$i++)
{
	$exp=explode(',',$getLoot[$i]);
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
$ret=$doit->endDungeon($xp,'W',$getLoot);
if($ret=="1")
{
	echo '<h1> Grat LVL up</h1>';
}

?>