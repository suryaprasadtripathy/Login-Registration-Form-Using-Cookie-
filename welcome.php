<center>
<?php
	session_start();	
	
	if(empty($_SESSION['name'])) 
	header('location: index.php'); 
	
	echo "<h3>".strtoupper($_SESSION['name'])." ,Welcome To Home Page</h3>";	
?>
<p><a href="logout.php">Logout</a></p>
</center>