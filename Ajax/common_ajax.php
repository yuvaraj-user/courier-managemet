<?php
include '../../auto_load.php';	
include '../controllers/Outgoing_parcels_controller.php';
include '../controllers/Incoming_parcels_controller.php';

$out_parcels = new Outgoing_parcels_controller($conn);
$in_parcels  = new Incoming_parcels_controller($conn);


if(isset($_POST) && isset($_POST['Action'])) {
	if($_POST['Action'] == 'add_outgoing_parcel') {
		$add_out_parcel = $out_parcels->add_outgoing_parcel($_POST);
		echo json_encode($add_out_parcel);exit;	
	} elseif($_POST['Action'] == 'add_incoming_parcel') {
		$add_income_parcel = $in_parcels->add_income_parcel($_POST);
		echo json_encode($add_income_parcel);exit;	
	}

} elseif (isset($_GET) && isset($_GET['Action'])) {
	if($_GET['Action'] == 'get_courier_category') {
		$categories = $out_parcels->get_courier_category();
		echo json_encode($categories);exit;	
	} elseif($_GET['Action'] ==  'get_company_locations') {
		$company_locations = $out_parcels->get_company_locations();
		echo json_encode($company_locations);exit;	
	} elseif($_GET['Action'] ==  'get_emp_master') {
		$emp_details = $out_parcels->get_emp_master();
		echo json_encode($emp_details);exit;	
	} elseif($_GET['Action'] ==  'get_outgoing_parcel_no') {
		$op_no = $out_parcels->get_cop_no();
		echo json_encode($op_no);exit;	
	} elseif($_GET['Action'] ==  'get_op_list') {
		$op_list = $out_parcels->get_op_list();
		echo json_encode($op_list);exit;	
	} elseif($_GET['Action'] ==  'get_all_op_no') {
		$all_op_nos = $in_parcels->get_all_op_no();
		echo json_encode($all_op_nos);exit;	
	} elseif($_GET['Action'] ==  'get_op_detail') {
		$op_detail = $in_parcels->get_op_detail($_GET);
		echo json_encode($op_detail);exit;	
	} elseif($_GET['Action'] ==  'get_incoming_parcel_no') {
		$ip_no = $in_parcels->get_cip_no();
		echo json_encode($ip_no);exit;	
	} elseif($_GET['Action'] ==  'get_ip_list') {
		$ip_list = $in_parcels->get_ip_list();
		echo json_encode($ip_list);exit;	
	} elseif($_GET['Action'] ==  'get_ip_detail') {
		$ip_detail = $in_parcels->get_ip_detail($_GET);
		echo json_encode($ip_detail);exit;	
	} elseif($_GET['Action'] ==  'get_dashboard_details') {
		$dashboard_data = $out_parcels->get_dashboard_details($_GET);
		echo json_encode($dashboard_data);exit;	
	}  


}
	

?>