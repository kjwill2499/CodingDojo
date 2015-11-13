<?php
echo "<h2>Starting the Program</h2>";
$heads = 0;
$tails = 0;
for($i = 1; $i <= 5000; $i++){
	echo "Attempt #$i: Throwing a coin... It's a ";
	if (rand(0,1) == 1){
		echo "head";
		$heads++;
	} else{
		echo "tail";
		$tails++;
	}
	echo "!... Got $heads head(s) so far and $tails tail(s) so far<br>";
}
echo "<h2>Ending the program - Thank You!</h2>";
?>