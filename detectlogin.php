
<?php 


if(isset($_SESSION['userid']))
{	
	echo "<div  align='right'>";
		echo " " .$_SESSION['fname']. " " .$_SESSION['sname']. " / " .$_SESSION['usertype']. " No: " . $_SESSION['userid'] ;
	echo "</div>";
}


?> 