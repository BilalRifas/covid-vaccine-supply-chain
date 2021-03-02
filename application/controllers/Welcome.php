<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['user_logged'])){
            $this->session->set_flashdata("error","Please loging first");
            redirect("Auth/login","refresh");
        }
    }
    
	public function index()
	{	
		$this->data['navbar'] = $this->generals_model->navbar();
		$this->load->view('header');
		$this->load->view('inventory/navbar', $this->data);
		$this->load->view('home');
		$this->load->view('footer');
		$this->audit_model->audit('Welcome','Access');
	}

	public function login()
	{
		$this->data['navbar'] = $this->generals_model->navbar();
		$this->load->view('header');
		$this->load->view('inventory/navbar', $this->data);
		$this->load->view('home');
		$this->load->view('footer');
		$this->audit_model->audit('Welcome','Access');
	}

	public function accounts()
	{
        $this->data['navbar'] = $this->generals_model->navbar();
		$this->load->view('header');
		$this->load->view('inventory/navbar', $this->data);
		$this->load->view('home');
		$this->load->view('footer');
		$this->audit_model->audit('Welcome','Access');
	}

	public function pos()
	{
        $this->data['navbar'] = $this->generals_model->navbar();
		$this->load->view('header');
		$this->load->view('inventory/navbar', $this->data);
		$this->load->view('home');
		$this->load->view('footer');
		$this->audit_model->audit('Welcome','Access');
	}

	public function system()
	{
        $this->data['navbar'] = $this->generals_model->navbar();
		$this->load->view('header');
		$this->load->view('inventory/navbar', $this->data);
		$this->load->view('home');
		$this->load->view('footer');
		$this->audit_model->audit('Welcome','Access');
	}

	public function subnav()
    {
        $this->generals_model->subnavbar();
    }
    
    public function subsubnav()
    {
        $this->generals_model->subsubnavbar();
    }

    public function clicktest()
    {
        $this->generals_model->clicktest();
    }
    
    public function clicktest1()
    {
        $this->generals_model->clicktest1();
    }
    
    public function clicktest2()
    {
        $this->generals_model->clicktest2();
    }

    public function numberTowords($num)
    {
        $this->generals_model->numberTowords($num);
    }

}
