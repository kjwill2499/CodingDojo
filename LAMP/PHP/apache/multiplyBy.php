<?php 
	function multiply($array, $factor){
		foreach($array as $key => $value){
			$array[$key] *= $factor;
		}
		return $array;
	}
	$A = array(2, 4, 10, 16);
	$B = multiply($A, 5);  
	var_dump($B);
?>
