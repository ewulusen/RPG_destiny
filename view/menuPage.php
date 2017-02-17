<div id="MainMenu">
<div class="list-group panel">
	<a href="index.php?hol=main" class="list-group-item border2" onclick="ajaxload('main','mainPage')">Főodal</a>
	<a href="index.php?hol=newChar" class="list-group-item border2" onclick="ajaxload('newChar','mainPage')">Karakter készítés</a>
	<a href="index.php?hol=lakohaz" class="list-group-item border2" onclick="ajaxload('lakohaz','mainPage')">Lakóház</a>
	<a href="#shopok" class="list-group-item border2" data-toggle="collapse" data-parent="#MainMenu" onclick="ajaxload('shopYou','mainPage')">Shoppok</a>
          <div class="collapse" id="shopok">
                <a href="#" class="list-group-item border2" onclick="ajaxload('fegyver','arus')">Fegyver</a>
                <a href="#" class="list-group-item border2" onclick="ajaxload('pancel','arus')">Páncél</a>
                <a href="#" class="list-group-item border2"onclick="ajaxload('nyaklanc','arus')" >Nyaklánc</a>
                <a href="#" class="list-group-item border2" onclick="ajaxload('gyuru','arus')">Gyűrű</a>
                <a href="#" class="list-group-item border2" onclick="ajaxload('potion','arus')">Potion</a>
              </div>
    <a href="#event" class="list-group-item border2" data-toggle="collapse" data-parent="#MainMenu">Kalandok</a>
          <div class="collapse" id="event">
                <a href="#" class="list-group-item border2" onclick="ajaxload('story','mainPage')">Erdő</a>
                <a href="#" class="list-group-item border2" onclick="ajaxCatacombs()">Katakombák</a>
                <a href="#" class="list-group-item border2" onclick="ajaxload('main')">Város</a>
                <a href="#" class="list-group-item border2" onclick="ajaxload('main')">Hegyek</a>
				</div> 
	<a href="#" class="list-group-item border2" >Kijelentkezés</a>			
	<a href="renew.php" class="list-group-item border2" >Nullázás</a>			
 </div>
</div>