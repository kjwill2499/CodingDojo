<?php
session_start();
require('new-connection.php');
$errors = array();
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
		$query = "SELECT email
				FROM users
				WHERE email = '{$_POST['email']}'";
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
	$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at)
				VALUES ('{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['email']}', '{$_POST['password']}', NOW(), NOW())";
	$_SESSION['user_id'] = run_mysql_query($query);			
	if($_SESSION['user_id']){
		$_SESSION['message'] = 'successful registration';
		header('location: success.php');
		die();
		} else {
			echo 'failed';
		}
		
	
} else if(isset($_POST['action']) && ($_POST['action'] == 'login')){
	$query = "SELECT * FROM users WHERE users.email = '{$_POST['email']}' AND users.password = '{$_POST['password']}'";
	$user= fetch_record($query);
	if(!empty($user)){
		$_SESSION['user_id'] = $user['id'];
		$$_SESSION['message'] = 'successful login';
		header('location: success.php');
		die();
	} else {
		$errors[] = "login failure";
		$_SESSION['errors'] = $errors;
		header('location: index.php');
		die();
	}
}
?>