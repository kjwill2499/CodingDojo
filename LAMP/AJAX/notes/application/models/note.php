<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Model {

	public function get_all(){
		$query = 'SELECT * FROM posts';
		return $this->db->query($query)->result_array();
	}
	public function show($post_id){
		$query = "SELECT * FROM posts WHERE id = ?";
		return $this->db->query($query, array($post_id))->row_array();
	}

	public function create($newPost){
		$query = "INSERT INTO posts (description, created_at, updated_at) VALUES (?,?,?)";
		$values = array($newPost, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		$id = $this->db->insert_id($this->db->query($query, $values));
		return $id;
	}
	public function destroy($post_id){
		$query = "DELETE FROM posts WHERE id = ?";
		$this->db->query($query, array($user_id));
		return $post_id;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */