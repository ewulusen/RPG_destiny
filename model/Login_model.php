<?php
//include_once("model/Book.php");
include base_url."/Scripts/db.php";
class Login_model {
	public function loginUser($usname,$psw)
	{
$server="localhost";
$user="root";
$pass="";
$db="ewulusen";
$conn=  new mysqli($server, $user, $pass,$db) or die("nem tudtam csatlakozni a serverhez");
		$sql="SELECT * FROM `FELHASZ` WHERE FH_FHNEV='$usname' AND FH_JEL='$psw'";
		
		$res=$conn->query($sql);
		if($res->num_rows>0)
		{
		    setcookie('username',$usname);
			return true;
    	}
		else
		{
			return false;
		}
	}
	

	
}

?>