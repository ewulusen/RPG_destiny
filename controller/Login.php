<?php
class Login {
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();

    } 
	public function loginCheck($username,$password)
	{
		
		$res=$this->model->loginCheck($username,$password);
		if($res=='1')
				{
	    	header ("location:index.php?hol=main");
			}
			else
			{
			header ("location:index.php?mit=errornad");
			}
	}
	
}

?>