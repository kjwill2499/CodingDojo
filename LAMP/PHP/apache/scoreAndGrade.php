<?php
function grade($score){
	if ($score < 70){
		return "D";
	} else if (70 <= $score && $score < 80){
		return "C";
	} else if (80 <= $score && $score < 90){
		return "B";
	} else{
		return "A";
	}
}
$score = rand(50, 100);
echo "<h1> Your Score: $score/100</h1>";
echo "<br><h2> Your grade is " . grade($score) . ".</h2>";

?>
