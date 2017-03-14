<?php
echo "<div class='container'><div class='col-sm-4'><h1>Csapdába léptél!</h1>
<span class=enemyTurn><h2><oreo id='trapText'></oreo></h2></span>";
	$szam=rand(1,7);
echo '</div><div class="col-sm-8"><img src="img/backgrounds/t'.$szam.'.jpg" class="inGameImg"></div>';
 echo '<span class="storyspan border2"><button onclick="ajaxCatacombs()">Tovább</button></span></div></div>';
 ?>