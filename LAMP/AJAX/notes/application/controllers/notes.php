<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Post');
		$this->load->helper('mydate');
	}
	public function index()
	{
		$this->load->view('/home');
	}
	public function index_html()
	{
		$view_data['posts'] = $this->Post->get_all();
		$this->load->view('/partials/posts', $view_data);
	}
	public function create()
	{
		$this->Post->create($this->input->post('description', TRUE));
		redirect('/posts/index_html');
	}
}


/* End of file posts.php */
/* Location: ./application/controllers/users.php */