<?php
include_once("../controller/Page.php");
$page=new Page;
$enemy=$page->getEnemy($_GET['i'],$_GET['j']);
$player=$page->getPlayer();
$eint=$enemy[6]*10;
$eac=$enemy[4];
$ehp=$enemy[4]+$enemy[8]+$enemy[1];
$hp=$player[3]+$player[7]+$player[0];
$xp=$enemy[9];
$emac=$enemy[4]+$enemy[6];
$mac=$player[5]+$player[3];
$int=$player[5];

//print_r($enemy);
echo'<div class=container><div class="col-sm-2">Események<br>
	<table class="charChuser table-bordered" id="event"></table>
</div><div class="col-sm-1"></div><div class="col-sm-8">
<table class="charChuser">
	<tr>
		<td><div class="container" stlye="position:absolute;"><img src="img/player_pic/'.$_COOKIE['faj'].''.$_COOKIE['kaszt'].'.jpg" id="playerpic" style="position: relative; width:200px; height:200px;z-index: 0;">
	
		<img src="img/elements/vs.png" style="position: relative; width:200px; height:200px;z-index: 0;"> 
	
		<img src="img/beast/'.$enemy[0].'.jpg" id="enemypic" style="position: relative; width:200px; height:200px;z-index: 0;"></div></td>
	</tr>
	
</table>
</div></div><div style="background-color:#312e1f;color:white;width:100%;" class="border3" id="enemyPage" >
		<div class="row">	
		<div class="col-sm-2">Név:<span id="charname">'.$enemy[0].'</span></br>
			LVL:<img src="img/elements/lvl.png"><span id="charLVL">'.$enemy[10].'</span></div>
			<div class="col-sm-2">
			DMG:<img src="img/elements/dmg.png"><span id="enemydmg">'.$enemy[1].'</span><br>
			AC:<img src="img/elements/ac.png"><span id="enemyAC">'.$eac.'</span></div>
			
			<div class="col-sm-3"><img src="img/elements/mn.png">
				<span id="enemymanas">'.$eint.'/'.$eint.'</span><div class="progress" >
					<div class="progress-bar-info" role="progressbar" aria-valuenow='.$eint.'
					aria-valuemin="0" aria-valuemax='.$eint.' id="emanabar" sytle="width:100%" >
					<span id="enemymana">'.$eint.'</span>
					</div>
					</div>
				
					<img src="img/elements/hp.png">
				<span id="enemyhps">'.$ehp.'/'.$ehp.'</span><div class="progress" >
					<div class="progress-bar-danger" role="progressbar" aria-valuenow="'.$ehp.'"
					aria-valuemin="0" aria-valuemax="'.$ehp.'" id="ehpbar" sytle="width:100%" >
				<span id="enemyhp">'.$ehp.'</span>
					</div>
				</div>
				</div><oreo style="display:none;"id=charstr>'.$player[1].'</oreo><oreo id=enemystr style="display:none;">'.$enemy[1].'</oreo>
				<oreo style="display:none;"id=emaxhp>'.$ehp.'</oreo>
				<oreo style="display:none;"id=maxhp>'.$hp.'</oreo>
				<oreo style="display:none;"id=xp>'.$xp.'</oreo>
				<oreo style="display:none;"id=emac>'.$emac.'</oreo>
				<oreo style="display:none;"id=mac>'.$mac.'</oreo>
				<oreo style="display:none;"id=int>'.$int.'</oreo>
	</div>';
?>