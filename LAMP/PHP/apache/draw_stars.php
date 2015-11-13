<?php
function draw_stars($array){
	foreach ($array as $key => $value) {
		if (is_int($value) || is_float($value)){
			for ($i = 0; $i < $value; $i++) { 
			echo "*";
			}
		} else{
			$lowerString = strtolower($value);
			for ($i = 0; $i < strlen($lowerString); $i++) { 
			echo "" . substr($lowerString, 0, 1);
			}
		}
		echo "<br>";
	}
}
$x = array(4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith");
draw_stars($x);
?>