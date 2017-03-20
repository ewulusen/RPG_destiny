<?php
include_once("Scripts/db.php");
@session_start();
$id=$_GET['id'];
$sql="select * from teszt where p1='".$id."' or p2='".$id."'";
$res=$GLOBALS['conn']->query($sql) or die("hiba");
	
$sor=$res->fetch_array(MYSQLI_BOTH);
		if($sor['p1']==$id)
		{
			if($sor['p2b']==1)
			{
				echo"player 2 beszélt";
			}
		}
		if($sor['p2']==$id)
		{
			if($sor['p1b']==1)
			{
				echo"player 1 beszélt";
			}
		}
		
	
?>