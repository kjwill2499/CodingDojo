<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function get_all(){
		$query = 'SELECT * FROM users';
		return $this->db->query($query)->result_array();
	}
	public function show($user_id){
		$query = "SELECT * FROM users WHERE users.id = ?";
		return $this->db->query($query, array($user_id))->row_array();
	}
	public function show_by_email($email){
				$query = "SELECT * FROM users WHERE users.email = ?";
		return $this->db->query($query, array($email))->row_array();
	}
	public function create($user_data){
		$query = "INSERT INTO users (name, alias, email, password, birth_date, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
		$values = array($user_data['name'], $user_data['alias'], $user_data['email'], md5($user_data['password']), date("Y-m-d, H:i:s", (strtotime($user_data['birth_date']))), date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		$id = $this->db->insert_id($this->db->query($query, $values));
		return $id;
	}
	public function destroy($user_id){
		$query = "DELETE FROM users WHERE users.id = ?";
		$this->db->query($query, array($user_id));
		return $user_id;
	}
	public function index()
	{
		if($this->session->userdata('user_id')){
			redirect('/main/pokes');
		}
		$this->load->view('home/');
	}
	public function validate_register($post){
        $this->load->library('form_validation');
        $this->form_validation->set_message('is_unique', 'An Account With That %s Already Exists');
        $this->form_validation->set_error_delimiters('<div class="error alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('alias', 'Alias', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password_confirmation]');
        $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required');
        $this->form_validation->set_rules('birth_date', 'Birth Date', 'trim|required');
        if($this->form_validation->run()) {
          return "valid";
        } else {
            return validation_errors();
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */