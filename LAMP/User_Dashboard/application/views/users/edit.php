<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/head', array('title' => 'Dashboard'));?>
<body>
<?php $this->load->view('partials/navbar_users');?>
	<div class='container-fluid'>
		<div class='row'>
			<br><br><br>
			<div class='col-sm-3 col-sm-offset-1'>
				<h4>Edit 
<?php 
				if($sessionToken['user_id'] == $user_data['id']){
					echo "Profile";
				} else{
					echo "User #" . $user_data['id'];
				}
?>
				</h4>
			</div>
			<div class='col-sm-2 col-sm-offset-5'>
				<a href="/dashboard">Return To Dashboard</a>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-10 col-sm-offset-1'>
<?php
				if($errors){
					foreach($errors as $error){
							echo $error;
					}
				}
?>		
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-5 col-sm-offset-1'> 
				<br>
				<fieldset>
					<legend>Edit Information</legend>
					<form action='/users/process_edit' method='post'>
<!-- If you edit email, there is a problem with looking for a new, yet unique address...-->
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">email address:</span>
							<input type="text" id='email' class="form-control" name='email' value='<?= $user_data['email']?>' aria-describedby="basic-addon1">
						</div> 
						<input type="hidden" id='old_email' name='old_email' value='<?= $user_data['email']?>'>
						<br> 
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">first name:</span>
							<input type="text" id='first_name' class="form-control" name='first_name' value='<?= $user_data['first_name']?>' aria-describedby="basic-addon1">
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">last name:</span>
							<input type="text" id ='last_name' class="form-control" name='last_name' value='<?= $user_data['last_name']?>' aria-describedby="basic-addon1">
						</div>
						<br>
						<div id='level_select' class="input-group">
							<span class="input-group-addon" id="basic-addon1">user level:</span>
							<select name='level' class='form-control' aria-describedby="basic-addon1">
								<option value= '1'>admin</option>
								<option value= '2'<?php if($user_data['level'] == 2){echo "selected";}?>>user</option>
							</select>
						</div>
<!-- if it is an administrator, give the ability to change admin level -->
<script type="text/javascript">
	if(<?= $sessionToken['level']?> != 1){
		$('#level_select').addClass('hidden');
	}
</script>
						<br>
						<div class='row'>
							<div class='col-sm-5 pull-right'> 
								<input type='hidden' name='user_id' value='<?= $user_data['id']?>'>
								<input type='hidden' name='action' value='edit_user_details'>
								<input class='btn btn-info btn-sm' type='submit' value='Save Changes'>
								<a style='vertical-align:bottom' href="/dashboard">No Thanks!</a>
							</div>
						</div>
					</form>	
				</fieldset>
			</div>
			<div class='col-sm-5'> 
				<br>
				<fieldset>
					<legend>Change Password</legend>
					<form action='/users/process_edit' method='post'>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">old password:</span>
							<input type="password" class="form-control" name='old_password' placeholder="last name..." aria-describedby="basic-addon1">
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">new password:</span>
							<input id='password' type='password' class="form-control" name='new_password' placeholder="at least 8 characters..." aria-describedby="basic-addon1">	
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1">confirm password:</span>
							<input id='password_confirmation' type='password' class="form-control" name='password_confirmation' placeholder="at least 8 characters..." aria-describedby="basic-addon1">	
						</div>
						<br>
						<div class='row'>
							<div class='col-sm-4 pull-right'> 
								<input class='btn btn-info btn-sm' type='submit' value='Change'>
								<a style='vertical-align:bottom' href="/dashboard">No Thanks!</a>
							</div>
						</div>
					</form>	
				</fieldset>

			</div>
		</div>
		<div class='row'>
			<div>
				<div class='col-sm-10 col-sm-offset-1'>
					<fieldset>
						<legend>Edit Description</legend>
						<form class = 'description' id= 'description' action = '/users/process_edit_description' method = 'post'>
							<textarea  type='text' class='message panel' name='description' ><?= '' . $user_data['description'] . ''?></textarea>
							<input type='hidden' name='user_id' value="<?= $user_data['id']?>">
							<input class='btn btn-info btn-sm' type='submit' value='Change Description'>
						</form>
					</fieldset>
				</div>
			</div>

			
		</div>
		<div class='row'>
			
		</div>
	</div>
</body>
</html>