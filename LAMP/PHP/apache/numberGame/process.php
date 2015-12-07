<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Result</title>
</head>
<body>
	<div>
		<h3>Submitted Information:</h3>
        <table>
            <tr>
                <td>Name:</td>
                <td><?= $_POST['name'];?></td>
            </tr>
            <tr>
                <td>Dojo Location:</td>
                <td><?= $_POST['location'];?></td>
            </tr>
            <tr>
                <td>Favorite Language:</td>
                <td><?= $_POST['language'];?></td>
            </tr>
            <tr>
                <td>Comment:</td>
                <td><?= $_POST['comment'];?></td>
            </tr>
        </table>
	</div>
	
</body>
</html>