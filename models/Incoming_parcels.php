<?php
class Incoming_parcels
{
	public function add_incoming_parcel_qry($data) 
	{	
		$ip_id      		= $data['ip_id'];
		$date      			= date('Y-m-d',strtotime($data['date']));
 		$incoming_type 		= $data['incoming_type'];
 		$incoming_agst_op_no = (isset($data['op_id'])) ? $data['op_id'] : '';
 		$item_type 			= $data['item_type'];
 		$incoming_purpose 	= $data['incoming_purpose'];
 		$no_of_items 		= $data['no_of_items'];
 		$service_mode 		= $data['service_mode'];
 		$service_type 		= $data['service_type'];
 		$courier_agent_det 	= $data['courier_agent_det'];
 		$vehicle_det 	    = $data['vehicle_det'];
 		$from_location      = $data['from_location'];
 		$to_whom	        = $data['to_emp_name'];
 		$status             = (isset($data['op_id']) && !empty($data['op_id'])) ? 'Received' : 'Entered';

		$query  = "INSERT INTO CM_incoming_parcels (ip_no,date,incoming_type,incoming_agst_op_no,item_type,incoming_purpose,no_of_items,service_mode,service_type,service_type_agent,service_type_vehicle,from_location_type,to_whom,updated_by,status) VALUES"; 

		$query .= "('".$ip_id."','".$date."','".$incoming_type."','".$incoming_agst_op_no."','".$item_type."','".$incoming_purpose."','".$no_of_items."','".$service_mode."','".$service_type."','".$courier_agent_det."','".$vehicle_det."','".$from_location."','".$to_whom."','RS0000','".$status."')";
		return $query;
	}	

	public function add_ip_from_address_qry($data) 
	{
		$ip_id      		= $data['ip_id'];
 		$from_employee 		= $data['from_emp_name'];
 		$from_com_plant 	= ($data['from_location'] == 'company') ? $data['from_com_loc'] : '';
 		$from_street1    	= $data['from_street1'];
 		$from_street2 		= $data['from_street2'];
 		$from_city  		= $data['from_city'];
 		$from_state 		= $data['from_state'];
 		$from_country   	= $data['from_country'];
 		$from_pincode 	    = $data['from_pincode'];
 		$from_phone      	= $data['from_phone'];

		$query  = "INSERT INTO CM_incoming_parcels_from_address (ip_no,from_employee,from_company_plant_id,street1,street2,city,state,country,pincode,phone_no) VALUES"; 

		$query .= "('".$ip_id."','".$from_employee."','".$from_com_plant."','".$from_street1."','".$from_street2."','".$from_city."','".$from_state."','".$from_country."','".$from_pincode."','".$from_phone."')";
		return $query;
	}

	// public function add_op_to_address_qry($data) 
	// {
	// 	$op_id      		= $data['op_id'];
 	// 	$to_type 		    = $data['to_type'];
 	// 	$to_employee_code   = ($data['to_type'] == 'employee') ? $data['to_emp_name'] : '';
 	// 	$to_customer_name   = ($data['to_type'] == 'customer') ? $data['to_customer_name'] : '';
 	// 	$to_vendor_name     = ($data['to_type'] == 'vendor') ? $data['to_vendor_name'] : '';
 	// 	$to_govt_details    = ($data['to_type'] == 'govt') ? $data['to_govt_det'] : '';
 	// 	$to_other_details   = ($data['to_type'] == 'others') ? $data['to_other_det'] : '';
 	// 	$to_com_loc 		= ($data['to_location'] == 'company') ? $data['to_com_loc'] : '';
 	// 	$to_street1    	    = $data['to_street1'];
 	// 	$to_street2 		= $data['to_street2'];
 	// 	$to_city    		= $data['to_city'];
 	// 	$to_state	 		= $data['to_state'];
 	// 	$to_country		   	= $data['to_country'];
 	// 	$to_pincode	 	    = $data['to_pincode'];
 	// 	$to_phone	      	= $data['to_phone'];

	// 	$query  = "INSERT INTO CM_outgoing_parcels_to_address (op_no,to_type,to_employee_code,to_customer_name,to_vendor_name,to_govt_details,to_other_details,to_company_plant_id,street1,street2,city,state,country,pincode,phone_no) VALUES"; 

	// 	$query .= "('".$op_id."','".$to_type."','".$to_employee_code."','".$to_customer_name."','".$to_vendor_name."','".$to_govt_details."','".$to_other_details."','".$to_com_loc."','".$to_street1."','".$to_street2."','".$to_city."','".$to_state."','".$to_country."','".$to_pincode."','".$to_phone."')";
	// 	return $query;
	// }

	public function get_ip_list_qry()
	{
		$query  = "SELECT ip_no,FORMAT(date,'dd-MM-yyyy') as date,incoming_type,item_type,no_of_items,status FROM CM_incoming_parcels order by ip_no";
		return $query;
	}

	public function get_all_op_no_qry()
	{
		$query  = "SELECT DISTINCT op_no FROM CM_outgoing_parcels order by op_no";
		return $query;
	}

	public function get_op_detail_qry($request)
	{
		$query  = "SELECT CM_outgoing_parcels.*,FORMAT(CM_outgoing_parcels.date,'dd-MM-yyyy') as out_parcel_date,faddress.from_employee,faddress.from_company_plant_id,faddress.street1 as from_street1,
		faddress.street2 as from_street2,faddress.city as from_city,faddress.state as from_state,faddress.country as from_country
		,faddress.pincode as from_pincode,faddress.phone_no as from_phone_no
		,taddress.to_type,taddress.to_employee_code,taddress.to_customer_name,taddress.to_vendor_name,taddress.to_govt_details
		,taddress.to_other_details,taddress.to_company_plant_id,taddress.street1 as to_street1,
		taddress.street2 as to_street2,taddress.city as to_city,taddress.state as to_state,taddress.country as to_country
		,taddress.pincode as to_pincode,taddress.phone_no as to_phone_no,category.category,emp_master1.FirstName as from_employee_name,
		emp_master2.FirstName as to_employee_name,pp_plant1.Plant_Description as From_Plant_Description,
		pp_plant2.Plant_Description as To_Plant_Description
		FROM CM_outgoing_parcels 
		INNER JOIN CM_outgoing_parcels_from_address as faddress on CM_outgoing_parcels.op_no = faddress.op_no 
		INNER JOIN CM_outgoing_parcels_to_address as taddress on CM_outgoing_parcels.op_no = taddress.op_no 
		LEFT JOIN CM_courier_category as category on CM_outgoing_parcels.outgoing_purpose = category.id
		LEFT JOIN Employee_Master as emp_master1 on faddress.from_employee = emp_master1.Code
		LEFT JOIN Employee_Master as emp_master2 on taddress.to_employee_code = emp_master2.Code
		LEFT JOIN pp_plant as pp_plant1 on faddress.from_company_plant_id = pp_plant1.Plant_Code
		LEFT JOIN pp_plant as pp_plant2 on taddress.to_company_plant_id = pp_plant2.Plant_Code
		where CM_outgoing_parcels.op_no = '".$request['op_no']."'";
		return $query;	
	}

	public function get_cip_no_qry()
	{
		$query  = "SELECT TOP 1 ip_no from CM_incoming_parcels group by ip_no order by ip_no desc";
		return $query;
	}

	public function get_ip_detail_qry($request)
	{
		$query  = "SELECT CM_incoming_parcels.*,FORMAT(CM_incoming_parcels.date,'dd-MM-yyyy') as income_parcel_date,faddress.from_employee,faddress.from_company_plant_id,faddress.street1 as from_street1,
		faddress.street2 as from_street2,faddress.city as from_city,faddress.state as from_state,faddress.country as from_country
		,faddress.pincode as from_pincode,faddress.phone_no as from_phone_no,
		category.category,emp_master1.FirstName as from_employee_name,
		emp_master2.FirstName as to_employee_name,pp_plant1.Plant_Description as From_Plant_Description
		FROM CM_incoming_parcels 
		INNER JOIN CM_incoming_parcels_from_address as faddress on CM_incoming_parcels.ip_no = faddress.ip_no 
		LEFT JOIN CM_courier_category as category on CM_incoming_parcels.incoming_purpose = category.id
		LEFT JOIN Employee_Master as emp_master1 on faddress.from_employee = emp_master1.Code
		LEFT JOIN Employee_Master as emp_master2 on CM_incoming_parcels.to_whom = emp_master2.Code
		LEFT JOIN pp_plant as pp_plant1 on faddress.from_company_plant_id = pp_plant1.Plant_Code
		where CM_incoming_parcels.ip_no = '".$request['ip_no']."'";
		return $query;	
	}

}
