<?php
$alaplist;
$dungeon;
$roomConnected;
$rooms;
include_once("../controller/Page.php");
include_once("room.class");
$jsnum=1;
while($jnum<100)
{
/*if(isset($_COOKIE['cid']))
{*/
	
	if(isset($_COOKIE['dungeon']))
	{}
	else
	{
		
	$page=New Page;
	//$page->makeKatakombs($_COOKIE['lvl']);
	//$lvl=$_COOKIE['lvl'];
	$lvl="3";
	$roomNumber=rand(1,8)+1;
	$dungeon=array(array());
	for($i=0;$i<100;$i++)
		{
		for($j=0;$j<100;$j++)
			{
			$dungeon[$i][$j]="0";
			}
		}
	$dungeon=generateRandomRoom($dungeon,$roomNumber);
	for($i=0;$i<100;$i++)
		{
		for($j=0;$j<100;$j++)
			{
				if($dungeon[$i][$j]==2)
				{
					$a=$i;
					$b=$j;
					$dungeon[$i][$j]="c";
					generateFloor($a,$b);
					break 2;
				}
				
			}
		}
	/*for($i=0;$i<100;$i++)
		{
		for($j=0;$j<100;$j++)
			{
				echo $dungeon[$i][$j];
				}
				echo"<br>";
			}*/
		
		//tisztit();
	/*
	1=padló
	2=ajtó
	3=láda
	4=ellenség
	5=folyosó
	6=csapda
	*/
//print_r($rooms);
	echo '<table border=0.1>';
	for($i=0;$i<100;$i++)
		{
		
		echo '<tr>';
		for($j=0;$j<100;$j++)
			{
			if($dungeon[$i][$j]!='0'){
			echo'<td class="dungeonAlap"><img src="img\dungeon\a2.jpg" width=15px height=15px></td>';
			}
			else 
			{
			echo'<td class="dungeonHatter"></td>';	
			}
			}
			echo'</tr>';
		}
		
		echo'</table>';
	}
	
/*}
else
	{
		echo 'válassz egy karaktert a kalandozáshoz';
	}*/
	
		$txt=json_encode($dungeon);
		$myfile = fopen($jnum.".json", "w") or die("Unable to open file!");
		fwrite($myfile, $txt);
		fclose($myfile);
		$jnum++;
}	
	
	
function generateRandomRoom($dungeon,$roomNumber)
{
	global $rooms;
	$rooms=array();
	for($z=1;$z<=$roomNumber;$z++) 
	{
		$roomDimension=rand(6,12);
		$a=rand(0,99);
		$s=rand(0,99);
		if((($a+$roomDimension)>100) || (($s+$roomDimension)>100) || (($a-$roomDimension)<0) ||(($s-$roomDimension)<0))
		{$jo=0;$z--;} else{
		for($i=$a;$i<($a+$roomDimension);$i++)
		{
		for($j=$s;$j<($s+$roomDimension);$j++)
			{
			if($dungeon[$i][$j]!="0")
			{
				$jo=0;
				$z--;
				break 2;
			}
			else
			{
				$jo=1;
			}
			}
		}
		$trap_o=1;
		$enemy_o=1;
		$ches_o=1;
		$k=1;
		if($jo==1)
		{
			for($i=$a;$i<($a+$roomDimension);$i++)
			{
			for($j=$s;$j<($s+$roomDimension);$j++)
			{
		$trap=rand(1,200);
		$enemy=rand(1,200);
		$ches=rand(1,200);
			if($k==1)
			{
				$dungeon[$i][$j]="2";
				$k++;
				array_push($rooms,$room=New Room($z,$i,$j,$roomDimension));
			}
			else
			{
				if($trap%9==0 && $trap_o<2)
				{
					$dungeon[$i][$j]="6";
					$trap_o++;
				}
				elseif($ches%14==0 && $ches_o<3)
				{
					$dungeon[$i][$j]="3";
					$ches_o++;
				}
				elseif($enemy%5==0 && $enemy_o<2)
				{
					$dungeon[$i][$j]="4";
					$enemy_o++;
				}
				else{
				$dungeon[$i][$j]="1";
				}
			}
			
			}
			}
		}
	}
	}
		return $dungeon;
}

function generateFloor($a,$b)
{
	global $dungeon;
	global $alaplist;
	global $roomNumber;
	global $rooms;
	$alaplist=array();
		for($i=0;$i<100;$i++)
		{
		for($j=0;$j<100;$j++)
			{
				if($dungeon[$i][$j]==2)
				{
					$c=$i;
					$d=$j;
					$dungeon[$i][$j]="x";
					$ujrae=1;
					break 2;
				}
				else
				{
					$ujrae=2;
				}
				
			}
		}
		if($ujrae!=2)
		{
		$ok=1;
		
		$alaplist[0]=$a.",".$b;	
		for($i=0;$i<count($alaplist);$i++)
		{
		$alap_a=explode(",",$alaplist[$i]);	
		szinez($alap_a[0],$alap_a[1]);
		$ok=ellenoriz($alap_a[0],$alap_a[1]);
		if($ok==3)
		{
		for($k=0;$k<$roomNumber;$k++)
		{
			$room=$rooms[$k];
			$x=$room->getXpoz();
			$y=$room->getYpoz();
			$id=$room->getId();
			
			if($x==$a && $y==$b)
			{
				$room->setconne("1");
			}
		}
		$kod=$dungeon[$alap_a[0]][$alap_a[1]];
		dungeonFloor($kod,$c,$d,"1");
			break;
		}
		}
		rendez();
		$dungeon[$a][$b]='z';
		
		generateFloor($c,$d);
					
		}
}
function szinez($i,$j)
{
	global $alaplist;
	global $dungeon;
	if($dungeon[$i][$j]!='o')
	{
		$nev=$dungeon[$i][$j];
	}
	else
	{
		$nev='W';
	}
	if((($i+1)<100) && $dungeon[$i+1][$j]=='0'){$dungeon[$i+1][$j]=$nev.",1";array_push($alaplist,($i+1).",".$j);}
	if((($i-1)>0) && $dungeon[$i-1][$j]=='0'){$dungeon[$i-1][$j]=$nev.",2";array_push($alaplist,($i-1).",".$j);}
	if((($j+1)<100) && $dungeon[$i][$j+1]=='0'){$dungeon[$i][$j+1]=$nev.",3";array_push($alaplist,$i.",".($j+1));}
	if((($j-1)>0) && $dungeon[$i][$j-1]=='0'){$dungeon[$i][$j-1]=$nev.",4";array_push($alaplist,$i.",".($j-1));}
	
}
function ellenoriz($i,$j)
{
	global $dungeon;
	$ok=3;
	if((($i+1)<100) && $dungeon[$i+1][$j]=='x'){return $ok;}
	if((($i-1)>0) && $dungeon[$i-1][$j]=='x'){return $ok;}
	if((($j+1)<100) && $dungeon[$i][$j+1]=='x'){return $ok;}
	if((($j-1)>0) && $dungeon[$i][$j-1]=='x'){return $ok;}
}
function dungeonFloor($kod,$i,$j,$hely)
	{
		global $dungeon;
		if($hely=="1")
		{$dungeon[$i][$j]='c';}
	else
		{
		$dungeon[$i][$j]=5;
		}
		if(strlen($kod)>1)
		{
		if((($i+1)<100) && $dungeon[($i+1)][$j]==$kod){$kod=substr($kod, 0, -2);dungeonFloor($kod,($i+1),$j,"2");}
		if((($i-1)>0) && $dungeon[($i-1)][$j]==$kod){$kod=substr($kod, 0, -2);dungeonFloor($kod,($i-1),$j,"2");}
		if((($j+1)<100) && $dungeon[$i][($j+1)]==$kod){$kod=substr($kod, 0, -2);dungeonFloor($kod,$i,($j+1),"2");}
		if((($j-1)>0) && $dungeon[$i][($j-1)]==$kod){$kod=substr($kod, 0, -2);dungeonFloor($kod,$i,($j-1),"2");}
		}
		
	}
function rendez()
{
	global $dungeon;
	for($i=0;$i<100;$i++)
		{
		for($j=0;$j<100;$j++)
			{
				if(($dungeon[$i][$j]!='2') && ($dungeon[$i][$j]!='1') && ($dungeon[$i][$j]!='3') && ($dungeon[$i][$j]!='4') && ($dungeon[$i][$j]!='5') && ($dungeon[$i][$j]!='6') && ($dungeon[$i][$j]!='x') && ($dungeon[$i][$j]!='c') && ($dungeon[$i][$j]!='z'))
				{
					$dungeon[$i][$j]=0;
				}
			}
		}
}	

function tisztit()
{
	global $dungeon;
	global $roomNumber;
	global $rooms;
	
	for($k=0;$k<$roomNumber;$k++)
		{
			$room=$rooms[$k];
			$conn=$room->getconne();
			if($conn=="0")
			{
			$x=$room->getXpoz();
			$y=$room->getYpoz();
			$dim=$room->getDim();
			for($i=$x;$i<($x+$dim);$i++)
			{
			for($j=$y;$j<($y+$dim);$j++)
			{
			$dungeon[$i][$j]=0;
			}
			}
			}
		}
	
}
	?>