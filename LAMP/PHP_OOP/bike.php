<?php
class Bike{
	public $price;
	public $max_speed;
	public $miles;
	public function __construct($price, $max_speed){
		$this->set_price($price)->set_max_speed($max_speed)->set_miles(0);
	}
	public function get_price(){
		return $this->price;
	}
	public function set_price($price){
		if($price >= 0){
			$this->price = $price;
		} else{
			$this->price = 0;
		}
		return $this;
	}
	public function get_max_speed(){
		return $this->max_speed;
	}
	public function set_max_speed($max_speed){
		if($max_speed >= 0){
			$this->max_speed = $max_speed;
		} else{
			$this->max_speed = 0;
		}
		return $this;
	}
	public function get_miles(){
		return $this->miles;
	}
	public function set_miles($miles){
		if($miles >= 0){
			$this->miles = $miles;
		} else{
			$this->miles = 0;
		}
		return $this;
	}
	public function displayInfo(){
		echo "<p>price: " . $this->get_price() . " max speed: " . $this->get_max_speed() . " miles: " . $this->get_miles() . "</p>";
	}
	public function drive(){
		echo "<p>Driving...</p>";
		$this->set_miles(($this->get_miles() + 10));
		return $this;
	}
	public function reverse(){
		echo "<p>Reversing...</p>";
		$this->set_miles(($this->get_miles() - 5));
		return $this;
	}
}
$bike1 = new Bike(80, 80);
$bike1->drive()->drive()->drive()->reverse()->displayInfo();
$bike2 = new Bike(80, 90);
$bike2->drive()->drive()->reverse()->reverse()->displayInfo();
$bike3 = new Bike(100, 100);
$bike3->reverse()->reverse()->reverse()->displayInfo();
?>
