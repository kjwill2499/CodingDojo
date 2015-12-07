<?php 
	if(empty($_COOKIE['goldTotal'])){
		setcookie('goldTotal', 0, time() + 86400 * 30, '/');
	}
	if(empty($_COOKIE['activityLog'])){
		setcookie('activityLog', ' ', time() + 86400 * 30, '/');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ninja Gold!</title>
	<style>
		.house{
			width: 20%;
			display:inline-block;
			text-align: center;
			border: 1px solid black;
			margin: 5px;
			padding: 10px;
		}
		.log{
			height: 150px;
			overflow: scroll;
			border: 1px solid black;
			margin: 5px;
		}
	</style>
</head>
<body>
	<div>
		<h3>Your Gold!: <?= "{$_COOKIE['goldTotal']}";?></h3>
	</div>
	<div>
		<div class='house'>
			<h4>Farm<br><br>(earns 10-20 gold)<br></h4>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="farm" />
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>
		<div class='house'>
			<h4>Cave<br><br>(earns 5-10 gold)<br></h4>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="cave" />
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>
		<div class='house'>
			<h4>House<br><br>(earns 2-5 gold)<br></h4>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="house" />
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>
		<div class='house'>
			<h4>Casino<br><br>(earns/takes 0-50 gold)<br></h4>
			<form action="process.php" method="post">
				<input type="hidden" name="building" value="casino" />
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>
	</div>
	<div class='log'>
		<p><?= $_COOKIE['activityLog'];?></p>
	</div>
		<form action="process.php" method="post">
			<input type="hidden" name="building" value = "reset" />
			<input type="submit" value="Reset"/>
		</form>
	
</body>
</html>