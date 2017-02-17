<?php
@session_start();
if(isset($_COOKIE['pid']))
{}
else{
	header ("location:index.php");
}
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
//end unset section
echo'
<body style="background-image:url(img/backgrounds/Map_a.png);background-repeat:repeat; ">
</div><img src="img/backgrounds/Map.jpg" 
 usemap="#Map" id="map">
<map id="Map" name="Map" >
<area href="#" class="breakWord" id="Malkas" shape=circle coords="174,86,10" name="Malkas"  alt="Malkas" title="Népesség:3500 Fő 
 Terület:7200 km^2
 Faj:vegyes
 Tartozás:Semleges
 Tipus:Erőd">
<area href="#" shape=circle coords="579,44,10"   alt="Esutay" title="Népesség:10000 Fő 
 Terület:10000 km^2
Faj:Törp
Tartozás:Törp
Tipus:Törp Főváros
">
<area href="#" shape=circle coords="816,49,10"  alt="Nyebo" title="Népesség:1200 Fő 
Terület:4000 km^2
Faj:vegyes
Tartozás:Semleges
Tipus:Halász Város">
<area href="#" shape=circle coords="361,181,10"  title="Népesség:5400 Fő
Terület:30000 km^2
Faj:vegyes
Tartozás:Ember
Tipus:Kereskedő város" alt="Protezhki">
<area href="#" shape=circle coords="503,297,10"  title="Népesség:1000 Fő
Terület:500 km^2
Faj:vegyes
Tartozás:Ember
Tipus:Erőd" alt="Notoro">
<area href="#" shape=circle coords="624,305,10"  title="Népesség:35000 Fő
Terület:12000 km^2
Faj:Ember
Tartozás:Semleges
Tipus:Ember Főváros" alt="Romanovo">
<area href="#" shape=circle coords="265,359,10"  title="Népesség:10000 Fő
Terület:7000 km^2
Faj:Elf
Tartozás:Semleges
Tipus: Elf Főváros" alt="Bobrovo">
<area href="#" shape=circle coords="397,383,10" title="Népesség:1000 Fő
Terület:500 km^2
Faj:vegyes
Tartozás:Semleges
Tipus:Kereskedő falu" alt="Kordyuki">
<area href="#" shape=circle coords="910,420,10"  title="Népesség:?? Fő
Terület:7200 km^2
Faj:vegyes
Tartozás:Harcias
Tipus:Halász város" alt="Sarancha">
<area href="#" shape=circle coords="189,489,10"  title="Népesség:1200 Fő
Terület:1000 km^2
Faj:vegyes
Tartozás:Semleges
Tipus:Kereskedő falu" alt="Sanchi">
<area href="#" shape=circle coords="591,504,10"  title="Népesség:10000 Fő
Terület:23000 km^2
Faj:Ork
Tartozás:Harcias
Tipus:Erőd" alt="Kuchumbetovo">
<area href="#" shape=circle coords="462,628,10"  title="Népesség:?? Fő
Terület:7200 km^2
Faj:vegyes
Tartozás:Semleges
Tipus:falu" alt="Gnezdilovo">
<area href="#" shape=circle coords="913,698,10"  title="Népesség:?? Fő
Terület:8700 km^2
Faj:vegyes
Tartozás:Semleges-harcias
Tipus:Erőd" alt="Ulvtorp">
<area href="#" shape=circle coords="659,778,10"  title="Népesség:6700 Fő
Terület:12000 km^2
Faj:Elf
Tartozás:Semleges
Tipus:Város" alt="Alter">
<area href="#" shape=circle coords="857,919,10"  title="Népesség:12000 Fő
Terület:7200 km^2
Faj:vegyes
Tartozás:Semleges
Tipus:Erőd" alt="Segoltan">
<area href="#" shape=circle coords="370,873,10" title="Népesség:32000 Fő
Terület:18000 km^2
Faj:Ork
Tartozás:Harcias
Tipus:Ork Főváros" alt="Helleshult">
<area href="#" shape=circle coords="44,955,10"  title="Népesség:?? Fő
Terület:?? km^2
Faj:??
Tartozás:??
Tipus:??" alt="Ljuder">
</map>';
?>

