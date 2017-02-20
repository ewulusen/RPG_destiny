//globális változók
var str,ref,agi,ini,con,def,dex,luck,inte,dmg,armor,ac,eac,hp,ehp,mac,emac,estr,eref,eagi,eini,econ,edef,edex,eluck,einte,edmg,earmor;
var faj=getParameterByName("faj");
var kaszt=getParameterByName("kaszt");
var gamemap=[];
var alap_movek="";
var alap_move="";
var player,lvl;
var enemy;
var chest;
var eventText=0;
var indike=0;
var xp=0;
var lvl=getParameterByName('lvl');
var delay=2000; //2 second
var delay2=8000; //8 second
var delay3=15000; //15 second
var page;

///////////////////////////////////////////////////
function ajaxStep(move,jel)
{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('dungeon').innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "view/catacombs.php?move="+move+"&jel="+jel+"", true);
        xmlhttp.send();
	
}
function ajaxAttack(i,j)
{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('dungeon').innerHTML = this.responseText;
            }
        };
		
        xmlhttp.open("GET","view/attack.php?i="+i+"&j="+j+"", true);
        xmlhttp.send();
	document.getElementById("attackMenu").style.display="block";
	$.ajax(
		{
			type:"GET",
			url:'ajax/getSpells.php',
			success:function(result)
				{
					$("#spells").html(result)
				}
				});
}
function spell(id)
{
	var emac=document.getElementById("emac").innerHTML;
	$.ajax(
		{
			type:"GET",
			data:'emac='+emac+'&id='+id,
			url:'ajax/castSpell.php',
			success:function(result)
				{
					console.log(result);
				}
				});
}
function runAway()
{
	$.ajax(
		{
			type:"GET",
			url:'ajax/runAway.php',
			success:function(result)
				{
					$("#mainPage").html(result)
				}
				});
	
		//jobb menű vissza alakítása
				var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('menuPage').innerHTML = this.responseText;
            }
        };
		
        xmlhttp.open("GET","view/menuPage.php", true);
        xmlhttp.send();
}

function ajaxOut()
{
		$.ajax(
		{
			type:"GET",
			url:'ajax/exitDungeon.php',
			success:function(result)
				{
					$("#mainPage").html(result)
				}
				});
				
		//jobb menű vissza alakítása
				var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('menuPage').innerHTML = this.responseText;
            }
        };
		
        xmlhttp.open("GET","view/menuPage.php", true);
        xmlhttp.send();
}
function ajaxOpenChest(i,j)
{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('dungeon').innerHTML = this.responseText;
            }
        };
		
        xmlhttp.open("GET","ajax/openChest.php?i="+i+"&j="+j+"", true);
        xmlhttp.send();
		setTimeout(function() {
			 ajaxCatacombs();
			}, delay2);
	
}
function ajaxCatacombs()
{
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('mainPage').innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "view/catacombs.php", true);
        xmlhttp.send();
		ajaxCatacombsMenu();
		document.getElementById("attackMenu").style.display="none";
} 
function ajaxCatacombsMenu()
{
	var xmlhttp = new XMLHttpRequest();
	 xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('menuPage').innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "view/catacombsMenu.php", true);
        xmlhttp.send();
    
}
function ajaxload(page1,hol) {
   page=page1;
  // console.log(page);   
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(hol).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "view/"+page1+".php", true);
        xmlhttp.send();
    }
function elad(hol,id,money) {
var m=document.getElementById('charmoney').innerHTML;
//console.log(document.getElementById('charmoney').innerHTML); 
m=Number(m)+Number(money);
//console.log(m);   
document.getElementById('charmoney').innerHTML=m;
//console.log(document.getElementById('charmoney').innerHTML); 
  // console.log(page);   
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(hol).innerHTML = this.responseText;
            }
        };
		//console.log("view/shopYou.php?id="+id+"&M="+money+"&muvelet=0");
        xmlhttp.open("GET", "view/shopYou.php?id="+id+"&M="+money+"&muvelet=0", true);
        xmlhttp.send();
    }
	
function megvesz(hol,Tipus,id,money) {
var m=document.getElementById('charmoney').innerHTML;
//console.log(document.getElementById('charmoney').innerHTML); 
m=Number(m)-Number(money);
//console.log(m);   
document.getElementById('charmoney').innerHTML=m;
//console.log(document.getElementById('charmoney').innerHTML); 
  // console.log(page);   
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(hol).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "view/shopYou.php?T="+Tipus+"&id="+id+"&M="+money+"&muvelet=1", true);
        xmlhttp.send();
    }
function ajaxStartPage(page1,hol) {
	
   if(getCookie("pid") == "")
   {
	   
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(hol).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "view/"+page1+".php", true);
        xmlhttp.send();
   }
   else
   {
	 page=getParameterByName("hol");
	ajaxload(page,hol);
   }
    }
//karakterkészítésnél megnöveli a stat értékét 1 el//
function novel(mit)
{
var kocka=document.getElementById('kocka').innerHTML;
if(kocka>0)
{	
var x=document.getElementById(mit).innerHTML;
document.getElementById(mit).innerHTML=Number(x)+Number(1);	
document.getElementById('kocka').innerHTML=Number(kocka)-Number(1);	
}
szamol();
}
//karakterkészítésnél csökkenti a stat értékét 1 el//
function csokken(mit)
{
var kocka=document.getElementById('kocka').innerHTML;
var x=document.getElementById(mit).innerHTML;
if(x>0)
{	
document.getElementById(mit).innerHTML=Number(x)-Number(1);	
document.getElementById('kocka').innerHTML=Number(kocka)+Number(1);	
}
szamol();
}
//amikor növelem a statokat számolja a mellék statokat//
function szamol()
{
	if(document.getElementById('AC'))
	{
	document.getElementById('AC').innerHTML=Number(document.getElementById('Constitut').innerHTML)+Number(document.getElementById('Defend').innerHTML);
	document.getElementById('MAC').innerHTML=Number(document.getElementById('Inteligent').innerHTML)+Number(document.getElementById('Defend').innerHTML);
	document.getElementById('Mana').innerHTML=Number(document.getElementById('Inteligent').innerHTML)*Number(10);
	document.getElementById('Perception').innerHTML=Number(document.getElementById('Inteligent').innerHTML)+Number(document.getElementById('Reflex').innerHTML);
	document.getElementById('Iniciative').innerHTML=Number(document.getElementById('Reflex').innerHTML)+Number(document.getElementById('Agility').innerHTML);
	document.getElementById('HP').innerHTML=Number(document.getElementById('Constitut').innerHTML)+Number(document.getElementById('Streng').innerHTML)+Number(document.getElementById('Defend').innerHTML);
}
}
szamol();
//karakterkészítés/kitöltött mindent
function tovabb()
{
	var str=document.getElementById('Streng').innerHTML;
	var agi=document.getElementById('Agility').innerHTML;
	var def=document.getElementById('Defend').innerHTML;
	var dex=document.getElementById('Dexterity').innerHTML;
	var ref=document.getElementById('Reflex').innerHTML;
	var inte=document.getElementById('Inteligent').innerHTML;
	var con=document.getElementById('Constitut').innerHTML;
	var luck=document.getElementById('Luck').innerHTML;
	var kocka=document.getElementById('kocka').innerHTML;
	var faj=document.getElementById('faj').innerHTML;
	var kaszt=document.getElementById('kaszt').innerHTML;
	var nev=document.getElementById('nev').value;
	var ac=4;
	if(nev!="")
	{
		var id="";
	$.ajax(
		{
			type:"GET",
			url:'ajax/createChar.php?values='+faj+','+kaszt+','+str+','+agi+','+def+','+dex+','+ref+','+inte+','+con+','+luck+','+kocka+','+nev,
			success:function(result)
				{
				console.log(result+"result");
				id=result;
				document.cookie="cid="+id;
				}
				});
		kocka.innerHTML="";
		document.cookie="lvl=1";
		selectChar(id,nev,kaszt,'100','1',str,'3',ac,con,def,inte,faj,agi)
$.ajax(
		{
			type:"GET",
			url:'ajax/firstStory.php',
			success:function(result)
				{
						$("#mainPage").html(result)
				}
				});
				
			
			
	}
	else
	{
		document.getElementById('error').innerHTML='Töltsd ki a nevet!';
	}
}	

function firstStory()
{
	ajaxCatacombsMenu()		
	ajaxCatacombs();
}
function updateChar()
{
	var str=document.getElementById('Streng').innerHTML;
	var agi=document.getElementById('Agility').innerHTML;
	var def=document.getElementById('Defend').innerHTML;
	var dex=document.getElementById('Dexterity').innerHTML;
	var ref=document.getElementById('Reflex').innerHTML;
	var inte=document.getElementById('Inteligent').innerHTML;
	var con=document.getElementById('Constitut').innerHTML;
	var luck=document.getElementById('Luck').innerHTML;
	var kocka=document.getElementById('kocka').innerHTML;
	var cid=document.getElementById('cid').innerHTML;
	window.location.href='index.php?do=upChar&values='+str+','+agi+','+def+','+dex+','+ref+
	','+inte+','+con+','+luck+','+kocka+','+cid;

}	

//Erdő gamefield létrehozása
function gamefield()
{
	if(document.getElementById('gamefield'))
	{
	alap_movek=getParameterByName('agi');
	alap_move=alap_movek;
	//console.log(alap_move);
	var z=1;
	var epos=Math.floor((Math.random()*61)+2);
	var kpos=Math.floor((Math.random()*62)+1);
	////console.log(epos+" "+kpos);
	var tbl = document.getElementById('gamefield');	
    var tbdy = document.createElement('tbody');
    for (var i = 0; i < 8; i++) {
        var tr = document.createElement('tr');
        for (var j = 0; j < 8; j++) {
                var td = document.createElement('td');
				td.id=i+","+j;
				if(z==1)
				{
				var imgsrc=document.createElement('img');
					imgsrc.src="player_pic/"+faj+kaszt+"g.gif";
                td.appendChild(imgsrc);
				gamemap.push(z-1+',p');
				}
				
				else if(z==epos)
				{
				gamemap.push(z-1+',e');}
				else if(z==kpos)
				{
				gamemap.push(z-1+',c');
				} 
				else {
				gamemap.push(z-1);}
				tr.appendChild(td);
			z++;			
            }
		 tbdy.appendChild(tr);	
        }
       
    
    tbl.appendChild(tbdy);
perception(gamemap);
}
}

/**észlelés, átvizsgálja a játékteret
és ha valamilyen lény/tárgy közelébe vagyunk, jelez*/
function perception(game)
{
	
	//console.log(game);
	for(var i=0;i<64;i++)
	{
			if(game[i].length>2)
				{
						var exp=game[i].split(",");
						if(exp[1]=="p")
							 player=exp[0];
						if(exp[1]=="e")
							 enemy=exp[0];
						if(exp[1]=="c")
							 chest=exp[0];
						
		 }
	}
	if((Number(player)-Number(8))== enemy)
				{
					//console.log("felette");
					createrowtoevent("feletted mozgolódás hallatszik")
				}
	if( (Number(player)-Number(8))== chest)
				{
					//console.log("felette");
					createrowtoevent("úgy érzed feletted valami <br>értékeset rejt a szoba")
				}
	if( (Number(player)+Number(8))== enemy)
				{
					//console.log("alatta");
					createrowtoevent("alattad mozgolódás hallatszik")
				}
	if( (Number(player)+Number(8))== chest)
				{
					//console.log("alatta");
					createrowtoevent("úgy érzed alattad valami <br>értékeset rejt a szoba")
				}	
	if( (Number(player)+Number(1))== chest)
				{
					//console.log("jobbra");
					createrowtoevent("úgy érzed jobbra valami <br>értékeset rejt a szoba")
				}
	if( (Number(player)+Number(1))== enemy)
				{
					//console.log("jobbra");
					createrowtoevent("jobbra mozgolódás hallatszik");
				}
	if( (Number(player)-Number(1))== chest)
				{
					//console.log("balra");
					createrowtoevent("úgy érzed balra valami <br>értékeset rejt a szoba")
				}
	if( (Number(player)-Number(1))== enemy)
				{
					//console.log("balra");
					createrowtoevent("balra mozgolódás hallatszik");
				}
		if(player==chest)
		{
			endGamePV();
		}			
		if(player==enemy)
		{
			console.log('Leth the battle begin!');
			attack();
		}
	//console.log(player+";"+enemy+";"+chest);
}			

//mozgás a mapponű
/*
function moveTo(x,y)
{
	if(alap_move>0)
	{
	if(x=="-")
	{
		if((Number(player)-Number(y))>0)
		{
		player=Number(player)-Number(y);
		drawMap();
		alap_move=Number(alap_move)-Number(1);
		document.getElementById('move').innerHTML=alap_move;
		}
		else 
		{
			document.getElementById('error').innerHTML="oda nem léphetsz";
		}
	}
	if(x=="+")
	{
		if((Number(player)+Number(y))<64)
		{
		player=Number(player)+Number(y);
		drawMap();
			alap_move=Number(alap_move)-Number(1);
		document.getElementById('move').innerHTML=alap_move;
		}
		else 
		{
			document.getElementById('error').innerHTML="oda nem léphetsz";
		}
	}
	}
	else 
	{
		document.getElementById('move').innerHTML="elfogyott a mozgásod fejezd be a köröd";
	}
}*/
//mozgás után újrarajzoljuk a mappot az aktuális poziciónkkal

/*function drawMap()
{
	gamemap=[];
	//console.log(gamemap);
	if(document.getElementById('gamefield'))
	{
	var z=0;
	////console.log(epos+" "+kpos);
	var tbl = document.getElementById('gamefield');
	tbl.innerHTML="";
    var new_tbdy = document.createElement('tbody');
    for (var i = 0; i < 8; i++) {
        var tr = document.createElement('tr');
        for (var j = 0; j < 8; j++) {
                var td = document.createElement('td');
				td.id=i+","+j;
				if(z==player)
				{
				var imgsrc=document.createElement('img');
					imgsrc.src="player_pic/"+faj+kaszt+"g.gif";
                td.appendChild(imgsrc);
				gamemap.push(z+',p');
				}
				
				else if(z==enemy && indike=='0')
				{
				gamemap.push(z+',e');}
				else if(z==chest)
				{
				gamemap.push(z+',c');
				} 
				else {
				gamemap.push(z);}
				tr.appendChild(td);
			z++;			
            }
		 new_tbdy.appendChild(tr);	
        }
       
   // console.log(gamemap);
    tbl.appendChild(new_tbdy);
perception(gamemap);
}
}*/
//vége a játéknak player nyert
function endGamePV ()
{
document.cookie="xp="+document.getElementById('xp').innerHTML;
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("mainPage").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "view/playerWin.php", true);
        xmlhttp.send();

		setTimeout(function() {
			 ajaxCatacombs();
			}, delay2);
}
//vége a játéknak player vesztett
function endGamePL()
{
	document.cookie="end=1";
	//console.log(document.getElementById('xp').innerHTML+'player lose');
	document.cookie="xp="+document.getElementById('xp').innerHTML;
	ajaxload('playerLose','mainPage');
	}
// urlből változók kiolvasása
function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
//vége a körnek gép lép és újratöltődi ka mozgás pont
function endTurn()
{
	if(indike=='0')
	{
	for(var i=0;i<8;i++){
	if((Number(enemy)-Number(8))== player)
				{
					attack();
					break;
				}
	
	else if( (Number(enemy)+Number(8))== player)
				{
					attack();
						break;					}
	else if( (Number(enemy)+Number(1))== player)
				{
					attack();
					break;
				}
	else if( (Number(enemy)-Number(1))== player)
				{
					attack();
					break;
				}
		else 
		{
			var merre=Math.floor((Math.random()*3));
			if(merre==0)
			{
				emoveTo("-","8");
			}
			if(merre==1)
			{
				emoveTo("+","8");
			}
			if(merre==2)
			{	
				emoveTo("-","1");
			}
			if(merre==3)
			{
				emoveTo("+","1");
			}
		}
	}
	}
drawMap();	
	document.getElementById('move').innerHTML=getParameterByName('agi');
	alap_move=alap_movek;
}
//console.log(gamemap);
//billentyű lenyommással vezért mozgatás
document.onkeypress=function senseKey(e)
{
	
	 var keynum;
if(document.getElementById('dungeon'))
	{
    if(window.event) { // IE                    
      keynum = e.keyCode;
    } else if(e.which){ // Netscape/Firefox/Opera                   
      keynum = e.which;
    }
	if(keynum=="119" || keynum=="38")
	{
	ajaxStep("100","m")		
	}
	if(keynum=="115" || keynum=="40")
	{
	ajaxStep("100","p")		
	}
	if(keynum=="100" || keynum=="39")
	{
	ajaxStep("1","p")		
	}
	if(keynum=="97" || keynum=="37")
	{
	ajaxStep("1","m")		
	}
	if(keynum=="116")
	{
	endTurn();
	}
	}
}
//karakter kiválasztása kalandozásra/egyéb dologra
function selectChar(cid,ki,kaszt,penz,lvl,kstr,fdmg,pac,kcon,kdef,kint,faj,kagi)
{
	//console.log(cid+","+ki+","+kaszt+","+penz+","+lvl+","+kstr+","+fdmg+","+pac+","+kcon+","+kdef+","+kint)
	var kdmg=Number(fdmg)+Number(kstr);
	var kac=Number(kcon)+Number(kdef)+Number(pac);
	var khp=Number(kcon)+Number(kdef)+Number(kstr);
	var kmana=Number(kint)*10;
	document.cookie="cid="+cid;
	document.cookie="char="+ki;
	document.cookie="kaszt="+kaszt;
	document.cookie="faj="+faj;
	document.cookie="penz="+penz;
	document.cookie="lvl="+lvl;
	document.getElementById("selectCharakter").innerHTML=ki+" karakter kiválasztva ";
	document.getElementById("charmoney").innerHTML=penz;
	document.getElementById("charmove").innerHTML=kagi;
	document.getElementById("charname").innerHTML=ki;
	document.getElementById("chardmg").innerHTML=kdmg;
	document.getElementById("charAC").innerHTML=kac;
	document.getElementById("charLVL").innerHTML=lvl;
	document.getElementById("hp").innerHTML=khp+"/"+khp;
	document.getElementById("mana").innerHTML=kmana+"/"+kmana;
	document.getElementById("mainpages").style.backgroundImage="url('img/backgrounds/"+faj+"bcg.jpg')";
	document.getElementById("charmana").innerHTML=kmana;
	document.getElementById("manabar").setAttribute('aria-valuemax',kmana);
	document.getElementById("manabar").setAttribute('aria-valuenow',kmana);
	document.getElementById("charhp").innerHTML=khp;
	document.getElementById("hpbar").setAttribute('aria-valuemax',khp);
	document.getElementById("hpbar").setAttribute('aria-valuenow',khp);
	
}
//új sor hozzá adása az event mappához
function createrowtoevent(szoveg)
	{
		//console.log(szoveg);
	var tbl = document.getElementById('event');	
    var tbdy = document.createElement('tbody');
	var tr = document.createElement('tr');
	tr.id="event"+eventText;
	var td = document.createElement('td');
	td.appendChild(document.createTextNode(szoveg));
			tr.appendChild(td);		  
		 tbdy.appendChild(tr);	
    tbl.appendChild(tbdy);
	if((eventText / 18 )>1)
	{
		document.getElementById('event').deleteRow(0);
		
	}
		eventText++;
	}
//ellenfél mozgása a mappon	
function emoveTo(x,y)
{
	if(x=="-")
	{
		if((Number(enemy)-Number(y))>0)
		{
		enemy=Number(enemy)-Number(y);
		}
	}
	if(x=="+")
	{
		if((Number(enemy)+Number(y))<64)
		{
		enemy=Number(enemy)+Number(y);
	}
	}
	
}
//támadás
function attack()
{
	/*console.log(window.location.href);
	window.open("view/battlefield.php","_blank");
	*/
	var btf=document.getElementById('btf');
	var btf2=document.getElementById('btf2');
	//console.log()
	btf.style.display='inline';
	btf2.style.display='inline';
	document.getElementById('button').style.display='none';
	document.getElementById('button2').style.display='none';
	var tabla = document.getElementById('gamefield');
	tabla.style.display="none";
	str=getParameterByName('str');
	agi=getParameterByName('agi');
	con=getParameterByName('con');
	luck=getParameterByName('luc');
	def=getParameterByName('def');
	dex=getParameterByName('dex');
	inte=getParameterByName('int');
	dmg=getParameterByName('dmg');
	armor=getParameterByName('ac');
	ref=getParameterByName('ref');
	ini=ref+agi;
	estr=getParameterByName('estr');
	eagi=getParameterByName('eagi');
	econ=getParameterByName('econ');
	eluck=getParameterByName('eluck');
	edef=getParameterByName('def');
	edex=getParameterByName('dex');
	einte=getParameterByName('inte');
	edmg=getParameterByName('estr');
	earmor=getParameterByName('def');
	eref=getParameterByName('eref');
	eini=eref+eagi;
	
	hp=Number(con)+Number(def)+Number(str);
	ac=Number(con)+Number(def)+Number(armor);
	mac=Number(inte)+Number(def);
	dmg=Number(dmg)+Number(str);
	ehp=Number(econ)+Number(edef)+Number(estr)
	eac=Number(econ)+Number(edef)+Number(earmor);
	emac=Number(einte)+Number(edef);
	edmg=Number(edmg)+Number(estr);
	xp=Number(ehp)*10;
	document.getElementById('hp').innerHTML=Number(con)+Number(def)+Number(str);
	document.getElementById('ac').innerHTML=Number(con)+Number(def)+Number(armor);
	document.getElementById('mac').innerHTML=Number(inte)+Number(def);
	document.getElementById('dmg').innerHTML=Number(dmg)+Number(str);
	document.getElementById('ini').innerHTML=Number(ref)+Number(agi);
	document.getElementById('ehp').innerHTML=Number(econ)+Number(edef)+Number(estr);
	document.getElementById('eac').innerHTML=Number(econ)+Number(edef)+Number(earmor);
	document.getElementById('emac').innerHTML=Number(einte)+Number(edef);
	document.getElementById('edmg').innerHTML=Number(edmg)+Number(estr);
	document.getElementById('eini').innerHTML=Number(eref)+Number(eagi);
	battlestart();
}
//csata elkezdése
function battlestart()
{
	if(eini>ini)
	{
		createrowtoevent("Az ellenfél kezd");
		enemyhit();
	}
}
//ellenfél űt
function enemyhit()
{
	var dmg=document.getElementById('chardmg').innerHTML;
	var ac=document.getElementById('charAC').innerHTML;
	var mana=document.getElementById('charmana').innerHTML;
	var hp=document.getElementById('charhp').innerHTML;
	var str=document.getElementById('charstr').innerHTML;
	var edmg=document.getElementById('enemydmg').innerHTML;
	var eac=document.getElementById('enemyAC').innerHTML;
	var emana=document.getElementById('enemymana').innerHTML;
	var ehp=document.getElementById('enemyhp').innerHTML;
	var estr=document.getElementById('enemystr').innerHTML;
	var emanabar=document.getElementById('emanabar');
	var ehpbar=document.getElementById('ehpbar');
	var phpbar=document.getElementById('hpbar');
	var emaxhp=document.getElementById('emaxhp').innerHTML;
	var maxhp=document.getElementById('maxhp').innerHTML;
	
  createrowtoevent("Az ellenfél támad");

		var dobokocka=Math.floor((Math.random()*19)+1);
		//console.log(dobokocka+" kocka");
		if(dobokocka>1)
		{
			if(dobokocka==20)
			{
			goodLuck("E");
			}
		else
		{
			//console.log("bejött");
		if((Number(dobokocka)+Number(estr))>ac)
		{
			var sebzes=Math.floor((Math.random()*edmg)+1);
			
			createrowtoevent("Sikerült neki, sebzett: "+sebzes);
			
			hp=Number(hp)-Number(sebzes);
			document.getElementById('charhp').innerHTML=hp;
			var procent=(Number(hp)*Number(100))/Number(maxhp);
			phpbar.style.width=procent+"%";
			document.getElementById('hp').innerHTML=maxhp+"/"+hp;
			if (hp<1)
			{
				endGamePL();
			}
			
		}
		else
		{
		
		createrowtoevent("nem sikerült neki");
		
		}
		}
		
		}
		else
		{
		badLuck("E");
		}
		 enemyPicMove()
}
function playerhit()
{
	var dmg=document.getElementById('chardmg').innerHTML;
	var ac=document.getElementById('charAC').innerHTML;
	var mana=document.getElementById('charmana').innerHTML;
	var hp=document.getElementById('charhp').innerHTML;
	var str=document.getElementById('charstr').innerHTML;
	var edmg=document.getElementById('enemydmg').innerHTML;
	var eac=document.getElementById('enemyAC').innerHTML;
	var emana=document.getElementById('enemymana').innerHTML;
	var ehp=document.getElementById('enemyhp').innerHTML;
	var estr=document.getElementById('enemystr').innerHTML;
	var emanabar=document.getElementById('emanabar');
	var ehpbar=document.getElementById('ehpbar');
	var phpbar=document.getElementById('hpbar');
	var emaxhp=document.getElementById('emaxhp').innerHTML;
	var maxhp=document.getElementById('maxhp').innerHTML;
	document.getElementById("tamadas").style.pointerEvents="none";
	document.getElementById("tamadas").style.cursor="default";
	
	
  createrowtoevent("Te támadsz");
	
	
		var dobokocka=Math.floor((Math.random()*19)+1);
		if(dobokocka>1)
		{
			if(dobokocka==20)
			{
				goodLuck("P");
			}
			else{
		if((Number(dobokocka)+Number(str))>eac)
		{
			var sebzes=Math.floor((Math.random()*dmg)+1);
			
			createrowtoevent("Sikerült, sebzésed: "+sebzes);
			
			
			ehp=Number(ehp)-Number(sebzes);
			
			document.getElementById('enemyhp').innerHTML=ehp;	
			var procent=(Number(ehp)*Number(100))/Number(emaxhp);
				ehpbar.style.width=procent+"%";
				document.getElementById('enemyhps').innerHTML=emaxhp+"/"+ehp;
		}
		else{
		
		createrowtoevent("nem sikerül");
			
		}
			}
				playerPicMove()
	if(ehp>0)
		{
			setTimeout(function() {
			  enemyhit();
			}, delay);
			
		}
		else
		{
		//console.log(document.getElementById('xp').innerHTML);
		document.cookie="xp="+document.getElementById('xp').innerHTML;
			endGamePV();
		}
		}
else
{
badLuck("P");	
}
		
}
//player űt
//Szerencse a játékban
function goodLuck(ki)
{
	var dmg=document.getElementById('chardmg').innerHTML;
	var ac=document.getElementById('charAC').innerHTML;
	var mana=document.getElementById('charmana').innerHTML;
	var hp=document.getElementById('charhp').innerHTML;
	var str=document.getElementById('charstr').innerHTML;
	var edmg=document.getElementById('enemydmg').innerHTML;
	var eac=document.getElementById('enemyAC').innerHTML;
	var emana=document.getElementById('enemymana').innerHTML;
	var ehp=document.getElementById('enemyhp').innerHTML;
	var estr=document.getElementById('enemystr').innerHTML;
	var emanabar=document.getElementById('emanabar');
	var ehpbar=document.getElementById('ehpbar');
	var phpbar=document.getElementById('hpbar');
	var emaxhp=document.getElementById('emaxhp').innerHTML;
	var maxhp=document.getElementById('maxhp').innerHTML;
	if(ki==="P")
	{
		var sebzes=Math.floor((Math.random()*dmg)+1);
				sebzes=Number(sebzes)*Number(2);
			
			createrowtoevent("<b>A szerencse kegyeltje, vagy sebzésed: "+sebzes+"</b>");
			
			ehp=Number(ehp)-Number(sebzes);
			document.getElementById('ehp').innerHTML=ehp;
			var procent=(Number(ehp)*Number(100))/Number(emaxhp);
			ehpbar.style.width=procent+"%";
			document.getElementById('enemyhps').innerHTML=emaxhp+"/"+ehp;
	if (ki==="E")
	{
			var sebzes=Math.floor((Math.random()*edmg)+1);
			sebzes=Number(sebzes)*Number(2);
			
			createrowtoevent("<b>Az ellenfeled a szerencse kegyeltje, sebzett: "+sebzes+"</b>");
			
			hp=Number(hp)-Number(sebzes);
			document.getElementById('hp').innerHTML=hp;
			var procent=(Number(hp)*Number(100))/Number(maxhp);
		phpbar.style.width=procent+"%";
		document.getElementById('hp').innerHTML=maxhp+"/"+hp;

	}
}
}
//balszerencsa a játékban
function badLuck(ki,mi)
{
	var dmg=document.getElementById('chardmg').innerHTML;
	var ac=document.getElementById('charAC').innerHTML;
	var mana=document.getElementById('charmana').innerHTML;
	var hp=document.getElementById('charhp').innerHTML;
	var str=document.getElementById('charstr').innerHTML;
	var edmg=document.getElementById('enemydmg').innerHTML;
	var eac=document.getElementById('enemyAC').innerHTML;
	var emana=document.getElementById('enemymana').innerHTML;
	var ehp=document.getElementById('enemyhp').innerHTML;
	var estr=document.getElementById('enemystr').innerHTML;
	var emanabar=document.getElementById('emanabar');
	var ehpbar=document.getElementById('ehpbar');
	var phpbar=document.getElementById('hpbar');
	var emaxhp=document.getElementById('emaxhp').innerHTML;
	var maxhp=document.getElementById('maxhp').innerHTML;
	if(!mi)
	{
		mi="H";
	}
	if(ki=="E")
	{
		if(mi=="H")
		{
		
		var sebzes=Math.floor((Math.random()*edmg)+1);
		createrowtoevent("Balsiker! az ellenfeled megsebesítette magát "+sebzes+" dmg-vel");
		ehp=Number(ehp)-Number(sebzes);
		document.getElementById('enemyhp').innerHTML=ehp;
		var procent=(Number(ehp)*Number(100))/Number(emaxhp);
				ehpbar.style.width=procent+"%";
	document.getElementById('enemyhps').innerHTML=emaxhp+"/"+ehp;
		}
	}
	if(ki=="P")
	{
		if(mi=="H")
		{
		
		createrowtoevent("Megcsúszól, érzed hogy ebből gond lesz,"+ 
		"lássuk a szerencséd kihuz e a kutyaszorítóbol ");
		
		var destiny=Math.floor((Math.random()*19)+5);
		var py=Math.floor((Math.random()*19)+Number(luck));
		if(destiny>py)
		{
		var sors=Math.floor((Math.random()*10)+1);
		if(sors % 5 ==0)
		{
			var szoveg="elvesztetted fegyvered a csata végiég nélküle kell harcolnod!";
			dmg=str;
			document.getElementById('dmg').innerHTML=dmg;
		}
		else
		{
			var sebzes=Math.floor((Math.random()*dmg)+1);
			sebzes=Number(sebzes)*Number(2);
			var szoveg="ahogy esel megsebzed magad méghozzá: "+sebzes;
			hp=Number(hp)-Number(sebzes);
			document.getElementById('hp').innerHTML=hp;
			var procent=(Number(hp)*Number(100))/Number(maxhp);
			phpbar.style.width=procent+"%";
			document.getElementById('hp').innerHTML=maxhp+"/"+hp;
			
		}
		
		createrowtoevent("nincs szerencséd!"+szoveg);
		enemyhit();
		}
		else
		{
		createrowtoevent("A ahogy elesnél kitámasztasz a fegyvereddel és megúsztad hogy valami szőrnyű történjen.");
		enemyhit();		
		}
		}
	}
	
}
//kép mozgatása ütésnél player
function playerPicMove(){
	document.getElementById("enemypic").style.position="relative";
	document.getElementById("enemypic").style.zIndex="0";
	document.getElementById("playerpic").style.position="absolute";
	document.getElementById("playerpic").style.zIndex="1";
  var dest = parseInt($("#playerpic").css("margin-left").replace("px", "")) + 10;
 
    while (dest != 100) {
        $("#playerpic").animate({
            marginLeft: dest+"px"
          }, 30);
		  dest+=10;
		  
    }
   
	while (dest != -150) {
        $("#playerpic").animate({
            marginLeft: dest+"px"
          }, 30);
		  dest-=10;
		
    }
	document.getElementById("playerpic").style.marginLeft="0px";
	document.getElementById("enemypic").style.marginLeft="0px";
	
}
//kép mozgatása ütésnél player
function enemyPicMove(){
	document.getElementById("playerpic").style.position="relative";
	document.getElementById("playerpic").style.zIndex="0";
	document.getElementById("enemypic").style.position="absolute";
	document.getElementById("enemypic").style.zIndex="1";
  var dest = parseInt($("#enemypic").css("margin-left").replace("px", "")) - 10;
 
    while (dest != -200) {
        $("#enemypic").animate({
            marginLeft: dest+"px"
          }, 30);
		  dest-=10;
		  
    }
   
	while (dest != 0) {
        $("#enemypic").animate({
            marginLeft: dest+"px"
          }, 30);
		  dest+=10;
		  
    }
		document.getElementById("playerpic").style.marginLeft="0px";
		document.getElementById("enemypic").style.marginLeft="0px";
			document.getElementById("tamadas").style.pointerEvents="auto";
			document.getElementById("tamadas").style.cursor="pointer";
}

//cookiek lekérése név szerint
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}
function makecookie(cname,certek)
{
	document.cookie=cname+"="+certek;
}
var delete_cookie = function(name) {
    document.cookie = name + '=;expires=-1;Path=/teszt;Domain="localhost"';
};
