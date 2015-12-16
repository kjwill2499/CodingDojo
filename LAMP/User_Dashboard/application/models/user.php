<?php 
class User extends CI_Model {
    public function get_all_user(){
        $query = 'SELECT users.id AS id, users.first_name AS first_name, users.last_name AS last_name, users.email AS email, users.created_at AS created_at, authorizations.level AS level FROM users LEFT JOIN authorizations ON authorizations.id = users.level';
        return $this->db->query($query)->result_array();
     }
    public function get_user_by_id($user_id){
        $query = 'SELECT * FROM users WHERE users.id = ?';
         return $this->db->query($query, array($user_id))->row_array();
     }
    public function add_user($user_data)
     {
         $query = "INSERT INTO users (first_name, last_name, email, password, level, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
         $values = array($user_data['first_name'], $user_data['last_name'], $user_data['email'], md5($user_data['password']), 2, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
         $id = $this->db->insert_id($this->db->query($query, $values));
         if($id == 1){
            $this->db->query("UPDATE users SET users.level = 1");
         }
         return $id;
     }
    public function remove_user($user_id){
        $query = "UPDATE users SET first_name = 'Anonymous', last_name = 'User', email = null, password = null, level = null WHERE id = ?";
        return $this->db->query($query, array($user_id));
     }
    public function edit_user_details($user_data){
        $query = "UPDATE users SET users.first_name = ?, users.last_name = ?, users.level = ?, users.updated_at = ?
                WHERE id = ?";
        $values = array($user_data['first_name'], $user_data['last_name'], $user_data['level'], date("Y-m-d, H:i:s"), $user_data['user_id']);
        return $this->db->query($query, $values);
     }
    public function edit_user_description($user_data){
        $query = "UPDATE users SET users.description = ?, users.updated_at = ?
                WHERE id = ?";
        $values = array($user_data['description'], date("Y-m-d, H:i:s"), $user_data['user_id']);
        return $this->db->query($query, $values);
     }
    public function get_user_by_email($email){
        $query = 'SELECT * FROM users WHERE users.email = ?';
         return $this->db->query($query, array($email))->row_array();
    }
    public function validate_user_edit($post) {
        $this->load->library('form_validation');
        $this->form_validation->set_message('is_unique', 'That %s Belongs to Another Account');
        $this->form_validation->set_error_delimiters('<div class="error alert alert-info"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>', '</div>');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        if($this->input->post('old_email') != trim($this->input->post('email'))){
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        }
        if($this->form_validation->run()) {
          return "valid";
        } else {
            return validation_errors();
        }
    }
    public function validate_user_add($post) {
        $this->load->library('form_validation');
        $this->form_validation->set_message('is_unique', 'An Account With That %s Already Exists');
        $this->form_validation->set_error_delimiters('<div class="error alert alert-info"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>', '</div>');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password_confirmation]');
        $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required');
        if($this->form_validation->run()) {
          return "valid";
        } else {
            return validation_errors();
        }
    }
}
?>