<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Forms extends CI_Controller
{
	public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['user_logged'])){
            $this->session->set_flashdata("error","Please loging first");
            redirect("auth/login");
        }else{
            $this->generals_model->permissionCheck();
        }

        $this->load->model('forms_model');
    }

	function index()
	{	
		$this->data['forms'] = $this->forms_model->getForms();
		$this->data['cmodules'] = $this->forms_model->getCompanyModules();
        $this->data['nav'] = $this->forms_model->getNavigation();
        $this->data['subnav'] = $this->forms_model->getSubNavigation();
        $this->data['subsubnav'] = $this->forms_model->getSubSubNavigation();
		$this->data['edit'] = $this->forms_model->Test();
		$this->data['navbar'] = $this->generals_model->navbar();
        $this->load->view('header');
		$this->load->view('inventory/navbar', $this->data);
		$this->load->view('forms/forms', $this->data);
		$this->load->view('footer');
		$this->audit_model->audit('Forms Page','Access');
	}

	function getNav(){
        $this->forms_model->getNav();
    }

    function getSubNav(){
        $this->forms_model->getSubNav();
    }

    function getSubSubNav(){
        $this->forms_model->getSubSubNav();
    }

	function addHeader(){
        $this->forms_model->addHeader();
    }

	function updateHeader(){
        $this->forms_model->updateHeader();
    }

    function edit($id)
    {
		$this->data['forms'] = $this->forms_model->getForms();
		$this->data['cmodules'] = $this->forms_model->getCompanyModules();
        $this->data['nav'] = $this->forms_model->getNavigation();
        $this->data['subnav'] = $this->forms_model->getSubNavigation();
        $this->data['subsubnav'] = $this->forms_model->getSubSubNavigation();
		$this->data['edit'] = $this->forms_model->edit($id);
		$this->data['navbar'] = $this->generals_model->navbar();
        $this->load->view('header');
		$this->load->view('inventory/navbar', $this->data);
		$this->load->view('forms/forms', $this->data);
		$this->load->view('footer');
		$this->audit_model->audit('Forms Page','Access');
    }
}
?>