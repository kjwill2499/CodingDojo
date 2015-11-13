<?php
function draw_stars($array){
	foreach ($array as $key => $value) {
		for ($i = 0; $i < $value; $i++) { 
			echo "*";
		}
	}
}
?>