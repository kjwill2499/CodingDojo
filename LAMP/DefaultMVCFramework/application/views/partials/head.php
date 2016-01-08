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
	<script src="/assets/javascripts/validations.js"></script>
	<script>
		$(document).ready(function(){
    		$('input.filter').on('keyup', function() {
    			var rex = new RegExp($(this).val(), 'i');
    			$('.searchable tr').hide();
        		$('.searchable tr').filter(function() {
            		return rex.test($(this).text());
        		}).show();
    		});
		});
	</script>
</head>