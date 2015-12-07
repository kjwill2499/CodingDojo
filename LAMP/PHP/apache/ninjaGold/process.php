<?php
$storedGold = $_COOKIE['goldTotal'];
$turnGold = 0;
$winner = "gained";
$spanColor = 'green';
if($_POST['building'] == 'farm'){
    $turnGold = rand(10, 20);
    $storedGold += $turnGold;
} else if($_POST['building'] == 'cave'){
    $turnGold = rand(5, 10);
    $storedGold  += $turnGold;
} else if($_POST['building'] == 'house'){
    $turnGold = rand(2, 5);
    $storedGold += $turnGold;
} else if($_POST['building'] == 'casino'){
   if(rand(1, 100) < 55){
        $turnGold = rand(0, 50);
        $storedGold -= $turnGold;
        $winner = "lost";
        $spanColor = 'red';
   } else{
        $turnGold = rand(0, 50);
        $storedGold += $turnGold;
    } 
}
setcookie('goldTotal', $storedGold, time() + 86400 * 30, '/');
setcookie('activityLog', "<span style = 'color: $spanColor'>You entered a {$_POST['building']} and $winner " . abs($turnGold) . " gold! </span><br>" . $_COOKIE['activityLog'], time() + 86400 * 30, '/');
if($_POST['building'] == "reset"){
    setcookie('goldTotal', 0, time() + 86400 * 30, '/');
    setcookie('activityLog', ' ', time() + 86400 * 30, '/');
}
header('location: index.php');
die();
?>