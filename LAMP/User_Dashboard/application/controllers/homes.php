<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// #4CB3D6
	}
	public function index(){
		redirect('/home');
	}
	public function home(){
		if($this->session->userdata('user_id')){
			redirect('/dashboard');
		}
		$this->load->view('homes/home');
	}
	public function signin(){
		$this->load->view('homes/signin');
	}
	public function process_signin(){
		$redirect('/users/dashboard');
	}
	public function register(){
		$this->load->view('homes/register');
	}
}
?>