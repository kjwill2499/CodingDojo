<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler();
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function hello(){
		echo "<p>Hello<p>";
	}
}