<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Userprofile extends CI_Controller
{
	public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['user_logged'])){
            $this->session->set_flashdata("error","Please loging first");
            redirect("auth/login");
        }else{
            $this->generals_model->permissionCheck();
        }

        $this->load->model('userprofile_model');
    }

	function index()
	{	
		$this->data['utype'] = $this->userprofile_model->getUserGroups();
		$this->data['userprofile'] = $this->userprofile_model->getUsers();
		$this->data['edit'] = $this->userprofile_model->Test();
		$this->data['navbar'] = $this->generals_model->navbar();
		$this->load->view('header');
		$this->load->view('inventory/navbar', $this->data);
		$this->load->view('userprofile/userprofile', $this->data);
		$this->load->view('footer');
		$this->audit_model->audit('userprofile Page','Access');
	}

	function updateHeader(){
        $this->userprofile_model->updateHeader();
    }

    function AddHeader(){
        $this->userprofile_model->AddHeader();
    }

    function edit($id)
    {
    	$this->data['utype'] = $this->userprofile_model->getUserGroups();
		$this->data['userprofile'] = $this->userprofile_model->getUsers();
		$this->data['edit'] = $this->userprofile_model->edit($id);
		$this->data['navbar'] = $this->generals_model->navbar();
		$this->load->view('header');
		$this->load->view('inventory/navbar', $this->data);
		$this->load->view('userprofile/userprofile', $this->data);
		$this->load->view('footer');
		$this->audit_model->audit('userprofile Page','Access');
    }
}
?>