<?php
function keysAndValues($array){
	echo 'There are ' . count($array) . ' keys in this array: ' . implode(", ", array_keys($array));
	foreach ($array as $key => $value) {
		echo "<br> the value in the key '" . $key . "' is '" . $value . "'.";
	}
};
$users['first_name'] = "Michael";
$users['last_name'] = "Choi";
keysAndValues($users);
?>
