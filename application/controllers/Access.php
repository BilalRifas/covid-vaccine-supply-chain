<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

	//.........constructor............
	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['user_logged'])){
			$this->session->set_flashdata("error","Please loging first");
			redirect("auth/login");
		}
	}

//Index function when page load
	function index()
	{
		$this->data['navbar'] = $this->generals_model->navbar();
		$this->load->view('inventory/navbar', $this->data);
		$this->load->view('header');
		$this->load->view('access/access', $this->data);
		$this->load->view('footer');
		$this->audit_model->audit('Access Page','Access');
	}

	
}