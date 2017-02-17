<?php echo'
<div class="container" id="loginpage">
<div class="panel center panel-danger">
<div class="panel-heading clearfix"><b>
		<b>	<h1>Login<span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
		</h1></b>

		
	
	<form  action="index.php" method=get>
	<div class="cols-sm-2">
	<div class="input-group" >
	<span class="input-group-addon">
	<label>Username: </label><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>

	<input type=text name=username placeholder="username" required="required"></div>

 
   <div class="cols-sm-2">
	<div class="input-group">
	<span class="input-group-addon">
	<label>Password: </label><i class="glyphicon glyphicon-lock" aria-hidden="true"></i>
	</span><input type=password name=psw placeholder="password" required="required"></div></div>
	<input type=submit class="btn btn-primary" name="login" value="Login">
	<a class="btn btn-default" href=reg.php>Registration</a>
	</form>

</div></div>
';
if(isset($_GET['mit'])=="errornad")
	{
	echo "rossz felhasználónév vagy jelszó";}


echo '</div>';
?>