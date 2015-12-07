<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<style type = "text/css">
	    .container {
        width: 200px;
        clear: both;
    	}
    	.container input {
        	width: 100%;
        	clear: both;
        	display: inline-block;
		}
	</style>
</head>
<body>
<?php
 	if(isset($_SESSION['errors'])){
 	    foreach($_SESSION['errors'] as $error){
        echo "<p>". $error. "</p>";
    	}
 	}
?>
	<div class = 'container'>
		<form action = 'process.php' method = 'post' enctype = 'multipart/form-data'>
			email:<input type = 'text' name = 'email'><br>
			first name:<input type = 'text' name = 'first'><br>
			last name:<input type = 'text' name = 'last'><br>
			password:<input type = 'password' name = 'password'><br>
			confirm password:<input type = 'password' name = 'password_conf'><br>
			birth date (optional):<input type = 'date' name = 'birth_date'><br>
			profile picture (optional):<input type = 'file' name = 'photo'><br>
			<input type = 'submit'>
		</form>
	</div>
</body>
</html>