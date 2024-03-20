<?php include('partials/header.php') ?>

<body>
	<div class="wrapper">
		<?php include('partials/sidebar.php') ?>

		<div class="main">
			<?php include('partials/navbar.php') ?>

			<main class="content">
				<div class="container-fluid p-0">

					<h4 class="mb-3 page-head fw-bold">Add Outgoing Parcels</h4>
					<form class="form-sample" id="out_form">

						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<!-- <p class="card-description">
											Personal info
										</p> -->
										<div class="row">
											<div class="form-group col-md-2">
												<label class="col-sm-12 col-form-label fw-bold">OP ID <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<input type="text" class="form-control grey-textbox" id="op_id" name="op_id" readonly required/>
												</div>
											</div>

											<div class="form-group col-md-2">
												<label class="col-sm-12 col-form-label fw-bold">Date <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<input type="text" class="form-control grey-textbox" name="date" value="<?php echo date('d-m-Y'); ?>" readonly required />
												</div>
											</div>

											<div class="form-group col-md-2">
												<label class="col-sm-12 col-form-label fw-bold">Outgoing Type <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<select class="form-control select2" name="outgoing_type" required>
														<option value="">Choose Outgoing Type</option>
														<option value="returnable">Returnable</option>
														<option value="non_returnable">Non-Returnable</option>
													</select>
												</div>
											</div>

											<div class="form-group col-md-2">
												<label class="col-sm-12 col-form-label fw-bold">item Type <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<select class="form-control select2" name="item_type" required>
														<option value="">Choose Item Type</option>
														<option value="letter">Letter</option>
														<option value="box">Box</option>
														<option value="machine">Machine</option>
													</select>
												</div>
											</div>

											<div class="form-group col-md-2">
												<label class="col-sm-12 col-form-label fw-bold">Purpose <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<select class="form-control select2" id="purpose" name="outgoing_purpose" required>
														<option>Choose Purpose</option>
													</select>
												</div>
											</div>

											<div class="form-group col-md-1">
												<label class="col-sm-12 col-form-label fw-bold" style="width: 90px;">No of items <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<input type="number" class="form-control" name="no_of_items" value="1" min="1" required id="no_of_items"/>
												</div>
											</div>

										</div>

										<div class="row mt-3">
											<div class="form-group col-md-2">
												<label class="col-sm-12 col-form-label fw-bold">Mode of service <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<select class="form-control select2" name="service_mode" required>
														<option value="">Choose Service Mode</option>
														<option value="office_vehicle">Office Vehicle</option>
														<option value="rent_vehicle">Rent Vehicle</option>
														<option value="courier_service">Courier Service</option>
													</select>
												</div>
											</div>
											<div class="form-group col-md-2">
												<label class="col-sm-12 col-form-label fw-bold" style="width:192px;">Courier Agent / Vehicle No <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<select class="form-control select2" id="courier_service_type" name="service_type" required>
														<option value="">Choose Service Type</option>
														<option value="courier_agent">Courier agent</option>
														<option value="vehicle">Vehicle</option>
													</select>
												</div>
											</div>

											<div class="form-group col-md-2 dis-none ms-1" id="courier_agent_txt_div">
												<label class="col-sm-10 col-form-label fw-bold" style="width:152px;">courier agent details <span class="text-danger">*</span></label><br>
												<div class="col-sm-12">
													<input type="text" class="form-control" id="courier_agent_det" name="courier_agent_det" value="" placeholder="Enter courier agent details" />
												</div>
											</div>

											<div class="form-group col-md-2 dis-none ms-1" id="vehicle_txt_div">
												<label class="col-sm-10 col-form-label fw-bold">Vehicle details <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<input type="text" class="form-control" id="vehicle_det" name="vehicle_det" value="" placeholder="Enter vehicle details" />
												</div>
											</div>

											<div class="form-group col-md-2">
												<label class="col-sm-10 col-form-label fw-bold ms-1">From Location <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<select class="form-control select2" id="from_location" name="from_location" required>
														<option value="">Choose From Location</option>
														<option value="company">Company</option>
														<option value="other">Other</option>
													</select>
												</div>
											</div>

											<div class="form-group col-md-2">
												<label class="col-sm-10 col-form-label fw-bold">To Location <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<select class="form-control select2" id="to_location" name="to_location" required>
														<option value="">Choose To Location</option>
														<option value="company">Company</option>
														<option value="other">Other</option>
													</select>
												</div>
											</div>

											
											<div class="form-group col-md-2">
												<label class="col-sm-10 col-form-label fw-bold">From <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<select class="form-control select2" name="from_emp_name" required id="from_emp_name">
													</select>
												</div>
											</div>

											<div class="form-group col-md-2">
												<label class="col-sm-10 col-form-label fw-bold">To Type <span class="text-danger">*</span></label>
												<div class="col-sm-12">
													<select class="form-control select2" id="to_type" name="to_type" required>
														<option value="">Choose To Type</option>
														<option value="employee">Employee</option>
														<option value="customer">Customer</option>
														<option value="vendor">Vendor</option>
														<option value="govt">Govt</option>
														<option value="others">Others</option>
													</select>
												</div>
											</div>

											<div class="form-group col-md-2 dis-none" id="to_emp_div">
												<label class="col-sm-10 col-form-label fw-bold">To <span class="text-danger">*</span></label>
												<div class="col-sm-12 dis-none" id="to_emp_select_div">
													<select class="form-control select2" name="to_emp_name" id="to_emp_name">
													</select>
												</div>

												<div class="col-sm-12 dis-none" id="to_emp_custom_div">
													<input type="text" class="form-control" value="" id="to_txt_box" placeholder="Enter vehicle details" style="width: 300px;" />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="card card-bg">
								<div class="card-body">
									<div class="row">

										<div class="col-md-6">
											<div class="card">
												<div class="card-body">
													<p class="card-description fw-bold">
														From Address
													</p>
													<div class="form-group col-md-12 d-flex mb-3 d-none" id="from_com_locations_div">
														<label class="form-label fw-bold">Company Locations <span class="text-danger">*</span></label>
														<div class="col-sm-12" style="margin-left: 10px;">
															<select class="form-control select2" name="from_com_loc" id="from_com_loc" data-width="84%">
																<option value="">Choose Company Location</option>
															</select>
														</div>
													</div>
													<div class="form-group col-md-12 d-flex">
														<label class="form-label fw-bold">Street 1 <span class="text-danger">*</span></label>
														<div class="col-sm-10" style="margin-left: 16px !important;">
															<input type="text" class="form-control" name="from_street1" required/>
														</div>
													</div>
													<div class="form-group col-md-12 d-flex mt-3">
														<label class="form-label fw-bold">Street 2</label>
														<div class="col-sm-10" style="margin-left: 27px !important;">
															<input type="text" class="form-control" name="from_street2"/>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-12 d-flex mt-3">
															<label class="form-label fw-bold">City <span class="text-danger">*</span></label>
															<div class="col-sm-10" style="margin-left: 42px !important;">
																<input type="text" class="form-control" name="from_city" required/>
															</div>
														</div>
														<div class="form-group col-md-12 d-flex mt-3">
															<label class="form-label fw-bold">State <span class="text-danger">*</span></label>
															<div class="col-sm-10" style="margin-left: 35px !important;">
																<input type="text" class="form-control" name="from_state" required/>
															</div>
														</div>
													</div>
													<div class="form-group col-md-12 d-flex mt-3">
														<label class="form-label fw-bold">Country <span class="text-danger">*</span></label>
														<div class="col-sm-10" style="margin-left: 18px !important;">
															<input type="text" class="form-control" name="from_country" required/>
														</div>
													</div>
													<div class="form-group col-md-12 d-flex mt-3">
														<label class="form-label fw-bold">Pincode <span class="text-danger">*</span></label>
														<div class="col-sm-10" style="margin-left: 18px !important;">
															<input type="text" class="form-control" name="from_pincode" maxlength="6" required onkeypress="return /[0-9]/i.test(event.key)" onpaste="return false;"/>
														</div>
													</div>
													<div class="form-group col-md-12 d-flex mt-3">
														<label class="form-label fw-bold">Phone No <span class="text-danger">*</span></label>
														<div class="col-sm-10" style="margin-left: 8px !important;">
															<input type="text" class="form-control" name="from_phone" maxlength="10" required onkeypress="return /[0-9]/i.test(event.key)" onpaste="return false;"/>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="card">
												<div class="card-body">
													<p class="card-description fw-bold">
														To Address
													</p>
													<div class="form-group col-md-12 d-flex mb-3 d-none" id="to_com_locations_div">
														<label class="form-label fw-bold">Company Locations <span class="text-danger">*</span></label>
														<div class="col-sm-12" style="margin-left: 10px;">
															<select class="form-control select2" name="to_com_loc" id="to_com_loc" data-width="84%">
																<option value="">Choose Company Location</option>
															</select>
														</div>
													</div>
													<div class="form-group col-md-12 d-flex">
														<label class="form-label fw-bold">Street 1 <span class="text-danger">*</span></label>
														<div class="col-sm-10" style="margin-left: 16px;">
															<input type="text" class="form-control" required name="to_street1" />
														</div>
													</div>
													<div class="form-group col-md-12 d-flex mt-3">
														<label class="form-label fw-bold">Street 2</label>
														<div class="col-sm-10" style="margin-left: 27px;">
															<input type="text" class="form-control" required name="to_street2" />
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-12 d-flex mt-3">
															<label class="form-label fw-bold">City <span class="text-danger">*</span></label>
															<div class="col-sm-10" style="margin-left: 42px !important;">
																<input type="text" class="form-control" required name="to_city" />
															</div>
														</div>
														<div class="form-group col-md-12 d-flex mt-3">
															<label class="form-label fw-bold">State <span class="text-danger">*</span></label>
															<div class="col-sm-10" style="margin-left: 35px !important;">
																<input type="text" class="form-control" required name="to_state" />
															</div>
														</div>
													</div>
													<div class="form-group col-md-12 d-flex mt-3">
														<label class="form-label fw-bold">Country <span class="text-danger">*</span></label>
														<div class="col-sm-10" style="margin-left: 18px !important;">
															<input type="text" class="form-control" required name="to_country" />
														</div>
													</div>
													<div class="form-group col-md-12 d-flex mt-3">
														<label class="form-label fw-bold">Pincode <span class="text-danger">*</span></label>
														<div class="col-sm-10" style="margin-left: 18px !important;">
															<input type="text" class="form-control" required name="to_pincode" onkeypress="return /[0-9]/i.test(event.key)" maxlength="6" onpaste="return false;"/>
														</div>
													</div>
													<div class="form-group col-md-12 d-flex mt-3">
														<label class="form-label fw-bold">Phone No <span class="text-danger">*</span></label>
														<div class="col-sm-10" style="margin-left: 8px !important;">
															<input type="text" class="form-control" required name="to_phone" onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" onpaste="return false;"/>
														</div>
													</div>

												</div>
											</div>
										</div>

										<div class="d-flex justify-content-end">
											<button class="btn btn-primary" type="submit">Submit</button>
										</div>
									</div>

								</div>
							</div>
						</div>

					</form>


					

				</div>
			</main>

			<?php include('partials/footer.php') ?>
			<?php include('partials/bottom_script.php') ?>

		</div>
	</div>

	<script src="js/app.js"></script>
	<script>
		function Alert_Msg(Msg,text,Type){
			swal({
				title: Msg,
				icon: Type,
				text: text,
			});
		}

		$(document).ready(function() {
			$('.select2').select2();
			get_courier_category();
			get_company_location();
			get_emp_master();
			get_outgoing_parcel_no();
		});

		function get_courier_category() 
		{
			$.ajax({
				type: "GET",
				url: "Ajax/common_ajax.php",
				data: {
					"Action": "get_courier_category",
				},
				dataType:"json",
				success: function(result) {
					var option = '<option value="">Choose Purpose</option>';
					if(result.length > 0) {
						for(i in result) {
							option += `<option value="${ result[i].id }">${ result[i].category }</option>`; 
						}
					}
					$('#purpose').select2('destroy');
					$('#purpose').html(option);
					$('#purpose').select2();

				}
			});

		}

		function get_company_location() 
		{
			$.ajax({
				type: "GET",
				url: "Ajax/common_ajax.php",
				data: {
					"Action": "get_company_locations",
				},
				dataType:"json",
				success: function(result) {
					var option = '<option value="">Choose Company Locations</option>';
					if(result.length > 0) {
						for(i in result) {
							option += `<option value="${ result[i].Plant_Code }">${ result[i].Plant_Code }- ${ result[i].Plant_Description }</option>`; 
						}
					}
					$('#from_com_loc').select2('destroy');
					$('#from_com_loc').html(option);
					$('#from_com_loc').select2();

					$('#to_com_loc').select2('destroy');
					$('#to_com_loc').html(option);
					$('#to_com_loc').select2();

				}
			});

		}

		function get_emp_master() 
		{
			$.ajax({
				type: "GET",
				url: "Ajax/common_ajax.php",
				data: {
					"Action": "get_emp_master",
				},
				dataType:"json",
				success: function(result) {
					var option = '<option value="">Choose Employee</option>';
					if(result.length > 0) {
						for(i in result) {
							option += `<option value="${ result[i].Code }">${ result[i].FirstName }</option>`; 
						}
					}

					$('#from_emp_name').select2('destroy');
					$('#from_emp_name').html(option);
					$('#from_emp_name').select2();

					$('#to_emp_name').select2('destroy');
					$('#to_emp_name').html(option);
					$('#to_emp_name').select2();

				}
			});

		}

		function get_outgoing_parcel_no()
		{
			$.ajax({
				type: "GET",
				url: "ajax/common_ajax.php",
				data: {
					"Action": "get_outgoing_parcel_no",
				},
				dataType:"json",
				success: function(result) {
					result = (result == 0) ? 0 : result.split('-')[1];
					var cop_no = parseInt(result) + parseInt(1);
					console.log(result);
					final_cop_no = cop_no.toString().padStart(6,'0');
					$('#op_id').val('COP-'+final_cop_no);
				}
			});
		}

		$(document).on('change','#courier_service_type',function(){
			var service = $(this).val();
			$('#courier_agent_txt_div').hide();
			$('#vehicle_txt_div').hide();
			if(service == 'courier_agent') {
				$('#courier_agent_txt_div').show();
			} else if(service == 'vehicle') {
				$('#vehicle_txt_div').show();
			}
		});

		$(document).on('change','#from_location',function(){
			var value = $(this).val();
			if(value == 'company') {
				$("#from_com_locations_div").removeClass('d-none');
			} else  {
				$("#from_com_locations_div").addClass('d-none');
			}
		});

		$(document).on('change','#to_location',function(){
			var value = $(this).val();
			if(value == 'company') {
				$("#to_com_locations_div").removeClass('d-none');
			} else {
				$("#to_com_locations_div").addClass('d-none');
			}
		});

		$(document).on('change','#to_type',function(){
			var to_type = $(this).val();
			$('#to_emp_div').hide();
			if(to_type == 'employee') {
				$('#to_emp_custom_div').hide();
				$('#to_emp_select_div').show();
				$('#to_emp_div').show();
			} else if(to_type != 'employee' && to_type != '') {
				$('#to_emp_select_div').hide();
				$('#to_emp_custom_div').show();
				if(to_type == 'customer') {
					$('#to_txt_box').attr('placeholder','Enter Customer Name');
					$('#to_txt_box').attr('name','to_customer_name');
				} else if(to_type == 'vendor') {
					$('#to_txt_box').attr('placeholder','Enter Vendor Name');
					$('#to_txt_box').attr('name','to_vendor_name');
				} else if(to_type == 'govt') {
					$('#to_txt_box').attr('placeholder','Enter Govt Details');
					$('#to_txt_box').attr('name','to_govt_det');
				} else if(to_type == 'others') {
					$('#to_txt_box').attr('placeholder','Enter Other Details');
					$('#to_txt_box').attr('name','to_other_det');
				}
				$('#to_emp_div').show();

			}
		});

		$(document).on('submit','#out_form',function(e){
			e.preventDefault();
			var from_location = $('#from_location').val();
			var to_location   = $('#to_location').val();

			var from_company_location = $('#from_com_loc').val();
			var to_company_location   = $('#to_com_loc').val();

			var courier_service_type = $('#courier_service_type').val();
			var courier_agent_det    = $('#courier_agent_det').val();
			var vehicle_det    		 = $('#vehicle_det').val();


			if(from_location == 'company' && from_company_location == '') {
				Alert_Msg('Error','From Company Location is required','error');
			} else if(to_location == 'company' && to_company_location == '') {
				Alert_Msg('Error','To Company Location is required','error');
			} else if(courier_service_type == 'courier_agent' && courier_agent_det == '') {
				Alert_Msg('Error','Courier Agent Detail is required','error');
			} else if(courier_service_type == 'vehicle' && vehicle_det == '') {
				Alert_Msg('Error','Vehicle Detail is required','error');
			} else {
				let form_data = $(this).serialize();
				$.ajax({
					type: "POST",
					url: "Ajax/common_ajax.php",
					data: { 
						Action : "add_outgoing_parcel",
						data   : form_data 
					},
					dataType:"json",
					beforeSend:function(){
						$('#preloader').show();
					},
					success: function(result) {
						$('#preloader').hide();
						if(result.status == 200) {
							swal({
								title: "Sucess",
								text: result.msg,
								icon: "success",
							}).then(function(isconfirm){
								if(isconfirm) {
									window.location = 'index.php';
								}
							});
						} else {
							Alert_Msg("Failed",result.msg,"error");   
						}
					}
				});
			}

		});

		$(document).on('change','#no_of_items',function(){
			if($(this).val() <= 0) {
				$(this).val('');
				Alert_Msg("Failed","No of Items should be greater than zero.","error");   
			}
		});
	</script>

</body>

</html>