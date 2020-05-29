
<?php 

session_start();

include("db.php");

$pagename="Your Login Results";      //Create and populate a variable called $pagename 

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  //Call in stylesheet 
 
echo "<title>".$pagename."</title>";   //display name of the page as window title 
 
echo "<body>"; 
 
include ("headfile.html");     //include header layout file  
 
echo "<h4>".$pagename."</h4>";    //display name of the page on the web page 

$email = $_POST['EmailAddress'];  
$password =  $_POST['password']; 

//echo "Entered email : ".$email."</br></br>";
//echo "Entered password : ".$password;


		  
//check if any of the mandatory fields were not filled in
if(!empty($email) and !empty($password))
{
	//SQL query to retrieve email and password from Users table details 
	$SQL="select * from users 
		  Where userEmail = '$email' ;
		  ";
		  
	//run SQL query for connected DB or exit and display error message 
	$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
	
	//store the fetched data in $arrayu
	$arrayu=mysqli_fetch_array($exeSQL);
	
	if($arrayu['userEmail'] != $email)
	{
		echo "<p><b>login Falied!</p></b>";
		echo "Email not recognised, login again</br></br>";
		echo "Go back to <a href='login.php'> Login </a></br></br>";
	}
	else
	{
		if($arrayu['userPassword'] != $password)
		{
			echo "<p><b>login Falied!</p></b>";
			echo "Password not recognised, login again</br></br>";
			echo "Go back to <a href='login.php'> Login </a></br></br>";
		}
		else
		{
			
			echo "Login Successful</br></br>";
			$_SESSION['userid'] = $arrayu['userId'];
			$_SESSION['usertype'] = $arrayu['userType'];
			$_SESSION['fname'] = $arrayu['userFName'];
			$_SESSION['sname'] = $arrayu['userSName'];
			
			echo "Greetings " .$_SESSION['fname']. " " .$_SESSION['sname']. "</br></br>";
			if($_SESSION['usertype'] == "A")
			{
				$_SESSION['usertype'] = "Administrator";
				echo "Welcome for the hometeq you have logged in as " . $_SESSION['usertype']. "</br></br>";
				echo "Continue shopping for <a href='index.php'>Home Tech</a></br></br>";
				
			}
			if($_SESSION['usertype'] == "C")
			{
				$_SESSION['usertype'] = "Customer";
				echo "Welcome for the hometeq you have logged in as a hometeq " . $_SESSION['usertype']. "</br></br>";
				echo "Continue shopping for <a href='index.php'>Home Tech</a></br></br>";
				echo "View your <a href='basket.php'>Smart Basket</a>";				
			}
			/*
			echo "Welcome for the hometeq " . $_SESSION['usertype']. "</br></br>";
			*/
			
		}
		
	}
	
}
else
{
	echo "<p><b>login Falied!</p></b>";
	echo "Make Sure you provide all the required details";
	echo "<p>Both email and password fields need to be filled in</p></br></br>";
	echo "Go back to <a href='login.php'> Login </a></br></br>";	
}




include("footfile.html");     //include head layout 
 
echo "</body>"; 

?> 