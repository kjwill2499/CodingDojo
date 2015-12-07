<?php
class Car{
	public $price;
	public $speed;
	public $fuel;
	public $mileage;
	public $tax;
	public function __construct($price, $speed, $fuel, $mileage){
		$this->set_price($price);
		$this->set_speed($speed);
		$this->set_mileage($mileage);
		$this->set_fuel($fuel);
		if($this->price > 10000){
			$this->set_tax(0.15);
		} else{
			$this->set_tax(0.12);
		}
		$this->displayAll();
	}
	public function get_price(){
		return $this->price;
	}
	public function set_price($price){
		if($price >= 0){
			$this->price = $price;
			return true;
		} else{
			$this->price = 0;
			return false;
		}
	}
	public function get_speed(){
		return $this->speed;
	}
	public function set_speed($speed){
		if($speed >= 0){
			$this->speed = $speed;
			return true;
		} else{
			$this->speed = 0;
			return false;
		}
		return $this;
	}
	public function get_fuel(){
		return $this->fuel;
	}
	public function set_fuel($fuel){
		$this->fuel = $fuel;
		return $this;
	}
	public function get_mileage(){
		return $this->mileage;
	}
	public function set_mileage($mileage){
		if($mileage >= 0){
			$this->mileage = $mileage;
			return true;
		} else{
			$this->mileage = 0;
			return false;
		}
	}
	public function get_tax(){
		return $this->tax;
	}
	public function set_tax($tax){
		if($tax > 0){
			$this->tax = $tax;
			return true;
		} else{
			$this->tax = 0;
			return false;
		}
	}
	public function displayAll(){
		echo "<p>Price: $this->price <br />Speed: {$this->speed}mph <br />Fuel: $this->fuel <br /> Mileage: $this->mileage <br />Tax Rate: $this->tax <br /></p>";
	}	
}
$car1 = new Car(10000, 55, 'Full', 100000);
$car2 = new Car(20000, 55, 'Half Tank', 100000);
$car3 = new Car(8000, 55, 'Empty', 100000);
$car4 = new Car(3000, 25, 'Full', 10000);
$car5 = new Car(20000, 45, 'Almost Full', 100000);
?>
