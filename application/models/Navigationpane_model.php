<?php 
/**
 * 
 */
class Navigationpane_model extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function getVehicleCategory(){
	    $query = $this->db->query("SELECT vc.mas_vehiclecategory_id, vc.mas_vehiclecategory_name, vc.mas_vehiclecategory_remarks, mcss.mas_maincatsubsub_name, mcs.mas_maincatsub_name, mc.mas_maincategory_name
	    FROM st_mas_vehiclecategory vc
	    inner join st_mas_maincatsubsub mcss on vc.mas_maincatsubsub_id = mcss.mas_maincatsubsub_id
	    inner join st_mas_maincatsub mcs on mcss.mas_maincatsub_id = mcs.mas_maincatsub_id
	    inner join st_mas_maincategory mc on mcs.mas_maincategory_id = mc.mas_maincategory_id
	    order by mas_vehiclecategory_id DESC");
	     $result = $query->result_array();
	      return $query->result();
	}

	function getNavigationpane(){

		$query = $this->db->query("SELECT cmn.mas_navi_id, cmn.mas_compmdls_id, cmn.mas_navi_name, cmn.mas_navi_controller, cmn.mas_navi_status, cmn.mas_navi_description, cmn.mas_navi_subenable, cmc.mas_compmdls_description
			FROM company_mas_navigation as cmn
			inner join company_mas_companymodules as cmc on cmn.mas_compmdls_id=cmc.mas_compmdls_id
			order by cmn.mas_navi_id ASC");
        $result = $query->result_array();
		echo json_encode($result);

	}

	function addNavigation()
    {
    	 date_default_timezone_set('Asia/Colombo');
         $mas_compmdls_id = $_POST['mas_compmdls_id'];
		 $mas_navi_name = $_POST['mas_navi_name'];
		 $mas_navi_controller = $_POST['mas_navi_controller'];
		 $mas_navi_description = $_POST['mas_navi_description'];
		 $mas_navi_status = $_POST['mas_navi_status'];
		 $mas_navi_subenable = $_POST['mas_navi_subenable'];
		 $mas_navi_createdby = $_SESSION['mas_user_id'];
		 

		$data12 = array(
			'mas_compmdls_id' => $mas_compmdls_id,
			'mas_navi_name' => $mas_navi_name,
			'mas_navi_controller' => $mas_navi_controller,
			'mas_navi_description' => $mas_navi_description,
			'mas_navi_status' => $mas_navi_status,
			'mas_navi_subenable' => $mas_navi_subenable,
			'mas_navi_createdby' => $mas_navi_createdby,
			'mas_navi_createddate' => date('Y-m-d H:i:s')
		);

		$this->db->insert('company_mas_navigation',$data12);
        $insid = $this->db->insert_id();
        // $this->audit_model->audit('Issue Request Page No: '.$irmas_id,'Header');
		echo $insid;
		$this->audit_model->usertrack('Navigation Page','Navigation Header New');
        
		
    }

    function removeNavigation(){
        $mas_navi_id = $_POST['mas_navi_id'];
		$this->db->where('mas_navi_id', $mas_navi_id);
        $this->db->delete('company_mas_navigation');

        echo 'Success';

        $this->audit_model->usertrack('Navigation Page','Remove Navigation');
       
	}


	function getSubNavigationpane(){

		$query = $this->db->query("SELECT cmsn.mas_subnavi_id, cmsn.mas_navi_id, cmsn.mas_subnavi_name, cmsn.mas_subnavi_controller, cmsn.mas_subnavi_status, cmsn.mas_subnavi_description, cmsn.mas_subnavi_subenable, cmn.mas_navi_name
			FROM company_mas_subnavigation as cmsn
			inner join company_mas_navigation as cmn on cmsn.mas_navi_id=cmn.mas_navi_id
			order by cmsn.mas_subnavi_id DESC");
        $result = $query->result_array();
		echo json_encode($result);

	}


	function addSubNavigation()
    {
    	 date_default_timezone_set('Asia/Colombo');
         $mas_navi_id = $_POST['mas_navi_id'];
		 $mas_subnavi_name = $_POST['mas_subnavi_name'];
		 $mas_subnavi_controller = $_POST['mas_subnavi_controller'];
		 $mas_subnavi_description = $_POST['mas_subnavi_description'];
		 $mas_subnavi_status = $_POST['mas_subnavi_status'];
		 $mas_subnavi_subenable = $_POST['mas_subnavi_subenable'];
		 $mas_subnavi_createdby = $_SESSION['mas_user_id'];
		 

		$data12 = array(
			'mas_navi_id' => $mas_navi_id,
			'mas_subnavi_name' => $mas_subnavi_name,
			'mas_subnavi_controller' => $mas_subnavi_controller,
			'mas_subnavi_description' => $mas_subnavi_description,
			'mas_subnavi_status' => $mas_subnavi_status,
			'mas_subnavi_subenable' => $mas_subnavi_subenable,
			'mas_subnavi_createdby' => $mas_subnavi_createdby,
			'mas_subnavi_createddate' => date('Y-m-d H:i:s')
		);

		$this->db->insert('company_mas_subnavigation',$data12);
        $insid = $this->db->insert_id();
        // $this->audit_model->audit('Issue Request Page No: '.$irmas_id,'Header');
		echo $insid;
		$this->audit_model->usertrack('Navigation Page','Sub Navigation Header New');
        
		
    }

    function removeSubNavigation(){
        $mas_subnavi_id = $_POST['mas_subnavi_id'];
		$this->db->where('mas_subnavi_id', $mas_subnavi_id);
        $this->db->delete('company_mas_subnavigation');

        echo 'Success';

        $this->audit_model->usertrack('Navigation Page','Remove Sub Navigation');
       
	}


	function getSubSubNavigationpane(){

		$query = $this->db->query("SELECT cmssn.mas_subsubnavi_id, cmssn.mas_subnavi_id, cmssn.mas_subsubnavi_name, cmssn.mas_subsubnavi_controller, cmssn.mas_subsubnavi_status, cmssn.mas_subsubnavi_description, cmsn.mas_subnavi_name
			FROM company_mas_subsubnavigation as cmssn
			inner join company_mas_subnavigation as cmsn on cmssn.mas_subnavi_id=cmsn.mas_subnavi_id
			order by cmssn.mas_subsubnavi_id DESC");
        $result = $query->result_array();
		echo json_encode($result);

	}


	function addSubSubNavigation()
    {
    	 date_default_timezone_set('Asia/Colombo');
         $mas_subnavi_id = $_POST['mas_subnavi_id'];
		 $mas_subsubnavi_name = $_POST['mas_subsubnavi_name'];
		 $mas_subsubnavi_controller = $_POST['mas_subsubnavi_controller'];
		 $mas_subsubnavi_description = $_POST['mas_subsubnavi_description'];
		 $mas_subsubnavi_status = $_POST['mas_subsubnavi_status'];
		 $mas_subsubnavi_createdby = $_SESSION['mas_user_id'];
		 

		$data12 = array(
			'mas_subnavi_id' => $mas_subnavi_id,
			'mas_subsubnavi_name' => $mas_subsubnavi_name,
			'mas_subsubnavi_controller' => $mas_subsubnavi_controller,
			'mas_subsubnavi_description' => $mas_subsubnavi_description,
			'mas_subsubnavi_status' => $mas_subsubnavi_status,
			'mas_subsubnavi_createdby' => $mas_subsubnavi_createdby,
			'mas_subsubnavi_createddate' => date('Y-m-d H:i:s')
		);

		$this->db->insert('company_mas_subsubnavigation',$data12);
        $insid = $this->db->insert_id();
        // $this->audit_model->audit('Issue Request Page No: '.$irmas_id,'Header');
		echo $insid;
		$this->audit_model->usertrack('Navigation Page','Sub Sub Navigation Header New');
        
		
    }

    function removeSubSubNavigation(){
        $mas_subsubnavi_id = $_POST['mas_subsubnavi_id'];
		$this->db->where('mas_subsubnavi_id', $mas_subsubnavi_id);
        $this->db->delete('company_mas_subsubnavigation');

        echo 'Success';

        $this->audit_model->usertrack('Navigation Page','Remove Sub Sub Navigation');
       
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

    function UpdateNavi()
    {	 
    	date_default_timezone_set('Asia/Colombo');
    	 $mas_navi_id = $_POST['mas_navi_id'];
         $mas_navi_name = $_POST['mas_navi_name'];
		 $mas_navi_controller = $_POST['mas_navi_controller'];
		 $mas_navi_description = $_POST['mas_navi_description'];
		 $mas_navi_updateby = $_SESSION['mas_user_id'];

		$data12 = array(
			'mas_navi_name' => $mas_navi_name,
			'mas_navi_controller' => $mas_navi_controller,
			'mas_navi_description' => $mas_navi_description,
			'mas_navi_updateby' => $mas_navi_updateby,
			'mas_navi_updatedate' => date('Y-m-d H:i:s')
		);

		$this->db->where('mas_navi_id',$mas_navi_id);
		$this->db->update('company_mas_navigation',$data12);
		echo $mas_navi_id;
		$this->audit_model->usertrack('Navigation Page','Navigation Header Update');
		
	}


	function UpdateNaviSub()
    {	 
    	date_default_timezone_set('Asia/Colombo');
    	 $mas_subnavi_id = $_POST['mas_subnavi_id'];
         $mas_subnavi_name = $_POST['mas_subnavi_name'];
		 $mas_subnavi_controller = $_POST['mas_subnavi_controller'];
		 $mas_subnavi_description = $_POST['mas_subnavi_description'];
		 $mas_subnavi_updateby = $_SESSION['mas_user_id'];

		$data12 = array(
			'mas_subnavi_name' => $mas_subnavi_name,
			'mas_subnavi_controller' => $mas_subnavi_controller,
			'mas_subnavi_description' => $mas_subnavi_description,
			'mas_subnavi_updateby' => $mas_subnavi_updateby,
			'mas_subnavi_updatedate' => date('Y-m-d H:i:s')
		);

		$this->db->where('mas_subnavi_id',$mas_subnavi_id);
		$this->db->update('company_mas_subnavigation',$data12);
		echo $mas_subnavi_id;
		$this->audit_model->usertrack('Navigation Page','Sub Navigation Header Update');
		
	}

	function UpdateNaviSubSub()
    {	 
    	date_default_timezone_set('Asia/Colombo');
    	 $mas_subsubnavi_id = $_POST['mas_subsubnavi_id'];
         $mas_subsubnavi_name = $_POST['mas_subsubnavi_name'];
		 $mas_subsubnavi_controller = $_POST['mas_subsubnavi_controller'];
		 $mas_subsubnavi_description = $_POST['mas_subsubnavi_description'];
		 $mas_subsubnavi_updateby = $_SESSION['mas_user_id'];

		$data12 = array(
			'mas_subsubnavi_name' => $mas_subsubnavi_name,
			'mas_subsubnavi_controller' => $mas_subsubnavi_controller,
			'mas_subsubnavi_description' => $mas_subsubnavi_description,
			'mas_subsubnavi_updateby' => $mas_subsubnavi_updateby,
			'mas_subsubnavi_updatedate' => date('Y-m-d H:i:s')
		);

		$this->db->where('mas_subsubnavi_id',$mas_subsubnavi_id);
		$this->db->update('company_mas_subsubnavigation',$data12);
		echo $mas_subsubnavi_id;
		$this->audit_model->usertrack('Navigation Page','Sub Sub Navigation Header Update');
		
	}


}
 ?>