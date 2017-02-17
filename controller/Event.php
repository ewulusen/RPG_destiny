<?php
class Event_e {
		public $model;
public function __construct()  
    {  
        $this->model = new Model();

    } 
	public function startEvent($hol)
	{
	if(isset($_COOKIE['cid']))
	{		
		if($hol=="wood")
		{	
			$res=$this->model->startEvent();
			//print_r($res);
			$enemy=$this->model->getEnemy($res[12]);
			header ("location:index.php?hol=wood&lvl=$res[12]&ename=$enemy[0]&estr=$enemy[1]&eagi=$enemy[2]&edex=$enemy[3]&edef=$enemy[4]&eref=$enemy[5]&einte=$enemy[6]&eluck=$enemy[7]&econ=$enemy[8]&str=$res[0]&agi=$res[1]&ref=$res[2]&def=$res[3]&dex=$res[4]&int=$res[5]&luc=$res[6]&con=$res[7]&dmg=$res[8]&ac=$res[9]&faj=$res[10]&kaszt=$res[11]");
		}
	}
	else
	{
		header ("location:index.php?hol=lakohaz");
	}
	}
public function getLoot($lvl)
{
	$loot=array();
	$szam=rand(0,1);
	//nyaklánc?
	if($szam=='1')
	{
		$fer=$this->model->getLoot('NY','nyaklanc',$lvl);
		array_push($loot,$fer);
	}
	$szam=rand(0,1);
	//gyuru?
	if($szam=='1')
	{
		$fer=$this->model->getLoot('GY','gyuruk',$lvl);
		array_push($loot,$fer);
	}
	$szam=rand(0,1);
	//pancel?
	if($szam=='1')
	{
		$fer=$this->model->getLoot('P','pancel',$lvl);
		array_push($loot,$fer);
	}
	$szam=rand(0,1);
	//fegyver?
	if($szam=='1')
	{
		$fer=$this->model->getLoot('F','fegyverek',$lvl);
		array_push($loot,$fer);
	}
	//potion?
	if($szam=='1')
	{
		$fer=$this->model->getLoot('PO','potion',$lvl);
		array_push($loot,$fer);
	}
	$szam=rand(0,($lvl*100))+1;
	array_push($loot,"M,penz,".$szam.",.-Trefu");
	return $loot;
}	
public function endDungeon($xp,$wol,$loot)
{
	$ret=$this->model->plUpdate($xp,$wol,$loot);
	$this->model->gameFieldCleaning();
	return $ret;	
}
public function getEnemy()
{
	$xp=getEnemyXP();
	return $xp;
}
}

?>