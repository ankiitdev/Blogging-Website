<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php

 if(isset($_POST["Submit"])){
   $Category=($_POST["Category"]);
   $Title=($_POST["Title"]);
   $Post=($_POST["Post"]);
   date_default_timezone_set("Asia/Kolkata");
     $CurTime=time();
     $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurTime);
   $DateTime;
   $Admin=$_SESSION["Username"];
   $Image=$_FILES["Image"]["name"];
   $Target="Uploads/".basename($_FILES["Image"]["name"]);
   if(empty($Title)){
     $_SESSION["ErrorMessage"]="Title can't be empty";
     Redirect_to("AddNewPost_new.php");
   }
   else if(strlen($Title)<2 ){
     $_SESSION["ErrorMessage"]="Title should be of atleast 2 characters";
     Redirect_to("AddNewPost_new.php");
   }
   else{
     
     //global $connectingDB;
     //global $conn;
      
      
      
     $Query="INSERT INTO admin_panel (datetime,title,category,author,image,post) VALUES ('$DateTime','$Title','$Category','$Admin','$Image','$Post')";
     //$Execute=mysqli_query($Query);
     move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
     if($conn->query($Query)){
       $_SESSION["SuccessMessage"]="Post Added Successfully";
       Redirect_to("AddNewPost_new.php");
     }
     else
     {
      $_SESSION["SuccessMessage"]="Something Went Wrong. Try Again";
       Redirect_to("AddNewPost_new.php"); 
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
 .nav-link a
 {
  margin-left:10px;
  margin-right:10px;
  color: white;
 }
 .nav-link a:hover
 {
  color: #f0e505;
  font-weight: bold;
  text-decoration: none;
 }
 /*
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
    /*
    opacity: 0.6;
    color: #fff;
    
    color: #f0e505;
    font-weight: bold;
    opacity: 0.6;

  }
  */
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
       <nav class="navbar navbar-expand-sm bg-dark">
  <a class="navbar-brand" href="#"><img src="lumos_logo.png" class="img-fluid" style="height:50px; width: 200px;"></a>
  <ul id="list" class="navbar-nav ml-auto" >
      <li class="nav-item"><a class="nav-link" id="active"  href="#">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="blog.php" target="_blank">Blog</a></li>
      <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
      <li class="nav-item"><a class="nav-link"  href="#">Services</a></li>
      <li class="nav-item"><a class="nav-link"  href="#">Contact Us</a></li>
      <li class="nav-item mr-5"><a class="nav-link"  href="#">Feature</a></li>
      
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
      <h1 class="mt-4" style="font-family: 'Acme', sans-serif; color:#343a40; ">Add New Post</h1><hr class="mb-4">
     
     <div class="mt-1 mb-5">
     <form action="AddNewPost_new.php" method="post" enctype="multipart/form-data">
      <fieldset>
       <div class="form-group">
       <label for="title">Title:</label>
       <input class="form-control" type="text" name="Title" id="title" placeholder="Title">
       </div>
       <div class="form-group">
       <label for="categoryselect">Category:</label>
       <select class="form-control" id="categoryselect" name="Category">
         <?php
         $ViewQuery="SELECT * FROM category ORDER BY datetime desc";
         $Execute=$conn->query($ViewQuery);  
     
         while ($row = mysqli_fetch_array($Execute))
         {      
       $Id=$row["id"];
       $CategoryName=$row["name"];         
    ?>
       <option><?php echo $CategoryName; ?></option>
       <?php } ?>
       </select>
       </div>
       
       <div class="form-group">
       <label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
       <input type="File" class="form-control" name="Image" id="imageselect">
       </div>
       
       <div class="form-group">
       <label for="postarea"><span class="FieldInfo">Post:</span></label>
       <textarea class="form-control" name="Post" id="postarea"></textarea>
       </div>
       
        <input class="btn btn-success btn-sm" type="Submit" name="Submit" value="Add New Post">
      </fieldset>
     </form>
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