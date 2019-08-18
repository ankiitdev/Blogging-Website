<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php

 if(isset($_POST["Submit"])){
   $Username=($_POST["Username"]);
   $Password=($_POST["Password"]);
     $RetypePassword=($_POST["retypepassword"]);
   date_default_timezone_set("Asia/Kolkata");
     $CurTime=time();
     $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurTime);
   $DateTime;
   $Admin=$_SESSION["Username"];
   if(empty($Username) || empty($Password) || empty($RetypePassword)){
     $_SESSION["ErrorMessage"]="All fields must be filled out";
     Redirect_to("Admins_new.php");
   }
   else if(strlen($Password)<4 ){
     $_SESSION["ErrorMessage"]="Atleast 4 characters required!";
     Redirect_to("Admins_new.php");
   }
   else if($Password!==$RetypePassword){
     $_SESSION["ErrorMessage"]="Passwords do not match!";
     Redirect_to("Admins_new.php");
   }
   else{
     
     //global $connectingDB;
     //global $conn;
      
      
      
     $Query="INSERT INTO registration (datetime,addedby,username,password) VALUES ('$DateTime','$Admin','$Username','$Password')";
     //$Execute=mysqli_query($Query);
     if($conn->query($Query)){
       $_SESSION["SuccessMessage"]="Admin Added Successfully";
       Redirect_to("Admins_new.php");
     }
     else
     {
      $_SESSION["SuccessMessage"]="Admin failed to add";
       Redirect_to("Admins_new.php"); 
     }
   }
 }

 ?>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme|Neucha|Satisfy|Squada+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/glyphicons.css"
 <script src="js/jquery-3.4.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>


<style>
 #active
  {
color:#efe305; opacity: 0.6; border-bottom: 1px solid #efe305; padding-left: 0px; padding-right: 0px; margin-right: 8px;
  }
  ul
  {
    font-family: 'Josefin Sans', sans-serif;
  }
  ul li a:hover
  {
    opacity: 0.6;
    color: #fff;
  }
  .card-body
  {
    color: #000;
  }
  .card-body:hover
  {
    background-color: #44d3af;
    color: #fff;
    text-decoration: none;
  }
   a:hover, a:focus {
      text-decoration: none;
      color: inherit;
 }
 
</style>
</head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <body>
       <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#"><img src="lumos_logo.png" class="img-fluid" style="height:50px; width: 200px;"></a>
  <ul id="list" class="navbar-nav ml-auto" >
      <li class="nav-item"><a class="nav-link" id="active" style="" href="#">Home</a></li>
      <li class="nav-item"><a class="nav-link" style="color:#efe305; " href="blog.php" target="_blank">Blog</a></li>
      <li class="nav-item"><a class="nav-link" style="color:#efe305; " href="#">About Us</a></li>
      <li class="nav-item"><a class="nav-link" style="color:#efe305; " href="#">Services</a></li>
      <li class="nav-item"><a class="nav-link" style="color:#efe305; " href="#">Contact Us</a></li>
      <li class="nav-item mr-5"><a class="nav-link" style="color:#efe305; " href="#">Feature</a></li>
      <li class="nav-item ml-5"><a class="nav-link" >ALL RIGHTS RESERVED</a></li>
    </ul>
</nav>


<div class="container-fluid">

      <div class="row">
     <div class="col-lg-2" style="padding-right: 0px;">

   <div class="card mt-5" style="width:190px"> 
   <a href="dashboard_new.php">  
  <div class="card-body">
    <span class="glyphicon glyphicon-th display-5 text-center mr-2"></span> Dashboard
  </div>
  </a>
</div>

   <div class="card mt-3" style="width:190px;">
   <a href="AddNewPost_new.php">    
  <div class="card-body">
    <span class="glyphicon glyphicon-list-alt display-5 text-center mr-2"></span> Add New Post
  </div>
</a>
</div>

   <div class="card mt-3" style="width:190px">
   <a href="Categories_new.php">   
  <div class="card-body">
    <span class="glyphicon glyphicon-tags display-5 text-center mr-2"></span> Categories
  </div>
</a>
</div>
   <div class="card mt-3" style="width:190px">
   <a href="Admins_new.php">   
  <div class="card-body">
    <span class="glyphicon glyphicon-user display-5 text-center mr-2"></span> Manage Admins
  </div>
</a>
</div>

   <div class="card mt-3" style="width:190px">
  <a href="Logout_new.php">
  <div class="card-body">
    <span class="glyphicon glyphicon-equalizer display-5 text-center mr-2"></span> Logout
  </div>
</a>
</div>


     </div>

          <div class="col-lg-10 mt-5" style="padding-left: 0px;" >
              <div><?php echo Message();
     echo SuccessMessage();?></div>
      <h1 class="mt-4" style="font-family: 'Acme', sans-serif; color:#343a40; ">Manage Admin Access</h1><hr class="mb-4">
     
  <div>
     <form action="Admins_new.php" method="post">
      <fieldset>
       <div class="form-group pt-3 mt-4">
       
       <input class="form-control mb-4" type="text" name="Username" id="Username" placeholder="Username">

       
       <input class="form-control mb-4" type="password" name="Password" id="Password" placeholder="Password">

       
       <input class="form-control mb-4" type="password" name="retypepassword" id="retypepassword" placeholder="Confirm Password">
       </div>
        <input class="btn btn-success btn-sm" type="Submit" name="Submit" value="Add New Admin">
      </fieldset>
     </form>
    </div>
     
     <div class="table-responsive">
         <table class="table table-striped">
        <tr>
          <th>S.No</th>
          <th>Date & Time</th>
          <th>Admin Name</th>
          <th>Added By</th>
          <th>Action</th>
        </tr>
    <?php
         $ViewQuery="SELECT * FROM registration ORDER BY datetime desc";
         $Execute=$conn->query($ViewQuery);  
     $SrNo=0;
         while ($row = mysqli_fetch_array($Execute))
         {      
       $Id=$row["id"];
       $DateTime=$row["datetime"];
       $UserName=$row["username"];
       $Admin=$row["addedby"];
         $SrNo++;
      
      
    ?>
        <tr>
             <td><?php echo $SrNo; ?></td>    
             <td><?php echo $DateTime; ?></td>    
             <td><?php echo $UserName; ?></td>    
             <td><?php echo $Admin; ?></td>
             <td><a href="DeleteAdmin.php?id=<?php echo $Id;  ?> "><button class=" btn btn-danger btn-sm">Delete</button></a></td>    
        </tr> 
         <?php } ?>   
         </table>
     </div>


 
     </div>

   </div>





</div>

<script>
  $(document).ready(function(){

    $('.card').hover(

        function(){
          $(this).animate({
            margin-top: "5%",
          },200);
        },

        function(){
          $(this).animate({
            margin-top: "0%"
          },200);
        }
      );
  });
</script>

</body>
</html>