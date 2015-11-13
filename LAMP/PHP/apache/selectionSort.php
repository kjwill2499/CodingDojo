<?php 
function selectionSort($array){
	for ($i=0; $i < count($array) - $i; $i++) { 
		$highestIndx = count($array) - ($i + 1);
		$lowestIndx = $i;
		for ($j = $i; $j < (count($array) - $i); $j++) { 
			if($array[$j] < $array[$lowestIndx]){
				$lowestIndx = $j;
			} else if($array[$j] > $array[$highestIndx]){
				$highestIndx = $j;
			}
		}
		$temp = $array[$lowestIndx];
		$array[$lowestIndx] = $array[$i];
		$array[$i] = $temp;
		if($array[$highestIndx] == $array[$i]){
			$highestIndx = $lowestIndx;
		}
		$temp = $array[$highestIndx];
		$array[$highestIndx] = $array[count($array) - ($i + 1)];
		$array[count($array) - ($i + 1)] = $temp;
	}
	return $array;
}
$arrayTest = [];
for ($i=0; $i < 10000; $i++) { 
	array_push($arrayTest, rand(0, 10000));
}
echo implode(", ", $arrayTest);
echo '   ';
$time_start = microtime(true);
echo implode(", ", selectionSort($arrayTest));
$time_end = microtime(true);
echo "   " . ($time_end - $time_start);
?>