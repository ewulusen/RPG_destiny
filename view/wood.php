<?php
include ('headlogin.php');
echo '<style>
body
{
	background-image: url("img/backgrounds/tree.png");
	background-color:#459b23;
}
</style>';
echo '<div class="container" background="img/tree.png">
  <div class="row">
    <div style="overflow:auto; background-color:#ffffff;" class="col-sm-4">
      Események
	   <br><table class="table table-responsive table-bordered" id=event></table>
    </div>
    <div class="col-sm-4">
      <oreo class="move">Gamefield <span id="move">'.$_GET['agi'].'</span><span id="error"></span></oreo>
	  <br><table class="table table-responsive table-bordered" id=gamefield></table>
	  	  <table id="btf" class="table table-responsive btf">
	  <tr><td>név: '.$_COOKIE['char'].'</td><td rowspan=2><img src="player_pic/'.$_GET['faj'].$_GET['kaszt'].'g.gif" /></td><td>név:'.$_GET['ename'].'</td></tr>
	  <tr><td>HP: <span id="hp"></span></td><td>HP: <span id="ehp"></span></td></tr>
	  <tr><td>AC: <span id="ac"></span></td><td rowsapn=2 bgcolor=red></td><td>AC: <span id="eac">1</span></td></tr>
	  <tr><td>Iniciative: <span id="ini"></span></td><td bgcolor=red></td><td>Iniciative: <span id="eini">1</span></td></tr>
	  <tr><td>DMG: <span id="dmg"></span></td><td rowspan=2><img src="beast/'.$_GET['ename'].'.gif" /></td><td>DMG: <span id="edmg">2</span></td></tr>
	  <tr><td>MAC: <span id="mac"></span></td><td>MAC: <span id="emac">0</span></td></tr>
	  </table>
	  <table id="btf2" class="table table-responsive btf">
	  <tr><td colspan=3> Mit csinálsz?</td></tr>
	  <tr>
	  <td><button class="btn btn-primary" onclick=playerAttak()>Támadás</button></td>
	  <td><button class="btn btn-primary" onclick=endGamePL()>elfutok</button></td>
	  <td><button class="btn btn-primary" onclick=enemyhit()>Passz</button></td>
	  </tr>
	  </table>
	  <table id="attack" class="table table-responsive btf">
	  <tr><td colsapn=3>Hogyan akarsz támadni?</td></tr><tr>
	  <td><button class="btn btn-primary" onclick=hit("P","H")>Fegyver(<oreo id="fegyverDMG"></oreo>dmg)</button></td>
	  <td><button class="btn btn-primary" onclick=enemyhit()>Varázslat</button></td>
	  <td><button class="btn btn-primary" onclick=enemyhit()>Combók</button></td>
	  </table>
    </div>
    <div class="col-sm-4">
	Dots<br>
    </div>
  </div>
  <table id="button">
  <tr><td></td><td><button class="btn btn-primary" onclick=moveTo("-","8")>up</button></td><td></td></tr>
  <tr><td><button class="btn btn-primary" onclick=moveTo("-","1")>left</button></td>
  <td><button class="btn btn-primary" onclick=moveTo("+","8")>down</button></td>
  <td><button class="btn btn-primary" onclick=moveTo("+","1")>right</button></td>	</table><table id="button2"><tr>
	<tr><td><button class="btn btn-success" onclick=endTurn()>end turn</button></td></tr></table></br>
</div>';
include ('footer.php');
?>