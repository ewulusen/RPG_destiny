<?php
include_once("../Scripts/db.php");
		$sql="insert into felhasz (FH_FHNEV,FH_JEL) values ('".$_GET['username']."','".$_GET['psw']."')";
		//echo $sql;
		$GLOBALS['conn']->query($sql);
?>