<?php
class Animal{
	public $name;
	public $health;
	public function __construct($name){
		$this->health = 100;
		$this->name = $name;
	}
	public function walk(){
		$this->set_health($this->health - 1);
		return $this;
	}
	public function run(){
		$this->set_health($this->health - 5);
		return $this;
	}
	function get_health(){
		return $this->health;
	}
	function set_health($health){
		if($health >= 0){
			$this->health = $health;
			return true;
		} else{
			$this->health = 0;
			return false;
		}
	}
	function get_name(){
		return $this->name;
	}
	function set_name($name){
		$this->name = $name;
	}
	function displayHealth(){
		echo "<p>{$this->name} Health: {$this->health}</p>";
		return $this;
	}
}
class Dog extends Animal{
	public function __construct($name){
		parent::__construct($name);
		$this->health = 150;
	}
	public function pet(){
		$this->health += 5;
		return $this;
	}
}
class Dragon extends Animal{
	public function __construct($name){
		parent::__construct($name);
		$this->health = 170;
	}
	public function fly(){
		$this->health -= 10;
		return $this;
	}
	public function displayHealth(){
		echo "<p>This is a dragon!<p>";
		parent::displayHealth();
	}
}
$animal = new Animal("Animal");
$animal->walk()->walk()->walk()->run()->run()->displayHealth();
$dog = new Dog("Sophie");
$dog->walk()->walk()->walk()->run()->run()->pet()->pet()->displayHealth();
$dragon = new Dragon("Charizard");
$dragon->walk()->walk()->walk()->run()->run()->fly()->fly()->displayHealth();
?>