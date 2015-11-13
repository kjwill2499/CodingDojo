
<style type="text/css">
	div{
		display: inline-block;
		padding: 0;
		margin: 0;
		border-collapse: collapse;
		width: 50px;
		height: 50px;
	}
	.black{
		background-color: black; 
	}
	.red{
		background-color: red;
	}
</style>

<?php 
$class = array('red', 'black');
for($i=0; $i < 8; $i++) {
	for ($j=0; $j < 8; $j++) {
		echo "<div class = {$class[($j + $i) % 2]}></div>";
	}
	echo "<br>";
}
?>