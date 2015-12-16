<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/head', array('title' => 'CD Sign In'));?>
<body>
<?php $this->load->view('partials/navbar_home');?>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-6 col-sm-offset-2'>
				<br><br><br>
				<h4>Sign In</h4>
				<br>
<?php
				if($this->session->flashdata('errors')){
					foreach($this->session->flashdata('errors') as $error){
?>
						<div class="alert alert-info" role="alert">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							<?=$error;?>
						</div>
<?php 
					}
				}
?>
				<form action='/users/signin_request' method='post'>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">email address:</span>
						<input id='email' type="text" class="form-control" name='email' placeholder="youremail@host.com" aria-describedby="basic-addon1">
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">password:</span>
						<input id='password' type='password' class="form-control" name='password' placeholder="at least 8 characters" aria-describedby="basic-addon1">	
					</div>
					<br>
					<input type='hidden' name='action' value='signin'>
					<div class='pull-right'>
						<input type='submit' class='btn btn-info btn-sm' value='Sign In'>
						<a style='vertical-align:bottom' href="/register">Not a User? Register</a>						
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>