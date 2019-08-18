<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/Sessions.php"); ?>

<?php
$uname="";
$pass="";
$uid="";

 if(isset($_POST["Submit"])){
	 $Username=($_POST["Username"]);
	 $Password=($_POST["Password"]);

 
	 if(empty($Username) || empty($Password)){
		 $_SESSION["ErrorMessage"]="All fields must be filled out";
		 Redirect_to("Login_new.php");
	 }

	 else{

        $Query = "SELECT * FROM registration WHERE
	     username ='$Username' AND password='$Password' ";

	     $Execute=$conn->query($Query);

	while($admin = mysqli_fetch_assoc($Execute))
	     {
	     	$uname=$admin["username"];
	     	$pass=$admin["password"];
	     	$uid=$admin["id"];
	     }	
		 
		 $_SESSION["User_Id"]=$uid;
         $_SESSION["Username"]=$uname;
		 if($Username==$uname || $Password==$pass)
		 {
		 	$_SESSION["SuccessMessage"]="Welcome {$_SESSION["Username"]}";
		    Redirect_to("Dashboard_new.php");
		 } 
		 else
		 {
		 	$_SESSION["ErrorMessage"]="Wrong Credentials!";
		    Redirect_to("Login_new.php");
		 }
		 
	      
        }
 }
?>

<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme|Neucha|Satisfy|Squada+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/glyphicons.css"
 <script src="js/jquery-3.4.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>

<style>
	a:hover
	{
		font-size: 15px;
	}
</style>


</head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#"><img src="lumos_logo.png" class="img-fluid" style="height:50px; width: 200px;"></a>
</nav>

<div class="col-sm-3 mx-auto">

<div class="card ml-3 mr-3 mt-5 p-3">
	<h3 class="card-title pt-3" style="font-family: 'Josefin Sans', sans-serif; font-weight: bold; text-align: center; color:#343a40;">LOGIN</h3>
	<hr class="w-25 m-auto pb-3">

<div><?php echo Message();
		echo SuccessMessage();?></div>

<form action="Login_new.php" method="post">
		  <fieldset>
		   <div class="form-group mt-3">



<div class="input-group input-focus">
  <div class="input-group-prepend">
    <span class="input-group-text bg-white"><i class="glyphicon glyphicon-user text-dark"></i></span>
  </div>
  <input type="search" type="text" name="Username" id="Username" placeholder="Username" class="form-control">
  <!--- <input type="search" type="text" name="Username" id="Username" placeholder="Username" class="form-control border-left-0">  ---->
</div>



           
           </div>
		   
		   <div class="form-group">

		   	<div class="input-group input-focus">
  <div class="input-group-prepend">
    <span class="input-group-text bg-white"><i class="glyphicon glyphicon-lock text-dark"></i></span>
  </div>
		   <input class="form-control" type="password" name="Password" id="Password" placeholder="Password">
           </div>
		 
		    <input class="btn btn-dark btn-block mt-5" style="width: 100%;" type="Submit" name="Submit" value="Let's Begin">
		  </fieldset>
		 </form>
         <span style="font-family: 'Josefin Sans', sans-serif; text-align: center; color:#343a40; margin-top: -22px; font-size: 11px;">OR</span><br>
		 <span style="font-family: 'Josefin Sans', sans-serif; text-align: center; color:#343a40; margin-top: -22px; font-size: 13px;"><a href="#" style="text-decoration: none; color: #343a40; ">Register Here!</a></span>

</div>
</div>

</body>
</html>