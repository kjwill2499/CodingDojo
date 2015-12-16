<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surveys extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler();
	}
	public function index(){
		$this->load->view('surveys/form');
	}
	public function process_form(){

		redirect('/result');
	}
	public function result(){
		$this->load->view('surveys/result');
	}
}