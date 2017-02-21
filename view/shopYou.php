<?php
include_once("../controller/Page.php");
if(isset($_COOKIE['cid']))
	{		
	$page=new Page;

	if (isset($_GET['muvelet']))
{
	
	if ($_GET['muvelet']==0)
	$page->selItem($_GET['id'],$_GET['M']);
	if ($_GET['muvelet']==1)
	$page->buyItem($_GET['T'],$_GET['id'],$_GET['M']);
}
	
	$item=$page->getCharItems();

 echo '<div class="container" >
  <div class="row">
    <div style="overflow:auto; background-color:#ffffff; color:black;" class="col-sm-5" id="kalandozo">
      
  <h2>Saját tárgyai</h2>
	   <ul class="nav nav-pills">';
	  
   echo'
    <li><a data-toggle="tab" href="#SF">Fegyver</a></li>
    <li><a data-toggle="tab" href="#SP">Páncél</a></li>
    <li><a data-toggle="tab" href="#SGY">Gyűrű</a></li>
    <li><a data-toggle="tab" href="#SNY">Nyaklánc</a></li>
    <li><a data-toggle="tab" href="#SPO">Potion</a></li>
  </ul>

  <div class="tab-content">
    <div id="SF" class="tab-pane fade">
      <h3>Fegyverek</h3>
      <p>
	  <table class="table table-responsive table-bordered" style="overflow:auto; background-color:#ffffff; color:black;" >
	   <tr><th>Típus</th>
	   <th>Név</th>
	   <th>Ár db/Tf</th>
	   <th>módosító</th>
	   <th>DMG/AC</th></tr><tr>';
	    for($i=0;$i<count($item);$i++)
	   {
		  $item_a=explode('&',$item[$i]);
		  if($item_a[0]=='F')
		  {
		  echo '<td>'.$item_a[0].'</td>
				<td>'.$item_a[2].'</td>
				<td>'.$item_a[3].'.-Tf</td>
				<td>'.$item_a[4].''.$item_a[5].'</td>';
				
				echo'<td>'.$item_a[6].' dmg</td>';
				$hol="kalandozo";
				echo"<td><button class='btn btn-danger' onclick=elad('".$hol."','".$item_a[7]."','".$item_a[3]."')>Elad</td>";
				echo '</tr><tr>';
	   }
	   }
	   echo'
	  </table></p>
    </div>
    <div id="SP" class="tab-pane fade">
      <h3>Páncélok</h3>
      <p>
	  <table class="table table-responsive table-bordered" style="overflow:auto; background-color:#ffffff; color:black;">
	   <tr><th>Típus</th>
	   <th>Név</th>
	   <th>Ár db/Tf</th>
	   <th>módosító</th>
	   <th>DMG/AC</th></tr><tr>';
	    for($i=0;$i<count($item);$i++)
	   {
		  $item_a=explode('&',$item[$i]);
		  if($item_a[0]=='P')
		  {
		  echo '<td>'.$item_a[0].'</td>
				<td>'.$item_a[2].'</td>
				<td>'.$item_a[3].'.-Tf</td>
				<td>'.$item_a[4].''.$item_a[5].'</td>';
				
				echo'<td>'.$item_a[6].' AC</td>';
				
				$hol="kalandozo";
				echo"<td><button class='btn btn-danger' onclick=elad('".$hol."','".$item_a[7]."','".$item_a[3]."')>Elad</td>";
				echo '</tr><tr>';
	   }
	   }
	   echo'
	  </table></p>
    </div>
    <div id="SNY" class="tab-pane fade">
      <h3>Nyakláncok</h3>
      <p>
	  <table class="table table-responsive table-bordered" style="overflow:auto; background-color:#ffffff; color:black;">
	   <tr><th>Típus</th>
	   <th>Név</th>
	   <th>Ár db/Tf</th>
	   <th>módosító</th>
	   </tr><tr>';
	    for($i=0;$i<count($item);$i++)
	   {
		  $item_a=explode('&',$item[$i]);
		  if($item_a[0]=='NY')
		  {
		  echo '<td>'.$item_a[0].'</td>
				<td>'.$item_a[2].'</td>
				<td>'.$item_a[3].'.-Tf</td>
				<td>'.$item_a[4].''.$item_a[5].'</td>';
				
				
				
				$hol="kalandozo";
				echo"<td><button class='btn btn-danger' onclick=elad('".$hol."','".$item_a[6]."','".$item_a[3]."')>Elad</td>";
				echo '</tr><tr>';
	   }
	   }
	   echo'
	  </table></p>
    </div>
	<div id="SGY" class="tab-pane fade">
      <h3>Gyűrűk</h3>
      <p>
	  <table class="table table-responsive table-bordered" style="overflow:auto; background-color:#ffffff; color:black;">
	   <tr><th>Típus</th>
	   <th>Név</th>
	   <th>Ár db/Tf</th>
	   <th>módosító</th>
	  </tr><tr>';
	    for($i=0;$i<count($item);$i++)
	   {
		  $item_a=explode('&',$item[$i]);
		  if($item_a[0]=='GY')
		  {
		  echo '<td>'.$item_a[0].'</td>
				<td>'.$item_a[2].'</td>
				<td>'.$item_a[3].'.-Tf</td>
				<td>'.$item_a[4].''.$item_a[5].'</td>';
				
				
				
				$hol="kalandozo";
				echo"<td><button class='btn btn-danger' onclick=elad('".$hol."','".$item_a[6]."','".$item_a[3]."')>Elad</td>";
				echo '</tr><tr>';
	   }
	   }
	   echo'
	  </table></p>
    </div>
	<div id="SPO" class="tab-pane fade">
      <h3>Italok</h3>
      <p>
	  <table class="table table-responsive table-bordered" style="overflow:auto; background-color:#ffffff; color:black;">
	   <tr><th>Típus</th>
	   <th>Név</th>
	   <th>Ár db/Tf</th>
	   <th>módosító</th>
	   </tr><tr>';
	    for($i=0;$i<count($item);$i++)
	   {
		  $item_a=explode('&',$item[$i]);
		  if($item_a[0]=='PO')
		  {
		  echo '<td>'.$item_a[0].'</td>
				<td>'.$item_a[2].'</td>
				<td>'.$item_a[3].'.-Tf</td>
				<td>'.$item_a[4].''.$item_a[5].'</td>';
				
				
				
				$hol="kalandozo";
				echo"<td><button class='btn btn-danger' onclick=elad('".$hol."','".$item_a[6]."','".$item_a[3]."')>Elad</td>";
				echo '</tr><tr>';
	   }
	   }
	    echo'	  </table></p>
    </div>
  </div>
</div><div class="col-sm-7" id="arus">';
	   }
	else
	{
		echo "Válassz egy karakter akivel vásárolnál";
	}
?>