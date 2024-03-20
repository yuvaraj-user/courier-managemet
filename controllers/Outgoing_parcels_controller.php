<?php
include('../models/Outgoing_parcels.php');
class Outgoing_parcels_controller extends Outgoing_parcels
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

	public function get_cop_no() 
	{
		$result       = array();
		$query 		  = $this->get_cop_no_qry();
		$cop_no       = sqlsrv_query($this->conn,$query);
		$result       = sqlsrv_fetch_array($cop_no,SQLSRV_FETCH_ASSOC);
		return ($result['op_no'] != null) ? $result['op_no'] : 0;
	}

	public function add_outgoing_parcel($request)
	{
		parse_str($request['data'],$data);

 		$query 				 = $this->add_outgoing_parcel_qry($data);

 		$parcel_base_creation = sqlsrv_query($this->conn,$query);

 		if($parcel_base_creation) {

 			$from_addr_qry = $this->add_op_from_address_qry($data);

 			$from_addr_creation = sqlsrv_query($this->conn,$from_addr_qry);

 			$to_addr_qry = $this->add_op_to_address_qry($data);

 			$to_addr_creation = sqlsrv_query($this->conn,$to_addr_qry); 			


	 		if($from_addr_creation === false || $to_addr_creation === false) {
	 			$response['status'] = 500;
	 			$response['msg'] = "Server error.";
	 			print_r(sqlsrv_errors());exit;
	 		} else {
	 			$response['status'] = 200;
	 			$response['msg'] = "Outgoing parcel added successfully.";
	 		}
 		} else {
 			$response['status'] = 500;
	 		$response['msg'] = "Server error.";
	 		print_r(sqlsrv_errors());exit;
 		}


 		return $response; 
	}

	public function get_op_list()
	{
		$query = $this->get_op_list_qry();
		return $this->get_result($query);
	}

	public function get_dashboard_details()
	{
		$result['op_count']      = $this->get_op_count();
		$result['ip_count']      = $this->get_ip_count('all');
		$result['rn_ip_count']   = $this->get_ip_count('Received');
		$result['nrn_ip_count']  = $this->get_ip_count('Entered');

		return $result;
	}

}