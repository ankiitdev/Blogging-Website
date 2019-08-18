<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>

<?php

 if(isset($_GET["id"])){
	 $IdFromURL=$_GET["id"];
	 	  
		 $Query="DELETE FROM registration WHERE id='$IdFromURL' " ;
		 if($conn->query($Query)){
			 $_SESSION["SuccessMessage"]="Admin Deleted Successfully";
			 Redirect_to("Admins_new.php");
		 }
		 else
		 {
			$_SESSION["SuccessMessage"]="Something went wrong. Try Again!";
			 Redirect_to("Admins_new.php"); 
		 }
	 }
 
?>