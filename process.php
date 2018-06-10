<?php
    require('database.php');
	session_start();
	if(isset($_SESSION['logged']))
	header('location: welcome.php');
				
	if(isset($_POST['submit']))
	{	
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$email=mysqli_real_escape_string($con,$email);
		$pass=mysqli_real_escape_string($con,$pass);					
		$str="SELECT * FROM user WHERE email='$email' and password='$pass' AND authorised IS NULL";
		$result=mysqli_query($con,$str);
		if((mysqli_num_rows($result))!=1) 
		{
			echo "<center><h3>Wrong UserName or Password</h3></center>";
			header("refresh:2;url=index.php");
		}
		else
		{
			$_SESSION['logged']=$email;
			$row=mysqli_fetch_array($result);
			$_SESSION['name']=$row[1];
			
			if(isset($_POST['rm'])) 
			{
				setcookie('name',$row[3],time()+3600*24);
				setcookie('password',$row[2],time()+3600*24);
			}
			else
			{
				setcookie('name',$row[3],time()-3600*24);
				setcookie('password',$row[2],time()-3600*24);
			}
			header('location: welcome.php'); 					
		}
	}
	else 
	header('location: index.php'); 	
				
				
?>	
