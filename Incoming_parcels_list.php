<?php include('partials/header.php') ?>

<body>
	<div class="wrapper">
		<?php include('partials/sidebar.php') ?>

		<div class="main">
			<?php include('partials/navbar.php') ?>

			<main class="content">
				<div class="modal fade zoom" id="outgoing_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title fw-bold" id="exampleModalLabel">Parcel Details</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<h5 class="text-primary fw-bold">Parcel Basic Details</h5>
								<table class="table table-striped table-bordered table-hover">
									<thead class="text-center text-dark">
										<tr>
											<th scope="col">OP ID</th>
											<th scope="col">Date</th>
											<th scope="col">Outgoing Type</th>
											<th scope="col">Item Type</th>
											<th scope="col">Outgoing Purpose</th>                              
											<th scope="col">No Of Items</th>                              
											<th scope="col">Mode of service</th>                              
											<th scope="col">Service type</th>                              
											<th scope="col">Service type Agent</th>
											<th scope="col">Service type Vehicle</th>
											<th scope="col">To Whom</th>
										</tr>
									</thead>
									<tbody id="parcel_basic_tbody">

									</tbody>
								</table>

								<h5 class="text-primary fw-bold">From Address</h5>
								<table class="table table-striped table-bordered table-hover">
									<thead class="text-center text-dark">
										<tr>
											<th scope="col">From Location Type</th>
											<th scope="col">From Company Location</th>
											<th scope="col">To Employee</th>
											<th scope="col">Street 1</th>
											<th scope="col">Street 2</th>
											<th scope="col">City</th>                              
											<th scope="col">State</th>                              
											<th scope="col">Country</th>                              
											<th scope="col">Pincode</th>                              
											<th scope="col">Phone No</th>                              

										</tr>
									</thead>
									<tbody id="from_addr_tbody">

									</tbody>
								</table>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<!-- <button type="button" class="btn btn-primary">Sa/ve changes</button> -->
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid p-0">

					<h4 class="mb-3 page-head fw-bold">Incoming Parcels List</h4>

					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="text-end mt-2 mb-3 me-3">
									<a href="Add_incoming_parcels.php">
										<button type="button" class="btn btn-sm btn-rounded btn-primary">                                <i class="fa fa-plus color-info"></i> Add
										</button>
									</a>
								</div>

								<div class="card-body">
									<div class="table-responsive">
										<table id="example" class="table table-bordered table-striped table-responsive-sm">
											<thead class="text-center">
												<tr>
													<th class="text-center">Sno</th>
													<th class="text-center">IP ID</th>
													<th class="text-center">Date</th>
													<th class="text-center">Incoming Type</th>
													<th class="text-center">Item Type</th>
													<th class="text-center">No Of Items</th>
													<th class="text-center">Status</th>
												</tr>
											</thead>
											<tbody id="incoming_parcels_list_tbody" class="cursor-pointer">
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /# card -->
						</div>
					</div>
				</div>
			</main>

			<?php include('partials/footer.php') ?>
			<?php include('partials/bottom_script.php') ?>

		</div>
	</div>

	<script src="js/app.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			get_ip_list();
		});

		function get_ip_list() 
		{
			$.ajax({
				type: "GET",
				url: "Ajax/common_ajax.php",
				data: {
					"Action": "get_ip_list",
				},
				dataType:"json",
				success: function(result) {
					var html = '';
					for(i in result) {
						html += `<tr class="info" data-ipid="${ result[i].ip_no }">
						<td class="text-dark text-center">${ parseInt(i) + parseInt(1) }</td>
						<td class="text-dark text-center">${ result[i].ip_no }</td>
						<td class="text-dark text-center">${ result[i].date }</td>
						<td class="text-dark text-center">${ (result[0].incoming_type == 'returnable') ? "Returnable" : "Non-Returnable" }</td>
						<td class="text-dark text-center capitalize">${ result[i].item_type }</td>
						<td class="text-dark text-center">${ result[i].no_of_items }</td>`;
						if(result[i].status == 'Entered') {
							html += `<td class="text-dark text-center"><span class="badge bg-primary" style="width: 57px;">${ result[i].status }<span></td>`;
						} else if(result[i].status == 'Received') {
							html += `<td class="text-dark text-center"><span class="badge bg-success">${ result[i].status }<span></td>`;
						}

						html += `</tr>`;
					}
					$('#incoming_parcels_list_tbody').html(html);
					$('#example').DataTable({
						pageLength:10,
						paging:true 
					});
				}
			});

		}

		$(document).on('click','.info',function(){
			var ip_no = $(this).data('ipid');
			$.ajax({
				type: "GET",
				url: "Ajax/common_ajax.php",
				data: {
					"Action": "get_ip_detail",
					"ip_no": ip_no
				},
				dataType:"json",
				success: function(result) {
					var parcel_base_html = '';
					var from_addr_html = '';
					var to_addr_html = '';
					parcel_base_html += `<tr>
					<td class="text-dark text-center">${ result[0].ip_no }</td>
					<td class="text-dark text-center">${ result[0].income_parcel_date }</td>
					<td class="text-dark text-center">${ (result[0].incoming_type == 'returnable') ? "Returnable" : "Non-Returnable" }</td>
					<td class="text-dark text-center capitalize">${ result[0].item_type }</td>
					<td class="text-dark text-center">${ result[0].category }</td>
					<td class="text-dark text-center">${ result[0].no_of_items }</td>
					<td class="text-dark text-center">${ result[0].service_mode }</td>
					<td class="text-dark text-center">${ result[0].service_type }</td>
					<td class="text-dark text-center">${ result[0].service_type_agent }</td>
					<td class="text-dark text-center">${ result[0].service_type_vehicle }</td>
					<td class="text-dark text-center">${ result[0].to_employee_name }</td>
					</tr>`;

					from_addr_html += `<tr>
					<td class="text-dark text-center capitalize">${ result[0].from_location_type }</td>
					<td class="text-dark text-center">${ result[0].From_Plant_Description }</td>
					<td class="text-dark text-center">${ result[0].from_employee_name }</td>
					<td class="text-dark text-center">${ result[0].from_street1 }</td>
					<td class="text-dark text-center">${ result[0].from_street2 }</td>
					<td class="text-dark text-center">${ result[0].from_city }</td>
					<td class="text-dark text-center">${ result[0].from_state }</td>
					<td class="text-dark text-center">${ result[0].from_country }</td>
					<td class="text-dark text-center">${ result[0].from_pincode }</td>
					<td class="text-dark text-center">${ result[0].from_phone_no }</td>
					</tr>`;

					$('#from_addr_tbody').html(from_addr_html);
					// $('#to_addr_tbody').html(to_addr_html);
					$('#parcel_basic_tbody').html(parcel_base_html);	
					$('#outgoing_info').modal('show');
				}
			});

		});
	</script>