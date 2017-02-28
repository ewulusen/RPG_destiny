<?php
include_once("../controller/Page.php");
$page=new Page;
$ch=$page->getChar($_GET['id']);
$xp=$page->getXpToLVL($_GET['id']);
$expl_xp=explode(",",$xp);
$szazalek=($expl_xp[1]/$expl_xp[2])*100;
setcookie("cid",$_GET['id']);
echo"<div class='container'><div class='col-sm-4 border2'><table class='table-bordered' style='color:#000000;'>";
echo '<tr><td colspan=8>osztható pontok:<span id=kocka>'.$ch[14].'</span></td></tr><tr>';
$statNames=Array('Streng','Agility','Reflex','Defend','Dexterity','Inteligent','Luck','Constitut');
$statNames2=Array('AC','MAC','Perception','Iniciative','Mana','HP','DMG','LVL');
$hp=$ch[7]+$ch[3]+$ch[0];
$ch2=Array($ch[9]+$ch[7]+$ch[3],$ch[3]+$ch[5],$ch[2]+$ch[5],$ch[2]+$ch[1],$ch[5]*10,$hp,$ch[0]+$ch[8],$ch[12]);
for($i=0;$i<8;$i++)
{
 echo '<td >'.$statNames[$i].'</td><td><span id='.$statNames[$i].'>'.$ch[$i].'</span></td>
 <td><button onclick=novel("'.$statNames[$i].'") class="btn btn-success">+</button></td>
 <td><button onclick=csokken("'.$statNames[$i].'") class="btn btn-danger">-</button></td>
 <td>'.$statNames2[$i].'</td><td><span id='.$statNames2[$i].'>'.$ch2[$i].'</span></td>
 </tr><tr>'; 
}
echo '</table>

 <div class="progress">
 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'.$expl_xp[1].'" aria-valuemin="0" aria-valuemax="'.$expl_xp[2].'" style="width: '.$szazalek.'%;">
   <span style="color:black;"> '.$expl_xp[1].'xp</span>
  </div>
</div>
</div>
<div class="col-sm-8 border2">Itemek:<br><table class="table-bordered"><tr>';
$items=$page->getCharItems();
$items2=$page->getCharOnItems();

for($i=0;$i<count($items);$i++)
{
 $exp=explode("&",$items[$i]);
 $mit=explode(",",$exp[4]);
 $elojel=$mit[0];
 $mennyit=$mit[1];
 $mennyit=substr($mennyit, 0, -1);	
 $ki= $elojel.','.$mennyit.','.$exp[5];
 $emberiNyelv=$elojel."".$mennyit." ".$exp[5];
 if($elojel=="+")
 {
	 $negalt="-";
 }
 else
 {
	 $negalt="+";
 }
 $ki2=$negalt.','.$mennyit.','.$exp[5];
 if($i%8==0)
 {
  if($exp[0]=="GY")
  {
 echo '<td><img src=img/elements/gyuru.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")  ></td>';
  }
   if($exp[0]=="NY")
  {
 echo '<td><img src=img/elements/nyaklanc.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
   if($exp[0]=="PO")
  {
 echo '<td><img src=img/elements/potion.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
   if($exp[0]=="F")
   {
    $ki=$ki.",".$exp[6].",F";
    $ki2=$ki2.",".$exp[6].",F";
	$emberiNyelv=$emberiNyelv." és ".$exp[6]." dmg";
  if($exp[8]=="5") {
  echo '<td><img src=img/elements/mace.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="1") {
  echo '<td><img src=img/elements/dmg.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  } 
  if($exp[8]=="3") {
  echo '<td><img src=img/elements/axe.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="4") {
  echo '<td><img src=img/elements/axxe.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="2") {
  echo '<td><img src=img/elements/swword.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="6") {
  echo '<td><img src=img/elements/macce.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="7") {
  echo '<td><img src=img/elements/bow.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="8") {
  echo '<td><img src=img/elements/crossbow.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="9") {
  echo '<td><img src=img/elements/staff.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="10") {
  echo '<td><img src=img/elements/dager.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="3") {
  echo '<td><img src=img/elements/axe.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="9") {
  echo '<td><img src=img/elements/staff.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
   }
  if($exp[0]=="P")
   { 
$ki=$ki.",".$exp[6].",P";
$ki2=$ki2.",".$exp[6].",P";
	$emberiNyelv=$emberiNyelv." és ".$exp[6]." ac";
  if($exp[8]=="1") {
  echo '<td><img src=img/elements/cloth.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  } 
  if($exp[8]=="2") {
  echo '<td><img src=img/elements/leather.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  } 
  if($exp[8]=="3") {
  echo '<td><img src=img/elements/mail.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  } 
  if($exp[8]=="4") {
  echo '<td><img src=img/elements/plate.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  } 
   }
 }
 else
 {
   if($exp[0]=="GY")
  {
 echo '<td><img src=img/elements/gyuru.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
   if($exp[0]=="NY")
  {
 echo '<td><img src=img/elements/nyaklanc.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
   if($exp[0]=="PO")
  {
 echo '<td><img src=img/elements/potion.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
   if($exp[0]=="F")
   {
    $ki=$ki.",".$exp[6].",F";
    $ki2=$ki2.",".$exp[6].",F";
	$emberiNyelv=$emberiNyelv." és ".$exp[6]." dmg";
  if($exp[8]=="5") {
  echo '<td><img src=img/elements/mace.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="1") {
  echo '<td><img src=img/elements/dmg.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  } 
  if($exp[8]=="3") {
  echo '<td><img src=img/elements/axe.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="4") {
  echo '<td><img src=img/elements/axxe.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="2") {
  echo '<td><img src=img/elements/swword.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="6") {
  echo '<td><img src=img/elements/macce.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="7") {
  echo '<td><img src=img/elements/bow.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="8") {
  echo '<td><img src=img/elements/crossbow.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="9") {
  echo '<td><img src=img/elements/staff.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="10") {
  echo '<td><img src=img/elements/dager.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="3") {
  echo '<td><img src=img/elements/axe.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="9") {
  echo '<td><img src=img/elements/staff.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
   }
  if($exp[0]=="P")
   { 
$ki=$ki.",".$exp[6].",P";
$ki2=$ki2.",".$exp[6].",P";
	$emberiNyelv=$emberiNyelv." és ".$exp[6]." ac";
  if($exp[8]=="1") {
  echo '<td><img src=img/elements/cloth.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  } 
  if($exp[8]=="2") {
  echo '<td><img src=img/elements/leather.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  } 
  if($exp[8]=="3") {
  echo '<td><img src=img/elements/mail.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  } 
  if($exp[8]=="4") {
  echo '<td><img src=img/elements/plate.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  } 
   }
 }
}

//print_r($items);
echo'</table>
<div class="content">
		<div class="top_block block_1">
			<div class="content">
			
			<div class=col-sm-3></div>
			<div class=col-sm-6><center>'.$ch[13].'</center></div>
			<div class=col-sm-3></div>
		</div>	
		</div>
		<div class="background block_2">
		</div>
		<div class="left_block block_2">
			<div class="content">
			';
					for($i=0;$i<count($items2);$i++)
			{
				$exp=explode("&",$items2[$i]);
				 $mit=explode(",",$exp[4]);
				 $elojel=$mit[0];
				 $mennyit=$mit[1];
				 $mennyit=substr($mennyit, 0, -1);	
				 $ki= $elojel.','.$mennyit.','.$exp[5];
				 $emberiNyelv=$elojel."".$mennyit." ".$exp[5];
				 if($elojel=="+")
				 {
					 $negalt="-";
				 }
				 else
				 {
					 $negalt="+";
				 }
				 $ki2=$negalt.','.$mennyit.','.$exp[5];
				
				 if($exp[0]=="P")
					  { 
				  echo'<table class="table" border=2>';
						$ki=$ki.",".$exp[6].",P";
						$ki2=$ki2.",".$exp[6].",P";
						$emberiNyelv=$emberiNyelv." és ".$exp[6]." ac";
						  if($exp[8]=="1") {
						  echo '<tr><td><img src=img/elements/cloth.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td></tr>';
						  } 
						  if($exp[8]=="2") {
						  echo '<tr><td><img src=img/elements/leather.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td></tr>';
						  } 
						  if($exp[8]=="3") {
						  echo '<tr><td><img src=img/elements/mail.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td></tr>';
						  } 
						  if($exp[8]=="4") {
						  echo '<tr><td><img src=img/elements/plate.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td></tr>';
						  } 
					   }
					    if($exp[0]=="NY")
						  {
						 echo '<tr><td><img src=img/elements/nyaklanc.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td></tr>';
						  }
			}
			echo'
			</table></div>
		</div>
		<div class="background block_3">
		</div>
		<div class="right_block block_3">
			<div class="content">
			';
					for($i=0;$i<count($items2);$i++)
			{
				$exp=explode("&",$items2[$i]);
				 $mit=explode(",",$exp[4]);
				 $elojel=$mit[0];
				 $mennyit=$mit[1];
				 $mennyit=substr($mennyit, 0, -1);	
				 $ki= $elojel.','.$mennyit.','.$exp[5];
				 $emberiNyelv=$elojel."".$mennyit." ".$exp[5];
				 if($elojel=="+")
				 {
					 $negalt="-";
				 }
				 else
				 {
					 $negalt="+";
				 }
				 $ki2=$negalt.','.$mennyit.','.$exp[5];
					    if($exp[0]=="GY")
						  {
						 echo '<table class="table" border=2><tr><td><img src=img/elements/gyuru.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td></tr>';
						  }
			}
			echo'</table></div>
		</div>
		<div class="center_block block_5">
			
			<img src=img/player_pic/'.$ch[10].$ch[11].'.jpg style="width:50%;height:50%;">
			
		</div>
		<div class="bottom_block block_4">
			<div class="content">
			<div class=col-sm-3></div>
			<div class=col-sm-3>';
			for($i=0;$i<count($items2);$i++)
			{
				$exp=explode("&",$items2[$i]);
				 $mit=explode(",",$exp[4]);
				 $elojel=$mit[0];
				 $mennyit=$mit[1];
				 $mennyit=substr($mennyit, 0, -1);	
				 $ki= $elojel.','.$mennyit.','.$exp[5];
				 $emberiNyelv=$elojel."".$mennyit." ".$exp[5];
				 if($elojel=="+")
				 {
					 $negalt="-";
				 }
				 else
				 {
					 $negalt="+";
				 }
				 $ki2=$negalt.','.$mennyit.','.$exp[5];
				 if($exp[0]=="F")
   {
	   echo'<table class="table" border=2><tr>';
    $ki=$ki.",".$exp[6].",F";
    $ki2=$ki2.",".$exp[6].",F";
	$emberiNyelv=$emberiNyelv." és ".$exp[6]." dmg";
  if($exp[8]=="5") {
  echo '<td><img src=img/elements/mace.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="1") {
  echo '<td><img src=img/elements/dmg.png title="'.$emberiNyelv.'" onmouseover=viewOFF("'.$ki2.'") onmouseleave=viewON("'.$ki.'")></td>';
  } 
  if($exp[8]=="3") {
  echo '<td><img src=img/elements/axe.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="4") {
  echo '<td><img src=img/elements/axxe.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="2") {
  echo '<td><img src=img/elements/swword.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="6") {
  echo '<td><img src=img/elements/macce.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="7") {
  echo '<td><img src=img/elements/bow.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="8") {
  echo '<td><img src=img/elements/crossbow.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="9") {
  echo '<td><img src=img/elements/staff.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="10") {
  echo '<td><img src=img/elements/dager.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="3") {
  echo '<td><img src=img/elements/axe.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }
  if($exp[8]=="9") {
  echo '<td><img src=img/elements/staff.png title="'.$emberiNyelv.'" onmouseover=viewON("'.$ki.'") onmouseleave=viewOFF("'.$ki2.'")></td>';
  }

   }
			}
			echo'</table></div>
			<div class=col-sm-3></div>
			<div class=col-sm-3></div>			
			</div>
		</div>
	</div>
</div></div>
</div>';

?>