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
		<form action = 'process.php' method = 'post'>
			email:<input type = 'text' name = 'email'><br>
			<input type = 'submit'>
		</form>
	</div>
</body>
</html>