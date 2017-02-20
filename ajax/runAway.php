<?php
include_once("../Scripts/db.php");
@session_start();
$sql="delete from game where G_ID='".$_SESSION['dname']."' "; 
$GLOBALS['conn']->query($sql) or die("hiba a játék törlése közben");
$sql="delete from chest where G_ID='".$_SESSION['dname']."' "; 
$GLOBALS['conn']->query($sql) or die("hiba a ládák törlése közben");
$sql="delete from enemy where G_ID='".$_SESSION['dname']."' "; 
$GLOBALS['conn']->query($sql) or die("hiba a ellenfelek törlése közben");
$sql="delete from trap where G_ID='".$_SESSION['dname']."' "; 
$GLOBALS['conn']->query($sql) or die("hiba a csapdák törlése közben");
$sql="delete from itemek_dungeon where  I_PID='".$_COOKIE['cid']." '"; 
$GLOBALS['conn']->query($sql) or die("hiba az itemek törlése közben");
unset($_SESSION['kocka']);
$_COOKIE['end']=1;
unset($_COOKIE['enemyID']);
unset($_COOKIE['xp']);
unset($_SESSION['dn']);
setcookie('enemyID', '', time()-3600, '/');
setcookie('end', '1', time()-3600, '/teszt');
setcookie('dn', '', time()-3600, '/teszt');
setcookie('xp', '', time()-3600, '/teszt');
echo "<h1> Ez a dungeon kicsit erősnek bizonyúlt számodra kalandor, de majd legközelebb jobb lesz(vagy nem :))</h1>";
?>