<?php
class Player{
	public $name;
	public $hand;
	public function __construct($name){
		$this->name = $name;
		$this->hand = new SinglyLinkedCardList;
	}
	public function draw($card){
		$this->hand->addCard($card);
	}
	public function discard($value, $suit){
		return $this->hand->remove($value, $suit);
	}
}
class Card{
	public function __construct($value, $suit){
		$this->value = $value;
		$this->suit = $suit;
		$this->next = null;
	}
}
class SinglyLinkedCardList{
	public function __construct(){
		$this->head = null;
	}
	public function length(){
		$i=0;
		$current = $this->head;
		while($current != null){
			$i++;
			$current = $current->next;
		}
		return $i;
	}
	public function addCard($card){
		if($this->head == null){
			$this->head = $card;
		} else{
			$current = $this->head;
			while($current->next){
				$current = $current->next;
			}
			$current->next = $card;
		}
	}
	public function add($val, $suit){
		if($this->head == null){
			$this->head = new Card($val, $suit);
		} else{
			$current = $this->head;
			while($current->next){
				$current = $current->next;
			}
			$current->next = new Card($val, $suit);
		}
	}
	public function remove($value, $suit){
		$temp;
		if($this->head->value == $value && $this->head->suit){
			$temp = $this->head;
			$this->head = $this->head->next;
		} else{
			$current = $this->head;
			while(($current->value != $value || $current->suit != $suit) && $current->next != null){
				$current = $current->next;
			}
			$temp = $current->next;
			$current->next = $current->next->next;
		}
		$temp->next = null;
		return $temp;
	}
	public function swapToHead($index){
		if($index > 0){
			$current = $this->head;
			for($j = 0; $j < $index; $j++){
				$current = $current->next;
			}
			$temp = $this->head;
			$temp2 = $current->next;
			$this->head = $temp2;
			$current->next = $current->next->next;
			$this->head->next = $temp;
		}
	}
	public function popHead(){
		$temp = $this->head;
		$this->head = $this->head->next;
		return $temp;
	}
	public function printValues(){
		$current = $this->head;
		while($current != null){
			echo "<p>" . $current->value . $current->suit . "</p>";
			$current = $current->next;
		}
	}
}
class Deck{
	public $cards = null;
	private $suits;
	private $values;
	public function __construct($suits = ['h', 'd', 'c', 's'], $values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K']){
		$this->suits = $suits;
		$this->values = $values;
		$this->resetDeck($values, $suits);
	}
	public function resetDeck(){
		$this->cards = new SinglyLinkedCardList;
		foreach($this->suits as $suit){
			foreach($this->values as $value){
				$this->cards->add($value, $suit);
			}
		}
	}
	public function shuffleCards(){
		$deckLength = $this->cards->length();
		$index = rand(0, $deckLength - 1);
		$this->cards->swapToHead($index);
		for ($i = 0; $i < $deckLength - 1; $i++){
			$index = rand($i, $deckLength - 2);
			$this->cards->swapToHead($index);
		}
	}	
	public function dealCard(){
		$temp = $this->cards->head;
		$this->cards->head = $this->cards->head->next;
		$temp->next = null;
		return $temp;
	}
	//moved to SinglyLinkedCardList
	// public function swapToHead($index){
	// 	if($index > 0){
	// 		$current = $this->cards->head;
	// 		for($j = 0; $j < $index; $j++){
	// 			$current = $current->next;
	// 		}
	// 		$temp = $this->cards->head;
	// 		$temp2 = $current->next;
	// 		$this->cards->head = $temp2;
	// 		$current->next = $current->next->next;
	// 		$this->cards->head->next = $temp;
	// 	}
	// }

}
$deck1 = new Deck;
var_dump($deck1->cards);
$deck1->cards->printValues();
$deck1->shuffleCards();
var_dump($deck1->cards);
var_dump($deck1->dealCard());
var_dump($deck1->dealCard());
var_dump($deck1->dealCard());
var_dump($deck1->dealCard());
$deck1->shuffleCards();
var_dump($deck1->cards);
echo "" . $deck1->cards->length() . "cards in the deck";
$deck1->resetDeck();
var_dump($deck1->cards);
echo "" . $deck1->cards->length() . "cards in the deck";
?>