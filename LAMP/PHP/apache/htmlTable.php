
<style type="text/css">
	table, tr, td{
		text-align: left;
		padding: 5;
		margin: 0;
		border-collapse: collapse;
		font-family: sans-serif;
	}
	td{
		border: 1px solid #8B8B8B;
	}
	.head, .head td{
		font-weight: 600;
		color: #4F667A;
	}
	span{
		font-weight: 500;
		color: black;
	}

</style>
<table>
	<tr class = 'head'>
		<td>User #</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Full Name</td>
		<td>Full Name in Upper Case</td>
		<td>Length of full name <span>(without spaces)</span></td>
	</tr>	
<?php 
	$users = array( 
	   array('first_name' => 'Michael', 'last_name' => 'Choi'),
	   array('first_name' => 'John', 'last_name' => 'Supsupin'),
	   array('first_name' => 'Mark', 'last_name' => 'Guillen'),
	   array('first_name' => 'KB', 'last_name' => 'Tonel') 
	);
	$i = 1;
	foreach ($users as $user) {
		echo "<tr>";
			echo "<td class = 'head'>$i</td>";
			$i++;
			echo "<td>{$user['first_name']}</td>";
			echo "<td>{$user['last_name']}</td>";
			echo "<td>" . implode(" ", $user) . "</td>";
			echo "<td>" . strtoupper(implode(" ", $user)) . "</td>";				
			echo "<td>" . strlen(implode($user)) . "</td>";
		echo "</tr>";
	} 
?>	
</table>