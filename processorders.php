
<?php

session_start();

include("db.php");

$pagename="Process Orders";      //Create and populate a variable called $pagename 

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  //Call in stylesheet 
 
echo "<title>".$pagename."</title>";   //display name of the page as window title 
 
echo "<body>"; 
 
include ("headfile.html");     //include header layout file  
 
echo "<h4>".$pagename."</h4>";    //display name of the page on the web page 



if(isset($_POST['n_prodid']))
{
	
	
	$abb = $_POST['stat']; 
	$delprodid=$_POST['n_prodid'];
	
	$SQL3 = "UPDATE orders
			SET orderStatus = '$abb'
			WHERE userId = $delprodid
			";
	
	$exeSQL3=mysqli_query($conn, $SQL3) or die (mysqli_error($conn));
	
	
}


echo "<table style='border: 2px','color: green'>";
	echo "<tr>";
		//Order Name
		echo "<td>";
			echo "Order";
		echo "</td>";
		//Order Date Time
		echo "<td>";
			echo "Order Date Time";
		echo "</td>";
		//User Id
		echo "<td>";
			echo "User Id";
		echo "</td>";
		//Name
		echo "<td>";
			echo "Name";
		echo "</td>";
		//Surname
		echo "<td>";
			echo "SurName";
		echo "</td>";
		//Status
		echo "<td>";
			echo "Status";
		echo "</td>";
		//Product name
		echo "<td>";
			echo "Product";
		echo "</td>";
		//Quantity
		echo "<td>";
			echo "Quantity";
		echo "</td>";
	echo "</tr>";	
		
		$SQL1="select o.orderNo, o.orderStatus, o.orderDateTime,u.userId, u.userFName, u.userSName,ol.quantityOrdered, p.prodName 
		       FROM orders as o INNER JOIN users as u ON  u.userId = o.userId
			   INNER JOIN order_line as ol ON  o.orderNo = ol.orderNo
			   INNER JOIN product as p ON p.prodId = ol.prodId
			   ";
		
		//run SQL query for connected DB or exit and display error message 
		$exeSQL1=mysqli_query($conn, $SQL1) or die (mysqli_error($conn));
			
		while ($arrayo=mysqli_fetch_array($exeSQL1))
		{
								
			echo "<tr>";
				echo "<td>";
				   echo "<p><h5>".$arrayo['orderNo']."</h5>";  
				echo "</td>";	
									
				echo "<td>";
					echo "<p><h5>".$arrayo['orderDateTime']."</h5>"; 		
				echo "</td>";
				
				echo "<td>";
					echo "<p><h5>".$arrayo['userId']."</h5>"; 		
				echo "</td>";
		
				echo "<td>";
					echo "<p><h5>".$arrayo['userFName']."</h5>"; 		
				echo "</td>";
		
				echo "<td>";
					echo "<p><h5>".$arrayo['userSName']."</h5>"; 		
				echo "</td>";
				
				
				echo "<td>";
					//echo "<p><h5>".$arrayo['orderStatus']."</h5>"; 	
					
						if($arrayo['orderStatus'] = "Placed")
					    {
							echo "<form  action=processorders.php method=post>";				
								//drop-down list
								
									echo "<select name='stat' >";			
										echo "<option value='Placed' selected>Placed</option>";
										echo "<option value='Ready to collect'>Ready to collect </option>";
									echo "</select>";		
																
									echo "<input type=submit  value='Update'>";
									echo "<input type=hidden name=n_prodid value=".$arrayo['userId'].">";
									
							echo "</form>";	
									
						}
						
						else if($arrayo['orderStatus'] = "Ready to collect")
					    {
							echo "<form  action=processorders.php method=post>";				
								//drop-down list
								
									echo "<select name='stat' >";			
										echo "<option value='Ready to collect' selected>Ready to collect</option>";
										echo "<option value='collected'> collected</option>";
									echo "</select>";		
																
									echo "<input type=submit  value='Update'>";
									echo "<input type=hidden name=n_prodid value=".$arrayo['userId'].">";
						
							echo "</form>";
					    }
									
				echo "</td>";
			
		
				echo "<td>";
					echo "<p><h5>".$arrayo['prodName']."</h5>"; 		
				echo "</td>";
		

				echo "<td>";
					echo "<p><h5>".$arrayo['quantityOrdered']."</h5>";   
				echo "</td>";
				
			echo "</tr>";

		}	
		
echo "</table>";
	

include("footfile.html");     //include head layout 
 
echo "</body>"; 

?> 