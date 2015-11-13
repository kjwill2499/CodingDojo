
<style type="text/css">
	table, tr, td{
		text-align: center;
		padding: 0;
		margin: 0;
		border-collapse: collapse;
		font-family: sans-serif;
	}
	td{
		height: 25px;
		width: 25px;
		border: 1px solid grey;
	}
	table{
		border: 1px solid grey;
	}
	.bold{
		font-size: 1.1em;
		font-weight: 700;
	}
	.grey{
		background-color: rgb(220, 220, 220);
	}
</style>
$users = array( 
   array('first_name' => 'Michael', 'last_name' => 'Choi'),
   array('first_name' => 'John', 'last_name' => 'Supsupin'),
   array('first_name' => 'Mark', 'last_name' => 'Guillen'),
   array('first_name' => 'KB', 'last_name' => 'Tonel') 
);
<table>
	<tr>
		<th>User #</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Full Name</th>
		<th>Full Name in Upper Case</th>
		<th>Length of full name <span>(without spaces)</span></th>
	</tr>
	
		
<?php 	foreach ($users as $user) {
			echo "<tr>";
				echo "<td>$i</td>";
			foreach ($user as $key => $value) {
				echo "<td>{$value[first_name]</td>";
				echo "<td>{$value[last_name]</td>";
				echo "<td>" . implode(" ", $user) . "</td>";
				echo "<td>" . strtoupper(implode(" ", $user)) . "</td>";
				echo "<td>" . strlen($value[first_name]) + strlen($value[last_name]) . "</td>";


			}
		} 
	





	?>
		<td class = "bold"><?= $i ?></td>
<?php		}?>
	</tr>
<?php for($i=1; $i < 10; $i++) { ?>
	<tr
		<?php if($i%2 == 1){
			echo " class = 'grey'";
		}?>
	>
		<td class = "bold"><?= $i ?></td>
<?php 	for ($j=1; $j < 10; $j++) { ?>
		<td><?= "$i" * "$j" ?></td>
<?php } ?>
	</tr>
<?php } ?>

</table>