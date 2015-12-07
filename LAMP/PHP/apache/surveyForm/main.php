<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Survey Form</title>
</head>
<body>
	<div>
		<form action='result.php' method='post'>
   			Your Name:<input type='text' name='name'>
    		Dojo Location: <select name = 'location'>
    			<option value = 'Mountain View'>Mountain View</option>
    			<option value = 'Los Angeles'>Los Angeles</option>
    			<option value = 'Seattle'>Seattle</option>
    			<option value = 'Dallas'>Dallas</option>
    		</select>
    		Favorite Language: <select name = 'language'>
    			<option value = 'Java'>Java</option>
    			<option value = 'Angular'>Angular</option>
    			<option value = 'Node'>Node</option>
    		</select>
    		Comment (optional):<textarea name = 'comment' rows = "6" cols = "40"></textarea>
    		<input type = 'submit'> 
		</form>
	</div>
	
</body>
</html>