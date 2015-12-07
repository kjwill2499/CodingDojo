<?php
session_start();
require('connection.php');
$errors = array();
if(isset($_POST['action']) && ($_POST['action'] == 'logout')){
	session_destroy();
	header('location: index.php');
} else if(isset($_POST['action']) && ($_POST['action'] == 'message')){
	$message = escape_this_string($_POST['message']);
	$query = "INSERT INTO messages (message, users_id, created_at, updated_at) VALUES ('{$message}', '{$_SESSION['user_id']}', NOW(), NOW())";
	if(!run_mysql_query($query)){
		$errors[] = 'failed to post message';
	}	
		$_SESSION['errors'] = $errors;
		header('location: main.php');
} else if(isset($_POST['action']) && ($_POST['action'] == 'comment')){
	$comment = escape_this_string($_POST['comment']);
	$query = "INSERT INTO comments (comment, users_id, messages_id, created_at, updated_at) VALUES ('{$comment}', '{$_SESSION['user_id']}', '{$_POST['message_id']}', NOW(), NOW())";
	if(!run_mysql_query($query)){
		$errors[] = 'failed to post comment';
	}	
		$_SESSION['errors'] = $errors;
		header('location: main.php');
}
