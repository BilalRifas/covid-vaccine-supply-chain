<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Users extends CI_Controller
{
	
	Public function __construct()
	{
		# code...
		parent::__construct();
		if(!isset($_SESSION['user_logged'])){
            
			$this->session->set_flashdata("error","Please loging first");
			redirect("auth/login");
		}

		$this->load->model('users_model');
	}

	function index()
	{
		$this->data['users'] = $this->users_model->getusers();
		$this->data['cmodules'] = $this->users_model->getCompanyModules();
		$this->data['edit2'] = $this->users_model->Test();
		$this->data['emp'] = $this->users_model->getemp();
		$this->data['revcent'] = $this->users_model->getRevenueCenters();
		$this->data['edit'] = $this->users_model->Test();
		$this->data['navbar'] = $this->generals_model->navbar();
		$this->load->view('header');
		$this->load->view('inventory/navbarsystem', $this->data);
		$this->load->view('users/users', $this->data);
		$this->load->view('footer');
		$this->audit_model->audit('User Page','Access');
		
		if(isset($_POST["passwordpass"])){
			$this->users_model->expiredate();
		}
	}

	public function insertuser()
    {
        $this->users_model->insertuser();
    }
    
    public function savePermission()
    {
        $this->users_model->savePermission();
    }
    
    public function userStatus()
    {
        $this->users_model->userStatus();
    }
    
    public function expireDate()
    {
        $this->users_model->expireDate();
    }

	public function check(){
		$this->users_model->check();
	}
    
    public function getgroupforms()
    {
        $this->users_model->getgroupforms();
    }

    public function getUserPermission()
    {
        $this->users_model->getUserPermission();
    }
    
    public function getgrouplevels()
    {
        $this->users_model->getgrouplevels();
    }

    public function updateUser()
    {
        $this->users_model->updateUser();
    }

    public function updateUserPic()
    {
        $this->users_model->updateUserPic();
    }

    public function getItemDetails()
    {
        $this->users_model->getItemDetails();
    }

    public function removeUPermission()
    {
        $this->users_model->removeUPermission();
    }

    function edit($id)
    {
		$this->data['users'] = $this->users_model->getusers();
		$this->data['cmodules'] = $this->users_model->getCompanyModules();
		$this->data['emp'] = $this->users_model->getemp();
		$this->data['edit'] = $this->users_model->edit($id);
		$this->data['edit2'] = $this->users_model->edit2($id);
		$this->data['revcent'] = $this->users_model->getRevenueCenters();
		$this->data['navbar'] = $this->generals_model->navbar();
		$this->load->view('header');
		$this->load->view('inventory/navbarsystem', $this->data);
		$this->load->view('users/users', $this->data);
		$this->load->view('footer');
		$this->audit_model->audit('User Page','Access');
		
		if(isset($_POST["passwordpass"])){
			$this->users_model->expiredate();
		}
    }
}
 ?>
