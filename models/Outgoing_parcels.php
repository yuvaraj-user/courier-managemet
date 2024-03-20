<?php
class Outgoing_parcels
{
	public function get_courier_category_query()
	{
		$query = "SELECT id,category FROM cm_courier_category";
		return $query;
	}

	public function get_company_locations_qry()
	{
		$query = "SELECT DISTINCT Plant_Code,Plant_Description FROM PP_PLANT WHERE Plant_Code != ''";
		return $query;
	}

	public function get_emp_master_qry()
	{
		$query = "SELECT Code,FirstName,Status FROM Employee_Master where Status = 'Active'";
		return $query;
	}

	public function get_cop_no_qry()
	{
		$query  = "SELECT TOP 1 op_no from CM_outgoing_parcels group by op_no order by op_no desc";
		return $query;
	}

	public function add_outgoing_parcel_qry($data) 
	{	
		$op_id      		= $data['op_id'];
		$date      			= date('Y-m-d',strtotime($data['date']));
 		$outgoing_type 		= $data['outgoing_type'];
 		$item_type 			= $data['item_type'];
 		$outgoing_purpose 	= $data['outgoing_purpose'];
 		$no_of_items 		= $data['no_of_items'];
 		$service_mode 		= $data['service_mode'];
 		$service_type 		= $data['service_type'];
 		$courier_agent_det 	= $data['courier_agent_det'];
 		$vehicle_det 	    = $data['vehicle_det'];
 		$from_location      = $data['from_location'];
 		$to_location        = $data['to_location'];

		$query  = "INSERT INTO CM_outgoing_parcels (op_no,date,outgoing_type,item_type,outgoing_purpose,no_of_items,service_mode,service_type,service_type_agent,service_type_vehicle,from_location_type,to_location_type,updated_by,status) VALUES"; 

		$query .= "('".$op_id."','".$date."','".$outgoing_type."','".$item_type."','".$outgoing_purpose."','".$no_of_items."','".$service_mode."','".$service_type."','".$courier_agent_det."','".$vehicle_det."','".$from_location."','".$to_location."','RS0000','Created')";
		return $query;
	}	

	public function add_op_from_address_qry($data) 
	{
		$op_id      		= $data['op_id'];
 		$from_employee 		= $data['from_emp_name'];
 		$from_com_plant 	= ($data['from_location'] == 'company') ? $data['from_com_loc'] : '';
 		$from_street1    	= $data['from_street1'];
 		$from_street2 		= $data['from_street2'];
 		$from_city  		= $data['from_city'];
 		$from_state 		= $data['from_state'];
 		$from_country   	= $data['from_country'];
 		$from_pincode 	    = $data['from_pincode'];
 		$from_phone      	= $data['from_phone'];

		$query  = "INSERT INTO CM_outgoing_parcels_from_address (op_no,from_employee,from_company_plant_id,street1,street2,city,state,country,pincode,phone_no) VALUES"; 

		$query .= "('".$op_id."','".$from_employee."','".$from_com_plant."','".$from_street1."','".$from_street2."','".$from_city."','".$from_state."','".$from_country."','".$from_pincode."','".$from_phone."')";
		return $query;
	}

	public function add_op_to_address_qry($data) 
	{
		$op_id      		= $data['op_id'];
 		$to_type 		    = $data['to_type'];
 		$to_employee_code   = ($data['to_type'] == 'employee') ? $data['to_emp_name'] : '';
 		$to_customer_name   = ($data['to_type'] == 'customer') ? $data['to_customer_name'] : '';
 		$to_vendor_name     = ($data['to_type'] == 'vendor') ? $data['to_vendor_name'] : '';
 		$to_govt_details    = ($data['to_type'] == 'govt') ? $data['to_govt_det'] : '';
 		$to_other_details   = ($data['to_type'] == 'others') ? $data['to_other_det'] : '';
 		$to_com_loc 		= ($data['to_location'] == 'company') ? $data['to_com_loc'] : '';
 		$to_street1    	    = $data['to_street1'];
 		$to_street2 		= $data['to_street2'];
 		$to_city    		= $data['to_city'];
 		$to_state	 		= $data['to_state'];
 		$to_country		   	= $data['to_country'];
 		$to_pincode	 	    = $data['to_pincode'];
 		$to_phone	      	= $data['to_phone'];

		$query  = "INSERT INTO CM_outgoing_parcels_to_address (op_no,to_type,to_employee_code,to_customer_name,to_vendor_name,to_govt_details,to_other_details,to_company_plant_id,street1,street2,city,state,country,pincode,phone_no) VALUES"; 

		$query .= "('".$op_id."','".$to_type."','".$to_employee_code."','".$to_customer_name."','".$to_vendor_name."','".$to_govt_details."','".$to_other_details."','".$to_com_loc."','".$to_street1."','".$to_street2."','".$to_city."','".$to_state."','".$to_country."','".$to_pincode."','".$to_phone."')";
		return $query;
	}

	public function get_op_list_qry()
	{
		$query  = "SELECT op_no,FORMAT(date,'dd-MM-yyyy') as date,outgoing_type,item_type,no_of_items,status FROM CM_outgoing_parcels order by op_no";
		return $query;
	}

	public function get_op_count()
	{
		$result        = array();
		$query   = "SELECT count(*) as total_count from (select op_no from CM_outgoing_parcels group by op_no) as total"; 

		$count_details = sqlsrv_query($this->conn,$query);
		$result        = sqlsrv_fetch_array($count_details,SQLSRV_FETCH_ASSOC)['total_count'];

		return $result;
	}

	public function get_ip_count($status)
	{
		$result   = array();
		$query    = "SELECT count(*) as total_count from (select ip_no from CM_incoming_parcels"; 

		if($status != 'all') {
			$query .= " WHERE status = '".$status."'";
		}

		$query .= " group by ip_no) as total";
		$count_details = sqlsrv_query($this->conn,$query);
		$result        = sqlsrv_fetch_array($count_details,SQLSRV_FETCH_ASSOC)['total_count'];

		return $result;
	}


}
