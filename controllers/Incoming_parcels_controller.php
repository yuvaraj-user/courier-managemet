<?php
include('../models/Incoming_parcels.php');
class Incoming_parcels_controller extends Incoming_parcels
{
 	public $conn;
	function __construct($conn)
	{
		$this->conn = $conn; 
	}

	public function get_result($query)
	{
		$result     = array();
		$query_res  = sqlsrv_query($this->conn,$query);
		while($row  = sqlsrv_fetch_array($query_res)) {
			$result[] = $row;
		}
		return $result;
	}

	public function get_courier_category()
	{
		$query = $this->get_courier_category_query();
		return $this->get_result($query);
	}

	public function get_company_locations()
	{
		$query = $this->get_company_locations_qry();
		return $this->get_result($query);
	}

	public function get_emp_master()
	{
		$query = $this->get_emp_master_qry();
		return $this->get_result($query);
	}

	public function get_cip_no() 
	{
		$result       = array();
		$query 		  = $this->get_cip_no_qry();
		$cop_no       = sqlsrv_query($this->conn,$query);
		$result       = sqlsrv_fetch_array($cop_no,SQLSRV_FETCH_ASSOC);
		return ($result['ip_no'] != null) ? $result['ip_no'] : 0;
	}

	public function add_income_parcel($request)
	{
		parse_str($request['data'],$data);

 		$query 				 = $this->add_incoming_parcel_qry($data);

 		$parcel_base_creation = sqlsrv_query($this->conn,$query);

 		if($parcel_base_creation) {

 			$from_addr_qry = $this->add_ip_from_address_qry($data);

 			$from_addr_creation = sqlsrv_query($this->conn,$from_addr_qry);
	
	 		if($from_addr_creation === false) {
	 			$response['status'] = 500;
	 			$response['msg'] = "Server error.";
	 			print_r(sqlsrv_errors());exit;
	 		} else {
	 			$response['status'] = 200;
	 			$response['msg'] = "Incoming parcel added successfully.";
	 		}
 		} else {
 			$response['status'] = 500;
	 		$response['msg'] = "Server error.";
	 		print_r(sqlsrv_errors());exit;
 		}


 		return $response; 
	}

	public function get_ip_list()
	{
		$query = $this->get_ip_list_qry();
		return $this->get_result($query);
	}

	public function get_all_op_no()
	{
		$query = $this->get_all_op_no_qry();
		return $this->get_result($query);
	}

	public function get_op_detail($request)
	{
		$query = $this->get_op_detail_qry($request);
		return $this->get_result($query);
	}

	public function get_ip_detail($request)
	{
		$query = $this->get_ip_detail_qry($request);
		return $this->get_result($query);
	}

}