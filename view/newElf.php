<?php

@session_start();
	echo '<p><h1><oreo class="fname">válassz   Kasztot</oreo></h1></p>
		<div class="container text.center" >
		<div class="row">';
		echo '<div id="borderedf" class="col-sm-2" ><a href=index.php?hol=newChar&faj=Elf&kaszt=Priest><img src="img\kaszt\Priestcard.png"  style="width:100%"></a><oreo class="fname">Priest</oreo></div>';
		echo '<div id="borderedf" class="col-sm-2" ><a href=index.php?hol=newChar&faj=Elf&kaszt=Rogue><img src="img\kaszt\Roguecard.png"  style="width:100%" class=fajcard></a><oreo class="fname">Rogue</oreo></div>';
		echo '<div id="borderedf" class="col-sm-2" ><a href=index.php?hol=newChar&faj=Elf&kaszt=Ranger><img src="img\kaszt\huntercard.png"   style="width:100%"class=fajcard></a><oreo class="fname">Hunter</oreo></div>';
		echo '<div id="borderedf" class="col-sm-2" ><a href=index.php?hol=newChar&faj=Elf&kaszt=Mage><img src="img\kaszt\Magecard.png"   style="width:100%" class=fajcard></a><oreo class="fname">Mage</oreo></div></div></div>';
		include ('footer.php');
		?>