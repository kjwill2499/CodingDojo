<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/head', array('title' => 'User Profile'));?>
<body>
<?php $this->load->view('partials/navbar_users');?>
<!-- determine if it is the user editing their own profile, or an administrator -->
<script type="text/javascript">
	if(<?= $profileData['id']?> == <?=$sessionToken['user_id']?>){
		$('#profile').addClass('active');
	}
</script>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-sm-8 col-sm-offset-2'>
				<br><br><br>
				<h2>
<?php 
					echo $profileData['first_name'] . " " . $profileData['last_name'] . "  ";
					if($profileData['id'] == $sessionToken['user_id'] || $sessionToken['level'] == 1){
						echo "<small><a href='/users/edit/{$profileData['id']}'>edit</a></small>";
					}
?>
				</h2>
				<br>
				<table class='table table-hover info'>
					<tr>
						<td>Registered at:</td>
						<td><?=date('M, jS Y',strtotime($profileData['created_at']));?></td>
					</tr>
					<tr>
						<td>User ID:</td>
						<td>#<?=$profileData['id']?></td>
					</tr>
					<tr>
						<td>Email Address:</td>
						<td><?=$profileData['email']?></td>
					</tr>
					<tr>
						<td>Description:</td>
						<td><p><?=$profileData['description']?><p></td>
					</tr>
				</table>
				<br>
<?php
				if($errors){
					foreach($errors as $error){
							echo $error;
					}
				}
				// var_dump($messageThread);
?>
				<div class='row'>
					<div class='col-sm-12'>
						<h4>Leave a Message for<?= " " . $profileData['first_name']?></h4>
						<form class = 'message' id= 'message' action = '/users/process_message' method = 'post'>
							<textarea  class='message panel' name='message' placeholder ='write message here...'></textarea>
							<input type='hidden' name='user_id' value="<?= $profileData['id']?>">
							<input class='btn btn-default btn-sm' type='submit' value='post message'>
						</form>
<?php 
				if($messageThread->head != null){
					$currentMessage = $messageThread->head;
					while($currentMessage != null){?>
						<div class = 'message'>
							<h5><a href="/users/show/<?= $currentMessage->author_id?>"><?=$currentMessage->author;?></a><small><?=' on ' . date('M, jS Y',strtotime($currentMessage->date));?></small></h5>
							<p><?=$currentMessage->body?></p>
						</div>
						<div class='row'>
							<div class='col-sm-9 col-sm-offset-2'>
<?php 
						if($currentMessage->commentHead != null){
							$currentComment = $currentMessage->commentHead;
							while($currentComment != null){?>
								<div class ='comment'>
									<h5 class='commentHead'><a href="/users/show/<?= $currentComment->author_id?>"><?=$currentComment->author;?></a></h5><p><?=" " . $currentComment->body?></p>
										<br>
										<small><?=' commented on ' . date('M, jS Y',strtotime($currentComment->date));?></small>
								</div>
<?php 
								$currentComment = $currentComment->next;
							}
						}
?>
								<form class = 'comment' id='comment' action = '/users/process_comment' method = 'post'>
									<textarea  class='comment panel' name='comment' placeholder ='write comment here...'></textarea>
									<input type='hidden' name='message_id' value="<?= $currentMessage->id ?>">
									<input type='hidden' name='user_id' value="<?= $profileData['id']?>">
									<input class = 'btn btn-default btn-sm pull-right' type='submit' value='add comment'>
								</form>
							</div>
						</div>
<?php
						$currentMessage = $currentMessage->next;
					}	
				}	
?>			
				</div>
			</div>
		</div>
	</div>
		<!-- insert messages and comments -->
	</div>
</body>
</html>