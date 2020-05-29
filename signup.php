
<?php

session_start();

$pagename="Sign Up";      //Create and populate a variable called $pagename 

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  //Call in stylesheet 
 
echo "<title>".$pagename."</title>";   //display name of the page as window title 
 
echo "<body>"; 
 
include ("headfile.html");     //include header layout file  
 
echo "<h4>".$pagename."</h4>";    //display name of the page on the web page 


//Form for sign up
echo "<form action=signup_process.php method=post>";
	//Table
	echo "<table style='border:0px'>";
			
			echo "<tr>";
				echo "<td style='border: 0px'>";
					echo "<label>*First Name</label>";
				echo "</td >";
				
				echo "<td style='border: 0px'>";
					echo "<input type=text name=FirstName>";
				echo "</td>";	
			echo "</tr>";

			echo "<tr>";
				echo "<td style='border: 0px'>";
					echo "<label>*Last Name</label>";
				echo "</td>";
				echo "<td style='border: 0px'>";
					echo "<input type=text name=LastName>";
				echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td style='border: 0px'>";
					echo "<label>*User Type</label>";
				echo "</td>";
				echo "<td style='border: 0px'>";
					echo "<input type=text name=UserType>";
				echo "</td>";
			echo "</tr>";
			
			
			echo "<tr>";
				echo "<td style='border: 0px'>";
					echo "<label>*Address</label>";
				echo "</td>";
				echo "<td style='border: 0px'>";
					echo "<input type=text name=Address>";
				echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td style='border: 0px'>";
					echo "<label>*Postcode</label>";
				echo "</td>";
				echo "<td style='border: 0px'>";
					echo "<input type=text name=PostCode>";
				echo "</td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td style='border: 0px'>";
					echo "<label>*Tel No</label>";
				echo "</td>";
				echo "<td style='border: 0px'>";
					echo "<input type=text name=TelNo>";
				echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td style='border: 0px'>";
					echo "<label>*Email Address</label>";
				echo "</td>";
				echo "<td style='border: 0px'>";
					echo "<input type=text name=EmailAddress>";
				echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td style='border: 0px'>";
					echo "<label>*Password</label>";
				echo "</td>";
				echo "<td style='border: 0px'>";
					echo "<input type=password name=password>";
				echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td style='border: 0px'>";
					echo "<label>*Confirm Password</label>";
				echo "</td>";
				echo "<td style='border: 0px'>";
					echo "<input type=password name=ConfirmPassword>";
				echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td style='border: 0px'>";		
					echo "<input type=submit  value='Sign Up'>";
				echo "</td>";
				echo "<td style='border: 0px'>";
					echo "<input type=submit  value='Clear Form'>";
				echo "</td>";
			echo "</tr>";
			
	echo "</table>";
		
echo "</form>";
	

include("footfile.html");     //include head layout 
 
echo "</body>"; 

?> 