<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/head', array('title' => 'Welcome'));?>
<body>
	<div class='container-fluid'>
		<div class='row'>
			<br>
			<div class='col-sm-8 col-sm-offset-1'>
				<h4>Welcome <?= $session_token['alias'];?></h4>
			</div>
			<div class='col-sm-2'>
				<a class='pull-right' href=<?= '' . site_url('/users/signout') . '';?>> Not<?=" " . $this->session->userdata('alias') . "? ";?>Sign Out</a></li>
			</div>
			<div class="row">
				<div class='col-sm-8 col-sm-offset-2'>
<?php
				if($messages){
					foreach($messages as $message){
							echo $message;
					}
				}
?>	
					<br>
					<div class='row'>
						<div class='panel col-sm-6'>
						</div>
					</div>
					<br>
					<div class = 'row'>
						<div class = 'col-sm-6 col-sm-offset-6'>
							<div class="input-group">
			 					<span class="input-group-addon" id="basic-addon1"><span class='glyphicon glyphicon-search'></span></span>
			 					<input type="text" class="filter form-control" aria-describedby="basic-addon1">
							</div>	
						</div>
					</div>
					<br>
					<table class='table table-striped table-hover'>
							<tr>
								<th>Name</th>
								<th>Alias</th>
								<th>Email Address</th>
								<th>Registered</th>
								<th>Action</th>	
							</tr>
						<tbody class='searchable'>
	<?php
	foreach($users as $user){
		if($user['id'] != $session_token['user_id']){?>
							<tr>
								<td><?=$user['name'];?></td>
								<td><?=$user['alias'];?></td>
								<td><?=$user['email'];?></td>
								<td><?= timespan(strtotime($user['created_at']))?></td>
								<td><a class='btn btn-info' href = <?= "" . site_url("") . "";?> >action</a></td>
							</tr>
	<?php 
		}
	}
	?>

						</tbody>	
					</table>
				</div>
			</div>

			</div>
		</div>
	</div>
</body>
</html>