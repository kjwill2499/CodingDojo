<?php
	function sortCheck($array){
		for ($i=1; $i < count($array); $i++) { 
			if($array[$i] < $array[$i - 1]){
				echo " ===== element $i is not greater than previous";
				return false;
			}
		}
		return true;
	}
	function insertionSortInt($array){
		for ($i = 0; $i < count($array); $i++) { 
			for ($j = 1; $j <   count($array) - $i; $j++) { 
				if($array[$j - 1] > $array[$j]) {
					$temp = $array[$j];
					$array[$j] = $array[$j - 1];
					$array[$j - 1] = $temp;
				}
			}
		}
		return $array;
	}

	$arrayTest = [];
	for ($i=0; $i < 5000; $i++) { 
		array_push($arrayTest, rand(-10000, 10000));
	}

	echo implode(", ", $arrayTest);
	echo '======================================================';
	$time_start = microtime(true);
	$finalArray = insertionSortInt($arrayTest);
	echo implode(", ", $finalArray);
	$time_end = microtime(true);
	echo "  Sorted Successfully:  " . var_export(sortCheck($finalArray), true) . "   Array sorted in: " . ($time_end - $time_start) . " seconds";
?>