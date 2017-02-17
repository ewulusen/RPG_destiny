<?php
/*a gettel kapott értékeket be insertálom a karakterlap táblázatba és automatán feltöltöm a heal spelt az abilitiit közé
*/
include_once("../Scripts/db.php");
@session_start();
$stat=explode(',',$_GET['values']);
		$res=$GLOBALS['conn']->query("INSERT INTO `karakterl`(`KAR_KASZT`, `KAR_FAJ`, `K_STR`, `K_AGI`, `K_REF`, 
		`K_DEF`,`K_DEX`, `K_INT`, `K_LUC`, `K_CON`,`K_APOINT`,`K_NEV`,K_KIE,K_WEAPONS,K_ARMOR) 
		VALUES ('".$stat['1']."','".$stat['0']."','".$stat['2']."','".$stat['3']."','".$stat['6']."','".$stat['4']."','".$stat['5']."','".$stat['7']."','".$stat['9']."','".$stat['8']."','".$stat['10']."','".$stat['11']."',
		'".$_COOKIE['pid']."','181','25')");
		$res=$GLOBALS['conn']->insert_id;
		$GLOBALS['conn']->query("insert into `play_ab`(`PAB_P`, `PAB_A`, `PAB_SZ`) VALUES (".$res.",1,1)");
		$GLOBALS['conn']->query("INSERT INTO `itemek`(`I_PID`, `I_FID`, `I_FAJ`, `I_ON`) VALUES (".$res.",181,'F',1)");
		$GLOBALS['conn']->query("INSERT INTO `itemek`(`I_PID`, `I_FID`, `I_FAJ`, `I_ON`) VALUES (".$res.",25,'P',1)");
		unset($_SESSION['kaszt']);
		unset($_SESSION['faj']);
		setcookie('kaszt', '', time()-3600, '/');
		setcookie('faj', '', time()-3600, '/');
		setcookie('cid',$res);
		echo $res;
?>