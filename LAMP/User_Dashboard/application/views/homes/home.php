<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/head', array('title' => 'Homepage'));?>
<body>
<?php $this->load->view('partials/navbar_home');?>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-9 col-sm-offset-2'>
				<br><br><br>
				<h3>Welcome to the Test Application</h3>
				<p>We're going to build a cool application using a MVC framework! This test app was built by Kenrick Williams, I hope you enjoy!</p>
				<br>
				<a class='btn-link' href="/signin">Login</a> or
				<a class='btn-link' href="/register">Register</a>
				<hr>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-3 col-sm-offset-2'>
				<h4>Manage Users</h4>
				<p>Using this application you'll learn how to add, edit and remove users for the application.</p>
			</div>
			<div class='col-sm-3'>
				<h4>Leave Messages</h4>
				<p>Users will be able to leave a message to another user using this application.</p>
			</div>
			<div class='col-sm-3'>
				<h4>Edit User Information</h4>
				<p>Admins will be able to edit another user's information (email address, first name, last name, etc.</p>
			</div>


		</div>
	</div>
</body>
</html>