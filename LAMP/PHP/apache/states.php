<?php
function dropStatesFor($array){
	echo "<select>";
	for($i = 0; $i < count($array); $i++){
		echo "<option>{$array[$i]}</option>";
	}
	echo "</select>";
}
function dropStatesForEach($array){
	echo "<select>";
	foreach($array as $element){
		echo "<option>$element</option>";
	}
	echo "</select>";
}
function appendArray($array, $arrayToAppend){
	foreach ($arrayToAppend as $key => $value) {
		array_push($array, $value);
	}
	return $array;
}
$states = array('CA', 'WA', 'VA', 'UT', 'AZ');
$states2 = array('NJ', 'NY', 'DE');
dropStatesFor($states);
dropStatesForEach($states);
dropStatesForEach(appendArray($states, $states2));
  function random_color(){
    $rgb = array('a','b','c','d','e','f','0','1','2','3','4','5','6','7','8','9');
    $color = '#';  //this is what we'll return!
    for($i = 0; $i < 6; $i++){
      $x = rand(0, 15);
      $color = $color . $rgb[$x];
    }
    return $color;
  }
  echo random_color();
?>