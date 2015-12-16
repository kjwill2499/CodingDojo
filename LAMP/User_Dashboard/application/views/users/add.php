<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/head', array('title' => 'Add User'));?>
<body>
<?php $this->load->view('partials/navbar_users');?>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-6 col-sm-offset-2'>
				<br><br><br>
				<h4>Add User</h4>
				<br>
<?php
if($this->session->flashdata('errors')){
					foreach($this->session->flashdata('errors') as $error){
							echo $error;
					}
				}
?>
				<form action='/users/process_add' method='post'>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">email address:</span>
						<input id='email' type="text" class="form-control" name='email' placeholder="youremail@host.com..." aria-describedby="basic-addon1">
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">first name:</span>
						<input id='first_name' type="text" class="form-control" name='first_name' placeholder="first name..." aria-describedby="basic-addon1">
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">last name:</span>
						<input id='last_name' type="text" class="form-control" name='last_name' placeholder="last name..." aria-describedby="basic-addon1">
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">password:</span>
						<input id='password' type='password' class="form-control" name='password' placeholder="at least 8 characters..." aria-describedby="basic-addon1">	
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">confirm password:</span>
						<input id='password_confirmation' type='password' class="form-control" name='password_confirmation' placeholder="at least 8 characters..." aria-describedby="basic-addon1">	
					</div>
					<br>
					<input class='btn btn-button-success btn-sm' type='submit' value='Add User'>
				</form>
			</div>
		</div>
	</div>
</body>
</html>