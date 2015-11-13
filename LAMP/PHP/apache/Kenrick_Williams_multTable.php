
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
<table>
	<tr>
		<td></td>
<?php 	for ($i=1; $i < 10 ; $i++) { ?>
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