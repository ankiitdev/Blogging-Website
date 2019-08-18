<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>

<?php

 if(isset($_GET["id"])){
	 $IdFromURL=$_GET["id"];
	 	  
		 $Query="DELETE FROM category WHERE id='$IdFromURL' " ;
		 if($conn->query($Query)){
			 $_SESSION["SuccessMessage"]="Category Deleted Successfully";
			 Redirect_to("Categories_new.php");
		 }
		 else
		 {
			$_SESSION["SuccessMessage"]="Something went wrong. Try Again!";
			 Redirect_to("Categories_new.php"); 
		 }
	 }
 
?>