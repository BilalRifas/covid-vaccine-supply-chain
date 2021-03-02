<?php 
/**
 * 
 */
class Auth_model extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function getCompanyModules(){
		$this->db->select("mas_compmdls_description, mas_compmdls_shtname, mas_compmdls_id");
		$this->db->from('company_mas_companymodules');
		$this->db->order_by("mas_compmdls_order", 'ASC');
		$query = $this->db->get();
		return $query->result();
	}


	function getCatNotify(){
		$query = $this->db->query("SELECT COUNT(hc.head_categorization_status) as cs
				FROM company_mas_status as cms
				INNER JOIN st_head_categorization as hc on cms.mas_status_id=hc.head_categorization_status
				WHERE cms.mas_status_id='1' or cms.mas_status_id='2' or cms.mas_status_id='3' or cms.mas_status_id='4'");
        $result = $query->result_array();
		echo json_encode($result);

	}

	function getTankNotify(){
		$query = $this->db->query("SELECT COUNT(ht.head_tank_status) as ts
				FROM company_mas_status as cms
				INNER JOIN st_head_tank as ht on cms.mas_status_id=ht.head_tank_status
				WHERE cms.mas_status_id='1' or cms.mas_status_id='2' or cms.mas_status_id='3' or cms.mas_status_id='4'");
        $result = $query->result_array();
		echo json_encode($result);

	}

	function getInvoiceNotify(){
		$query = $this->db->query("SELECT COUNT(hi.head_invoice_status) as his
				FROM company_mas_status as cms
				INNER JOIN acc_head_invoice as hi on cms.mas_status_id=hi.head_invoice_status
				WHERE cms.mas_status_id='4'");
        $result = $query->result_array();
		echo json_encode($result);

	}

	function getQuotationNotify(){
		$query = $this->db->query("SELECT COUNT(hq.head_quotation_status) as qs
				FROM company_mas_status as cms
				INNER JOIN acc_head_quotation as hq on cms.mas_status_id=hq.head_quotation_status
				WHERE cms.mas_status_id='4'");
        $result = $query->result_array();
		echo json_encode($result);

	}

	function getStockinHand(){
		$name = $_POST['name'];
		$query = $this->db->query("SELECT dct.det_categorization_id, dct.mas_item_id, dct.mas_vehiclecategory_id, dct.det_categorization_qtyinhand, mi.mas_item_name, mc.mas_maincategory_name, mcs.mas_maincatsub_name, mcss.mas_maincatsubsub_name, mvc.mas_vehiclecategory_name, ht.head_tank_code, ht.head_tank_date
            FROM st_det_categorization dct
            inner JOIN st_mas_item mi ON dct.mas_item_id = mi.mas_item_id
            inner JOIN st_mas_maincategory mc ON dct.mas_maincategory_id = mc.mas_maincategory_id
            inner JOIN st_mas_maincatsub mcs ON dct.mas_maincatsub_id = mcs.mas_maincatsub_id
            inner JOIN st_mas_maincatsubsub mcss ON dct.mas_maincatsubsub_id = mcss.mas_maincatsubsub_id
            inner JOIN st_mas_vehiclecategory mvc ON dct.mas_vehiclecategory_id = mvc.mas_vehiclecategory_id
            inner JOIN st_head_categorization hct ON dct.head_categorization_id = hct.head_categorization_id
            LEFT JOIN st_head_tank ht ON hct.head_tank_id = ht.head_tank_id
            WHERE mvc.mas_vehiclecategory_name LIKE '%".$name."%'
            ORDER BY dct.det_categorization_id DESC");
        $result = $query->result_array();
		echo json_encode($result);

	}


	function getSoldItems(){
		$itemname = $_POST['itemname'];
		$model = $_POST['model'];
		$modelname = $_POST['modelname'];
		$query = $this->db->query("SELECT adi.det_invoice_id, adi.head_invoice_id, adi.det_categorization_id, adi.mas_vehiclecategory_id, mvc.mas_vehiclecategory_name, adi.mas_item_id, mi.mas_item_name, adi.det_invoice_unitprice, adi.det_invoice_qty, adi.det_invoice_amount, adi.det_invoice_tax, mcss.mas_maincatsubsub_name, ahi.head_invoice_date
      FROM acc_det_invoice as adi
      INNER JOIN st_mas_item as mi on adi.mas_item_id=mi.mas_item_id
      INNER JOIN st_mas_vehiclecategory as mvc on adi.mas_vehiclecategory_id=mvc.mas_vehiclecategory_id
      INNER JOIN st_mas_maincatsubsub as mcss on mvc.mas_maincatsubsub_id=mcss.mas_maincatsubsub_id
      INNER JOIN acc_head_invoice as ahi on adi.head_invoice_id=ahi.head_invoice_id
      WHERE mi.mas_item_name LIKE '%".$itemname."%' and mcss.mas_maincatsubsub_name LIKE '%".$model."%' and mvc.mas_vehiclecategory_name LIKE '%".$modelname."%' and ahi.head_invoice_status='7' GROUP BY adi.det_invoice_id ");
        $result = $query->result_array();
		echo json_encode($result);

	}




}
 ?>