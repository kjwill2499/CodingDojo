<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/normalize.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$.get("<?= "" . site_url('/posts/index_html') . ""?>", function(res){
				console.log(res);
				$('div.posts').html(res);
			});
			$('form').submit(function(){
				$.post("<?= site_url('/posts/create')?>", $(this).serialize(), function(res){
					$('div.posts').html(res);
				});
				$('textarea').val(null);
				return false;
			});

		});
	</script>
</head>