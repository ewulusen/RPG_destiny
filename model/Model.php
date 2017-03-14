<?php
@include_once("../Scripts/db.php");
class Model {

	public function loginCheck($username,$password)
	{
		
		$sql="SELECT * FROM `felhasz` WHERE FH_FHNEV='$username' AND FH_JEL='$password'";
		//echo $sql;
        $eredmeny=$GLOBALS['conn']->query($sql) or die("hiba a felhasználó lekérésénél") ;
		$row_count = $eredmeny->num_rows;
if ( $row_count!= 1) {
	return 0;
}
else {
	$sor = $eredmeny->fetch_array(MYSQLI_BOTH);
	echo'<script>
	makecookie("pid","'.$sor['FH_ID'].'")
	makecookie("nev","'.$sor['FH_FHNEV'].'")
	</script>';
		setcookie('pid',$sor['FH_ID'],time()+3600);
		setcookie('nev',$sor['FH_FHNEV'],time()+3600);
return 1;

	}}
	
	public function getNormalStats($kaszt,$faj)
	{
		$statok=array();
		$sql=$GLOBALS['conn']->query("SELECT * FROM fajok,kasztok WHERE fajok.F_FAJ='$faj' AND  kasztok.F_FAJ='$kaszt'") or die("hiba az alap statok lekérésénél");
		
		while ($sor=$sql->fetch_array(MYSQLI_BOTH)){	
		for($i=0;$i<20;$i++)
			array_push($statok,$sor[$i]);
		}
		
		return $statok;
		
	}
public function upChar($values)
	{		$stat=explode(',',$values);
	$sql="update `karakterl` set`K_STR`='".$stat['0']."', `K_AGI`='".$stat['1']."', `K_REF`='".$stat['4']."', 
		`K_DEF`='".$stat['2']."',`K_DEX`='".$stat['3']."', `K_INT`='".$stat['5']."', `K_LUC`='".$stat['7']."', `K_CON`='".$stat['6']."',`K_APOINT`='".$stat['8']."'
		where KAR_ID='".$stat['9']."'";
		echo $sql;
		$GLOBALS['conn']->query($sql);
		header ("location:index.php?hol=main");
}
public function getAllChar()
	{
		$charok=array();
		$sql=$GLOBALS['conn']->query("SELECT * FROM `karakterl`,fegyverek,pancel WHERE K_KIE='".$_COOKIE['pid']."' and fegyverek.F_ID=K_WEAPONS and pancel.P_ID=K_ARMOR");
		while ($sor=$sql->fetch_array(MYSQLI_BOTH)){	
			array_push($charok,$sor['KAR_FAJ'].$sor['KAR_KASZT'].','.$sor['KAR_ID'].','.$sor['K_NEV'].','.$sor['KAR_KASZT'].','.$sor['K_PENZ'].','.$sor['K_LVL'].','.$sor['K_STR'].','.$sor['F_DMG'].','.$sor['P_AC'].','.$sor['K_CON'].','.$sor['K_DEF'].','.$sor['K_INT'].','.$sor['KAR_FAJ'].','.$sor['K_AGI'].'');
		}
		return $charok;
		
	}
	public function getChar($cid)
	{
		$charok=array();
		$sql="SELECT `K_STR`, `K_AGI`, `K_REF`, 
		`K_DEF`,K_LVL,`K_DEX`, `K_INT`, `K_LUC`, F_DMG,`K_CON`, 
		`P_AC`,K_NEV,KAR_FAJ,KAR_KASZT,K_APOINT,K_PENZ FROM `karakterl`,fegyverek,pancel WHERE KAR_ID='".$cid."' and fegyverek.F_ID=K_WEAPONS and pancel.P_ID=K_ARMOR";
		$res=$GLOBALS['conn']->query($sql);
		//echo $sql;
		while ($sor=$res->fetch_array(MYSQLI_BOTH)){	
			array_push($charok,$sor['K_STR']);//0
			array_push($charok,$sor['K_AGI']);//1
			array_push($charok,$sor['K_REF']);//2
			array_push($charok,$sor['K_DEF']);//3
			array_push($charok,$sor['K_DEX']);//4
			array_push($charok,$sor['K_INT']);//5
			array_push($charok,$sor['K_LUC']);//6
			array_push($charok,$sor['K_CON']);//7
			array_push($charok,$sor['F_DMG']);//8
			array_push($charok,$sor['P_AC']);//9
			array_push($charok,$sor['KAR_FAJ']);//10
			array_push($charok,$sor['KAR_KASZT']);//11
			array_push($charok,$sor['K_LVL']);//12
			array_push($charok,$sor['K_NEV']);//13
			array_push($charok,$sor['K_APOINT']);//14
			array_push($charok,$sor['K_PENZ']);//15
		}
		return $charok;
		
	}
public function startEvent()
	{
		$charok=array();
		$sql="SELECT `K_STR`, `K_AGI`, `K_REF`, 
		`K_DEF`,K_LVL,`K_DEX`, `K_INT`, `K_LUC`, F_DMG,`K_CON`, 
		`P_AC`,KAR_FAJ,KAR_KASZT FROM `karakterl`,fegyverek,pancel WHERE KAR_ID='".$_COOKIE['cid']."' and fegyverek.F_ID=K_WEAPONS and pancel.P_ID=K_ARMOR";
		$res=$GLOBALS['conn']->query($sql);
		
		while ($sor=$res->fetch_array(MYSQLI_BOTH)){	
			array_push($charok,$sor['K_STR']);//0
			array_push($charok,$sor['K_AGI']);//1
			array_push($charok,$sor['K_REF']);//2
			array_push($charok,$sor['K_DEF']);//3
			array_push($charok,$sor['K_DEX']);//4
			array_push($charok,$sor['K_INT']);//5
			array_push($charok,$sor['K_LUC']);//6
			array_push($charok,$sor['K_CON']);//7
			array_push($charok,$sor['F_DMG']);//8
			array_push($charok,$sor['P_AC']);//9
			array_push($charok,$sor['KAR_FAJ']);//10
			array_push($charok,$sor['KAR_KASZT']);//11
			array_push($charok,$sor['K_LVL']);//12
		}
		return $charok;
		
	}
public function getLoot($prefix,$db,$lvl)
{
	$sql="select ".$prefix."_ID,".$prefix."_NEV from ".$db." where ".$prefix."_SZINT<=".$lvl."";
	$res=$GLOBALS['conn']->query($sql);
	$szam=$res->num_rows;
	$num=rand(1,$szam);
	$i=1;
	while ($sor=$res->fetch_array(MYSQLI_BOTH)){
	if($i==$num)
	{
		$string=$prefix.",".$sor[$prefix.'_ID'].",".$sor[$prefix.'_NEV'];
	}
		$i++;
	}
	return $string;
}
public function getEnemy($i,$j)
{
	@session_start();
	$sql="select E_ID from enemy where  E_X=".$i." and E_Y=".$j." and G_ID=".$_SESSION['dname']."";
	//echo $sql;
	$res=$GLOBALS['conn']->query($sql);
	$beast=$res->fetch_array(MYSQLI_BOTH);
	$beast_id=$beast['E_ID'];
	$enemy=array();
	$sql="select * from beast where B_ID=".$beast_id."";
	$res=$GLOBALS['conn']->query($sql);
	$sor=$res->fetch_array(MYSQLI_BOTH);
	//echo $sql;
				array_push($enemy,$sor['B_NEV']);//0
				array_push($enemy,$sor['B_STR']);//1
				array_push($enemy,$sor['B_AGI']);//2
				array_push($enemy,$sor['B_DEX']);//3
				array_push($enemy,$sor['B_DEF']);//4
				array_push($enemy,$sor['B_REF']);//5
				array_push($enemy,$sor['B_INT']);//6
				array_push($enemy,$sor['B_LUC']);//7
				array_push($enemy,$sor['B_CON']);//8
				array_push($enemy,$sor['B_XP']);//9
				array_push($enemy,$sor['B_LVL']);//10
				array_push($enemy,$beast_id);//11		
setcookie("enemyID",$beast_id);	
$_COOKIE['enemyID']=$beast_id;

	return $enemy;
}
public function plUpdate($xp,$wol,$loot)
{
if($wol=='L')
{
	$sql='select K_XP from karakterl where KAR_ID='.$_COOKIE['cid'];
	$eredmeny=$GLOBALS['conn']->query($sql);
	while($sor=$eredmeny->fetch_array(MYSQLI_BOTH))
	{
		$n_xp=$sor['K_XP'];
	}
	if(($n_xp-$xp)>0)
	{
		$sql='update karakterl set K_XP='.($n_xp-$xp).' where KAR_ID='.$_COOKIE['cid'];
		$GLOBALS['conn']->query($sql);
		
	}
	return "0";
}
if($wol=='W')
{
	for($i=0;$i<count($loot);$i++)
		{
			$loot_a=explode(',',$loot[$i]);
			if($loot_a[0]=='M')
			{
				$sql='update karakterl set K_PENZ=K_PENZ+'.$loot_a[2].' where KAR_ID='.$_COOKIE['cid'];
				$GLOBALS['conn']->query($sql);
			}
			else
			{
				$sql='insert into itemek_dungeon (I_PID,I_FID,I_FAJ,I_ON) values ("'.$_COOKIE['cid'].'","'.$loot_a[1].'","'.$loot_a[0].'","0")';
				//echo $sql;
				$GLOBALS['conn']->query($sql);
			}
		}
	$sql='update karakterl set K_XP=K_XP+'.$xp.' where KAR_ID='.$_COOKIE['cid'];
	$GLOBALS['conn']->query($sql);
	$sql='select K_LVL,K_XP from karakterl where KAR_ID='.$_COOKIE['cid'];
	$eredmeny=$GLOBALS['conn']->query($sql);
	while($sor=$eredmeny->fetch_array(MYSQLI_BOTH))
	{
		$n_xp=$sor['K_XP'];
		$lvl=$sor['K_LVL'];
	}
	
	$sql='select xp from xp where lvl='.$lvl;
	$eredmeny=$GLOBALS['conn']->query($sql);
	while($sor=$eredmeny->fetch_array(MYSQLI_BOTH))
	{
		$a_xp=$sor['xp'];
	}
	if($a_xp<$n_xp)
	{
		$sql='update karakterl set K_XP='.($n_xp-$a_xp).',K_LVL=K_LVL+1,K_APOINT=K_APOINT+5 where KAR_ID='.$_COOKIE['cid'];
		$GLOBALS['conn']->query($sql);
		return "1";
	}
	else
	{
		return "0";
	}
	 
}
}
public function gameFieldCleaning()
{
	@session_start();
	$sql="select * from enemy where G_ID=".$_SESSION['dname']." and E_ID=".$_COOKIE['enemyID']."";
	$res=$GLOBALS['conn']->query($sql);
	$sor=$res->fetch_array(MYSQLI_BOTH);
	$sql="update game set P_X=".$sor['E_X'].",P_Y=".$sor['E_Y']." where G_ID=".$_SESSION['dname']."";
	$GLOBALS['conn']->query($sql);
	$sql="update enemy set EL=0 where G_ID=".$_SESSION['dname']." and E_ID=".$_COOKIE['enemyID']."";
	$GLOBALS['conn']->query($sql);
	unset($_COOKIE['enemyID']);
	setcookie('enemyID', '', time()-3600, '/teszt');
	unset($_COOKIE['xp']);
	setcookie('xp', '', time()-3600, '/teszt');
}

public function getCharItems()
{
	$return_a=array();
	$sql="select * from itemek where I_PID='".$_COOKIE['cid']."'  and I_ON=0";
	$eredmeny=$GLOBALS['conn']->query($sql);
	while($sor=$eredmeny->fetch_array(MYSQLI_BOTH))
	{
		if($sor['I_FAJ']=="F")
		{
			$sql1="select * from fegyverek where F_ID=".$sor['I_FID']."";
			$res=$GLOBALS['conn']->query($sql1);
			$item=$res->fetch_array(MYSQLI_BOTH);
			array_push($return_a,$sor['I_FAJ']."&".$sor['I_FID']."&".$item["F_NEV"]."&".
			($item['F_AR']/2)."&".$item['F_SZAM']."&".$item['F_MIT']."&".$item['F_DMG']."&".$sor['I_ID']."&".$item['F_TIPUS']);
		}
		if($sor['I_FAJ']=="P")
		{
			$sql1="select * from pancel where P_ID=".$sor['I_FID']."";
			$res=$GLOBALS['conn']->query($sql1);
			$item=$res->fetch_array(MYSQLI_BOTH);
			array_push($return_a,$sor['I_FAJ']."&".$sor['I_FID']."&".$item["P_NEV"]."&".
			($item['P_AR']/2)."&".$item['P_SZAM']."&".$item['P_MIT']."&".$item['P_AC']."&".$sor['I_ID']."&".$item['F_TIPUS']);
		}
		if($sor['I_FAJ']=="NY")
		{
			$sql1="select * from nyaklanc where NY_ID=".$sor['I_FID']."";
			$res=$GLOBALS['conn']->query($sql1);
			$item=$res->fetch_array(MYSQLI_BOTH);
			array_push($return_a,$sor['I_FAJ']."&".$sor['I_FID']."&".$item["NY_NEV"]."&".
			($item['NY_AR']/2)."&".$item['NY_SZAM']."&".$item['NY_MIT']."&".$sor['I_ID']);
		}
		if($sor['I_FAJ']=="GY")
		{
			$sql1="select * from gyuruk where GY_ID=".$sor['I_FID']."";
			$res=$GLOBALS['conn']->query($sql1);
			$item=$res->fetch_array(MYSQLI_BOTH);
			array_push($return_a,$sor['I_FAJ']."&".$sor['I_FID']."&".$item["GY_NEV"]."&".
			($item['GY_AR']/2)."&".$item['GY_SZAM']."&".$item['GY_MIT']."&".$sor['I_ID']);
		}
		if($sor['I_FAJ']=="PO")
		{
			$sql1="select * from potion where PO_ID=".$sor['I_FID']."";
			$res=$GLOBALS['conn']->query($sql1);
			$item=$res->fetch_array(MYSQLI_BOTH);
			array_push($return_a,$sor['I_FAJ']."&".$sor['I_FID']."&".$item["PO_NEV"]."&".
			($item['PO_AR']/2)."&".$item['PO_SZAM']."&".$item['PO_MIT']."&".$sor['I_ID']);
		}
		
	}
	return $return_a;
}

public function getCharOnItems()
{
	$return_a=array();
	$sql="select * from itemek where I_PID='".$_COOKIE['cid']."'  and I_ON=1";
	$eredmeny=$GLOBALS['conn']->query($sql);
	while($sor=$eredmeny->fetch_array(MYSQLI_BOTH))
	{
		if($sor['I_FAJ']=="F")
		{
			$sql1="select * from fegyverek where F_ID=".$sor['I_FID']."";
			$res=$GLOBALS['conn']->query($sql1);
			$item=$res->fetch_array(MYSQLI_BOTH);
			array_push($return_a,$sor['I_FAJ']."&".$sor['I_FID']."&".$item["F_NEV"]."&".
			($item['F_AR']/2)."&".$item['F_SZAM']."&".$item['F_MIT']."&".$item['F_DMG']."&".$sor['I_ID']."&".$item['F_TIPUS']);
		}
		if($sor['I_FAJ']=="P")
		{
			$sql1="select * from pancel where P_ID=".$sor['I_FID']."";
			$res=$GLOBALS['conn']->query($sql1);
			$item=$res->fetch_array(MYSQLI_BOTH);
			array_push($return_a,$sor['I_FAJ']."&".$sor['I_FID']."&".$item["P_NEV"]."&".
			($item['P_AR']/2)."&".$item['P_SZAM']."&".$item['P_MIT']."&".$item['P_AC']."&".$sor['I_ID']."&".$item['F_TIPUS']);
		}
		if($sor['I_FAJ']=="NY")
		{
			$sql1="select * from nyaklanc where NY_ID=".$sor['I_FID']."";
			$res=$GLOBALS['conn']->query($sql1);
			$item=$res->fetch_array(MYSQLI_BOTH);
			array_push($return_a,$sor['I_FAJ']."&".$sor['I_FID']."&".$item["NY_NEV"]."&".
			($item['NY_AR']/2)."&".$item['NY_SZAM']."&".$item['NY_MIT']."& &".$sor['I_ID']);
		}
		if($sor['I_FAJ']=="GY")
		{
			$sql1="select * from gyuruk where GY_ID=".$sor['I_FID']."";
			$res=$GLOBALS['conn']->query($sql1);
			$item=$res->fetch_array(MYSQLI_BOTH);
			array_push($return_a,$sor['I_FAJ']."&".$sor['I_FID']."&".$item["GY_NEV"]."&".
			($item['GY_AR']/2)."&".$item['GY_SZAM']."&".$item['GY_MIT']."& &".$sor['I_ID']);
		}
				
	}
	return $return_a;
}


public function getShopItems()
{
	$return_a=array();
	
			$sql1="select * from fegyverek ";
			$res=$GLOBALS['conn']->query($sql1);
			while($item=$res->fetch_array(MYSQLI_BOTH))
			{
			$item_a=explode(',',$item['F_KASZT']);
			if(in_array($_COOKIE['kaszt'],$item_a) || $item['F_KASZT']=='any')
			{
			array_push($return_a,"F&".$item['F_ID']."&".$item["F_NEV"]."&".
			($item['F_AR']*1.25)."&".$item['F_SZAM']."&".$item['F_MIT']."&".$item['F_DMG']);
			}
			}
			$sql1="select * from pancel ";
			$res=$GLOBALS['conn']->query($sql1);
			while($item=$res->fetch_array(MYSQLI_BOTH))
			{
			$item_a=explode(',',$item['P_KASZT']);
			if(in_array($_COOKIE['kaszt'],$item_a) || $item['P_KASZT']=='any')
			{
			array_push($return_a,"P&".$item['P_ID']."&".$item["P_NEV"]."&".
			($item['P_AR']*1.25)."&".$item['P_SZAM']."&".$item['P_MIT']."&".$item['P_AC']);
			}
			}
			$sql1="select * from nyaklanc ";
			$res=$GLOBALS['conn']->query($sql1);
			while($item=$res->fetch_array(MYSQLI_BOTH))
			{
			$item_a=explode(',',$item['NY_KASZT']);
			if(in_array($_COOKIE['kaszt'],$item_a) || $item['NY_KASZT']=='any')
			{
			array_push($return_a,"NY&".$item['NY_ID']."&".$item["NY_NEV"]."&".
			($item['NY_AR']*1.25)."&".$item['NY_SZAM']."&".$item['NY_MIT']);
			}
			}
			$sql1="select * from gyuruk ";
			$res=$GLOBALS['conn']->query($sql1);
			while($item=$res->fetch_array(MYSQLI_BOTH))
			{
			$item_a=explode(',',$item['GY_KASZT']);
			if(in_array($_COOKIE['kaszt'],$item_a) || $item['GY_KASZT']=='any')
			{
			array_push($return_a,"GY&".$item['GY_ID']."&".$item["GY_NEV"]."&".
			($item['GY_AR']*1.25)."&".$item['GY_SZAM']."&".$item['GY_MIT']);
			}
			}
			$sql1="select * from potion ";
			$res=$GLOBALS['conn']->query($sql1);
			while($item=$res->fetch_array(MYSQLI_BOTH))
			{
			$item_a=explode(',',$item['PO_KASZT']);
			if(in_array($_COOKIE['kaszt'],$item_a) || $item['PO_KASZT']=='any')
			{
			array_push($return_a,"PO&".$item['PO_ID']."&".$item["PO_NEV"]."&".
			($item['PO_AR']*1.25)."&".$item['PO_SZAM']."&".$item['PO_MIT']);
			}
			}
			
	return $return_a;
}

public function selItem($id,$money)
{
	$sql="delete  from itemek where I_ID='".$id."'";
	
	$GLOBALS['conn']->query($sql);
	$sql="update karakterl set K_PENZ=K_PENZ+".$money." where KAR_ID='".$_COOKIE['cid']."'";
	$GLOBALS['conn']->query($sql);
}
public function buyItem($typ,$id,$money)
{
	$sql="insert into itemek (`I_PID`, `I_FID`, `I_FAJ`, `I_ON`) VALUES ( '".$_COOKIE['cid']."','".$id."','".$typ."','0')";
	$GLOBALS['conn']->query($sql);
	$sql="update karakterl set K_PENZ=K_PENZ-".$money." where KAR_ID='".$_COOKIE['cid']."'";
	$GLOBALS['conn']->query($sql);
}
public function generetaGame($id,$x,$y,$ch,$emy,$tr)
{
$sql="select G_ID from game where G_NAME='".$id."'";
$res=$GLOBALS['conn']->query($sql);	
$row_count = $res->num_rows;
if($row_count>0)
{
	$id=$res->fetch_array(MYSQLI_BOTH);
	$sql1="update game set P_X='".$x."', P_Y='".$y."', where G_NAME= '".$id."'";
	$GLOBALS['conn']->query($sql1);
	$res=$id;
}
else
{
	$sql1="insert into game (`P_X`, `P_Y`, `G_NAME`) values('".$x."','".$y."','".$id."')";
$GLOBALS['conn']->query($sql1);	
$res=$GLOBALS['conn']->insert_id;
}
for($i=0;$i<count($emy);$i++)
{
	$sql="select B_ID from beast where B_LVL<=".$_COOKIE['lvl']." order by rand() limit 1"; 
	$ered=$GLOBALS['conn']->query($sql);
	$beast=$ered->fetch_array(MYSQLI_BOTH);
	$beast_id=$beast['B_ID'];
	$exp=explode(',',$emy[$i]);
	$sql1="INSERT INTO `enemy`(`E_ID`, `E_X`, `E_Y`, `G_ID`) VALUES (".$beast_id.",".$exp[0].",".$exp[1].",".$res.")";
	$GLOBALS['conn']->query($sql1);

}
for($i=0;$i<count($ch);$i++)
{
	$exp=explode(',',$ch[$i]);
	$sql1="INSERT INTO `chest`(`C_ID`, `C_X`, `C_Y`, `G_ID`) VALUES (1,".$exp[0].",".$exp[1].",".$res.")";
	$GLOBALS['conn']->query($sql1);

}
for($i=0;$i<count($tr);$i++)
{
	$exp=explode(',',$tr[$i]);
	$sql1="INSERT INTO `trap`(`T_ID`, `T_X`, `T_Y`, `G_ID`) VALUES (1,".$exp[0].",".$exp[1].",".$res.")";
	$GLOBALS['conn']->query($sql1);

}
return $res;
}	
public function getPlayerPozition($iid)
{
	$sql="select * from game where G_ID='".$iid."'";
	$res=$GLOBALS['conn']->query($sql);	
	$row=$res->fetch_array(MYSQLI_BOTH);
	$return=$row['P_X'].",".$row['P_Y'];
	return $return;
}
public function newPlayerPozition($x,$y)
{
	$sql1="update game set P_X='".$x."', P_Y='".$y."' where G_ID= '".$_SESSION['dname']."'";
	//echo $sql1;
	$GLOBALS['conn']->query($sql1);
}
public function enemyLive($i,$j)
{
$sql="select * from enemy where G_ID=".$_SESSION['dname']." and E_X=".$i." and E_Y=".$j."";	
$res=$GLOBALS['conn']->query($sql);	
$row_count = $res->num_rows;
if($row_count==0)
{
return 1;	//nincs ott ellenfél
}
else
{
while($row=$res->fetch_array(MYSQLI_BOTH))
{
if($row['EL']==0)
{
return 2;	//ott van csak halott
}
else
{
return 3;// ott az ellenfél
}
}
}
}
public function chestOpen($i,$j)
{
$sql="select * from chest where G_ID=".$_SESSION['dname']." and C_X=".$i." and C_Y=".$j." and EL=0";	
$res=$GLOBALS['conn']->query($sql);	
$row_count = $res->num_rows;
return $row_count;
}
public function getEnemysPozition($id)
{
	$sql="select * from enemy where G_ID='".$id."' and EL=1";
	$res=$GLOBALS['conn']->query($sql);
	$enemys=array();
	while($row=$res->fetch_array(MYSQLI_BOTH))
	{
		array_push($enemys,$row['E_X'].",".$row['E_Y']);
	}
	return $enemys;
}
public function getXpToLVL($id)
{
	$sql="select K_XP,K_LVL from karakterl where KAR_ID=".$id."";	
	$res=$GLOBALS['conn']->query($sql);	
	$row=$res->fetch_array(MYSQLI_BOTH);
	$lvl=$row['K_LVL'];
	$xp=$row['K_XP'];
	$sql="select lvl,xp from xp where lvl=".$lvl."+1";	
	$res=$GLOBALS['conn']->query($sql);	
	$row=$res->fetch_array(MYSQLI_BOTH);
	$ret=$lvl.",".$xp.",".$row['xp'];
	return $ret;
}
}

?>