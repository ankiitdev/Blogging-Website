<?php require_once("Include/DB.php") ?>
<?php require_once("Include/Sessions.php") ?>
<?php
function Redirect_to($New_Location){
 header("Location:".$New_Location);
 exit;
}


function Login()
{
	if(isset($_SESSION["User_Id"])){
		return true;
	}
}

function ConfirmLogin()
{
	if(!Login()){
		Redirect_to("Login.php");
	}
}

?>