<?php
class Node{
	public function __construct($value){
		$this->value = $value;
		$this->next = null;
	}
}
class SinglyLinkedList{
	public function __construct(){
		$this->head = null;
	}
	public function add($val){
		if($this->head == null){
			$this->head = new Node($val);
		} else{
			$current = $this->head;
			while($current->next){
				$current = $current->next;
			}
			$current->next = new Node($val);
		}
	}
	public function addHead($val){
		$addNode = new Node($val);
		$addNode->next = $this->head;
		$this->head = $addNode;
	}
	public function remove($val){
		if($this->head->value == $val){
			$this->head = $this->head->next;
		} else{
			$current = $this->head;
			while($current->next->value != $val && $current->next){
				$current = $current->next;
			}
			$temp = $current->next->next;
			$current->next = $temp;
		}
	}
	public function popHead(){
		$temp = $this->head;
		$this->head = $this->head->next;
		return $temp;
	}
	public function find($val){
		$current = $this->head;
		while($current != null){
			if($current->value == $val){
				return $current;
			}
			$current = $current->next;
		}
		return false;
	}
	public function printValues(){
		$current = $this->head;
		while($current != null){
			echo $current->value . "<br>";
			$current = $current->next;
		}
	}
	public function insert($valueAfter, $newValue){
			$current = $this->head;
			while($current->value != $valueAfter && $current->next){
				$current = $current->next;
			}
			$insertNode = new Node($newValue);
			$insertNode->next = $current->next;
			$current->next = $insertNode;
	}
	public function isEmpty(){
		if($this->head == null){
			return true;
		}
		return false;
	}
	public function removeDups(){
		//what are dups? any duplicates
	}
}

$newList = new SinglyLinkedList();
var_dump($newList->isempty());
$newList->head = new Node(1);
$newList->head->next = new Node(2);
$newList->head->next->next = new Node(3);
$newList->head->next->next->next = new Node(4);
$newList->head->next->next->next->next = new Node(5);
var_dump($newList);
$newList2 = new SinglyLinkedList();
$newList2->addHead(1);
$newList2->addHead(2);
$newList2->addHead(3);
$newList2->addHead(4);
$newList2->addHead(5);
$newList2->insert(3, "A");
var_dump($newList2);
var_dump($newList2->find(2));
$newList2->printValues();