
<?php 

session_start();

include("db.php");

$pagename="Your Sign Up Results";      //Create and populate a variable called $pagename 

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  //Call in stylesheet 
 
echo "<title>".$pagename."</title>";   //display name of the page as window title 
 
echo "<body>"; 
 
include ("headfile.html");     //include header layout file  
 
echo "<h4>".$pagename."</h4>";    //display name of the page on the web page 

//Assinging the value from the Register form to the variables
$First_Name = $_POST['FirstName'];  
$Last_Name = $_POST['LastName']; 
$User_Type = $_POST['UserType']; 
$Address = $_POST['Address'];  
$Post_Code = $_POST['PostCode'];  
$Tel_No = $_POST['TelNo'];  
$Email_Address = $_POST['EmailAddress']; 
$Password = $_POST['password'];
$ConfirmPassword = $_POST['ConfirmPassword'];


//check if any of the mandatory fields were not filled in
if(!empty($First_Name) and !empty($Last_Name) and !empty($Address) and !empty($Post_Code) and !empty($Tel_No) and !empty($Email_Address) and !empty($Password))
{
	if($Password != $ConfirmPassword)
	{
		echo "<p><b>Sign-up Falied!</p></b>";
		echo "<p>The two Passwords are not matching</p>";
		echo "<p>Make sure you enter them correctly</p></br>";
		echo "Go back to <a href='signup.php'> Sign Up </a></br></br>";
	}
	else
	{
		$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
		
		if(preg_match($pattern, $Email_Address))
		{
			//write SQL query
			$addUsersSQL = "INSERT INTO users(userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) VALUES ('".$User_Type."', '".$First_Name."', '".$Last_Name."', '".$Address."', '".$Post_Code."', '".$Tel_No."', '".$Email_Address."', '".$Password."')"; 

			//run SQL query,
			$exeaddUsersSQL=mysqli_query($conn,$addUsersSQL);
			
			
			if(mysqli_errno($conn) == 0)
			{
				echo "<p><b>Sign-up Successful</b></p>";
				echo "To continue, please <a href='login.php'> Login </a>";
			}
			else 
			{
				echo "<p>Error Found</p>";
				
				if(mysqli_errno($conn)==1062)
				{
					echo "<p><b>Sign-up Falied!</p></b>";
					echo "<p>Email already in use</p>";
					echo "<p>You may be already register or try another email address</p></br>";
					echo "<a href='signup.php'> Sign Up </a></br></br>";
				}
				if(mysqli_errno($conn) == 1064)
				{
					echo "<p><b>Sign-up Falied!</p></b>";
					echo "<p>Invalid characters entered in the form</p>";
					echo "<p>Make sure you entered the following characters: apostrophes like ['] and backslashes like [\]</p>";
					echo "Go back to<a href='signup.php'> Sign Up </a></br></br>";	
				}
			}
			
		}
		else
		{
			echo "<p><b>Sign-up Falied!</p></b>";
			echo "<p>Email not valid</p>";
			echo "<p>Make sure you enter a correct email address</p>";
			echo "Go back to <a href='signup.php'> Sign Up </a></br></br>";
		}
	}
		
}else
{
	echo "<p><b>Sign-up Falied!</p></b>";
	echo "<p>Your Signup form is incompleted and all fields are mandatory</p>";
	echo "<p>Make sure you provide all the required details</p>";
	echo "Go back to <a href='signup.php'> Sign Up </a></br></br>";
}


			
include("footfile.html");     //include head layout 
 
echo "</body>"; 

?> 