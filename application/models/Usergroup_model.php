<?php
class usergroup_model extends CI_Model
{
	function __construct()
	{
		# code...
		parent::__construct();
	}
	
	function getid()
	{
		$this->db->select("mas_ugroup_id, mas_ugroup_name, mas_com_name, mas_ugroup_remark, mas_ugroup_status");
		$this->db->from('gen_mas_usergroup');
		$this->db->join('gen_mas_company', 'gen_mas_usergroup.mas_com_id = gen_mas_company.mas_com_id');
		$this->db->order_by("mas_ugroup_id", "desc");
		$query = $this->db->get();
		return $query->result();
	}

	function usergroup()
	{
        date_default_timezone_set('Asia/Colombo');
		$name = $_POST['name'];
		$remar = $_POST['remar'];
        $model = $_POST['company'];

		$data12 = array(
			'mas_ugroup_name' => $name, 
			'mas_ugroup_remark' => $remar,
			'mas_com_id' => $model,
			'mas_ugroup_status' => '1',
            'mas_ugroup_createby' => $_SESSION['mas_user_id'],
            'mas_ugroup_cdatetime' => date('Y-m-d')
			

		);
		$this->db->insert('gen_mas_usergroup',$data12);
		echo $this->db->insert_id();


	}

	function updateHeader()
    {
    	 date_default_timezone_set('Asia/Colombo');
    	 $hid = $_POST['hid'];
    	 $name = $_POST['name'];
		 $remar = $_POST['remar'];
         $model = $_POST['company'];
		 $mas_ugroup_updateby =$_SESSION['mas_user_id'];
		 
		$data12 = array(
			'mas_ugroup_name' => $name, 
			'mas_ugroup_remark' => $remar,
			'mas_com_id' => $model,
			'mas_ugroup_updateby' => $mas_ugroup_updateby,
			'mas_ugroup_udatetime' => date('Y-m-d H:i:s')

		);

		$this->db->where('mas_ugroup_id',$hid);
		$this->db->update('gen_mas_usergroup',$data12);

		echo $mas_ugroup_id;
        
		
    }

    
    function getCompany()
    {
        $this->db->select("mas_com_id, mas_com_name, mas_com_code");
		$this->db->from('gen_mas_company');
		$this->db->order_by("mas_com_id", "desc");
		$query = $this->db->get();
		return $query->result();
    }
    
    function getModule()
    {
        $this->db->select("mas_compmdls_id, mas_compmdls_shtname, mas_compmdls_description");
		$this->db->from('gen_mas_companymodules');
		$this->db->order_by("mas_compmdls_id", "ASC");
		$query = $this->db->get();
		return $query->result();
    }
    
    function getForms()
    {
        $id = $_POST['name'];
		$mas_ugroup_id = $_POST['mas_ugroup_id'];
	    $query = $this->db->query("SELECT * FROM gen_mas_form
	    WHERE mas_form_id not in (SELECT mas_form_id 
	    FROM gen_trn_groupform WHERE mas_ugroup_id='".$mas_ugroup_id."') and mas_compmdls_id='".$id."'
	        order by mas_form_id ASC");
	    $result = $query->result_array();
	    echo json_encode($result);
    }
    
    function addTrnGroupForm()
    {
        date_default_timezone_set('Asia/Colombo');
        $gid = $_POST['gid'];
        $fid = $_POST['fid'];
        $userlevel = $_POST['userlevel'];
        
        $data12 = array(
			'mas_ugroup_id' => $gid,
			'mas_form_id' => $fid,
			'mas_userlevel_id' => $userlevel,
			'trn_ugroup_status' => '1',
            'trn_ugroup_createby' => $_SESSION['mas_user_id'],
			'trn_ugroup_cdatetime' => date("Y-m-d H:i:m")
        );
//        $this->db->where('trn_pettyiou_no', $id);
		$this->db->insert('gen_trn_groupform',$data12);
    }
    
    public function removeUGF()
    {
        $trn_gfrom_id = $_POST['trn_gfrom_id'];
        $this->db->where('trn_gfrom_id',$trn_gfrom_id);
        $this->db->delete('gen_trn_groupform');
    }

    function edit($id)
    {
        $this->db->select("mas_ugroup_id, mas_ugroup_name, mas_ugroup_remark, mas_com_id");
		$this->db->from('gen_mas_usergroup');
		$this->db->where("mas_ugroup_id", $id);
		$query = $this->db->get();
		return $query->result();
    }

    function edit2($id)
    {
        $query = $this->db->query("SELECT tgf.trn_gfrom_id, tgf.mas_ugroup_id, tgf.mas_form_id, tgf.mas_userlevel_id, mform.mas_form_name, mcm.mas_compmdls_shtname, mul.mas_userlevel_name, mul.mas_userlevel_remark
			FROM gen_trn_groupform as tgf
			LEFT join gen_mas_form as mform on tgf.mas_form_id=mform.mas_form_id
			LEFT join gen_mas_userlevel as mul on tgf.mas_userlevel_id=mul.mas_userlevel_id
			LEFT join gen_mas_companymodules as mcm on mform.mas_compmdls_id=mcm.mas_compmdls_id
			where tgf.mas_ugroup_id='".$id."' order by mform.mas_form_id");
		$result = $query->result_array();
		return $query->result();
    }

    function getUserGroupDetails(){
		$mas_ugroup_id = $_POST['mas_ugroup_id'];
		$query = $this->db->query("SELECT tgf.trn_gfrom_id, tgf.mas_ugroup_id, tgf.mas_form_id, tgf.mas_userlevel_id, mform.mas_form_name, mcm.mas_compmdls_shtname, mul.mas_userlevel_name, mul.mas_userlevel_remark
			FROM gen_trn_groupform as tgf
			LEFT join gen_mas_form as mform on tgf.mas_form_id=mform.mas_form_id
			LEFT join gen_mas_userlevel as mul on tgf.mas_userlevel_id=mul.mas_userlevel_id
			LEFT join gen_mas_companymodules as mcm on mform.mas_compmdls_id=mcm.mas_compmdls_id
			where tgf.mas_ugroup_id='".$mas_ugroup_id."' order by mform.mas_form_id");
        $result = $query->result_array(); 
		echo json_encode($result);
	}


	function Test(){
		$this->db->select("COUNT(mas_ugroup_id)");
		$this->db->from('gen_mas_usergroup');
		$query = $this->db->get();
		return $query->result();
	}


	function getUserlevel()
	{
		$this->db->select("mas_userlevel_id, mas_userlevel_name, mas_userlevel_remark");
		$this->db->from('gen_mas_userlevel');
		$this->db->order_by("mas_userlevel_id");
		$query = $this->db->get();
		$result = $query->result_array();
		echo json_encode($result);
	}

	function getUL(){
    $this->db->select("mas_userlevel_id, mas_userlevel_name, mas_userlevel_remark");
		$this->db->from('gen_mas_userlevel');
		$this->db->order_by("mas_userlevel_id");
    $query = $this->db->get();
    return $query->result();
  }

	function getItemDetails(){
		$mas_ugroup_id = $_POST['mas_ugroup_id'];
		$query = $this->db->query("SELECT tgf.trn_gfrom_id, tgf.mas_ugroup_id, tgf.mas_form_id, tgf.mas_userlevel_id, mform.mas_form_name, mcm.mas_compmdls_shtname, mul.mas_userlevel_name, mul.mas_userlevel_remark
			FROM gen_trn_groupform as tgf
			LEFT join gen_mas_form as mform on tgf.mas_form_id=mform.mas_form_id
			LEFT join gen_mas_userlevel as mul on tgf.mas_userlevel_id=mul.mas_userlevel_id
			LEFT join gen_mas_companymodules as mcm on mform.mas_compmdls_id=mcm.mas_compmdls_id
			where tgf.mas_ugroup_id='".$mas_ugroup_id."' order by mform.mas_form_id");
        $result = $query->result_array(); 
		echo json_encode($result);
	}

function UpdateUL(){

    $trn_gfrom_id = $_POST['trn_gfrom_id'];
    $mas_userlevel_id = $_POST['mas_userlevel_id'];

    $data12 = array(
      'mas_userlevel_id' => $mas_userlevel_id 
    );

    $this->db->set($data12);
    $this->db->where('trn_gfrom_id',$trn_gfrom_id);
    $this->db->update('gen_trn_groupform');
    echo "Success";

  }

}
?>
