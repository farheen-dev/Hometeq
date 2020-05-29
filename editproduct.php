
<?php 
session_start();

include ("db.php");					   //include db.php file to connect to DB

$pagename="View & Edit Products";     //Create and populate a variable called $pagename 

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  //Call in stylesheet 
 
echo "<title>".$pagename."</title>";   //display name of the page as window title 
 
echo "<body>"; 
 
include ("headfile.html");     //include header layout file  

include ("detectlogin.php");   // include detectlogin.php file
 
echo "<h4>".$pagename."</h4>";    //display name of the page on the web page 

if(isset($_POST['k_prodid']))
{
	$pridtobeupdated = $_POST['k_prodid'];
	$newprice = $_POST['NewPrice'];
	$newqutoadd = $_POST['o_quantity'];
	
	//create a $SQL variable and populate it with a SQL statement that retrieves product details
    $aSQL="select prodQuantity from product 
	       Where prodId= $pridtobeupdated "
		   ;
		   
	$lexeSQL=mysqli_query($conn, $aSQL) or die (mysqli_error());

	$arrayqu = mysqli_fetch_array($lexeSQL);
	
	$newstock= $arrayqu['prodQuantity'] + $newqutoadd;
	
	if(!empty($newprice))
	{
		$ySQL = "UPDATE product
			     SET prodPrice = '$newprice', prodQuantity = $newstock
	             WHERE prodId= $pridtobeupdated";
		
		$mexeSQL=mysqli_query($conn, $ySQL) or die (mysqli_error());
				
	}
	else
	{
		$xSQL = "UPDATE product
			     SET prodQuantity = $newstock
	             WHERE prodId= $pridtobeupdated";
		
		$qexeSQL=mysqli_query($conn, $xSQL) or die (mysqli_error());
		
	}
		   
}


//create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL="select prodId, prodName, prodPicNameSmall, prodDescripShort, prodPrice, prodQuantity from product";

//run SQL query for connected DB or exit and display error message 
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error()); 
echo "<table style='border: 0px'>";

//create an array of records (2 dimensional variable) called $arrayp. 
//populate it with the records retrieved by the SQL query previously executed. 
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($arrayp=mysqli_fetch_array($exeSQL)) 
{
	echo "<tr>"; 
		echo "<td style='border: 0px'>"; 
			//make the image into an anchor to prodbuy.php and pass the product id by URL (the id from the array)
			echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
			//display the small image whose name is contained in the array 
			echo "<img src=images/".$arrayp['prodPicNameSmall']." height=200 width=200>";
			echo "</a>";
		echo "</td>"; 
		echo "<td style='border: 0px'>";
		
			echo "<td style='border: 0px'>";
				echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array 
				echo "<p><h5>".$arrayp['prodDescripShort']."</h5>"; //display product Short Description as contained in the array 
				
				echo "<p><h5>Current Price : ".$arrayp['prodPrice']."</h5>"; //display product Price as contained in the array 
				echo "<p><h5>Current Stock : ".$arrayp['prodQuantity']."</h5>";
				
			
				echo "<form action=editproduct.php method=post>";
				 
					echo "<label>New Price</label>";
					echo "<input type=text name=NewPrice>";
							
					echo "</br></br>";
							
					echo "Add no of items";
					echo "<select name='o_quantity'>";
					//Using for loop to iterate through the array of the quantity 
					$Quantity = $arrayp['prodQuantity'];
					for ($x = 0; $x <= $Quantity; $x++)
					{
						echo "<option value=$x> $x </option>";
					}
					echo "</select>";
							
					echo "</br></br>";
							
					echo "<input type=submit  value='Update'>";
					echo "<input type=hidden name=k_prodid value=".$arrayp['prodId'].">";
					
							
				echo "</form>";	
				
				
			echo "</td>";
			
		echo "</td>";
			
	echo "</tr>";
	
}
echo "</table>"; 

include("footfile.html");     //include head layout 
 
echo "</body>"; 

?> 