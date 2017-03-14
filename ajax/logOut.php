<?php
@session_start();
// unset section
echo'<script>
delete_cookie("kocka");
delete_cookie("char");
delete_cookie("cid");
delete_cookie("kaszt");
delete_cookie("faj");
delete_cookie("penz");
</script>';
unset($_SESSION['kocka']);
unset($_COOKIE['char']);
unset($_COOKIE['cid']);
$_COOKIE['end']=1;
unset($_COOKIE['kaszt']);
unset($_COOKIE['faj']);
unset($_COOKIE['penz']);
unset($_COOKIE['lvl']);
unset($_COOKIE['enemyID']);
unset($_COOKIE['xp']);
unset($_COOKIE['nev']);
unset($_COOKIE['pid']);
unset($_SESSION['dn']);
setcookie('kocka', '', time()-3600, '/teszt');
setcookie('enemyID', '', time()-3600, '/');
setcookie('char', '', time()-3600, '/teszt');
setcookie('cid', '', time()-3600, '/teszt');
setcookie('kaszt', '', time()-3600, '/teszt');
setcookie('faj', '', time()-3600, '/teszt');
setcookie('penz', '', time()-3600, '/teszt');
setcookie('end', '1', time()-3600, '/teszt');
setcookie('lvl', '', time()-3600, '/teszt');
setcookie('dn', '', time()-3600, '/teszt');
setcookie('xp', '', time()-3600, '/teszt');
setcookie('nev', '', time()-3600, '/teszt');
setcookie('pid', '', time()-3600, '/teszt');
setcookie('cid', '', time()-3600, '/');
setcookie('enemyID', '', time()-3600, '/teszt');
echo"Viszlát!";

?>

