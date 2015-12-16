<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler();
	}
	public function index(){
		redirect('/home');
	}
	public function home(){
		$this->load->view('homes/home');
	}
	public function signin(){
		$this->load->view('homes/signin');
	}
	public function register(){
		$this->load->view->register('homes/result');
	}
	public function result(){
		$this->load->view('surveys/result');
	}
}