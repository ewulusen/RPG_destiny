<?php
include_once("../controller/Page.php");
$page= New Page;
$charok=$page->getAllChar();
echo "<h1 ><span id='selectCharakter'>válassz egy karakter akivel kalondozni/shoppingolni szeretnél</span></h1>";
echo '<table class="table table-responsive table-bordered charChuser"><tr>';
for($i=0;$i<count($charok);$i++)
	{	
	$lakoTomb=explode(',',$charok[$i]);
		if($i % 3==0)
		{
			echo'</tr><tr class="charChuser"><td><a href=index.php?do=costum&ki='.$lakoTomb[1].' title=szerkesztés target=_blank>'.$lakoTomb[2].'</a></td><td><button onclick=selectChar("'.$lakoTomb[1].'","'.$lakoTomb[2].'","'.$lakoTomb[3].'","'.$lakoTomb[4].'","'.$lakoTomb[5].'","'.$lakoTomb[6].'","'.$lakoTomb[7].'","'.$lakoTomb[8].'","'.$lakoTomb[9].'","'.$lakoTomb[10].'","'.$lakoTomb[11].'","'.$lakoTomb[12].'","'.$lakoTomb[13].'")>őt választom</button></td>';
		}
		else
		{
		echo'</tr><tr class="charChuser"><td><a href=index.php?do=costum&ki='.$lakoTomb[1].' title=szerkesztés target=_blank>'.$lakoTomb[2].'</a></td><td><button onclick=selectChar("'.$lakoTomb[1].'","'.$lakoTomb[2].'","'.$lakoTomb[3].'","'.$lakoTomb[4].'","'.$lakoTomb[5].'","'.$lakoTomb[6].'","'.$lakoTomb[7].'","'.$lakoTomb[8].'","'.$lakoTomb[9].'","'.$lakoTomb[10].'","'.$lakoTomb[11].'","'.$lakoTomb[12].'","'.$lakoTomb[13].'")>őt választom</button></td>';
	}
	}
	echo '</table>';


?>