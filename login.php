<center>
<?php
	include("database.php");
	session_start();
	$error="";
	if(isset($_POST['sign']))
	{	
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['pass'];
		
		$str="SELECT email from user WHERE email='$email'";
		$result=mysqli_query($con,$str);
		if((mysqli_num_rows($result))>0)	
		echo "<h5>This Email Is Already Registered!</h5>";
		else
		{
			$code=md5(uniqid(rand()));
			$str="insert into user set name='$name',password='$password',email='$email',authorised='$code'";
			$result=mysqli_query($con,$str);
			if($result)
			{	
				$message="Please click the link below to verify and activate your account.\n\n";
				$message.="http://localhost/confirm.php?auth=$code";

				if(mail("$email","Confirmation from SkyNet!",$message,"From: SkyNet"))
				echo "<h5>Your Confirmation link Has Been Sent To Your email</h5>";
				else
				echo "<h5>Try Again</h5>";		
			}
		}
	} 	
?> 
<a href="index.php">Go to Login Page</a>
</center>