<?php 
foreach ($posts as $post) {
	?>
	<div class='post col-md-2'>
		<?= "<p>" . $post['description'] . "</p>"?>
	</div>
<?php
}
?>
