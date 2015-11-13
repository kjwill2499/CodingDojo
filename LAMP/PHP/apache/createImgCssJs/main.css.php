<?php 
  function random_color(){
    $rgb = array('a','b','c','d','e','f','0','1','2','3','4','5','6','7','8','9');
    $color = '#';  //this is what we'll return!
    for($i = 0; $i < 6; $i++){
      $x = rand(0, 15);
      $color = $color . $rgb[$x];
    }
    return $color;
  }
?>
h1 { 
  color: <?php echo "" . random_color() ?>; 
}
p  {
  color: <?php echo "" . random_color() ?>; 
}