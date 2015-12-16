<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/head', array('title' => 'Dashboard'));?>
<body>
<?php $this->load->view('partials/navbar_users');?>
<!-- highlights the navbar to show the active page -->
<script type="text/javascript">
	$('#dashboard').addClass('active');
</script>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-8 col-sm-offset-2'>
				<br><br><br>
				<h4><?php if($user_session['level'] == 1){echo 'Manage ';}?>Users</h4>
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
				<table class='table table-striped'>
						<tr>
							<th>id#</th>
							<th>Name</th>
							<th>email</th>
							<th>created_at</th>
							<th>user_level</th>
<?php if($user_session['level'] == 1){echo "<th>actions</th>";}?>	
						</tr>
					<tbody class='searchable'>
<?php if($user_session['level'] == 1){?>
						<tr>
							<td>-</td>
							<td><a href="/users/add">add new</a></td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
						</tr>
<?php }
foreach($users as $user){?>
						<tr>
							<td><?=$user['id'];?></td>
							<td><?="<a href='/users/show/{$user['id']}'>{$user['first_name']} {$user['last_name']}</a>";?></td>
							<td><?=$user['email'];?></td>
							<td><?=date('M, jS Y',strtotime($user['created_at']));?></td>
							<td><?=$user['level'];?></td>
<?php
if($user_session['level'] == 1){?>
							<td><?= "<a href='/users/edit/{$user['id']}'>edit</a> or <a href='/users/edit'>remove</a>"?></td>
<?php }?>
						</tr>
<?php }?>

					</tbody>	
				</table>
			</div>
		</div>
	</div>
</body>
</html>