<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Note extends CI_Model {

	public function get_all(){
		$query = 'SELECT * FROM notes';
		return $this->db->query($query)->result_array();
	}
	public function show($note_id){
		$query = "SELECT * FROM notes WHERE id = ?";
		return $this->db->query($query, array($note_id))->row_array();
	}
	public function add_description($note_id){
		$query = "INSERT INTO notes (description, created_at, updated_at) VALUES (?,?,?)";
		$values = array($newNote, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
	}
	public function create($newNote){
		$query = "INSERT INTO notes (description, created_at, updated_at) VALUES (?,?,?)";
		$values = array($newNote, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		$id = $this->db->insert_id($this->db->query($query, $values));
		return $id;
	}
	public function destroy($note_id){
		$query = "DELETE FROM notes WHERE id = ?";
		$this->db->query($query, array($user_id));
		return $note_id;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */