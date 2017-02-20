<div class="list-group panel">
	<a href="index.php?hol=main" class="list-group-item border2" onclick="ajaxload('main','mainPage')">Főodal</a>
	<div id="attackMenu">
	<a href="#" class="list-group-item border2" id="tamadas"onclick="playerhit()">Támadás</a>
	<a href="#spells" class="list-group-item border2" data-toggle="collapse" data-parent="#MainMenu" ">Varázslat</a>
          <div class="collapse" id="spells">
              </div>
              </div>
    <a href="#eventek" class="list-group-item border2" data-toggle="collapse" data-parent="#MainMenu">Kalandok</a>
          <div class="collapse" id="eventek">
                <a href="#" class="list-group-item border2" onclick="ajaxload('main')">Erdő</a>
                <a href="#" class="list-group-item border2" onclick="ajaxCatacombs()">Katakombák</a>
                <a href="#" class="list-group-item border2" onclick="ajaxload('main')">Város</a>
                <a href="#" class="list-group-item border2" onclick="ajaxload('main')">Hegyek</a>
				</div> 
	<a href="#" class="list-group-item border2" onclick="runAway()">Elfutok</a>			
 </div>