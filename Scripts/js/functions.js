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
var enemyNumber;
///////////////////////////////////////////////////
function ajaxStep(move,jel)
{
	var step=document.getElementById('charmove').innerHTML;
	if((step-1)>-1)
	{
	step--;
	document.getElementById('charmove').innerHTML=step;
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('dungeon').innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "view/catacombs.php?move="+move+"&jel="+jel+"", true);
        xmlhttp.send();
	}
	else
	{
		document.getElementById('message').innerHTML="nincs elegendő mozgási erőd kattinst a kör vége gombra";
	}
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
	//$fajta.",".$mit.",".$mana.",".$dmg.",".$kocka;//normál dobás
	var emac=document.getElementById("emac").innerHTML;
	var mac=document.getElementById("mac").innerHTML;
	var inte=document.getElementById("int").innerHTML;
	var maxhp=document.getElementById("maxhp").innerHTML;
	var hp=document.getElementById("charhp").innerHTML;
	var charmana=document.getElementById("charmana").innerHTML;
	
	$.ajax(
		{
			type:"GET",
			data:'spellID='+id,
			url:'ajax/castSpell.php',
			success:function(result)
				{
					var exp=result.split(",");
					//normál dobás
					if(exp[0]=='2')
					{
						if(exp[1]=='H')
						{
							if(maxhp==hp)
							{
								
								if(Number(charmana)-Number(exp[3])>0)
								{
								charmana=Number(charmana)-Number(exp[3]);
								document.getElementById("charmana").innerHTML=charmana;
								document.getElementById("mana").innerHTML=Number(inte)*Number(10)+"/"+charmana;
								document.getElementById("manabar").setAttribute('aria-valuenow',charmana);
								document.getElementById("manabar").style.width=((Number(charmana)*Number(100))/(Number(inte)*Number(10)))+"%";
								createrowtoeventheal("gyógyúltál 0-át");
								enemyhit();
								}
								else
								{
									createrowtoevent("nincs elegendő manád a  varázslatra");
								}
							}
							if(maxhp>hp)
							{
								if(Number(charmana)-Number(exp[3])>0)
								{
								charmana=Number(charmana)-Number(exp[3]);
								document.getElementById("charmana").innerHTML=charmana;
								document.getElementById("mana").innerHTML=Number(inte)*Number(10)+"/"+charmana;
								document.getElementById("manabar").setAttribute('aria-valuenow',charmana);
								document.getElementById("manabar").style.width=((Number(charmana)*Number(100))/(Number(inte)*Number(10)))+"%";
								var heal=Math.floor((Math.random()*exp[4]));
								hp=Number(hp)+Number(heal);
								if(maxhp<hp)
								{
									hp=maxhp;
								}
								createrowtoeventheal("gyógyúltál "+heal);
								document.getElementById("charhp").innerHTML=hp;
								document.getElementById("hp").innerHTML=maxhp+"/"+hp;
								document.getElementById("hpbar").setAttribute('aria-valuenow',hp);
								document.getElementById("hpbar").style.width=((Number(hp)*Number(100))/(maxhp))+"%";
								
								enemyhit();
								}
								else
								{
									createrowtoevent("nincs elegendő manád a  varázslatra");
								}
							}
						
						}
					}
					//balsiker
					if(exp[0]=='4')
					{
						if(exp[1]=='H')
						{
							
								if(Number(charmana)-Number(exp[3])>0)
								{
								charmana=Number(charmana)-Number(exp[3]);
								document.getElementById("charmana").innerHTML=charmana;
								document.getElementById("mana").innerHTML=Number(inte)*Number(10)+"/"+charmana;
								document.getElementById("manabar").setAttribute('aria-valuenow',charmana);
								document.getElementById("manabar").style.width=((Number(charmana)*Number(100))/(Number(inte)*Number(10)))+"%";
								var heal=Math.floor((Math.random()*exp[4]));
								hp=Number(hp)-Number(heal);
								createrowtoeventheal("Balsiker! ahogy mormolod a varázslatod megcsuklik a hangod! sebződtél "+heal);
								document.getElementById("charhp").innerHTML=hp;
								document.getElementById("hp").innerHTML=maxhp+"/"+hp;
								document.getElementById("hpbar").setAttribute('aria-valuenow',hp);
								document.getElementById("hpbar").style.width=((Number(hp)*Number(100))/(maxhp))+"%";
								
								enemyhit();
								}
								else
								{
									createrowtoevent("nincs elegendő manád a  varázslatra");
								}
							
						
						}
					}
					//normál dobás
					if(exp[0]=='5')
					{
						if(exp[1]=='H')
						{
							if(maxhp==hp)
							{
								
								if(Number(charmana)-Number(exp[3])>0)
								{
								charmana=Number(charmana)-Number(exp[3]);
								document.getElementById("charmana").innerHTML=charmana;
								document.getElementById("mana").innerHTML=Number(inte)*Number(10)+"/"+charmana;
								document.getElementById("manabar").setAttribute('aria-valuenow',charmana);
								document.getElementById("manabar").style.width=((Number(charmana)*Number(100))/(Number(inte)*Number(10)))+"%";
								createrowtoeventheal("gyógyúltál 0-át");
								enemyhit();
								}
								else
								{
									createrowtoevent("nincs elegendő manád a  varázslatra");
								}
							}
							if(maxhp>hp)
							{
								if(Number(charmana)-Number(exp[3])>0)
								{
								charmana=Number(charmana)-Number(exp[3]);
								document.getElementById("charmana").innerHTML=charmana;
								document.getElementById("mana").innerHTML=Number(inte)*Number(10)+"/"+charmana;
								document.getElementById("manabar").setAttribute('aria-valuenow',charmana);
								document.getElementById("manabar").style.width=((Number(charmana)*Number(100))/(Number(inte)*Number(10)))+"%";
								var heal=Math.floor((Math.random()*exp[4])*2);
								hp=Number(hp)+Number(heal);
								if(maxhp<hp)
								{
									hp=maxhp;
								}
								createrowtoeventheal("szerencse istene rád mosolygot! gyógyúltál "+heal);
								document.getElementById("charhp").innerHTML=hp;
								document.getElementById("hp").innerHTML=maxhp+"/"+hp;
								document.getElementById("hpbar").setAttribute('aria-valuenow',hp);
								document.getElementById("hpbar").style.width=((Number(hp)*Number(100))/(maxhp))+"%";
								
								enemyhit();
								}
								else
								{
									createrowtoevent("nincs elegendő manád a  varázslatra");
								}
							}
						
						}
					}
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
function editChar(id)
{
	document.cookie="cid="+id;
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('mainPage').innerHTML = this.responseText;
            }
        };
		
        xmlhttp.open("GET","view/editChar.php?id="+id, true);
        xmlhttp.send();
		szamol();
}

function viewON(ki)
{
	var exp=ki.split(",");
	if(exp.length==5)
	{
	if(exp[4]=="P")
	{
		var str=0;
		var ac=exp[3];
	}
	else
	{
		var str=exp[3];
		var ac=0;
	}
	
	}
	else
	{
		var str=0;
		var ac=0;
	}
	switch(exp[2])
	{
		case "DEF":
		hoverIt("Defend",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "AGI":
		hoverIt("Agility",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "DEX":
		hoverIt("Dexterity",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "CON":
		hoverIt("Constitut",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "INT":
		hoverIt("Inteligent",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "STR":
		hoverIt("Streng",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "LUC":
		hoverIt("Luck",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "REF":
		hoverIt("Reflex",exp[0],exp[1],str,ac);
		szamol();
		break;
		
	}
	
	
}
function viewOFF(ki)
{
	console.log(ki);
	var exp=ki.split(",");
	if(exp.length==5)
	{
	if(exp[4]=="P")
	{
		var str=0;
		var ac=exp[3];
	}
	else
	{
		var str=exp[3];
		var ac=0;
	}
	
	}
	else
	{
		var str=0;
		var ac=0;
	}
	switch(exp[2])
	{
		case "DEF":
		leaveIt("Defend",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "AGI":
		leaveIt("Agility",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "DEX":
		leaveIt("Dexterity",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "CON":
		leaveIt("Constitut",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "INT":
		leaveIt("Inteligent",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "STR":
		leaveIt("Streng",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "LUC":
		leaveIt("Luck",exp[0],exp[1],str,ac);
		szamol();
		break;
		case "REF":
		leaveIt("Reflex",exp[0],exp[1],str,ac);
		szamol();
		break;
		
	}
}
function leaveIt(mit,elojel,mennyivel,str,ac)
{
	var dummy=document.getElementById(mit).innerHTML;
	if(elojel=="+")
	{
		var osszeg=Number(dummy)+Number(mennyivel);
		document.getElementById(mit).innerHTML=osszeg;
		document.getElementById(mit).style.color="black";
	}
	else
	{
		var osszeg=Number(dummy)-Number(mennyivel);
		document.getElementById(mit).innerHTML=osszeg;
		document.getElementById(mit).style.color="black";
	}
	if(ac!=0)
	{
	document.getElementById("Defend").innerHTML=Number(document.getElementById("Defend").innerHTML)-Number(ac);
	document.getElementById("Defend").style.color="black";
	}
	if(str!=0)
	{
	document.getElementById("Streng").innerHTML=Number(document.getElementById("Streng").innerHTML)-Number(str);
	document.getElementById("Streng").style.color="black";	
		document.getElementById("DMG").innerHTML=Number(document.getElementById("DMG").innerHTML)-Number(str);
	document.getElementById("DMG").style.color="black";	
	}
}
function hoverIt(mit,elojel,mennyivel,str,ac)
{
	var dummy=document.getElementById(mit).innerHTML
	if(elojel=="+")
	{
		var osszeg=Number(dummy)+Number(mennyivel);
		document.getElementById(mit).innerHTML=osszeg;
		document.getElementById(mit).style.color="green";
	}
	else
	{
		var osszeg=Number(dummy)-Number(mennyivel);
		document.getElementById(mit).innerHTML=osszeg;
		document.getElementById(mit).style.color="red";
	}
		
	if(ac!=0)
	{
	document.getElementById("Defend").innerHTML=Number(document.getElementById("Defend").innerHTML)+Number(ac);
	document.getElementById("Defend").style.color="green";
	}
	if(str!=0)
	{
	document.getElementById("Streng").innerHTML=Number(document.getElementById("Streng").innerHTML)+Number(str);
	document.getElementById("Streng").style.color="green";	
	document.getElementById("DMG").innerHTML=Number(document.getElementById("DMG").innerHTML)+Number(str);
	document.getElementById("DMG").style.color="green";	
	}
		
		
	
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
		if(document.getElementById("attackMenu"))
		{
			document.getElementById("attackMenu").style.display="none";
			document.getElementById("message").innerHTML="";
		} 
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

		
}
//vége a játéknak player vesztett
function endGamePL()
{
document.cookie="xp="+document.getElementById('xp').innerHTML;
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("mainPage").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "view/playerLose.php", true);
        xmlhttp.send();

		setTimeout(function() {
			 runAway();
			}, delay2);
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
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("dungeon").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "view/enemyMove.php", true);
        xmlhttp.send();
		$.ajax(
		{
			type:"GET",
			url:'ajax/enemyMove.php',
			async: true,
			success:function(result)
				{
				
				}
		});
		setTimeout(function() {
		ajaxCatacombs();
		$.ajax(
		{
			type:"GET",
			url:'ajax/getPlayer.php',
			async: true,
			success:function(result)
				{
				document.getElementById('charmove').innerHTML=result;
				}
		});
		}, delay);
	
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
//új sor hozzá adása az event mappához heal
function createrowtoeventheal(szoveg)
	{
		//console.log(szoveg);
	var tbl = document.getElementById('event');	
    var tbdy = document.createElement('tbody');
	var tr = document.createElement('tr');
	tr.id="event"+eventText;
	var td = document.createElement('td');
	var image = document.createElement('img');
	image.src="img/elements/heal.png";
	td.style.color="blue";
	td.appendChild(document.createTextNode(szoveg+" "));
	td.appendChild(image);
			tr.appendChild(td);		  
		 tbdy.appendChild(tr);	
    tbl.appendChild(tbdy);
	if((eventText / 18 )>1)
	{
		document.getElementById('event').deleteRow(0);
		
	}
		eventText++;
	}
//új sor hozzá adása az event mappához támadás
function createrowtoeventsebzes(szoveg)
	{
		//console.log(szoveg);
	var tbl = document.getElementById('event');	
    var tbdy = document.createElement('tbody');
	var tr = document.createElement('tr');
	tr.id="event"+eventText;
	var td = document.createElement('td');
	td.style.color="green";
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
//új sor hozzá adása az event mappához sebződés
function createrowtoeventsebzodes(szoveg)
	{
		//console.log(szoveg);
	var tbl = document.getElementById('event');	
    var tbdy = document.createElement('tbody');
	var tr = document.createElement('tr');
	tr.id="event"+eventText;
	var td = document.createElement('td');
	td.style.color="red";
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
			
			createrowtoeventsebzodes("Sikerült neki, sebzett: "+sebzes);
			
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
//player űt
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
			
			createrowtoeventsebzes("Sikerült, sebzésed: "+sebzes);
			
			
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
			
			createrowtoeventsebzes("<b>A szerencse kegyeltje, vagy sebzésed: "+sebzes+"</b>");
			
			ehp=Number(ehp)-Number(sebzes);
			document.getElementById('ehp').innerHTML=ehp;
			var procent=(Number(ehp)*Number(100))/Number(emaxhp);
			ehpbar.style.width=procent+"%";
			document.getElementById('enemyhps').innerHTML=emaxhp+"/"+ehp;
			enemyhit();
	if (ki==="E")
	{
			var sebzes=Math.floor((Math.random()*edmg)+1);
			sebzes=Number(sebzes)*Number(2);
			
			createrowtoeventsebzodes("<b>Az ellenfeled a szerencse kegyeltje, sebzett: "+sebzes+"</b>");
			
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
		createrowtoeventsebzes("Balsiker! az ellenfeled megsebesítette magát "+sebzes+" dmg-vel");
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
		
		createrowtoeventsebzodes("nincs szerencséd!"+szoveg);
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