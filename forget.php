
<center>
<?php
    require('database.php');
	$msg="";	
	if(isset($_POST['sign']))
	{		

		$email=$_POST['email'];
		$email=mysql_real_escape_string($email);
		$str="SELECT * FROM user WHERE email='$email'";
		$result=mysqli_query($con,$str);
		if((mysqli_num_rows($result))!=1)	
		$msg="Invalid Email Address";
		else
		{
			$row=mysqli_fetch_array($result);
			$body="Ur Password is ".$row[2];

			if(mail("$email","Forget Password of SkyNet!",$body,"From: SkyNet"))
			$msg="Your Password Has Been Sent To Your Email";
			else
			$msg="Sorry Server Is Not Reponsing Try After Some Time";	
		}		
	}
?>	
</center>

<!DOCTYPE HTML>
<html>
<head>
<title>Forget UserName &amp; Password</title>
</head>
<body>
<center>
<fieldset style="width:25%;" ><legend>Recover Ur Password</legend>
<table border="0">
<tr>
<form method="post" action="">
<tr>
<tr>
<td>Enter Ur Email</td><td> <input type="email" name="email" required></td>
</tr>
<tr>
<td></td><td><input type="submit" name="sign" value="Submit"></td>
</tr>
</form>
</table>
</fieldset>
<h3><?php echo $msg?></h3>
<p><a href="index.php">Go to Login Page</a></p>
</center>
</body>
</html>
