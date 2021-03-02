<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Auth extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['user_logged'])){
			$this->session->set_flashdata("error","Please loging first");
		}
	}
	
	function login()
	{
		# code...
		
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[3]');
		$this->data['company'] = $this->auth_model->getCompanyModules();
		if($this->form_validation->run() == TRUE){
			$txtModules = $_POST['txtModules'];
			$username = strtoupper($_POST['username']);
			$password = md5($_POST['password']);
			$this->db->select('*');
			$this->db->from('company_mas_user');
			$this->db->join('company_mas_emp', 'company_mas_user.mas_emp_id = company_mas_emp.mas_emp_id');
			$this->db->where(array('mas_user_username'=>$username, 'mas_user_password'=>$password));
			$query = $this->db->get();
			$user = $query->row();
			if(isset($user->mas_user_username)){
				$this->session->set_flashdata("success","You are logged in");
				$_SESSION['user_logged'] = TRUE;
				$_SESSION['mas_user_username'] = $user->mas_user_username;
				$_SESSION['mas_user_id'] = $user->mas_user_id;
				$_SESSION['mas_revcent_id'] = $user->mas_revcent_id;
				$this->audit_model->audit('Login Page','Logged');
                date_default_timezone_set('Asia/Colombo');
                $data12 = array('mas_user_lastloggedin' => date("Y-m-d H:i:s"));
                $this->db->where('mas_user_id', $user->mas_user_id);
			    $this->db->update('company_mas_user', $data12);
			    if($txtModules == "1"){
                            $_SESSION['module'] = '1';
                            redirect("Welcome","refresh");
                   }else if($txtModules == "2"){
                            $_SESSION['module'] = '2';
                            redirect("Welcome/accounts","refresh");
                   }else if($txtModules == "3"){
                            $_SESSION['module'] = '3';
                            redirect("Welcome/pos","refresh");
                   }else if($txtModules == "4"){
                            $_SESSION['module'] = '4';
                            redirect("Welcome/system","refresh");
                   }
			}else{
				$this->session->set_flashdata("error", "No account exists");
				redirect("Auth/login","refresh");
			}
		}
		$this->load->view('login', $this->data);
	}

	public function logout(){
		$this->audit_model->audit('Logout','Access');
		unset($_SESSION);
		session_destroy();
		redirect("Auth/login","refresh");
	}


	function getCatNotify(){
        $this->auth_model->getCatNotify();
    }

    function getTankNotify(){
        $this->auth_model->getTankNotify();
    }

    function getInvoiceNotify(){
        $this->auth_model->getInvoiceNotify();
    }

    function getQuotationNotify(){
        $this->auth_model->getQuotationNotify();
    }

    function getStockinHand(){
        $this->auth_model->getStockinHand();
    }

    function getSoldItems(){
        $this->auth_model->getSoldItems();
    }

	
}
 ?>