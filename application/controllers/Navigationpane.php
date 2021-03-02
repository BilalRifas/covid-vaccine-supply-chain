<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Navigationpane extends CI_Controller
{
	public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['user_logged'])){
            $this->session->set_flashdata("error","Please loging first");
            redirect("auth/login");
        }else{
            $this->generals_model->permissionCheck();
        }

        $this->load->model('navigationpane_model');
    }

	function index()
	{	
		$this->data['cmodules'] = $this->navigationpane_model->getCompanyModules();
        $this->data['nav'] = $this->navigationpane_model->getNavigation();
        $this->data['subnav'] = $this->navigationpane_model->getSubNavigation();
		$this->data['navbar'] = $this->generals_model->navbar();
        $this->load->view('header');
		$this->load->view('inventory/navbar', $this->data);
		$this->load->view('navigationpane/navigationpane', $this->data);
		$this->load->view('footer');
		$this->audit_model->audit('Vehiclecategory Page','Access');
	}

	function addNavigation(){
        $this->navigationpane_model->addNavigation();
    }

    function removeNavigation(){
        $this->navigationpane_model->removeNavigation();
    }

    function getNavigationpane(){
        $this->navigationpane_model->getNavigationpane();
    }

    function addSubNavigation(){
        $this->navigationpane_model->addSubNavigation();
    }

    function removeSubNavigation(){
        $this->navigationpane_model->removeSubNavigation();
    }

    function getSubNavigationpane(){
        $this->navigationpane_model->getSubNavigationpane();
    }

    function addSubSubNavigation(){
        $this->navigationpane_model->addSubSubNavigation();
    }

    function removeSubSubNavigation(){
        $this->navigationpane_model->removeSubSubNavigation();
    }

    function getSubSubNavigationpane(){
        $this->navigationpane_model->getSubSubNavigationpane();
    }

    function UpdateNavi(){
        $this->navigationpane_model->UpdateNavi();
    }

    function UpdateNaviSub(){
        $this->navigationpane_model->UpdateNaviSub();
    }

    function UpdateNaviSubSub(){
        $this->navigationpane_model->UpdateNaviSubSub();
    }

    
}
?>