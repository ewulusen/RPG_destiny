<?php
include_once("../Scripts/db.php");
@session_start();
$charok=array();
		$sql="SELECT * FROM `karakterl` WHERE KAR_ID='".$_COOKIE['cid']."'";
		$res=$GLOBALS['conn']->query($sql);
		
		$sor=$res->fetch_array(MYSQLI_BOTH);
		
		echo $sor['K_AGI'];//1
			
		
		
?>