<?php 
/**
 * 
 */
class Userprofile_model extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function getUsers(){
	    $query = $this->db->query("SELECT cme.mas_emp_id, cme.mas_emp_fname, cme.mas_emp_sname, cme.mas_emp_lname, cme.mas_emp_dob, cme.mas_emp_address, cme.mas_emp_nicno, cme.mas_emp_telno, cme.mas_emp_mobile, cme.mas_emp_createby, cme.mas_emp_cdatetime, cmu.mas_user_username
	    FROM company_mas_emp as cme
	    INNER JOIN company_mas_user as cmu on cme.mas_emp_createby=cmu.mas_user_id");
	     $result = $query->result_array();
	      return $query->result();
	}

	function AddHeader()
    {
    	 date_default_timezone_set('Asia/Colombo');
         $mas_emp_id = $_POST['mas_emp_id'];
         $mas_emp_fname = $_POST['mas_emp_fname'];
		 $mas_emp_sname = $_POST['mas_emp_sname'];
		 $mas_emp_lname = $_POST['mas_emp_lname'];
		 $mas_emp_dob = $_POST['mas_emp_dob'];
		 $dateformater1 = date("Y-m-d", strtotime($mas_emp_dob));
		 $mas_emp_address = $_POST['mas_emp_address'];
		 $mas_emp_nicno = $_POST['mas_emp_nicno'];
		 $mas_emp_telno = $_POST['mas_emp_telno'];
		 $mas_emp_mobile = $_POST['mas_emp_mobile'];
		 $mas_emp_type = $_POST['mas_emp_type'];
		 $mas_emp_createby = $_SESSION['mas_user_id'];

		$data12 = array(
			'mas_emp_fname' => $mas_emp_fname,
			'mas_emp_sname' => $mas_emp_sname,
			'mas_emp_lname' => $mas_emp_lname,
			'mas_emp_dob' => $dateformater1,
			'mas_emp_address' => $mas_emp_address,
			'mas_emp_nicno' => $mas_emp_nicno,
			'mas_emp_telno' => $mas_emp_telno,
			'mas_emp_mobile' => $mas_emp_mobile,
			'mas_title_id' => '1',
			'mas_emp_type' => $mas_emp_type,
			'mas_emp_createby' => $mas_emp_createby,
			'mas_emp_cdatetime' => date('Y-m-d H:i:s')
		);

		$this->db->insert('company_mas_emp',$data12);
        $insid = $this->db->insert_id();
		echo $insid;
		$this->audit_model->usertrack('User Profile Page','Add Header');
        
		
    }


    function updateHeader()
    {	 
    	date_default_timezone_set('Asia/Colombo');
    	 $mas_emp_id = $_POST['mas_emp_id'];
         $mas_emp_fname = $_POST['mas_emp_fname'];
		 $mas_emp_sname = $_POST['mas_emp_sname'];
		 $mas_emp_lname = $_POST['mas_emp_lname'];
		 $mas_emp_dob = $_POST['mas_emp_dob'];
		 $dateformater1 = date("Y-m-d", strtotime($mas_emp_dob));
		 $mas_emp_address = $_POST['mas_emp_address'];
		 $mas_emp_nicno = $_POST['mas_emp_nicno'];
		 $mas_emp_telno = $_POST['mas_emp_telno'];
		 $mas_emp_mobile = $_POST['mas_emp_mobile'];
		 $mas_emp_type = $_POST['mas_emp_type'];
		 $mas_emp_updateby = $_SESSION['mas_user_id'];
		 

		$data12 = array(
			'mas_emp_fname' => $mas_emp_fname,
			'mas_emp_sname' => $mas_emp_sname,
			'mas_emp_lname' => $mas_emp_lname,
			'mas_emp_dob' => $dateformater1,
			'mas_emp_address' => $mas_emp_address,
			'mas_emp_nicno' => $mas_emp_nicno,
			'mas_emp_telno' => $mas_emp_telno,
			'mas_emp_mobile' => $mas_emp_mobile,
			'mas_emp_type' => $mas_emp_type,
			'mas_emp_updateby' => $mas_emp_updateby,
			'mas_emp_udatetime' => date('Y-m-d H:i:s')
		);

		$this->db->where('mas_emp_id',$mas_emp_id);
		$this->db->update('company_mas_emp',$data12);
		echo $mas_emp_id;
		$this->audit_model->usertrack('User Profile Page','Header Update');
		
	}

	function edit($id)
    {
        $this->db->select("company_mas_emp.mas_emp_id, mas_emp_fname, mas_emp_sname, mas_emp_lname, mas_emp_dob, mas_emp_address, mas_emp_nicno, mas_emp_telno, mas_emp_mobile, mas_emp_createby, mas_emp_cdatetime, mas_emp_type");
		$this->db->from('company_mas_emp');
		$this->db->where("company_mas_emp.mas_emp_id", $id);
		$query = $this->db->get();
		return $query->result();
    }
    

    function Test(){
		$this->db->select("COUNT(mas_emp_id)");
		$this->db->from('company_mas_emp');
		$query = $this->db->get();
		return $query->result();
	}

	function getUserGroups(){
        $this->db->select("mas_ugroup_id, mas_ugroup_name");
        $this->db->from('company_mas_usergroup');
        $this->db->order_by("mas_ugroup_id", 'ASC');
        $query = $this->db->get();
        return $query->result();
    }



}
 ?>