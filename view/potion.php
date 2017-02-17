<?php
include_once("../controller/Page.php");
if(isset($_COOKIE['cid']))
	{		

	$page=new Page;
	$shopi=$page->getShopItems();
 echo '
  <div class="panel-group">
    <div class="panel" style="overflow:auto; background-color:#ffffff; color:black;">
      <div class="panel-heading"><h3>Italok</h3></div>
      <div class="panel-body" style="overflow:auto; background-color:#ffffff; color:black;">';
 for($i=0;$i<count($shopi);$i++)
	   {
		  $shopi_a=explode('&',$shopi[$i]);
		  if($shopi_a[0]=='NY')
		  {	  
	$hol="kalandozo";
	  echo'
	  <div class="panel border3">
	  <div class="panel-heading ">'.$shopi_a[2].'';
	  echo"<button class='btn btn-success pull-right'  onclick=megvesz('".$hol."','".$shopi_a[0]."','".$shopi_a[1]."','".$shopi_a[3]."')>Megvesz</div>";
	  echo'<div class="panel-body">
	  <div class="container-fluid">
  <div class="row-fluid">
    <div class="col-xs-4 border3">
     <img src="1.jpg">
    </div>
    <div class="col-xs-8 border3">
				Ára:'.$shopi_a[3].'.-Tf <br>
				Módosító: '.$shopi_a[4].''.$shopi_a[5].'<br>
				
				
  </div>
		  </div></div></div></div>';
		  }
	   }
		  echo'
    </div>
    </div>';
  
	  
	}
	else
	{
		header ("location:index.php?hol=lakohaz");
	}
?>