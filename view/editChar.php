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
echo '</table></div><div class="col-sm-8 border2">Itemek:<br><table class="table-bordered"><tr>';
$items=$page->getCharItems();
for($i=0;$i<count($items);$i++)
{
	$exp=explode("&",$items[$i]);
	if($i%8==0)
	{
		if($exp[0]=="GY")
		{
	echo '<td><img src=img/elements/gyuru.png title="'.$exp[4].' '.$exp[5].'"></td>';
		}
			if($exp[0]=="NY")
		{
	echo '<td><img src=img/elements/nyaklanc.png title="'.$exp[4].' '.$exp[5].'"></td>';
		}
			if($exp[0]=="PO")
		{
	echo '<td><img src=img/elements/potion.png title="'.$exp[4].' '.$exp[5].'"></td>';
		}
		
		if(!strpos($exp[2],'Egykezes Mace')) {
		echo '<td><img src=img/elements/mace.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}
		if(!strpos($exp[2],'Egykezes kard')) {
		echo '<td><img src=img/elements/dmg.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}	
		if(!strpos($exp[2],'Egykezes Axe')) {
		echo '<td><img src=img/elements/axe.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}
		if(!strpos($exp[2],'KétKezes Axe')) {
		echo '<td><img src=img/elements/axxe.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}
		if(!strpos($exp[2],'Kétkezes kard')) {
		echo '<td><img src=img/elements/swword.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}
		if(!strpos($exp[2],'Kétkezes Mace')) {
		echo '<td><img src=img/elements/macce.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}
		if(!strpos($exp[2],'Bow')) {
		echo '<td><img src=img/elements/bow.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}
			if(!strpos($exp[2],'Crossbow')) {
		echo '<td><img src=img/elements/crossbow.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}
				if(!strpos($exp[2],'Staff')) {
		echo '<td><img src=img/elements/staff.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}
				if(!strpos($exp[2],'Dagger')) {
		echo '<td><img src=img/elements/dager.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}
		if(!strpos($exp[2],'kis balta')) {
		echo '<td><img src=img/elements/axe.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}
		if(!strpos($exp[2],'Bot')) {
		echo '<td><img src=img/elements/staff.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}
		if(!strpos($exp[2],'Kezdo kard')) {
		echo '<td><img src=img/elements/dmg.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' dmg"></td>';
		}	
		if(!strpos($exp[2],'Vászon')) {
		echo '<td><img src=img/elements/cloth.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' AC"></td>';
		}	
			if(!strpos($exp[2],'Bőr')) {
		echo '<td><img src=img/elements/leather.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' AC"></td>';
		}	
		if(!strpos($exp[2],'Mail')) {
		echo '<td><img src=img/elements/mail.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' AC"></td>';
		}	
		if(!strpos($exp[2],'Plate')) {
		echo '<td><img src=img/elements/plate.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' AC"></td>';
		}	
			if(!strpos($exp[2],'Kezdo Pancel')) {
		echo '<td><img src=img/elements/leather.png title="'.$exp[4].' '.$exp[5].'	és '.$exp[6].' AC"></td>';
		}
	}
	else
	{
			if($exp[0]=="GY")
		{
	echo '<td><img src=img/elements/gyuru.png title="'.$exp[4].' '.$exp[5].'"></td>';
		}
			if($exp[0]=="NY")
		{
	echo '<td><img src=img/elements/nyaklanc.png title="'.$exp[4].' '.$exp[5].'"></td>';
		}
			if($exp[0]=="PO")
		{
	echo '<td><img src=img/elements/potion.png title="'.$exp[4].' '.$exp[5].'"></td>';
		}
	}
}
//print_r($items);
echo'</div></div>';

?>