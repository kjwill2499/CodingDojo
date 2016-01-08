<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User');
		$this->load->helper('mydate');
	}

	public function index()
	{
		if($this->session->userdata('user_id')){
			redirect('/welcome');
		}
		$view_data['messages'] = $this->session->flashdata('messages');
		$this->load->view('/home', $view_data);
	}
	public function welcome(){
		$view_data['users'] = $this->User->get_all();
		$view_data['messages'] = $this->session->flashdata('messages');
		$view_data['session_token'] = array('user_id' => $this->session->userdata('user_id'), 
											'alias' => $this->session->userdata('alias'));
		$this->load->view('/welcome', $view_data);		
	}
	public function process_register(){
	$result = $this->User->validate_register($this->input->post(null, TRUE));
		if($result == "valid"){
			$id = $this->User->create($this->input->post(null, TRUE));
			// $this->session->set_userdata(array('user_id' => $id, 'alias' => $this->input->post('alias', TRUE)));
			$messages[] = '<div class="error alert alert-success"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Registration Complete! You Can Now Sign In!</div>';
			$this->session->set_flashdata('messages', $messages);
			redirect('/');
		} else{
			$errors[] = $result;
			$this->session->set_flashdata('messages', $errors);
			redirect('/');
		}
	}
	public function process_signin(){
		$signin_data = $this->input->post(null, TRUE);
		$user = $this->User->show_by_email($signin_data['email']);
		if(empty($user)){
			$errors[] = '<div class="error alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Unknown Email, Try Again or Register</div>';
			$this->session->set_flashdata('messages', $errors);
			redirect('/');
		}else if(md5($signin_data['password']) != $user['password']){
			$errors[] = '<div class="error alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Incorrect Password, Try Again Register</div>';
			$this->session->set_flashdata('messages', $errors);
			redirect('/');
		} else{
			$sessionData = array('user_id' => $user['id'], 'alias' => $user['alias']);
			$this->session->set_userdata($sessionData);
			redirect('/welcome');
		}
	}

	public function signout(){
		$this->session->unset_userdata($this->session->all_userdata());
		redirect('/');
	}
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */