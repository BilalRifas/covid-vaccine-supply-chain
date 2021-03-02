<?php 
/**
 * 
 */
class Forms_model extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function getForms(){
	    $query = $this->db->query("SELECT form.mas_form_id, form.mas_compmdls_id, form.mas_navi_id, form.mas_subnavi_id, form.mas_subsubnavi_id, form.mas_form_name, form.mas_form_status, form.mas_form_remark, cmcm.mas_compmdls_shtname, cmn.mas_navi_name, cmsn.mas_subnavi_name, cmssn.mas_subsubnavi_name
	    FROM company_mas_form as form
	    inner join company_mas_companymodules as cmcm on form.mas_compmdls_id = cmcm.mas_compmdls_id
	    inner join company_mas_navigation as cmn on form.mas_navi_id = cmn.mas_navi_id
	    left join company_mas_subnavigation as cmsn on form.mas_subnavi_id = cmsn.mas_subnavi_id
	    left join company_mas_subsubnavigation as cmssn on form.mas_subsubnavi_id = cmssn.mas_subsubnavi_id
	    order by form.mas_form_id DESC");
	     $result = $query->result_array();
	      return $query->result();
	}

	function getCompanyModules(){
        $this->db->select("mas_compmdls_id, mas_compmdls_shtname, mas_compmdls_description, mas_compmdls_order");
        $this->db->from('company_mas_companymodules');
        $this->db->order_by("mas_compmdls_order", 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getNavigation(){
        $this->db->select("mas_navi_id, mas_navi_name, mas_navi_controller, mas_compmdls_shtname");
        $this->db->from('company_mas_navigation');
        $this->db->join('company_mas_companymodules', 'company_mas_navigation.mas_compmdls_id = company_mas_companymodules.mas_compmdls_id');
        $this->db->order_by("company_mas_navigation.mas_compmdls_id", 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getSubNavigation(){
        $this->db->select("mas_subnavi_id, mas_subnavi_name, mas_subnavi_controller, mas_navi_name ");
        $this->db->from('company_mas_subnavigation');
        $this->db->join('company_mas_navigation', 'company_mas_subnavigation.mas_navi_id = company_mas_navigation.mas_navi_id');
        $this->db->order_by("company_mas_subnavigation.mas_navi_id", 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getSubSubNavigation(){
        $this->db->select("mas_subsubnavi_id, mas_subsubnavi_name, mas_subsubnavi_controller, mas_subnavi_name ");
        $this->db->from('company_mas_subsubnavigation');
        $this->db->join('company_mas_subnavigation', 'company_mas_subsubnavigation.mas_subnavi_id = company_mas_subnavigation.mas_subnavi_id');
        $this->db->order_by("company_mas_subsubnavigation.mas_subsubnavi_id", 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getNav(){
    $mas_compmdls_id = $_POST['mas_compmdls_id'];
    $query = $this->db->query("SELECT mas_navi_id, mas_navi_name, mas_navi_controller
      FROM company_mas_navigation
      WHERE mas_compmdls_id='".$mas_compmdls_id."'
          order by mas_navi_id ASC");
        $result = $query->result_array();
    echo json_encode($result);
    }

    function getSubNav(){
    $mas_navi_id = $_POST['mas_navi_id'];
    $query = $this->db->query("SELECT mas_subnavi_id, mas_subnavi_name, mas_subnavi_controller
      FROM company_mas_subnavigation
      WHERE mas_navi_id='".$mas_navi_id."'
          order by mas_subnavi_id ASC");
        $result = $query->result_array();
    echo json_encode($result);
    }

    function getSubSubNav(){
    $mas_subnavi_id = $_POST['mas_subnavi_id'];
    $query = $this->db->query("SELECT mas_subsubnavi_id, mas_subsubnavi_name, mas_subsubnavi_controller
      FROM company_mas_subsubnavigation
      WHERE mas_subnavi_id='".$mas_subnavi_id."'
          order by mas_subsubnavi_id ASC");
        $result = $query->result_array();
    echo json_encode($result);
    }

	function addHeader()
    {
    	 date_default_timezone_set('Asia/Colombo');
         $mas_compmdls_id = $_POST['mas_compmdls_id'];
		 $mas_navi_id = $_POST['mas_navi_id'];
		 $mas_subnavi_id = $_POST['mas_subnavi_id'];
		 $mas_subsubnavi_id = $_POST['mas_subsubnavi_id'];
		 $mas_form_name = $_POST['mas_form_name'];
		 $mas_form_remark = $_POST['mas_form_remark'];
		 $mas_form_status = $_POST['mas_form_status'];
		 $mas_form_createby = $_SESSION['mas_user_id'];
		 

		$data12 = array(
			'mas_compmdls_id' => $mas_compmdls_id,
			'mas_navi_id' => $mas_navi_id,
			'mas_subnavi_id' => $mas_subnavi_id,
			'mas_subsubnavi_id' => $mas_subsubnavi_id,
			'mas_form_name' => $mas_form_name,
			'mas_form_remark' => $mas_form_remark,
			'mas_form_status' => $mas_form_status,
			'mas_form_createby' => $mas_form_createby,
			'mas_form_cdatetime' => date('Y-m-d H:i:s')
		);

		$this->db->insert('company_mas_form',$data12);
        $insid = $this->db->insert_id();
        // $this->audit_model->audit('Issue Request Page No: '.$irmas_id,'Header');
		echo $insid;
		$this->audit_model->usertrack('Forms Page','Header New');
        
		
    }

    function updateHeader()
    {	 
    	date_default_timezone_set('Asia/Colombo');
         $mas_form_id = $_POST['mas_form_id'];
    	 $mas_compmdls_id = $_POST['mas_compmdls_id'];
         $mas_navi_id = $_POST['mas_navi_id'];
         $mas_subnavi_id = $_POST['mas_subnavi_id'];
         $mas_subsubnavi_id = $_POST['mas_subsubnavi_id'];
         $mas_form_name = $_POST['mas_form_name'];
         $mas_form_remark = $_POST['mas_form_remark'];
         $mas_form_status = $_POST['mas_form_status'];
         $mas_form_updateby = $_SESSION['mas_user_id'];
         

        $data12 = array(
            'mas_compmdls_id' => $mas_compmdls_id,
            'mas_navi_id' => $mas_navi_id,
            'mas_subnavi_id' => $mas_subnavi_id,
            'mas_subsubnavi_id' => $mas_subsubnavi_id,
            'mas_form_name' => $mas_form_name,
            'mas_form_remark' => $mas_form_remark,
            'mas_form_status' => $mas_form_status,
            'mas_form_updateby' => $mas_form_updateby,
            'mas_form_udatetime' => date('Y-m-d H:i:s')
        );

		$this->db->where('mas_form_id',$mas_form_id);
		$this->db->update('company_mas_form',$data12);
		echo $mas_form_id;
		$this->audit_model->usertrack('Forms Page','Header Update');
		
	}

	function edit($id)
    {
	      $query = $this->db->query("SELECT mas_form_id, mas_compmdls_id, mas_navi_id, mas_subnavi_id, mas_subsubnavi_id, mas_form_name, mas_form_status, mas_form_remark
        FROM company_mas_form
        where mas_form_id='".$id."'");
        $result = $query->result_array();
        return $query->result();
    }
    

    function Test(){
		$this->db->select("COUNT(mas_form_id)");
		$this->db->from('company_mas_form');
		$query = $this->db->get();
		return $query->result();
	}


}
 ?>