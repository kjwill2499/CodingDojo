<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Message');
		$this->load->model('Comment');
		$this->load->model('MessageList');
		// $this->output->enable_profiler();
	}
	public function index(){
		redirect('/users/dashboard');
	}
	public function dashboard(){
		$viewData = array('user_session' => array('user_id' => $this->session->userdata('user_id'),
													'level' => $this->session->userdata('level')),
							'users' => $this->User->get_all_user());
		$this->load->view('users/dashboard', $viewData);
	}
	public function show($user_id = null){
		if($user_id == null){
			$user_id = $this->session->userdata('user_id');
		}
		$profileData = $this->User->get_user_by_id($user_id);
		$messages = $this->Message->get_all_by_user_id($user_id);
		$messageThread = new MessageList();
		foreach($messages as $message){
			$messageThread->message_ids[] = $message['id'];
			$message{$message['id']} = new UserMessage($message);
			$messageThread->addMessage($message{$message['id']});
		}
		if($messageThread->message_ids != null){
			$comments = $this->Comment->get_all_by_message_ids($messageThread->message_ids);
			// var_dump($messageThread->message_ids);
			// var_dump($comments);
			foreach ($comments as $comment){
				$c{$comment['id']} = new UserComment($comment);
				$message{$comment['message_id']}->addComment($c{$comment['id']});
			}
		}
		$viewData['messageThread'] = $messageThread;
		$viewData['profileData'] = $profileData;
		$viewData['sessionToken'] = array('user_id' => $this->session->userdata('user_id'), 
											'level' => $this->session->userdata('level'));
		$viewData['errors'] = $this->session->flashdata('errors');
		// error_log('this is the vewData =>' . implode($viewData) . ' and profileData =>' . implode(', ', $profileData));
		$this->load->view('users/show', $viewData);
	}
	public function process_message(){
		$result = $this->Message->validate($this->input->post(null, TRUE));
		if($result == "valid"){
			$this->Message->add($this->input->post(null, TRUE), $this->session->userdata('user_id'));
		} else{
			$errors[] = $result;
			$this->session->set_flashdata('errors', $errors);
		}
		redirect('/users/show/' . $this->input->post('user_id'));
	}
	public function process_comment(){
		$result = $this->Comment->validate($this->input->post(null, TRUE));
		if($result == "valid"){
			$this->Comment->add($this->input->post(null, TRUE), $this->session->userdata('user_id'));
		} else{
			$errors[] = $result;
			$this->session->set_flashdata('errors', $errors);
		}
		redirect('/users/show/' . $this->input->post('user_id') . '');
	}

	public function process_add(){
		$result = $this->User->validate_user_add($this->input->post(null, TRUE));
		if($result == "valid"){
			$this->User->add_user($this->input->post(null, TRUE));
			if($this->session->userdata('user_id')){
				redirect('/dashboard');
			}
			redirect('/signin');
		} else{
			$errors[] = $result;
			$this->session->set_flashdata('errors', $errors);
			redirect('/users/add');
		}
	}
	public function add(){
		$this->session->keep_flashdata('errors');
		//the add process add and add are used for the registration and admin add page, so this determines if it was an admin, or a registration request.
		if($this->session->userdata('level') == 1){
			$this->load->view('users/add');
		} else{
			redirect('/register');
		}
		
	}
	public function edit($user_id){
		// var_dump($user_id);
		$viewData['errors'] = $this->session->flashdata('errors');
		$viewData['user_data'] = $this->User->get_user_by_id($user_id);
		$viewData['sessionToken'] = array('user_id' => $this->session->userdata('user_id'), 
											'level' => $this->session->userdata('level'));
		$this->load->view('users/edit', $viewData);
	}
	public function process_edit(){
		// var_dump($this->input->post(null,TRUE));
		$result = $this->User->validate_user_edit($this->input->post(null, TRUE));
		if($result == "valid"){
			$this->User->edit_user_details($this->input->post(null, TRUE));
			redirect('/users/show/' . $this->input->post('user_id') . '');
		} else{
			$errors['error'] = $result;
			$this->session->set_flashdata('errors', $errors);
			redirect('/users/edit/' . $this->input->post('user_id') . '');
		}	
	}
	public function process_edit_password(){

	}
	public function process_edit_description(){
		$this->User->edit_user_description($this->input->post(null,TRUE));
		redirect('/users/show/' . $this->input->post('user_id') . '');
	}
	public function signin_request(){
		$signin_data = $this->input->post(null, TRUE);
		$user = $this->User->get_user_by_email($signin_data['email']);
		if(empty($user)){
			$errors[] = 'Unknown Email, Try Again or <a href="/register">Register</a>';
			$this->session->set_flashdata('errors', $errors);
			redirect('/signin');
		}else if(md5($signin_data['password']) != $user['password']){
			$errors[] = 'Incorrect Password';
			$this->session->set_flashdata('errors', $errors);
			redirect('/signin');
		} else{
			$sessionData = array('user_id' => $user['id'], 'level' => $user['level'], 'first_name' => $user['first_name']);
			$this->session->set_userdata($sessionData);
			redirect('/dashboard');
		}
	}
	public function signout(){
		$this->session->unset_userdata($this->session->all_userdata());
		redirect('/');
	}
}
?>