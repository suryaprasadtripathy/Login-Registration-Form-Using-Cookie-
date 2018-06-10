<center>
<h3>
<?php
	include('database.php');
	if(isset($_GET['auth']) && (strlen($_GET['auth'])==32))
	{
		$auth=$_GET['auth'];
		$str="UPDATE user SET authorised=NULL WHERE authorised='$auth'";
		$result=mysqli_query($con,$str);
		if($result) 
		{ 
			echo "Your account is active Now!";		
			header("refresh:2;url=index.php");
		}
		else
		echo "Invalid Authorizing Code. Please Check Again";		
	}
	else
	echo "Invalid Authorizing Code. Please Check Again";	
?>
<h4>
</center>