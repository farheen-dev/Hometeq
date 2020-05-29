
<?php 

session_start();

include("db.php");

$pagename="New Product Confirmation";      //Create and populate a variable called $pagename 

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  //Call in stylesheet 
 
echo "<title>".$pagename."</title>";   //display name of the page as window title 
 
echo "<body>"; 
 
include ("headfile.html");     //include header layout file  
 
echo "<h4>".$pagename."</h4>";    //display name of the page on the web page 

//Assinging the value from the Register form to the variables
$Product_Name = $_POST['ProductName'];  
$Small_Pic_Name = $_POST['SmallPicName']; 
$Large_Pic_Name = $_POST['LargePicName']; 
$Short_Descrip = $_POST['ShortDescription'];  
$Large_Descrip = $_POST['LongDescription'];  
$Price = $_POST['Price'];  
$Initial_Quantity = $_POST['IniitalQuantity']; 



//check if any of the mandatory fields were not filled in
if(!empty($Product_Name) and !empty($Small_Pic_Name) and !empty($Large_Pic_Name) and !empty($Short_Descrip) and !empty($Large_Descrip) and !empty($Price) and !empty($Initial_Quantity))
{
			
			if(mysqli_errno($conn) == 0)
			{
				//write SQL query
				$insertProductSQL = "INSERT INTO product(prodName,prodPicNameSmall,prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity) VALUES ('".$Product_Name."', '".$Small_Pic_Name."', '".$Large_Pic_Name."', '".$Short_Descrip."', '".$Large_Descrip."', '".$Price."', '".$Initial_Quantity."')"; 

				//run SQL query,
				$exeaddProductSQL=mysqli_query($conn,$insertProductSQL);
				
				echo "The Product has been added </br></br>";
				echo "Name of the small picture ".$Small_Pic_Name."</br></br>";
				echo "Name of the large picture ".$Large_Pic_Name."</br></br>";
				echo "Short Description : ".$Short_Descrip."</br></br>";
				echo "Large Description : ".$Large_Descrip."</br></br>";
				echo "Price : ".$Price."</br></br>";
				echo "Intial Quauntity : ".$Initial_Quantity."</br></br>";
			}
			else 
			{
				
				if(mysqli_errno($conn)==1062)
				{
					echo "The uniqness of the product has been breached";
				}
				if(mysqli_errno($conn) == 1064)
				{
					echo "illegal characters have been entered such as apostrophes [ ' ] and backslashes [ \ ]";	
				}
				if(mysqli_errno($conn) == 1054)
				{
					echo "illegal characters have been entered in the fields that are expecting numerical values";	
				}
			}
			
		
		
	
		
}else
{
	echo "<p><b>Error in adding a new Product!</p></b>";
	echo "<p>Your Signup form is incompleted and all fields are mandatory</p>";
	echo "<p>Make sure you provide all the required details</p>";
	echo "Go back to <a href='signup.php'> Sign Up </a></br></br>";
}

include("footfile.html");     //include head layout 
 
echo "</body>"; 

?> 