<?php 
$x = array( array("hi"=>"Dojo", "game"=>"awesome"), array("dude"=>"fun", "play"=>"what?"), array("no"=>"way", "i am"=>"confused?") );
foreach($x as $y)
{
  foreach($y as $key=>$value)
  {
    echo $key ." - " . $value."<br />";
  }
}
?>