<?php require_once("Include/DB.php"); ?>

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

 <section class="mt-5 ml-5 mr-5">
  <h1>The Complete Bootstrap Blog</h1>
  <p>Created using Bootstrap and PHP by Ankit Sharma</p>

    <div class="row mt-5">
      <div class="col-lg-8 col-md-12 p-3 pr-5">
        <?php
          if(isset($_GET["SearchButton"]))
          {
            $Search=$_GET["Search"];
            $ViewQuery = "SELECT * FROM admin_panel WHERE
            datetime LIKE '%$Search%' OR title LIKE '%$Search%'
            OR category LIKE '%$Search%' OR post LIKE '%$Search%'";
          }
          else
          {
              $ViewQuery="SELECT * FROM admin_panel ORDER BY datetime desc";
              }
              $Execute=$conn->query($ViewQuery);   
         while ($row = mysqli_fetch_array($Execute))
         {      
       $PostId=$row["id"];
       $DateTime=$row["datetime"];
       $Title=$row["title"];
       $Category=$row["category"];
       $Admin=$row["author"];
       $Image=$row["image"];
       $Post=$row["post"];
        ?>
            <div class="img-thumbnail card mb-4">
              <img class="img-fluid rounded" src="Uploads/<?php echo $Image; ?>" alt="<?php echo $Image; ?>">
                <div class="card-body">
    <h2 class="card-title"><?php echo $Title; ?></h2>
    <p><?php echo $Category; ?> Published on <?php echo $DateTime; ?></p>
    <p><?php
      if(strlen($Post)>150)
      {
        $Post=substr($Post,0,150).'...';
      }
     echo $Post; ?></p>
     <a href="FullPost.php?id=<?php echo $PostId; ?>" class="btn btn-success">Read More &rsaquo;&rsaquo;</a>
  </div>  
            </div>
            <?php } ?>
      </div>

        <div class="col-lg-3 col-md-12 p-3 pl-5 ml-5">
        <h2>Test</h2>
        <p>Navbar navigation links build on our .nav options with their own modifier class and require the use of toggler classes for proper responsive styling. Navigation in navbars will also grow to occupy as much horizontal space as possible to keep your navbar contents securely aligned.Navbar navigation links build on our .nav options with their own modifier class and require the use of toggler classes for proper responsive styling. Navigation in navbars will also grow to occupy as much horizontal space as possible to keep your navbar contents securely aligned.</p>
      </div>

    </div>

 </section>


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