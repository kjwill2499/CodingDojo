<?php
session_start();
require('connection.php');
$errors = array();
$_SESSION['errors'] = $errors;
$_SESSION['user_id'] = 0;
if(isset($_POST['action']) && ($_POST['action'] == 'register')){
	if(empty($_POST['first_name']) || !ctype_alpha($_POST['first_name'])){
		$errors[] = "first name must contain only letters and no spaces";
	}
	if(empty($_POST['last_name']) || !ctype_alpha($_POST['last_name'])){
		$errors[] = "last name must contain only letters and no spaces";
	}
	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$errors[] = "please enter a valid email address (example@example.com)";
	} 
	else{
		$email = escape_this_string($_POST['email']);
		$query = "SELECT email
				FROM users
				WHERE email = '{$email}'";
		if(!empty(fetch_all($query))){
			$errors[] = "username is already taken, please select a new username";
		}
	}
	if(empty($_POST['password']) || strlen($_POST['password']) < 6){
		$errors[] = "password must be greater than 6 characters";
	}
	if($_POST['password_conf'] != $_POST['password']){
		$errors[] = "password confirmation does not match";
	}
	if(count($errors) > 0){
		$_SESSION['errors'] = $errors;
		header('location: index.php');
		die();
	} else{
		$_SESSION['errors'] = $errors;
	}
	$first_name = escape_this_string($_POST['first_name']);
	$last_name = escape_this_string($_POST['last_name']);
	$email = escape_this_string($_POST['email']);
	$password = escape_this_string($_POST['password']);
 	$salt = bin2hex(openssl_random_pseudo_bytes(22));
 	$encrypted_password = md5($password . '' . $salt);
	$query = "INSERT INTO users (first_name, last_name, email, password, salt, created_at, updated_at)
				VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$encrypted_password}','{$salt}', NOW(), NOW())";
	$_SESSION['user_id'] = run_mysql_query($query);			
	if($_SESSION['user_id']){
		header('location: main.php');
		die();
		} else {
			echo 'failed';
		}
		
	
} else if(isset($_POST['action']) && ($_POST['action'] == 'login')){
	$email = escape_this_string($_POST['email']);
	$password = escape_this_string($_POST['password']);
	$user_query = "SELECT * FROM users WHERE users.email = '{$email}'";
	$user = fetch_record($user_query);
	if(!empty($user)){
		$encrypted_password = md5($password . '' . $user['salt']);
		if($user['password'] == $encrypted_password){
			$_SESSION['user_id'] = $user['id'];
			header('location: main.php');
			die();
		} else{
		$errors[] = "incorrect password";
		$_SESSION['errors'] = $errors;
		header('location: index.php');
		die();
		} 
	} else{
		$errors[] = "unknown user";
		$_SESSION['errors'] = $errors;
		header('location: index.php');
		die();
	}
}
?>