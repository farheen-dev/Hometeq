
<?php 

session_start();

include("db.php");

$pagename="Your Login Results";      //Create and populate a variable called $pagename 

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  //Call in stylesheet 
 
echo "<title>".$pagename."</title>";   //display name of the page as window title 
 
echo "<body>"; 
 
include ("headfile.html");     //include header layout file  

include ("detectlogin.php");   //include detectlogin.php file  
 
echo "<h4>".$pagename."</h4>";    //display name of the page on the web page 

$currentdatetime = date("Y-m-d h:i:sa");

//write SQL query
$addOrdersSQL = "INSERT INTO orders(userId, orderDateTime, orderStatus) VALUES ('".$_SESSION['userid']."', '".$currentdatetime."', 'Placed')"; 

//run SQL query,
$exeaddOrdersSQL=mysqli_query($conn,$addOrdersSQL);

if(!mysqli_error($conn) && mysqli_errno($conn) == 0)
{
	//write SQL query
	$retriveSQL = "select MAX(orderNo) as maximumOrders from orders
				  Where userId='".$_SESSION['userid']."'
				  ";
	
	//run SQL query for connected DB or exit and display error message 			
	$exeRetriveSQL = mysqli_query($conn, $retriveSQL) or die (mysqli_error());
	
	$arrayord = mysqli_fetch_array($exeRetriveSQL);
	
	$maxOrder = $arrayord['maximumOrders'];
	
	echo "Successful order - ORDER REFERENCE NO : " .$maxOrder. "</br>" ;
	
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
		echo "</tr>";

		
		if (isset($_SESSION['basket']))
		{
					$total = 0;
					
					foreach($_SESSION['basket'] as $index => $value)
					{
						
								//SQL query to retrieve from Product table details of selected product for which id matches $index
								$insertSQL="select * from product
										    Where prodId=$index;
									       ";
								//run SQL query for connected DB or exit and display error message 
								$exeInsertSQL=mysqli_query($conn, $insertSQL) or die (mysqli_error());
							
								
								while ($arrayb=mysqli_fetch_array($exeInsertSQL))
								{
									$subtotals = $arrayb['prodPrice'] * $value;
									
									//write SQL query
									$storeSQL = "INSERT INTO order_line(orderNo, prodId, quantityOrdered, subTotal) VALUES ('".$arrayord['maximumOrders']."', '".$index."', '".$value."', '".$subtotals."')"; 
									//run SQL query,
									$exestoreSQLOrdersSQL=mysqli_query($conn ,$storeSQL) or die (mysqli_error());;
									
									echo "<tr>";
											echo "<td>";
													echo "<p><h5>".$arrayb['prodName']."</h5>"; //display product name as contained in the array 
											echo "</td>";	
										
											echo "<td>";
													echo "<p><h5>".$arrayb['prodPrice']."</h5>"; //display product Price as contained in the array		
											echo "</td>";

											echo "<td>";
													echo "<p><h5>".$value."</h5>";  //display product Quantity as contained in the array  
											echo "</td>";
											
											
											echo "<td>";
													echo " <p><h5>".$subtotals."</h5>"; //display product Price as contained in the array 
											echo "</td>";
											
												
										echo "</tr>";
								}
								
								//Increment the total
								$total += $subtotals;
					}
					
					
					echo "<tr>";
						echo "<td colspan=3>";
							echo "<p><h5> Order Total </h5>";
						echo "</td>";
						echo "<td>";
							echo "<p><h5>".$total."</h5>";
						echo "</td>";
					echo "</tr>";	
					
				
		}
		
			$updateSQL = "UPDATE orders
						SET orderTotal = $total
						WHERE orderNo = '".$arrayord['maximumOrders']."';
									";
			//run SQL query,
			$exeupdateSQLOrdersSQL=mysqli_query($conn,$updateSQL);
						
					
	echo "</table>";
		 
	
}
else
{
	echo "There has been an error with placing the order";
}

echo "To logout and leave the system <a href='logout.php'>Logout</a></br>";


unset($_SESSION['basket']);  // Clear the Session


include("footfile.html");     //include head layout 
 
echo "</body>"; 

?> 