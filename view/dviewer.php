<?php
session_start();
$files = scandir('../dungeons/');
$fajlok=array();
foreach($files as $file) {
array_push($fajlok,$file);
}
print_r($fajlok);
if (!isset($_SESSION['myVariable']))
{
$_SESSION['myVariable'] = 2;
}
$i=$_SESSION['myVariable'];
echo $i;
 $myfile = fopen('../dungeons/'.$fajlok[$i], "r") or die("Unable to open file!");
echo fread($myfile,filesize('../dungeons/'.$fajlok[$i]));
fclose($myfile);
echo '<form action=dviewer.php method=POST>
<input type=submit name=gomb value='.$fajlok[$i].'>
<input type=submit name=next value=next>
</form>';
if(isset($_POST['gomb']))
{
	unlink('../dungeons/'.$_POST['gomb']);
}
if(isset($_POST['next']))
{
	 $_SESSION['myVariable']++;
}
?>