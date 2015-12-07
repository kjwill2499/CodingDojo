<?php
session_start();
require('new-connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login_reg</title>
	<style type="text/css">
		input{
			display:block;
		}
	</style>
</head>
<body>
<?php
	if(!empty($_SESSION['errors'])){
		foreach ($_SESSION['errors'] as $error){
			echo "<p>$error</p>";
		}
	}
?>
	<h2>Register</h2>
	<form action = 'process.php' method = 'post'>
		<span>First Name:</span><input type='text' name='first_name'>
		<span>Last Name:</span><input type='text' name='last_name'>
		<span>Email Address:</span><input type='text' name='email'>
		<span>Password:</span><input type='password' name='password'>
		<span>Confirm Password:</span><input type='password' name='password_conf'>
		<input type='hidden' name='action' value='register'>
		<input type='submit' value='register'>
	</form>
	<h2>Login</h2>
	<form action = 'process.php' method = 'post'>
		<span>Email Address:</span><input type='text' name='email'>
		<span>Password:</span><input type='password' name='password'>
		<input type='hidden' name='action' value='login'>
		<input type='submit' value='login'>
	</form>
		
		
	
</body>
</html>