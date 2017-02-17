<?php
@session_start();
echo' <span id="selectCharakter" style="display:none;"></span>';
if (!isset($_COOKIE['faj']))
	{
		echo '<p><h1><oreo class="fname">válassz   fajt</oreo></h1></p>
		<div class="container text.center">
		<div class="row">';
		echo '<div id="borderedf" class="col-sm-2" style="background-image:url(img/backgrounds/Elfbcg.jpg);"><a href=index.php?hol=newChar onclick=makecookie("faj","Elf")><img src="img\faj\elfsymbol.png" style="width:100%;" class="elf" ></a><br><br><oreo class="fname">Elf</oreo></div>';
		echo '<div id="borderedf" class="col-sm-2" style="background-image:url(img/backgrounds/Orcbcg.jpg);"><a href=index.php?hol=newChar onclick=makecookie("faj","Orc")><img src="img\faj\Orcsymbol.png"  style="width:100%;" class="orc"></a><br><br><oreo class="fname">Ork</oreo></div>';
		echo '<div id="borderedf" class="col-sm-2" style="background-image:url(img/backgrounds/Humanbcg.jpg);"><a href=index.php?hol=newChar onclick=makecookie("faj","Human")><img src="img\faj\Humansymbol.png"  style="width:100%;" class="human"></a><br><br><oreo class="fname">Ember</oreo></div>';
		echo '<div id="borderedf" class="col-sm-2" style="background-image:url(img/backgrounds/Dwarfbcg.jpg);"><a href=index.php?hol=newChar onclick=makecookie("faj","Torp")><img src="img\faj\dwarfsymbol.png"  style="width:100%;" class="dwarf"></a><br><br><oreo class="fname">Törp</oreo></div></div></div>';
include ('footer.php');
		}
	if (!isset($_COOKIE['kaszt']) && isset($_COOKIE['faj']))
	{
		echo '<p><h1><oreo class="fname">válassz   Kasztot</oreo></h1></p>
		<div class="container text.center">
		<div class="row">';
		if($_COOKIE['faj']=="Human")
			{
		echo '<div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Humanbcg.jpg")><a href=index.php?hol=newChar onclick=makecookie("kaszt","Warrior")><img src="img\kaszt\Warriorcard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Warrior</oreo></div>';
		echo '<div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Humanbcg.jpg)"><a href=index.php?hol=newChar onclick=makecookie("kaszt","pap") ><img src="img\kaszt\Priestcard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Priest</oreo></div>';
		echo '<div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Humanbcg.jpg)"><a href=index.php?hol=newChar onclick=makecookie("kaszt","Paladin")><img src="img\kaszt\Paladincard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Paladin</oreo></div></div>';
		echo '<div class="row"><div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Humanbcg.jpg")><a href=index.php?hol=newChar onclick=makecookie("kaszt","Rogue")><img src="img\kaszt\Roguecard.png" style="width:100%;"  class=fajcard></a><br><br><oreo class="fname">Rogue</oreo></div>';
		echo '<div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Humanbcg.jpg)"><a href=index.php?hol=newChar onclick=makecookie("kaszt","Ranger")><img src="img\kaszt\huntercard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Ranger</oreo></div>';
		echo '<div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Humanbcg.jpg)"><a href=index.php?hol=newChar onclick=makecookie("kaszt","Mage")><img src="img\kaszt\Magecard.png"  style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Mage</oreo></div></div></div>';
		
include ('footer.php');
		}
	if($_COOKIE['faj']=="Elf")
			{		
		echo '<div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Elfbcg.jpg")"><a href=index.php?hol=newChar onclick=makecookie("kaszt","Pap")><img src="img\kaszt\Priestcard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">pap</oreo></div>';
		echo '<div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Elfbcg.jpg")"><a href=index.php?hol=newChar onclick=makecookie("kaszt","Rogue")><img src="img\kaszt\Roguecard.png"  style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Rogue</oreo></div>';
		echo '<div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Elfbcg.jpg")"><a href=index.php?hol=newChar onclick=makecookie("kaszt","Ranger")><img src="img\kaszt\huntercard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Ranger</oreo></div>';
		echo '<div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Elfbcg.jpg")"><a href=index.php?hol=newChar  onclick=makecookie("kaszt","Mage")><img src="img\kaszt\Magecard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Mage</oreo></div></div></div>';
		include ('footer.php');
	}if($_COOKIE['faj']=="Orc")
			{
		echo '<div id="borderedf" class="col-sm-2" style="background-image:url(img/backgrounds/Orcbcg.jpg")"><a href=index.php?hol=newChar onclick=makecookie("kaszt","Warrior")><img src="img\kaszt\Warriorcard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Warrior</oreo></div>';
		echo '<div id="borderedf" class="col-sm-2" style="background-image:url(img/backgrounds/Orcbcg.jpg")"><a href=index.php?hol=newChar onclick=makecookie("kaszt","Shaman")><img src="img\kaszt\Priestcard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Shaman</oreo></div>';
		echo '<div id="borderedf" class="col-sm-2" style="background-image:url(img/backgrounds/Orcbcg.jpg")"><a href=index.php?hol=newChar onclick=makecookie("kaszt","Rogue")><img src="img\kaszt\Roguecard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Rogue</oreo></div>';
		echo '<div id="borderedf" class="col-sm-2" style="background-image:url(img/backgrounds/Orcbcg.jpg")"><a href=index.php?hol=newChar onclick=makecookie("kaszt","Ranger")><img src="img\kaszt\huntercard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Ranger</oreo></div></div></div>';
		include ('footer.php');
		
	}if($_COOKIE['faj']=="Torp")
			{
		echo '<div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Dwarfbcg.jpg")"><a href=index.php?hol=newChar&faj=Torp&kaszt=Priest onclick=makecookie("kaszt","Pap")><img src="img\kaszt\Priestcard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Priest</oreo></div>';
		echo '<div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Dwarfbcg.jpg")"><a href=index.php?hol=newChar&faj=Torp&kaszt=Paladin onclick=makecookie("kaszt","Paladin")><img src="img\kaszt\Paladincard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Paladin</oreo></div>';
		echo '<div id="borderedf" class="col-sm-3" style="background-image:url(img/backgrounds/Dwarfbcg.jpg")"><a href=index.php?hol=newChar&faj=Torp&kaszt=Rogue onclick=makecookie("kaszt","Rogue")><img src="img\kaszt\Roguecard.png" style="width:100%;" class=fajcard></a><br><br><oreo class="fname">Rogue</oreo></div></div></div>';
		include ('footer.php');
	}
	
	}
	
	if (isset($_COOKIE['kaszt']) && isset($_COOKIE['faj']))
			{
					$statok=array();
					include_once("../controller/Page.php");
					$page = new Page;
				$res=$page->getNormalStats($_COOKIE['kaszt'],$_COOKIE['faj']);
				
				for($i=1;$i<count($res);$i++)
			{
				$szet=explode(',',$res[$i]);
				if(isset($szet[1]))
				{
				array_push($statok,$szet[0].$szet[1]);
				}
				else 
				{
				array_push($statok,'+'.$szet[0]);
				}
			}
			//print_r($statok);
			if(isset($_SESSION['kocka']))
			{
				//echo $_SESSION['kocka'];
				$kocka=$_SESSION['kocka'];
			}
			else {
			$kocka=rand(6,48);
			$_SESSION['kocka']=$kocka;
			}
			$statNames=Array('','Reflex','Streng','Agility','Constitut','Defend','Dexterity','Inteligent','Luck','AC','MAC','Perception','Iniciative','Mana','HP');
			echo'<table class="table-table-responsive table-bordered"><tr><td colspan=6>Osztható pontok:<span id=kocka>'.$kocka.'</span></tr>
			<tr><td colspan=3>Faj</td><td colspan=3>Kaszt</td></tr>
			<tr><td colspan=3><span id="faj">'.$_COOKIE['faj'].'</span></td><td colspan=3><span id="kaszt">'.$_COOKIE['kaszt'].'</span></td></tr>';
			for($i=1;$i<9;$i++)
			{
				$szam1='0'+$statok[$i];
				$szam2='0'+$statok[$i+9];
				$szam=$szam1+$szam2;
				echo '<td >'.$statNames[$i].'</td><td><span id='.$statNames[$i].'>'.$szam.'</span></td>
				<td><button onclick=novel("'.$statNames[$i].'") class="btn btn-success">+</button></td>
				<td><button onclick=csokken("'.$statNames[$i].'") class="btn btn-danger">-</button></td>';
				if(isset($statNames[$i+8]))
				{
					echo '<td>'.$statNames[$i+8].'</td><td><span id='.$statNames[$i+8].'>0</span></td>';
				}
				echo'</tr>
				<tr>';
			}
			echo'<tr><td colspan=4> Karaktered neve:</td><td colspan=2><input type=text name=name id="nev" style="color:black"></td></tr>
			</table><br><span id=error></span><br> <button class="btn btn-primary" onclick="tovabb()">kész</button><br>';
			include ('footer.php');
			}
