<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/head', array('title' => 'Welcome To CD Poke'));?>
<body>
	<div class='container-fluid'>
		<div class='row'>
			<br>
			<div class='col-sm-3 col-sm-offset-1'>
				<h4>Welcome</h4>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-10 col-sm-offset-1'>
<?php
				if($messages){
					foreach($messages as $message){
							echo $message;
					}
				}
?>		
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-5 col-sm-offset-1'> 
				<br>
				<fieldset>
					<legend>Register</legend>
					<form action=<?= '' . site_url('/users/process_register') . ''?> method='post'>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">email address:</span>
							<input type="text" id='email' class="form-control" name='email' placeholder='example@host.com' aria-describedby="basic-addon1">
						</div> 
						<br> 
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">name:</span>
							<input type="text" id='name' class="form-control" name='name' placeholder='...' aria-describedby="basic-addon1">
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">alias:</span>
							<input type="text" id ='alias' class="form-control" name='alias' placeholder='...' aria-describedby="basic-addon1">
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
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">Birth Date:</span>
							<input id='birth_date' type='date' class="form-control" name='birth_date' aria-describedby="basic-addon1">	
						</div>
						<br>
						<div class='row'>
							<div class='col-sm-5 pull-right'> 
								<input class='btn btn-info btn-sm' type='submit' value='Register'>
							</div>
						</div>
					</form>	
				</fieldset>
			</div>
			<div class='col-sm-5'> 
				<br>
				<fieldset>
					<legend>Sign In</legend>
					<form action=<?= '' . site_url('/users/process_signin') . ''?> method='post'>
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
						</div>
					</form>
				</fieldset>

			</div>
		</div>
	</div>
</body>
</html>