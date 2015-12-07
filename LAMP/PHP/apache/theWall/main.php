<?php
	session_start();
	require('connection.php');
	$query = "SELECT * FROM users WHERE users.id = '{$_SESSION['user_id']}'";
	$user = fetch_record($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CD Wall</title>
	<style type="text/css">
		h2{
			display: inline-block;
		}
		h3{
			display: inline-block;
			margin-left: 30%;
		}
		form.logout{
			display: inline-block;
			margin-left: 5%;
		}
		form.logout input{
			background: white;
			border: none;
		}
		textarea{
			width: 80%;
		}
		form.message, h4.message{
			margin-left: 10%;
		}
		form.message textarea{
			height: 100px;
		}
		p.message{
			margin-left: 15%
		}
		h5.comment, form.comment{
			margin-left: 20%;
		}
		form.comment{
			height: 50px;
		}
		p.comment{
			margin-left: 25%;
			font-size: 0.9em;
		}
		input{
			display:block;
		}
		textarea{
			overflow:scroll;
		}
	</style>
</head>
<body>
	<div class='header'>
		<h2>Coding Dojo Wall</h2>
		<h3>Welcome <?=$user['first_name']?></h3>
		<form class='logout' action='process.php' method='post'>
			<input type='hidden' name='action' value='logout'>
			<input type='submit' value='logout'>
		</form>	
	</div>
<?php
	if(!empty($_SESSION['errors'])){
		foreach ($_SESSION['errors'] as $error){
			echo "<p>$error</p>";
		}
	}
?>
	<form class = 'message' action = 'process.php' method = 'post'>
		<textarea  name='message' placeholder ='write message here...'></textarea>
		<input type='hidden' name='action' value='message'>
		<input type='submit' value='post message'>
	</form>
<?php
	$messages_query = "SELECT messages.id AS message_id, messages.message AS message, users.first_name AS first, users.last_name AS last, messages.created_at AS created  FROM messages JOIN users ON messages.users_id = users.id ORDER BY messages.created_at DESC";
	$messages = fetch_all($messages_query);
	foreach ($messages as $message){
		echo "<h4 class='message'>{$message['first']} {$message['last']} - {$message['created']}</h4>";
		echo "<p class='message'>{$message['message']}</p>";
		$comments_query = "SELECT comments.comment AS comment, users.first_name AS first, users.last_name AS last, comments.created_at AS created FROM comments JOIN users ON comments.users_id = users.id WHERE comments.messages_id = {$message['message_id']} ORDER BY comments.created_at ASC";
		$comments = fetch_all($comments_query);
		foreach ($comments as $comment) {
			echo "<h5 class='comment'>{$comment['first']} {$comment['last']} - {$comment['created']}</h5>";
			echo "<p class='comment'>{$comment['comment']}</p>";
		}
		echo "<form class = 'comment' action = 'process.php' method = 'post'>
		<textarea  name='comment' placeholder ='comment here...'></textarea>
		<input type='hidden' name='message_id' value='{$message['message_id']}'>
		<input type='hidden' name='action' value='comment'>
		<input type='submit' value='post comment'>
		</form>";
	}
?>
</body>
</html>