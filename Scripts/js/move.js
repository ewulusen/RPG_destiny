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
}