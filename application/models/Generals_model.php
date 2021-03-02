<?php
class Generals_model extends CI_Model
{
	function __construct()
	{
		# code...
		parent::__construct();
	}
    
    
    function lastactivity()
    {
        date_default_timezone_set('Asia/Colombo');
        $data12 = array('mas_user_lastloggedin' => date("Y-m-d H:i:s"));
        $this->db->where('mas_user_id', $_SESSION["mas_user_id"]);
	    $this->db->update('company_mas_user', $data12);
//        $this->db->query("UPDATE gen_mas_user SET mas_user_lastloggedin = NOW() WHERE mas_user_id = '"+$_SESSION["mas_user_id"]+"'");
    }
    
    public function navbar()
    {
        
        $this->db->select("mas_navi_id, mas_navi_name, mas_navi_controller, mas_navi_subenable");
		$this->db->from('company_mas_navigation');
		$this->db->where('mas_navi_status', '1');
        $this->db->where('mas_compmdls_id', $_SESSION['module']);
		// $this->db->order_by('mas_navi_order','ASC');
		$query = $this->db->get();
        return $query->result();
		
    }
    
    public function subnavbar()
    {
        $id = $_POST['id'];
        $this->db->select("company_mas_subnavigation.mas_navi_id, mas_subnavi_id, mas_navi_name, mas_navi_controller, mas_subnavi_name, mas_subnavi_controller, mas_navi_subenable, mas_subnavi_subenable");
        $this->db->from('company_mas_subnavigation');
        $this->db->join('company_mas_navigation', 'company_mas_subnavigation.mas_navi_id=company_mas_navigation.mas_navi_id');
        // $this->db->where('mas_subnavi_status', '1');
        $this->db->where('company_mas_subnavigation.mas_navi_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
		echo json_encode($result);
//        $_SESSION['nav'] = $id;
    }
    
    public function subsubnavbar()
    {
        $id = $_POST['id'];
        $this->db->select("company_mas_subsubnavigation.mas_subnavi_id, mas_subsubnavi_id, mas_subsubnavi_name, mas_subsubnavi_controller, mas_navi_id, mas_subnavi_name");
        $this->db->from('company_mas_subsubnavigation');
        $this->db->join('company_mas_subnavigation', 'company_mas_subsubnavigation.mas_subnavi_id=company_mas_subnavigation.mas_subnavi_id');
        // $this->db->where('mas_subsubnavi_status', '1');
        $this->db->where('company_mas_subsubnavigation.mas_subnavi_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
		echo json_encode($result);
//        $_SESSION['subnav'] = $id;

    }
    
    public function numberTowords($num)
    {

        $ones = array( 
            1 => "one", 
            2 => "two", 
            3 => "three", 
            4 => "four", 
            5 => "five", 
            6 => "six", 
            7 => "seven", 
            8 => "eight", 
            9 => "nine", 
            10 => "ten", 
            11 => "eleven", 
            12 => "twelve", 
            13 => "thirteen", 
            14 => "fourteen", 
            15 => "fifteen", 
            16 => "sixteen", 
            17 => "seventeen", 
            18 => "eighteen", 
            19 => "nineteen" 
        ); 

        $tens = array(
            1 => "ten",
            2 => "twenty", 
            3 => "thirty", 
            4 => "forty", 
            5 => "fifty", 
            6 => "sixty", 
            7 => "seventy", 
            8 => "eighty", 
            9 => "ninety" 
        );

        $hundreds = array( 
            "hundred", 
            "thousand", 
            "million", 
            "billion", 
            "trillion",
            "quadrillion" 
        ); //limit t quadrillion 

        $num = number_format($num,2,".",",");
        $num_arr = explode(".",$num);
        $wholenum = $num_arr[0];
        $decnum = $num_arr[1];
        $whole_arr = array_reverse(explode(",",$wholenum));
        krsort($whole_arr);
        $rettxt = "";
        foreach($whole_arr as $key => $i){
            if($i < 20){
                $rettxt .= $ones[$i];
            }else if($i < 100){
                $rettxt .= $tens[substr($i,0,1)];
                $rettxt .= " ".$ones[substr($i,1,1)];
            }else{
                $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
                $rettxt .= " ".$tens[substr($i,1,1)];
                $rettxt .= " ".$ones[substr($i,2,1)];
            }
            if($key > 0){
                $rettxt .= " ".$hundreds[$key]." ";
            }
        }
        if($decnum > 0){
                $rettxt .= " and ";
            if($decnum < 20){
                $rettxt .= $ones[$decnum];
            }else if($decnum < 100){
                $rettxt .= $tens[substr($decnum,0,1)];
                $rettxt .= " ".$ones[substr($decnum,1,1)];
            }
        }

        return $rettxt;

    }
    
    public function clicktest()
    {
        $_SESSION['navbar'] = $_POST['id'];
        $_SESSION['subnavbar'] = 0;
        $_SESSION['subsubnavbar'] = 0;
    }
    
    public function clicktest1()
    {
        
        $_SESSION['subnavbar'] = $_POST['id'];
        $_SESSION['subsubnavbar'] = 0;
    }
    
    public function clicktest2()
    {
        
        $_SESSION['subsubnavbar'] = $_POST['id'];
    }
    
    public function permissionCheck()
    {
        if($_SESSION['mas_user_username'] == 'Admin' || $_SESSION['mas_user_username'] == 'ADMIN' || $_SESSION['mas_user_username'] == 'admin'){
            
        }else{
            $ida = 0;
            $this->db->select("mas_form_id, mas_form_name");
            $this->db->from('company_mas_form');
            $this->db->where('mas_navi_id', $_SESSION['navbar']);
            $this->db->where('mas_subnavi_id', $_SESSION['subnavbar']);
            $this->db->where('mas_subsubnavi_id', $_SESSION['subsubnavbar']);
            $query = $this->db->get();
            $result = $query->result_array();
            foreach ($result as $key => $value) {
                    $ida = $value['mas_form_id'];
            }
            $this->db->select("COUNT(trn_usergroup_id) as permission");
            $this->db->from('company_trn_usergroup');
            $this->db->where('mas_user_id', $_SESSION['mas_user_id']);
            $this->db->where('mas_form_id', $ida);
            $query = $this->db->get();
            $result1 = $query->result_array();
            foreach ($result1 as $key => $value) {
                    $count = $value['permission'];
            }
            if($count != 1){
    //            echo $count.' '.$ida. ' '.$_SESSION['navbar'].' '.$_SESSION['subnavbar'].' '.$_SESSION['subsubnavbar'];
                redirect("Access");
            }
        }
    }
    
}
?>
