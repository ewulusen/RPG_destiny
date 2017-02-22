<head>
	<link rel="stylesheet" href="Scripts\css\bootstrap.min.css">
	<link rel="stylesheet" href="Scripts\css\ewu.css">
	<link rel="stylesheet" href="Scripts\css\jquery.qtip.css">
  <script src="Scripts/js/jquery.min.js"></script>
  <script type="text/javascript" src="Scripts/js/jquery-ui.min.js"></script>
  <script src="Scripts/js/bootstrap.min.js"></script>
	<script src="Scripts/js/jquery.qtip.min.js"></script>
	    <script src="Scripts/js/jquery.imagemapster.min.js"></script>
  <script src="Scripts/js/functions.js"></script>
  
</head>
<?php if(isset($_COOKIE['pid']))
{
	echo'<body style="background-color:#000000; color:white;">';
}
else
{
		echo"<body style='background-color:#000000; color:white;' onload=ajaxStartPage('loginPage','mainPage')>";
}
?>
<body style="background-color:#000000; color:white;" onload="ajaxStartPage('loginPage','mainPage')">
<div  class="container mainpage" id="mainpages">
<div style="background-color:#312e1f;color:white;width:100%;" class="border3" id="headPage">
		<div class="row">	
		<div class="col-sm-2">Név:<span id="charname">--</span></br>
			LVL:<img src="img/elements/lvl.png"><span id="charLVL">--</span></div>
			<div class="col-sm-2">
			DMG:<img src="img/elements/dmg.png"><span id="chardmg">--</span><br>
			AC:<img src="img/elements/ac.png"><span id="charAC">--</span></div>
			<div class="col-sm-2">Pénz:<img src="img/elements/money.png"><span id="charmoney">--</span>.-Trefu<br>
			Mozgás:<img src="img/elements/move.png"><span id="charmove">--</span><br>
			<oreo id="message"></oreo>
			</div>
			<div class="col-sm-3"><img src="img/elements/mn.png">
				<span id="mana">10/10</span><div class="progress">
					<div class="progress-bar-info" role="progressbar" aria-valuenow="100"
					aria-valuemin="0" aria-valuemax="100" id="manabar" sytle="width:100%">
					<span id="charmana">--</span>
					</div></div>
				
					<img src="img/elements/hp.png">
				<span id="hp">10/10</span><div class="progress">
					<div class="progress-bar-danger" role="progressbar" aria-valuenow="100"
					aria-valuemin="0" aria-valuemax="100" id="hpbar" sytle="width:100%" >
				<span id="charhp">--</span>
					</div>
				</div>
				</div>
				<div class="col-sm-3">
			<img src="img/elements/energy.png"><span id="energy"> 10/10</span><div class="progress">
					<div class="progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="100"
					aria-valuemin="0" aria-valuemax="100" id="energibar" sytle="width:100%">
					<span id="charenergy">--</span>
					</div></div>
			</div>
		</div>
	</div>

<div style=" background-color:#312e1f;height:90%;" class="col-sm-2 border3" id="menuPage">
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
</div>
<div style="height:90%;" class="col-sm-10 border1 container" id="mainPage">

</div>
</div>

<?php

	include_once("Scripts/db.php");
	include_once("model/Model.php");
	include_once("controller/Page.php");
	include_once("controller/Doit.php");
	include_once("controller/Event.php");
	include_once("controller/Login.php");
	include ('view/footer.php');
if(isset($_GET['username']) && isset($_GET['psw']) )
{
	
$page=new Login;
$page->loginCheck($_GET['username'],$_GET['psw']);
}
	if(isset($_GET['mit']) )
		{
	if ($_GET['mit']=="errornad")
		{
	$page = new Page;
	$page->show_Login_error();
		}}
	
		if(isset($_GET['event']))
		{
			$mi=$_GET['event'];
			$page= new Event_e;
			if($mi=='wood')
			{
			$page->startEvent($mi);
			}
		}
		if(isset($_GET['do']))
		{
			$mi=$_GET['do'];
			
			$page= new Doit;
			if($mi=='newChar')
			{
			$page->newChar($_GET['values']);
			}
			if($mi=='costum')
			{
			$page->getChar($_GET['ki']);
			}
			if($mi=='upChar')
			{
			$page->upChar($_GET['values']);
			}
			
		}
	
		if ($_SERVER['QUERY_STRING']=="")
				{
	$page = new Page;
	$page->show_Login();
		}
			
	
?>