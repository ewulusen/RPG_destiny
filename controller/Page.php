<?php
@include_once("../model/Model.php");
class Page {
		public $model;
public function __construct()  
    {  
        $this->model = new Model();

    } 
	public function show_Login()
	{
		
	}
	public function show_Login_error()
	{
		header ("location:index.php?hol=loginPage&mit=errordan");
	}
	public function getNormalStats($kaszt,$faj)
	{

		$res=$this->model->getNormalStats($kaszt,$faj);
		
			
		return $res;
	}
	
		public function getAllChar()
	{

		$res=$this->model->getAllChar();
		
			
		return $res;
	}
	
	public function getCharItems()
	{
		$res=$this->model->getCharItems();
		
			
		return $res;
	}
	public function getShopItems()
	{
		$res=$this->model->getShopItems();
		
			
		return $res;
	}
	public function selItem($id,$M)
	{
		$this->model->selItem($id,$M);
		
	}
		public function buyItem($T,$id,$M)
	{
		$this->model->buyItem($T,$id,$M);
		
	}
	
	public function getDungeonID ()
	{
	//echo "getDungeonID<br>";
@session_start();
$files = scandir('../dungeons/');
$fajlok=array();
foreach($files as $file) {
array_push($fajlok,$file);
}

$dn=rand(4,count($fajlok)-2);
$id=$fajlok[$dn];
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
				if($dn[$i][$j]==3)
				{
					array_push($ch,$i.",".$j);
				}	
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
$ret=$this->model->generetaGame($dname,$px,$py,$ch,$emy,$tr);	
$_SESSION['dn']=$id;	
$_SESSION['dname']=$ret;//last insert date
return $id;
}
public function getDungeon ($id,$iid)
{
	//echo "getDungeon<br>";
$poz=$this->model->getPlayerPozition($iid);
$myfile = fopen('../dungeons/'.$id, "r") or die("Unable to open file!");
$json_dn=fread($myfile,filesize('../dungeons/'.$id));
fclose($myfile);
//print_r($json_dn)."dn<br>";
$dn=json_decode($json_dn);
//print_r($dn)."dn<br>";
$tr=0;
$ch=0;
$emy=0;
$exp=explode(",",$poz);
$x=$exp[0];
$y=$exp[1];
$dn[$x][$y]=7;
/*1=padló
	2=ajtó
	3=láda
	4=ellenség
	5=folyosó
	6=csapda
	7=te
	8=kijárat*/
for($i=0;$i<100;$i++)
		{
		for($j=0;$j<100;$j++)
			{
				if($dn[$i][$j]==3)
				{
					$ch++;
				}	
				if($dn[$i][$j]==4)
				{
					$ok=$this->model->enemyLive($i,$j);
					if($ok==3)
					{
					$emy++;
					}
					if($ok==1)
					{
						$dn[$i][$j]=1;
					}
				}	
				if($dn[$i][$j]==6)
				{
					$tr++;
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
			//echo $ch."chest".$tr."trap".$emy."enemy".$x."-".$y."player";
$epoz=$this->model->getEnemysPozition($iid);	
for($z=0;$z<count($epoz);$z++)
{
	$exp1=explode(",",$epoz[$z]);
	$enemyx=$exp1[0];
	$enemyy=$exp1[1];
	$dn[$enemyx][$enemyy]=4;
	
}	
			array_push($dn,$ch);//100
			array_push($dn,$tr);//101
			array_push($dn,$emy);//102
			array_push($dn,$x);//103
			array_push($dn,$y);//104
			
return $dn;

	}

public function move($jel,$lepes,$dn)
{

		for($i=0;$i<100;$i++)
		{
		for($j=0;$j<100;$j++)
			{
				if($dn[$i][$j]==7)
				{
				//echo "<br>".$dn[$i][$j]."move<br>";
					$x=$i;
					$y=$j;
					break 2;
				}
			}
		}
	//jobbra balra lépés
		if($lepes==1)
		{
			if($jel=='m' && ($y-1)>0)
			{
			if($dn[$i][($y-1)]!='0')
			{
			$this->model->newPlayerPozition($x,($y-1));
			}	
			}
			if($jel=="p" && ($y+1)<100)
			{
				if($dn[$i][($y+1)]!='0')
			{
			$this->model->newPlayerPozition($x,($y+1));
			}	
			}
		}
		if($lepes==100)
		{
			if($jel=='m' && ($x-1)>0)
			{
				if($dn[($x-1)][$y]!='0')
			{
			$this->model->newPlayerPozition(($x-1),$y);
			}	
			}
			if($jel=="p" && ($x+1)<100)
			{
				if($dn[($x+1)][$y]!='0')
			{
			$this->model->newPlayerPozition(($x+1),$y);
			}	
			}
		}
		
		
		
}
public function getEnemy($i,$j)
{
	$res=$this->model->getEnemy($i,$j);
	return $res;
}
public function getPlayer()
{
	$res=$this->model->startEvent();
	return $res;
}
public function enemyLive($i,$j)
{
	$res=$this->model->enemyLive($i,$j);
	//echo $res."<br>";
	return $res;
}public function chestOpen($i,$j)
{
	$res=$this->model->chestOpen($i,$j);
	return $res;
}
public function getChar($values)
	{
				$res=$this->model->getChar($values);
		return $res;
	}
}

?>