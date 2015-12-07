<?php
class Node{
	public $value;
	public $next;
	public function __construct($val){
		$this->value = $val;
		$this->next = null;
	}
}
class Queue
{
	private $front; // the front of our Queue
	private $rear; // the rear of our Queue
	public $maxSize; // how many elements can be in our queue
	public function __construct($val){
 	$this->front = null;
 	$this->rear = null;
 	$this->maxSize = $val;
	}
	public function enqueue($val){
		if($this->isFull()){
			return false;
		}
		$node = new Node($val);
		if($this->isEmpty()){
			$this->front = $node;
			$this->rear = $node;
		} else{
			$this->rear->next = $node;
			$this->rear = $node;
		}
	}
	public function dequeue(){
		if(!$this->isEmpty())
			{$temp = $this->front;
			$this->front = $this->front->next;
			return $temp;
		}
		return false;
	}
	public function front(){
		return $this->front;
	}
	public function rear(){
		return $this->rear;
	}
	public function isEmpty(){
		if($this->front == null){
			return true;
		}
		return false;
	}
	public function isFull(){
		$i=0;
		$current = $this->front;
		while($current != null){
			$i++;
			$current = $current->next;
		}
		if($i >= $this->maxSize){
			return true;
		}
		return false;
	}
}
$q = new Queue(5); // instantiates the Queue class with a maxSize attribute of 5
$q->isEmpty(); // returns true
$q->enqueue(100); // Queue: 100
$q->rear(); // returns 100
$q->front(); // returns 100
$q->enqueue(20); // Queue: 100, 20
$q->enqueue(2); // Queue: 100, 20, 2
$q->dequeue(); // Queue: 20, 2
$q->enqueue(500); // Queue: 20, 2, 500
$q->enqueue(12); // Queue: 20, 2, 500, 12
$q->enqueue(30); // Queue: 20, 2, 500, 12, 30
$q->enqueue(100);
var_dump($q);
var_dump($q->isFull()); // returns true
?>

