<?php
    session_start();
	if(isset($_SESSION['logged']))
	header('location: welcome.php');
?>

<!DOCTYPE HTML>
<html>
	<body>
		<center>
			<fieldset style="width:18%">
				<legend>SIGN IN</legend>
				<table>
					<form method="post" action="process.php">
						<a href="signin.php">Register Me</a><br><br>
						<tr>
							<td>Email</td><td><input type="email" name="email" size="20" value="<?php if(isset($_COOKIE['name'])) echo $_COOKIE['name'];?>" required></td>
						</tr>
						<tr>
							<td>Password </td><td><input type="password" name="pass" size="20" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];?>" required></td>
						</tr>
						<tr>
							<td></td><td>Remember Me <input type="checkbox" name="rm" <?php if(isset($_COOKIE['name'])) echo "checked"; else echo ""; ?> ></td>
						</tr>
						<tr>
							<td></td><td><input type="submit" name="submit" value="Submit"></td>
						</tr>
					</form>
				</table>
				<p><a href="forget.php">Forgot Password</a></p>
			</fieldset>
		</center>
	</body>
</html> 





