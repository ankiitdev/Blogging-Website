<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php



 ?>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme|Neucha|Satisfy|Squada+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/glyphicons.css"
 <script src="js/jquery-3.4.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>


<!--
 <div id=main>
   <div id=lcontent>
     <img src="lumos_logo.png">
	 <ul class="list-decor">
	  <li class="ld">Dashboard</li>
	  <li class="ld">Categories</li>
	  <li class="ld">Admin</li>
	  <li class="ld">Comments</li>
	  <li class="ld">Login</li>
	 </ul>	 
   </div>
   <div id=rcontent></div>
 </div>
#main
{
display:flex;
width:100%;
height:100%;
}
#lcontent
{
width: 15%;
background-color:#2a3342;
display:flex;
flex-direction:column;
}
#rcontent
{
width: 85%;
background-color:#44d3af;
}
img
{
height: 66px;
width: 240px;
margin-top: 10%;
}
.list-decor
{
color:#fff;
list-style-type:none;
text-decoration:none;
font-family: 'Acme', sans-serif;
font-weight: bold;
font-size: 1.2em;
margin-top: 40%;
}
.ld
{
margin-top:10%;
background-color:#44d3af;
}
</style>
-->
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
   <a href="categories_new.php">   
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
      <h1 class="mt-4" style="font-family: 'Acme', sans-serif; color:#343a40; ">Admin Dashboard</h1><hr class="mb-5">
     
     <div class="table table-responsive mt-5">
      <table class="table table-striped">
        <tr>
          <th>Sr No</th>
          <th>Post Title</th>
          <th>Date & Time</th>
          <th>Admin</th>
          <th>Category</th>
          <th>Banner</th>
          <th>Comments</th>
          <th>Action</th>
          <th>Details</th>
        </tr>
  
    <?php
             $ViewQuery = "SELECT * FROM admin_panel ORDER BY datetime 
             desc;";
             $Execute=$conn->query($ViewQuery);
             $SrNo=0;  
         while ($row = mysqli_fetch_array($Execute))
         {      
       $Id=$row["id"];
       $DateTime=$row["datetime"];
       $Title=$row["title"];
       $Category=$row["category"];
       $Admin=$row["author"];
       $Image=$row["image"];
       $Post=$row["post"];
       $SrNo++;
             ?>
             

             <tr>
              <td><?php echo $SrNo; ?></td>
              <td style="color: #5e5eff;"><?php
                 if(strlen($Title)>20)
                 {
                  $Title=substr($Title,0,20).'...';
                 }
               echo $Title; ?></td>
              <td><?php echo $DateTime; ?></td>
              <td><?php echo $Admin; ?></td>
              <td><?php echo $Category; ?></td>
              <td><img src="Uploads/<?php echo $Image; ?>" width="160px" height="80px"></td>
              <td>Processing</td>
              <td>
                <a href="EditPost.php?Edit=<?php echo $Id; ?>">
              <span class="btn btn-warning">Edit</span></a>
              <a href="DeletePost_new.php?Delete=<?php echo $Id; ?>">
              <span class="btn btn-danger">Delete</span></a></td>
              <td><a href="FullPost.php?id=<?php echo $Id; ?>"
                target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
             </tr>  
             <?php } ?>

      </table>
     </div>
     </div>

   </div>





</div>


</body>
</html>