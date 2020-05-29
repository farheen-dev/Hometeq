
<?php 

session_start();

$pagename="Log Out";      //Create and populate a variable called $pagename 

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  //Call in stylesheet 
 
echo "<title>".$pagename."</title>";   //display name of the page as window title 
 
echo "<body>"; 
 
include ("headfile.html");     //include header layout file  

include ("detectlogin.php");   // include detectlogin.php file
 
echo "<h4>".$pagename."</h4>";    //display name of the page on the web page 

echo "Thanks you," .$_SESSION['fname']. " " .$_SESSION['sname']. "</br></br>";

unset($_SESSION['userid']);  // Clear the Session

echo "You are now logged out";

include("footfile.html");     //include head layout 
 
echo "</body>"; 

?> 