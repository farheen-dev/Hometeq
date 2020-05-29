
<?php

session_start();

$pagename="Add a New Product";      //Create and populate a variable called $pagename 

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  //Call in stylesheet 
 
echo "<title>".$pagename."</title>";   //display name of the page as window title 
 
echo "<body>"; 
 
include ("headfile.html");     //include header layout file  
 
echo "<h4>".$pagename."</h4>";    //display name of the page on the web page 


//Form for sign up
echo "<form action=addproduct_conf.php method=post>";
	//Table
	echo "<table style='border:0px'>";
			
			echo "<tr>";
				echo "<td>";
					echo "<label>*Product Name</label>";
				echo "</td >";
				
				echo "<td>";
					echo "<input type=text name=ProductName>";
				echo "</td>";	
			echo "</tr>";

			echo "<tr>";
				echo "<td>";
					echo "<label>*Small Picture Name</label>";
				echo "</td>";
				echo "<td>";
					echo "<input type=text name=SmallPicName>";
				echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td>";
					echo "<label>*Large Picture Name</label>";
				echo "</td>";
				echo "<td>";
					echo "<input type=text name=LargePicName>";
				echo "</td>";
			echo "</tr>";
			
			
			echo "<tr>";
				echo "<td>";
					echo "<label>*Short Description</label>";
				echo "</td>";
				echo "<td>";
					echo "<input type=text name=ShortDescription>";
				echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td>";
					echo "<label>*Long Description</label>";
				echo "</td>";
				echo "<td>";
					echo "<input type=text name=LongDescription>";
				echo "</td>";
			echo "</tr>";

			echo "<tr>";
				echo "<td>";
					echo "<label>*Price</label>";
				echo "</td>";
				echo "<td>";
					echo "<input type=text name=Price>";
				echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td>";
					echo "<label>*Iniital Stock Quantity</label>";
				echo "</td>";
				echo "<td>";
					echo "<input type=text name=IniitalQuantity>";
				echo "</td>";
			echo "</tr>";
			
			
			echo "<tr>";
				echo "<td>";		
					echo "<input type=submit  value='Add Product'>";
				echo "</td>";
				echo "<td>";
					echo "<input type=submit  value='Clear Form'>";
				echo "</td>";
			echo "</tr>";
			
	echo "</table>";
		
echo "</form>";
	

include("footfile.html");     //include head layout 
 
echo "</body>"; 

?> 