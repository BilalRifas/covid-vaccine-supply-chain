<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Usergroup extends CI_Controller
{
	public function __construct()
	{
		# code...
		parent::__construct();
		if(!isset($_SESSION['user_logged'])){
            
			$this->session->set_flashdata("error","Please loging first");
			redirect("auth/login");
		}

		$this->load->model('usergroup_model');
	}
	function index()
	{
		// $this->data['navbar'] = $this->generals_model->navbar();
		$this->data['company'] = $this->usergroup_model->getCompany();
		$this->data['edit'] = $this->usergroup_model->Test();
		$this->data['edit2'] = $this->usergroup_model->Test();
		$this->data['module'] = $this->usergroup_model->getModule();
		$this->data['ulevel'] = $this->usergroup_model->getUL();
		$this->data['list'] = $this->usergroup_model->getid();
		$this->load->view('header');
		$this->load->view('accounts/navbaraccounts');
		$this->load->view('usergroup/usergroup', $this->data);
		$this->load->view('footer');
		$this->audit_model->audit('usergroup Page','Access');

		}
	function usergroup()
	{
		$this->usergroup_model->usergroup();
	
	}
    
    function getForms()
    {
        $this->usergroup_model->getForms();
    }
    
    function addTrnGroupForm()
    {
        $this->usergroup_model->addTrnGroupForm();
    }
    
    function removeUGF()
    {
        $this->usergroup_model->removeUGF();
    }

    function updateHeader()
    {
        $this->usergroup_model->updateHeader();
    }

    function getUserlevel()
    {
        $this->usergroup_model->getUserlevel();
    }

    function getItemDetails()
    {
        $this->usergroup_model->getItemDetails();
    }

    function getUserGroupDetails()
    {
        $this->usergroup_model->getUserGroupDetails();
    }

    function UpdateUL()
    {
        $this->usergroup_model->UpdateUL();
    }

    function edit($id)
    {
		// $this->data['navbar'] = $this->generals_model->navbar();
		$this->data['company'] = $this->usergroup_model->getCompany();
		$this->data['edit'] = $this->usergroup_model->edit($id);
		$this->data['edit2'] = $this->usergroup_model->edit2($id);
		$this->data['module'] = $this->usergroup_model->getModule();
		$this->data['ulevel'] = $this->usergroup_model->getUL();
		$this->data['list'] = $this->usergroup_model->getid();
		$this->load->view('header');
		$this->load->view('accounts/navbaraccounts');
		$this->load->view('usergroup/usergroup', $this->data);
		$this->load->view('footer');
		$this->audit_model->audit('usergroup Page','Access');
    }
}
?>