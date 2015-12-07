<?php 
	session_start(); 
	if (empty($_SESSION['number'])){
		$_SESSION['number'] = rand(1, 100);
	}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Survey Form</title>
	<style>
		div {
			margin-left: 20px;
		}
		div.box {
			
			height: 200px;
			width: 200px;
		}
	</style>
</head>
<body>
	<div>
		<h2>Welcome to the great number game!</h2>
		<p>I am thinking of a number between (inclusive) 1-100<br>take a guess!</p>
		<?php 
			if(empty($_GET['guess'])){
				echo "<div class = 'box' style = display:none></div><form";
			} else if($_GET['guess'] < $_SESSION['number']){
				echo "<div class = 'box' style = background-color:red>too low!</div><form";
			} else if($_GET['guess'] > $_SESSION['number']){
				echo "<div class = 'box' style = background-color:red>too high!</div><form";
			} else{

				echo "<div class = 'box' style = background-color:green>{$_SESSION['number']} is the number!";
				session_destroy();
				echo "<form action = 'main.php'><input type = 'submit' value = 'play again!'></form></div><form style = display:none";
			}
		?>
		 action = 'main.php' method = 'get'>
  			<input type= 'number' name= 'guess' min="1" max="100">
  			<input type = 'submit'>
		</form>
	</div>
	
</body>
</html>