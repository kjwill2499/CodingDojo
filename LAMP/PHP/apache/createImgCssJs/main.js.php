<?php
$x = rand(1, 99);
$y = rand(1, 99);
$alert = "$x x $y = " . $x * $y
?>
$(document).ready(function(){
  alert(<?="'$alert'"?>);
});
