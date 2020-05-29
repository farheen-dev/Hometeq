<?php 

session_start();

include("db.php");

$pagename="Smart Basket";      //Create and populate a variable called $pagename 

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  //Call in stylesheet 
 
echo "<title>".$pagename."</title>";   //display name of the page as window title 
 
echo "<body>"; 
 
include ("headfile.html");     //include header layout file  

include ("detectlogin.php");   // include detectlogin.php file
 
echo "<h4>".$pagename."</h4>";    //display name of the page on the web page 


if(isset($_POST['m_prodid']))
{
	//capture the posted product id and assign it to a local variable $delprodid
	$delprodid=$_POST['m_prodid'];
	
	//unset the cell of the session for this posted product id variable
	unset($_SESSION['basket'][$delprodid]);
	
	//display a "1 item removed from the basket" message
	echo "1 item removed from the basket </br>";	
}


if(isset($_POST['h_prodid']))
{
	//capture the ID of selected product using the POST method and the $_POST superglobal variable
	//and store it in a new local variable called $newprodid
	$newprodid=$_POST["h_prodid"];

	//capture the required quantity of selected product using the POST method and $_POST superglobal variable
	//and store it in a new local variable called $reququantity
	$reququantity=$_POST["p_quantity"];

	/* 
	Display id of selected product
	echo "Id of selected Product :".$newprodid."</br>";
	*/
	
	/*
	Display quantity of selected product
	echo "Quantity of selected Product :".$reququantity;
	*/


	//create a new cell in the basket session array. Index this cell with the new product id.
	//Inside the cell store the required product quantity
	$_SESSION['basket'][$newprodid]= $reququantity;
	//echo "<p>The doc id ".$newdocid." has been ".$_SESSION['basket'][$newdocid];
	echo "<p>".$reququantity." item added to the basket";
	
	
}else{
	echo "Current basket unchanged </br>";
}

echo "</br>";

echo "<table style='border: 2px','color: green'>";
	echo "<tr>";
		//Product Name
		echo "<td>";
			echo "Product Name";
		echo "</td>";
		//Price
		echo "<td>";
			echo "Price";
		echo "</td>";
		//Quantity
		echo "<td>";
			echo "Quantity";
		echo "</td>";
		//Subtotal
		echo "<td>";
			echo "Subtotal";
		echo "</td>";
		//Empty cell
		echo "<td>";
		echo "</td>";
		
	echo "</tr>";


	if (isset($_SESSION['basket']))
	{
				$total = 0;
				
				foreach($_SESSION['basket'] as $index => $value)
				{
					
							//SQL query to retrieve from Product table details of selected product for which id matches $index
							$SQL="select * from product
								  Where prodId=$index;
								 ";
							//run SQL query for connected DB or exit and display error message 
							$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
							
							
							
							while ($arrayp=mysqli_fetch_array($exeSQL))
							{
								
								echo "<tr>";
									echo "<td>";
											echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array 
									echo "</td>";	
								
									echo "<td>";
											echo "<p><h5>".$arrayp['prodPrice']."</h5>"; //display product Price as contained in the array		
									echo "</td>";

									echo "<td>";
											echo "<p><h5>".$value."</h5>";  //display product Quantity as contained in the array  
									echo "</td>";
									
									$subtotal = $arrayp['prodPrice'] * $value;
									echo "<td>";
											echo " <p><h5>".$subtotal."</h5>"; //display product Price as contained in the array 
									echo "</td>";
									
									echo "<td>";
											echo "<form action=basket.php method=post>";
												echo "<input type=submit  value='Remove'>";
												echo "<input type=hidden name=m_prodid value=".$arrayp['prodId'].">";
											echo "</form>";
									echo "</td>";
										
								echo "</tr>";
						
							}
						
							$total += $subtotal;
				}
				
				
				echo "<tr>";
					echo "<td colspan=3>";
						echo "<p><h5> Total </h5>";
					echo "</td>";
					echo "<td>";
						echo "<p><h5>".$total."</h5>";
					echo "</td>";
				echo "</tr>";	
				

			
	}else{
		
		echo "empty basket message";
		echo "<tr>";
			echo "<td colspan=3>";
				echo "<p><h5> Total </h5>";
			echo "</td>";
			echo "<td>";
				echo "<p><h5>0.00</h5>";
			echo "</td>";
		echo "</tr>";
	}

echo "</table>";

echo "</br>";

//link to clear the basket session
echo "<a href='clearbasket.php'> CLEAR BASKET </a></br></br>";

if(isset($_SESSION['userid']))
{
	//Checkout anchor
	echo "To finalize your order <a href='checkout.php'> checkout </a></br></br>";
	
}else
{
	//Sign Up
	echo "New hometeq Customers :<a href='signup.php'> Sign Up </a></br></br>";

	//Login
	echo "Returning hometeq Customers :<a href='login.php'> Login </a>";
}




include("footfile.html");     //include head layout 
 
echo "</body>"; 

?> 