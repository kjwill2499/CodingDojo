<?php 
class Comment extends CI_Model{
	public function get_all_by_message_ids($message_ids){
		$in = join(',', array_fill(0, count($message_ids), '?'));
		$query = "SELECT comments.id AS id, comments.Message_id AS message_id, comments.author_id AS author_id, users.first_name AS first_name, users.last_name AS last_name, comments.comment AS comment, comments.created_at AS created_at  FROM comments LEFT JOIN users ON comments.author_id = users.id WHERE comments.Message_id IN ($in) ORDER BY comments.created_at ASC";
		$values = $message_ids;
		return $this->db->query($query, $values)->result_array();
	}
	public function add($commentData, $author_id){
		$query = "INSERT INTO comments (comment, created_at, updated_at, author_id, message_id) VALUES (?,?,?,?,?)";
		$values = array($commentData['comment'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $author_id, $commentData['message_id']);
		$id = $this->db->insert_id($this->db->query($query, $values));
	}
	public function validate($post) {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error alert alert-info"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>', '</div>');
        $this->form_validation->set_rules('comment', 'Comment', 'required');
        if($this->form_validation->run()) {
          return "valid";
        } else {
            return validation_errors();
        }
    }
}