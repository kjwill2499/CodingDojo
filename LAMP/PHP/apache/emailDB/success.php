<?php 
session_start();
require('new-connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Emails Entered!</title>
</head>
<body>
<?php
	echo $_SESSION['success'];
?>
	<h3>Email Addresses Entered!</h3>
	<table>
<?php
	$query = "SELECT email_address AS email, created_at AS time
          FROM email_addresses";
	$results = fetch_all($query);
	foreach($results as $row){
		echo "<tr><td>{$row['email']}</td><td>" . $row['time'] . "</td></tr>";
	}
?>
	</table>

</body>
</html>