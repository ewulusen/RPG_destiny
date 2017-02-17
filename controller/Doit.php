<?php
class Doit {
		public $model;
public function __construct()  
    {  
        $this->model = new Model();

    } 
	
	public function newChar($values)
	{
				$res=$this->model->createNewChar($values);
		
			
		return $res;
	}
	public function upChar($values)
	{
				$res=$this->model->upChar($values);
		
			
		return $res;
	}
	public function getChar($values)
	{
				$res=$this->model->getChar($values);
		header ("location:index.php?hol=charlap&lvl=$res[12]&str=$res[0]&agi=$res[1]&ref=$res[2]&def=$res[3]&dex=$res[4]&int=$res[5]&luc=$res[6]&con=$res[7]&dmg=$res[8]&ac=$res[9]&nev=$res[13]&apoint=$res[14]&cid=".$values."");
		return $res;
	}
}

?>