<?php
/**
*
*/
class Audit_model extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function audit($function_name, $status)
	{	
		date_default_timezone_set('Asia/Colombo');
		$now = date('Y-m-d H:i:s');
		$data = array(
			'function_name' => $function_name,
			'created_dateTime' => $now,
			'created_by' => $_SESSION['mas_user_id'],
			'status' => $status
		);
		$this->db->insert('audit_trail',$data);
	}

	function usertrack($function_name, $status)
	{
		date_default_timezone_set('Asia/Colombo');
		$now = date('Y-m-d H:i:s');
		$data = array(
			'mas_usertrack_function' => $function_name,
			'mas_usertrack_datetime' => $now,
			'mas_usertrack_userid' => $_SESSION['mas_user_id'],
			'mas_usertrack_status' => $status
		);
		$this->db->insert('company_mas_usertrack',$data);
	}
}
?>