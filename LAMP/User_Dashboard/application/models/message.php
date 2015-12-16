<?php 
class Message extends CI_Model{
	public function get_all_by_user_id($user_id){
		$query = "SELECT messages.id AS id, messages.author_id AS author_id, users.first_name AS first_name, users.last_name AS last_name, messages.message AS message, messages.created_at AS created_at FROM messages LEFT JOIN users ON messages.author_id = users.id WHERE messages.user_id = ? ORDER BY messages.created_at DESC";
		$values = array($user_id);
		return $this->db->query($query, $values)->result_array();
	}
	public function add($messageData, $author_id){
		$query = "INSERT INTO messages (message, created_at, updated_at, author_id, user_id) VALUES (?,?,?,?,?)";
		$values = array($messageData['message'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $author_id, $messageData['user_id']);
		$id = $this->db->insert_id($this->db->query($query, $values));
		return $id;
	}
	public function validate($post) {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error alert alert-info"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>', '</div>');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if($this->form_validation->run()) {
          return "valid";
        } else {
            return validation_errors();
        }
    }
}