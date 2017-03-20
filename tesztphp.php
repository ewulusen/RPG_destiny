<?php
include_once("Scripts/db.php");
@session_start();
$id=$_GET['id'];
$sql="select * from teszt where p1='".$id."' or p2='".$id."'";

$res=$GLOBALS['conn']->query($sql) or die("hiba");
	
$sor=$res->fetch_array(MYSQLI_BOTH);
		if($sor['p1']==$id)
		{
			$sql="update  teszt set p1b=1, p2b=0 where p1='".$id."' or p2='".$id."'";
			$GLOBALS['conn']->query($sql) or die("hiba");	
		}
		if($sor['p2']==$id)
		{
			$sql="update  teszt set p1b=0, p2b=1 where p1='".$id."' or p2='".$id."'";
			$GLOBALS['conn']->query($sql) or die("hiba");
		}
		
	
?>