<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MessageList{
	public function __construct(){
		$this->message_ids = array();
		$this->head = null;
		// $current = $this->head;
		// foreach($messages as $message){
		// 	$this->message_ids[] = $message['id'];
		// 	$$message['id'] = new UserMessage($message);
		// 	if($this->head == null){
		// 		$this->head = $$message['id'];
		// 		$current = $$message['id'];
		// 	} else{
		// 		$current->next = $$message['id'];
		// 	}
		// }
	}
	public function addMessage($message){
		if($this->head == null){
			$this->head = $message;
		} else{
			$current = $this->head;
			while($current->next != null){
				$current = $current->next;
			}
			$current->next = $message;
		}
	}
}
class UserMessage extends CI_Model{
	public function __construct($message){
		parent::__construct();
		$this->body = $message['message'];
		$this->date = $message['created_at'];
		$this->id = $message['id'];
		$this->author_id = $message['author_id'];
		$this->author = "{$message['first_name']} {$message['last_name']}";
		$this->commentHead = null;
		$this->next = null;
	}
	public function addComment($comment){
		if($this->commentHead == null){
			$this->commentHead = $comment;
		} else{
			$current = $this->commentHead;
			while($current->next != null){
				$current = $current->next;
			}
			$current->next = $comment;
		}
	}
}
class UserComment extends CI_Model{
	public function __construct($comment){
		parent::__construct();
		$this->body = $comment['comment'];
		$this->date = $comment['created_at'];
		$this->author_id = $comment['author_id'];
		$this->author = "{$comment['first_name']} {$comment['last_name']}";
		$this->next = null;
	}

}
	