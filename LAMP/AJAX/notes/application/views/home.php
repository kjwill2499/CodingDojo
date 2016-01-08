<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/head', array('title' => 'Make a Post'));?>
<body>
	<div class='container-fluid'>
		<div class='row'>
			<br>
			<div class='col-sm-3 col-sm-offset-1'>
				<h2>My Posts:</h2>
			</div>
		</div>
		<div class='row'>
			<div class='posts col-sm-10 col-sm-offset-1'>
			</div>
		</div>
		<div class='row'>
			<div class='col-md-10 col-md-offset-1'> 
			<form action= <?= '' . site_url('/posts/create') . ''?> method= 'post'>
				<textarea  id='description' class='panel' name='description' placeholder ='write new post here...'></textarea>
				<input type='submit'>
			</form>
			</div>
		</div>

	</div>
</body>
</html>