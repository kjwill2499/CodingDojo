<?php
	function sortCheck($array){
		for ($i=1; $i < count($array); $i++) { 
			if($array[$i] < $array[$i - 1]){
				echo "element $i is not greater than previous";
				return false;
			}
		}
		return true;
	}

	function radixSortInt($array) {
		$maxPow = floor(log10(max($array)));
		for ($i=0; $i <= $maxPow; $i++) { 
			// makes an array of buckets to sort mod into
			$bucketArray = []; 
			for ($j = -9; $j < 10; $j++) {
				$bucketArray[$j] = 0;
			}
			foreach ($array as $element) {
				$bucketArray[($element/(10 ** $i)) % 10]++;
			}
			$bucketArray[-9]--;
			for ($j = -8; $j < 10; $j++) { 
				$bucketArray[$j] += $bucketArray[$j - 1];
			}
			$arraySorted = $array;
			for ($j = count($array) - 1; $j >= 0 ; $j--) { 
				$arraySorted[$bucketArray[($array[$j]/(10 ** $i)) % 10]] = $array[$j];
				$bucketArray[($array[$j]/(10 ** $i)) % 10]--;
			}
			$array = $arraySorted;
		}
		return $array;
	}
	$arrayTest = [];
	for ($i=0; $i < 200; $i++) { 
		array_push($arrayTest, rand(-10000, 10000));
	}

	echo implode(", ", $arrayTest);
	echo '======================================================';
	$time_start = microtime(true);
	$finalArray = radixSortInt($arrayTest);
	echo implode(", ", $finalArray);
	$time_end = microtime(true);
	echo "  Sorted Successfully:  " . var_export(sortCheck($finalArray), true) . "   Array sorted in: " . ($time_end - $time_start) . " seconds";
?>


