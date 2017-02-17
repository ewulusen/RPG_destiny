<div class="list-group panel">
	<a href="index.php?hol=main" class="list-group-item border2" onclick="ajaxload('main','mainPage')">Főodal</a>
	<div id="attackMenu">
	<a href="#" class="list-group-item border2" id="tamadas"onclick="playerhit()">Támadás</a>
	<a href="index.php?hol=lakohaz" class="list-group-item border2" onclick="ajaxload('lakohaz','mainPage')">Varázslás</a>
	<a href="index.php?hol=lakohaz" class="list-group-item border2" onclick="ajaxload('lakohaz','mainPage')">Abilytik</a>
	<a href="#shopok" class="list-group-item border2" data-toggle="collapse" data-parent="#MainMenu" onclick="ajaxload('shopYou','mainPage')">Mozgás</a>
          <div class="collapse" id="shopok">
                <a href="#" class="list-group-item border2" onclick="ajaxload('fegyver','arus')">Fel</a>
                <a href="#" class="list-group-item border2" onclick="ajaxload('pancel','arus')">Le</a>
                <a href="#" class="list-group-item border2"onclick="ajaxload('nyaklanc','arus')" >Jobbra</a>
                <a href="#" class="list-group-item border2" onclick="ajaxload('gyuru','arus')">Balra</a>

              </div>
			  </div>
    <a href="#eventek" class="list-group-item border2" data-toggle="collapse" data-parent="#MainMenu">Kalandok</a>
          <div class="collapse" id="eventek">
                <a href="#" class="list-group-item border2" onclick="ajaxload('main')">Erdő</a>
                <a href="#" class="list-group-item border2" onclick="ajaxCatacombs()">Katakombák</a>
                <a href="#" class="list-group-item border2" onclick="ajaxload('main')">Város</a>
                <a href="#" class="list-group-item border2" onclick="ajaxload('main')">Hegyek</a>
				</div> 
	<a href="#" class="list-group-item border2" >Elfutok</a>			
 </div>