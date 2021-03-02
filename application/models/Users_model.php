<?php
/**
*
*/
class Users_model extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
    
	function getusers()
	{
		$this->db->select("mas_user_id, mas_user_username, mas_user_expire_date, mas_user_status, mas_user_create_date");
		$this->db->from('company_mas_user');
		$this->db->order_by('mas_user_id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
    
    function getCompanyModules()
	{
		$this->db->select("mas_compmdls_description, mas_compmdls_shtname, mas_compmdls_id");
		$this->db->from('company_mas_companymodules');
		$this->db->order_by("mas_compmdls_order", 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
    
    function getemp()
	{
		$this->db->select("mas_emp_id, mas_emp_sname, mas_emp_lname, mas_emp_nicno, mas_emp_fname");
		$this->db->from('company_mas_emp');
		$this->db->order_by('mas_emp_id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	function getRevenueCenters()
	{
		$this->db->select("mas_revcent_id, mas_revcent_name");
		$this->db->from('acc_mas_revcenter');
		$this->db->order_by("mas_revcent_name", 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
    
	function insertuser()
	{
		
//			$this->form_validation->set_rules('txtUsername', 'User ID', 'required');
//			if($this->form_validation->run() == TRUE){
//				$Uid=$_POST['txtUsername'];
				$pass;
				if($_POST['txtPasswordConfim'] == ""){
					$pass='123';
				}
				else{
					$pass=$_POST['txtPasswordConfim'];
				}
        
                $status = 0;
                if($_POST['chkStatus'] == 'Y')
                {
                    $status = '1';
                }else($status = '0');
        

				$data = array(
					'mas_user_username' => $_POST['txtUsername'],
					'mas_user_password' => md5($pass),
					'mas_emp_id' => $_POST['cmbEmp'],
					'mas_revcent_id' => $_POST['cmbRevenueCenter'],
					'mas_user_create_date' => date("Y-m-d H:i:m"),
					'mas_user_expire_date' => date("Y-m-d", strtotime($_POST['txtExpdate'])),
					'mas_user_remark' => $_POST['txtRemarks'],
					'mas_user_createby' => $_SESSION['mas_user_id'],
					'mas_user_datetime' => date("Y-m-d H:i:m"),
					'mas_user_status' => $status
				);
				$this->db->insert('company_mas_user',$data);
				echo $insid=$this->db->insert_id();

                if($_FILES["file"]["name"] != ''){
                if(isset($_FILES["file"]["name"]))
                {
                    $config['upload_path'] = './upload';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_height'] = "768";
                    $config['max_width'] = "1024";
                    $config['file_name'] = $insid;
                    $this->load->library('upload', $config);
                    
                    if(!$this->upload->do_upload('file'))
                    {
                        echo $this->upload->display_errors();
                    }else{
                        $data = $this->upload->data();

                    }
                }
                }

		
	}


	function updateUser()
	{
		$mas_user_updateby =$_SESSION['mas_user_id'];
		$hid = $_POST['hid'];

				if($_POST['pwconfirm'] == ""){

				}
				else{

					$pass=$_POST['pwconfirm'];

					$data12 = array(
					'mas_user_password' => md5($pass),
					'mas_user_updateby' => $mas_user_updateby,
					'mas_user_udatetime' => date('Y-m-d H:i:s')
				);

				$this->db->where('mas_user_id', $hid);
				$this->db->update('company_mas_user',$data12);

				}
        
                $status = 0;
                if($_POST['status'] == 'Y')
                {
                    $status = '1';
                }else($status = '0');
				$data = array(
					'mas_user_username' => $_POST['fname'],
					'mas_emp_id' => $_POST['emp'],
					'mas_revcent_id' => $_POST['cmbRevenueCenter'],
					'mas_user_expire_date' => date("Y-m-d", strtotime($_POST['exp'])),
					'mas_user_remark' => $_POST['remark'],
					'mas_user_status' => $status,
					'mas_user_updateby' => $mas_user_updateby,
					'mas_user_udatetime' => date('Y-m-d H:i:s')
				);

				$this->db->where('mas_user_id', $hid);
				$this->db->update('company_mas_user',$data);
	}

	function updateUserPic()
	{

                if($_FILES["file"]["name"] != ''){
                if(isset($_FILES["file"]["name"]))
                {
                    $config['upload_path'] = './upload';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_height'] = "768";
                    $config['max_width'] = "1024";
                    $config['file_name'] = $_POST['hid'];
                    $this->load->library('upload', $config);
                    
                    if(!$this->upload->do_upload('file'))
                    {
                        echo $this->upload->display_errors();
                    }else{
                        $data = $this->upload->data();

                    }
                }
                }

	}
    
//	function expiredate()
//	{
//		$usernameshow = strtoupper($_COOKIE['value']);
//		$data = array(
//			'expire_date' => $_POST['txteedate']
//		);
//		$this->db->where(array('user_id'=>$usernameshow ));
//		$this->db->update('users',$data);
//		$this->audit_model->audit('User ID: '.$usernameshow.'Exp date: '.$_POST['txteedate'],'Updated');
//		$this->session->set_flashdata("success","User Registered");
//		redirect("Users","refresh");
//	}
    
    function userStatus()
	{
		$uid = $_POST['uid'];
		$status = $_POST['status'];
		$data = array(
			'mas_user_status' => $status
		);
		$this->db->where(array('mas_user_id'=>$uid ));
		$this->db->update('company_mas_user',$data);
		$this->audit_model->audit('User ID: '.$uid.'Status: '.$status,'Updated');
//		$this->session->set_flashdata("success","User Registered");
//		redirect("Users","refresh");
	}
    
    function expireDate()
	{
		$uid = $_POST['uid'];
		$expiredate = $_POST['expiredate'];
		$data = array(
			'mas_user_expire_date' => date("Y-m-d", strtotime($_POST['expiredate']))
		);
		$this->db->where(array('mas_user_id'=>$uid ));
		$this->db->update('company_mas_user',$data);
		$this->audit_model->audit('User ID: '.$uid.'Date: '.$expiredate,'Updated');
        echo date("Y-m-d", strtotime($_POST['expiredate']));
//		$this->session->set_flashdata("success","User Registered");
//		redirect("Users","refresh");
	}
    
    function check()
    {
        $uid = $_POST['uid'];
		$this->db->select('*');
		$this->db->from('company_mas_user');
		$this->db->where(array('mas_user_username'=>$uid));
		$query = $this->db->get();
		$user = $query->row();
		$row_count = $query->num_rows();
		if($uid == NULL){
			
		}else if (strlen($uid)<3){
			echo "<label class='text-warning'>Too short...</label>";
		}else{
			if($row_count==0){
				echo "<label class='text-success'>Available!!!</label>";
			}
			else if($row_count>=1){
				echo "<label class='text-danger'>Not Available</label>";
			}
		}
    }
    
    function getgroupforms()
    {
    	$mas_user_id = $_POST['mas_user_id'];
		$mas_compmdls_id = $_POST['mas_compmdls_id'];
	    $query = $this->db->query("SELECT * FROM company_mas_form
	    WHERE mas_form_id not in (SELECT company_trn_usergroup.mas_form_id 
	    FROM company_trn_usergroup WHERE company_trn_usergroup.mas_user_id='".$mas_user_id."') and company_mas_form.mas_compmdls_id='".$mas_compmdls_id."'");
	    $result = $query->result_array();
	    echo json_encode($result);
    }
    
    function getgrouplevels()
    {
        $this->db->select("mas_userlevel_id, mas_userlevel_name, mas_userlevel_remark");
		$this->db->from('company_mas_userlevel');
		$this->db->order_by("mas_userlevel_id");
		$query = $this->db->get();
		$result = $query->result_array();
		echo json_encode($result);
    }
    
    function savePermission()
    {
        date_default_timezone_set('Asia/Colombo');
        $uid = $_POST['uid'];
        $fid = $_POST['fid'];
        $levelid = $_POST['levelid'];


        $query = $this->db->query("SELECT me.mas_emp_id, me.mas_emp_type
			FROM company_mas_user as mu
			inner join company_mas_emp as me on mu.mas_emp_id=me.mas_emp_id
			where mu.mas_user_id='".$uid."'");
         $result = $query->result_array();

        	foreach ($result as $key => $value) {
					$mas_emp_type = $value['mas_emp_type'];

					$data12 = array(
						'mas_ugroup_id' => $mas_emp_type,
						'mas_user_id' => $uid,
						'mas_form_id' => $fid,
						'mas_userlevel_id' => $levelid,
						'trn_usergroup_status' => '1',
			            'trn_usergroup_createby' => $_SESSION['mas_user_id'],
						'trn_usergroup_cdatetime' => date("Y-m-d H:i:m")
			        );

					$this->db->insert('company_trn_usergroup',$data12);
					$insid2 = $this->db->insert_id();

				}
        
        
    }

    function getUserPermission(){
		$mas_user_id = $_POST['mas_user_id'];
		$query = $this->db->query("SELECT tug.trn_usergroup_id, tug.mas_ugroup_id, tug.mas_user_id, tug.mas_form_id, tug.mas_userlevel_id, mug.mas_ugroup_name, mu.mas_user_username, mul.mas_userlevel_name, mul.mas_userlevel_remark, mf.mas_form_name
			FROM company_trn_usergroup as tug
			inner join company_mas_usergroup as mug on tug.mas_ugroup_id=mug.mas_ugroup_id
			inner join company_mas_user as mu on tug.mas_user_id=mu.mas_user_id
			inner join company_mas_userlevel as mul on tug.mas_userlevel_id=mul.mas_userlevel_id
            inner join company_mas_form as mf on tug.mas_form_id=mf.mas_form_id
			where tug.mas_user_id='".$mas_user_id."' order by tug.trn_usergroup_id ASC");
        $result = $query->result_array();
		echo json_encode($result);
	}


    function edit($id)
    {
        $this->db->select("mas_user_id, mas_user_username, mas_user_password, mas_emp_id, mas_user_expire_date, mas_user_remark,  mas_user_createby, mas_user_datetime, mas_user_create_date, mas_user_status, mas_revcent_id");
		$this->db->from('company_mas_user');
		$this->db->where("mas_user_id", $id);
		$query = $this->db->get();
		return $query->result();
    }
    
    function edit2($id)
    {
        $query = $this->db->query("SELECT tug.trn_usergroup_id, tug.mas_ugroup_id, tug.mas_user_id, tug.mas_form_id, tug.mas_userlevel_id, mug.mas_ugroup_name, mu.mas_user_username, mul.mas_userlevel_name, mul.mas_userlevel_remark, mf.mas_form_name
			FROM company_trn_usergroup as tug
			inner join company_mas_usergroup as mug on tug.mas_ugroup_id=mug.mas_ugroup_id
			inner join company_mas_user as mu on tug.mas_user_id=mu.mas_user_id
			inner join company_mas_userlevel as mul on tug.mas_userlevel_id=mul.mas_userlevel_id
            inner join company_mas_form as mf on tug.mas_form_id=mf.mas_form_id
			where tug.mas_user_id='".$id."' order by tug.trn_usergroup_id ASC");
		$result = $query->result_array();
		return $query->result();
    }

	function Test(){
		$this->db->select("COUNT(mas_user_id)");
		$this->db->from('company_mas_user');
		$query = $this->db->get();
		return $query->result();
	}

	function getItemDetails(){
		$rno = $_POST['rno'];
		$query = $this->db->query("SELECT tug.trn_usergroup_id, tug.mas_ugroup_id, tug.mas_user_id, tug.mas_form_id, tug.mas_userlevel_id, mug.mas_ugroup_name, mu.mas_user_username, mul.mas_userlevel_name, mul.mas_userlevel_remark, mf.mas_form_name
			FROM company_trn_usergroup as tug
			inner join company_mas_usergroup as mug on tug.mas_ugroup_id=mug.mas_ugroup_id
			inner join company_mas_user as mu on tug.mas_user_id=mu.mas_user_id
			inner join company_mas_userlevel as mul on tug.mas_userlevel_id=mul.mas_userlevel_id
            inner join company_mas_form as mf on tug.mas_form_id=mf.mas_form_id
			where tug.mas_user_id='".$id."' order by tug.trn_usergroup_id ASC");
        $result = $query->result_array();
		echo json_encode($result);
	}

	public function removeUPermission()
    {
        $trn_usergroup_id = $_POST['trn_usergroup_id'];
        $this->db->where('trn_usergroup_id',$trn_usergroup_id);
        $this->db->delete('gen_trn_usergroup');
    }
}
?>
