<?php
include ('headlogin.php');
	$statNames=Array('Reflex','Streng','Agility','Constitut','Defend','Dexterity','Inteligent','Luck','AC','MAC','Perception','Iniciative','Mana','HP');
			echo'<table class="table-table-responsive table-bordered"><tr><td colspan=6>Osztható pontok:<span id=kocka>'.$_GET['apoint'].'</span></tr>
			<tr><td colspan=6>'.$_GET['nev'].'</td></tr>';
	$statok=Array($_GET['ref'],$_GET['str'],$_GET['agi'],$_GET['con'],$_GET['def'],$_GET['dex'],$_GET['int'],$_GET['ac'],$_GET['int']+$_GET['def'],$_GET['ref']+$_GET['int'],
	$_GET['ref']+$_GET['agi'],$_GET['int']*10,$_GET['con']+$_GET['def']+$_GET['str']);		
			for($i=0;$i<8;$i++)
			{
				echo '<td >'.$statNames[$i].'</td><td><span id='.$statNames[$i].'>'.$statok[$i].'</span></td>
				<td><button onclick=novel("'.$statNames[$i].'") class="btn btn-success">+</button></td>
				<td><button onclick=csokken("'.$statNames[$i].'") class="btn btn-danger">-</button></td>';
				if(isset($statNames[$i+8]))
				{
					echo '<td>'.$statNames[$i+8].'</td><td><span id='.$statNames[$i+8].'>'.$statok[$i+7].'</span></td>';
				}
				echo'</tr>';
			}
				echo'</tr>
				</table><button class="btn btn-primary" onclick="updateChar()">kész</button><br>';
				echo'<oreo id=cid style="display:none;">'.$_GET['cid'].'</oreo>';
include ('footer.php');
?>