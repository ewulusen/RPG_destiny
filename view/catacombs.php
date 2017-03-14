<?php
@session_start();
include_once("../controller/Page.php");
if(isset($_COOKIE['cid']))
	{
$page=new Page;
if(!isset($_SESSION['dn']))	
	{
	$id=$page->getDungeonID();
	
	$dn=$page->getDungeon($_SESSION['dn'],$_SESSION['dname']);
	}
	else 
	{
	$dn=$page->getDungeon($_SESSION['dn'],$_SESSION['dname']);
	}
	if(isset($_GET['move'])) 
	{
	$page->move($_GET['jel'],$_GET['move'],$dn);
	$dn=$page->getDungeon($_SESSION['dn'],$_SESSION['dname']);
	}
	
$x=$dn[103];
$y=$dn[104];
$xst=$x-3;
$yst=$y-3;
/*1=padló
	2=ajtó
	3=láda
	4=ellenség
	5=folyosó
	6=csapda*/
echo '<div id="dungeon"><div class=container><div class="col-sm-2">Map';
echo '<table >';
	for($i=0;$i<100;$i++)
		{
		echo '<tr>';
		for($j=0;$j<100;$j++)
			{
					if($dn[$i][$j]!=0 )
					{
						if($dn[$i][$j]==1)
						{
						echo'<td style="background-color:green; width:10px; height:5px;"></td>';
						}
						elseif($dn[$i][$j]==6)
						{
						echo'<td style="background-color:pink; width:10px; height:5px;"></td>';
						}
						elseif($dn[$i][$j]==2)
						{
						echo'<td style="background-color:white; width:10px; height:5px;"></td>';
						}
						elseif($dn[$i][$j]==3)
						{
						echo'<td style="background-color:yellow; width:10px; height:5px;"></td>';
						}
						elseif($dn[$i][$j]==4)
						{
							$ok=$page->enemyLive($i,$j);
							if ($ok==3)
							{
						echo'<td style="background-color:blue; width:10px; height:5px;"></td>';
							}
							elseif($ok==2)
							{
							echo'<td style="background-color:orange; width:10px; height:5px;"></td>';
							}
						}
						elseif($dn[$i][$j]==5)
						{
						echo'<td style="background-color:green; width:10px; height:5px;"></td>';
						}
						elseif($dn[$i][$j]==7)
						{
						echo'<td style="background-color:red; width:10px; height:5px;"></td>';
						}
						elseif($dn[$i][$j]==8)
						{
						echo'<td style="background-color:white; width:10px; height:5px;"></td>';
						}
					}
						else
						{
						echo'<td style="background-color:black; width:10px; height:5px;"></td>';
						}
					}
			echo'</tr>';
		}
		
		echo'</table>';



echo'
</div><div class="col-sm-10">';
//var_dump($dn);
echo '<table border=3 style="border-color:#000000" id="dn">';
	for($i=$xst;$i<($x+3);$i++)
		{
		
		echo '<tr>';
		for($j=$yst;$j<($y+5);$j++)
			{
				if($i<100 && $j<100 && $i>0 && $j>0)
				{
					if($dn[$i][$j]!=0 )
					{
						if($dn[$i][$j]==1)//padló
						{
							if($dn[($i+1)][$j]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxStep(100,"m") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
							elseif($dn[($i-1)][$j]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxStep(100,"p") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
							elseif($dn[$i][($j-1)]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxStep(1,"p") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
							elseif($dn[$i][($j+1)]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxStep(1,"m") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
							else
							{
							echo'<td class="dungeonAlap" id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
						}
						elseif($dn[$i][$j]==6)//csapda
						{
							if($dn[($i+1)][$j]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxTrap(100,"m") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
							elseif($dn[($i-1)][$j]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxTrap(100,"p") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
							elseif($dn[$i][($j-1)]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxTrap(1,"p") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
							elseif($dn[$i][($j+1)]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxTrap(1,"m") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
							else
							{
							echo'<td class="dungeonAlap" id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
						}
						elseif($dn[$i][$j]==2)//ajtó be
						{
							if($dn[($i+1)][$j]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxStep(100,"m") id="'.$dn[$i][$j].'"><img src="img\elements\in.png" width=75px height=75px></td>';
							}
							elseif($dn[($i-1)][$j]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxStep(100,"p") id="'.$dn[$i][$j].'"><img src="img\elements\in.png" width=75px height=75px></td>';
							}
							elseif($dn[$i][($j-1)]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxStep(1,"m") id="'.$dn[$i][$j].'"><img src="img\elements\in.png" width=75px height=75px></td>';
							}
							elseif($dn[$i][($j+1)]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxStep(1,"p")id="'.$dn[$i][$j].'"><img src="img\elements\in.png" width=75px height=75px></td>';
							}
							else
							{
							echo'<td class="dungeonAlap" id="'.$dn[$i][$j].'"><img src="img\elements\in.png" width=75px height=75px></td>';
							}
						}
						elseif($dn[$i][$j]==3)//chest
						{
							$ok=$page->chestOpen($i,$j);
							if ($ok==0)
							{
							if($dn[($i+1)][$j]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxOpenChest('.$i.','.$j.') id="'.$dn[$i][$j].'"><img src="img/elements/cchest.png" width=35px height=35px></td>';
							}
							elseif($dn[($i-1)][$j]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxOpenChest('.$i.','.$j.') id="'.$dn[$i][$j].'"><img src="img/elements/cchest.png" width=35px height=35px></td>';
							}
							elseif($dn[$i][($j-1)]==7)
							{
							echo'<td class="dungeonLephet" onclick=ajaxOpenChest('.$i.','.$j.') id="'.$dn[$i][$j].'"><img src="img/elements/cchest.png" width=35px height=35px></td>';
							}
							elseif($dn[$i][($j+1)]==7)
							{
							echo'<td class="dungeonLephet"onclick=ajaxOpenChest('.$i.','.$j.') id="'.$dn[$i][$j].'"><img src="img/elements/cchest.png" width=35px height=35px></td>';
							}
							else
							{
							echo'<td class="dungeonAlap" id="'.$dn[$i][$j].'"><img src="img/elements/cchest.png" width=35px height=35px></td>';
							}
							}
							else
							{
								echo'<td class="openChest" onclick=ajaxStep(1,"p")id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
						}
						elseif($dn[$i][$j]==4)//enemy
						{
							$ok=$page->enemyLive($i,$j);
							if ($ok==3)
							{
							if($dn[($i+1)][$j]==7)
							{
							echo'<td class="dungeonLephet" onclick="ajaxAttack('.$i.','.$j.')" id="'.$dn[$i][$j].'"><img src="img/beast/ant.gif" width=35px height=35px></td>';
							}
							elseif($dn[($i-1)][$j]==7)
							{
							echo'<td class="dungeonLephet" onclick="ajaxAttack('.$i.','.$j.')" id="'.$dn[$i][$j].'"><img src="img/beast/ant.gif" width=35px height=35px></td>';
							}
							elseif($dn[$i][($j-1)]==7)
							{
							echo'<td class="dungeonLephet" onclick="ajaxAttack('.$i.','.$j.')" id="'.$dn[$i][$j].'"><img src="img/beast/ant.gif" width=35px height=35px></td>';
							}
							elseif($dn[$i][($j+1)]==7)
							{
							echo'<td class="dungeonLephet" onclick="ajaxAttack('.$i.','.$j.')" id="'.$dn[$i][$j].'"><img src="img/beast/ant.gif" width=35px height=35px></td>';
							}
							else
							{
							echo'<td class="dungeonAlap" id="'.$dn[$i][$j].'"><img src="img/beast/ant.gif" width=35px height=35px></td>';
							}
							}
							elseif($ok==2)
							{
								echo'<td class="deathEnemy" onclick=ajaxStep(100,"m") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
						}
						elseif($dn[$i][$j]==5)//folyosó
						{
							if($dn[($i+1)][$j]==7)
							{
							echo'<td class="dungeonLephetF" onclick=ajaxStep(100,"m") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
							elseif($dn[($i-1)][$j]==7)
							{
							echo'<td class="dungeonLephetF" onclick=ajaxStep(100,"p") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
							elseif($dn[$i][($j-1)]==7)
							{
							echo'<td class="dungeonLephetF" onclick=ajaxStep(1,"p") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
							elseif($dn[$i][($j+1)]==7)
							{
							echo'<td class="dungeonLephetF" onclick=ajaxStep(1,"m") id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
							else
							{
							echo'<td class="dungeonFolyoso" id="'.$dn[$i][$j].'"><img src="img\dungeon\alap.png" width=75px height=75px></td>';
							}
						}
						elseif($dn[$i][$j]==7)//player
						{
						
						echo'<td class="dungeonHatter" id="'.$dn[$i][$j].'"><img src="img/player_pic/'.$_COOKIE['faj'].''.$_COOKIE['kaszt'].'g.gif" width=75px height=75px></td>';
						
						}
						elseif($dn[$i][$j]==8)//kijárat
						{
						if($dn[($i+1)][$j]==7)
							{
							echo'<td class="dungeonLephet" onclick="ajaxOut()" id="'.$dn[$i][$j].'"><img src="img/elements/out.png" width=75px height=75px></td>';
							}
							elseif($dn[($i-1)][$j]==7)
							{
							echo'<td class="dungeonLephet" onclick="ajaxOut()" id="'.$dn[$i][$j].'"><img src="img/elements/out.png" width=75px height=75px></td>';
							}
							elseif($dn[$i][($j-1)]==7)
							{
							echo'<td class="dungeonLephet" onclick="ajaxOut()" id="'.$dn[$i][$j].'"><img src="img/elements/out.png" width=75px height=75px></td>';
							}
							elseif($dn[$i][($j+1)]==7)
							{
							echo'<td class="dungeonLephet" onclick="ajaxOut()" id="'.$dn[$i][$j].'"><img src="img/elements/out.png" width=75px height=75px></td>';
							}
							else
							{
							echo'<td class="dungeonOut" id="'.$dn[$i][$j].'"><img src="img/elements/out.png" width=75px height=75px></td>';
							}
						}
					}
						else
						{
						echo'<td class="dungeonHatter" id="'.$dn[$i][$j].'"><img src="img/dungeon/alap.png" width=75px height=75px></td>';	
						}
				}
					
			}
			
			}
			
			echo'</tr>';
		
		
		echo'</table>';
echo'<button class="border2" onclick=ajaxStep(100,"m")>Fel</button>';
echo'<button  class="border2" onclick=ajaxStep(100,"p")>Le</button>';
echo'<button class="border2" onclick=ajaxStep(1,"p")>Jobbra</button>';
echo'<button class="border2" onclick=ajaxStep(1,"m")>Balra</button></div></div>';

	}
	else
	{
		echo "Válassz egy karakter akivel lemerészkedsz a Katakombákba";
	}
?>

