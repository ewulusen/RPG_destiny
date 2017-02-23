<?php
include_once("../controller/Page.php");
$page=new Page;
$ch=$page->getChar($_GET['id']);
setcookie("cid",$_GET['id']);
echo '<h1>Itt jön a hatalmas '.$ch[13].' !</h1>';
echo"<div class='container'><div class='col-sm-4 border2'>'<table class='table-bordered' style='color:#000000;'>";
echo '<tr><td colspan=8>osztható pontok:'.$ch[14].'</td></tr><tr>';
$statNames=Array('Streng','Agility','Reflex','Defend','Dexterity','Inteligent','Luck','Constitut');
$statNames2=Array('AC','MAC','Perception','Iniciative','Mana','HP','DMG','LVL');
$ch2=Array($ch[9]+$ch[7]+$ch[3],$ch[3]+$ch[5],$ch[2]+$ch[5],$ch[2]+$ch[1],$ch[5]*10,$ch[7]+$ch[3]+$ch[4],$ch[0]+$ch[8],$ch[12]);
for($i=0;$i<8;$i++)
{
	echo '<td >'.$statNames[$i].'</td><td><span id='.$statNames[$i].'>'.$ch[$i].'</span></td>
	<td><button onclick=novel("'.$statNames[$i].'") class="btn btn-success">+</button></td>
	<td><button onclick=csokken("'.$statNames[$i].'") class="btn btn-danger">-</button></td>
	<td>'.$statNames2[$i].'</td><td><span id='.$statNames2[$i].'>'.$ch2[$i].'</span></td>
	</tr><tr>'; 
}
echo '</table></div><div class="col-sm-8 border2">';
$items=$page->getCharItems();

print_r($items);
echo'</div></div>';

?>