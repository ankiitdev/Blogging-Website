
<?php
/*
$connection=mysqli_connect('localhost','root','');
$connectingDB=mysqli_select_db($connection,'phpcms');



function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "phpcms";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
*/   

$dbhost = "localhost";
          $dbuser = "root";
          $dbpass = "";
          $db = "phpcms";
		  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

?>