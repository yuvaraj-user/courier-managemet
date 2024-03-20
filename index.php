<?php include('partials/header.php') ?>

<body>
	<div class="wrapper">
		<?php include('partials/sidebar.php') ?>

		<div class="main">
			<?php include('partials/navbar.php') ?>

			<main class="content">
				<div class="container-fluid p-0">

					<!-- <h4 class="mb-3 page-head fw-bold">Outgoing Parcels List</h4> -->

					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-3">
										<a class="text-decoration-none" href="Outgoing_parcels_list.php">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Outgoing Parcels</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="fa-solid fa-truck-fast"></i>
																<!-- <i class="align-middle" data-feather="truck"></i> -->
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3" id="op_count">0</h1>
													<!-- <div class="mb-0">
														<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
														<span class="text-muted">Since last week</span>
													</div> -->
												</div>
											</div>
										</a>
									</div>
									<div class="col-sm-3">
										<a class="text-decoration-none" href="Incoming_parcels_list.php">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Incoming Parcels</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="fa-solid fa-outdent"></i>
																<!-- <i class="align-middle" data-feather="users"></i> -->
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3" id="ip_count">0</h1>
													<!-- <div class="mb-0">
														<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
														<span class="text-muted">Since last week</span>
													</div> -->
												</div>
											</div>
										</a>
									</div>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Returnable Incoming</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
																<i class="fa-solid fa-truck-ramp-box"></i>
															<!-- <i class="align-middle" data-feather="dollar-sign"></i> -->
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3" id="return_ip_count"></h1>
												<!-- <div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Since last week</span>
												</div> -->
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Non Returnable Incoming</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="fa-solid fa-box"></i>
															<!-- <i class="align-middle" data-feather="shopping-cart"></i> -->
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3" id="non_return_ip_count"></h1>
												<!-- <div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
													<span class="text-muted">Since last week</span>
												</div> -->
											</div>
										</div>
									</div>

								</div>
							</div>
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
			get_dashboard_data();
		});

		function get_dashboard_data() 
		{
			$.ajax({
				type: "GET",
				url: "Ajax/common_ajax.php",
				data: {
					"Action": "get_dashboard_details",
				},
				dataType:"json",
				success: function(result) {
					$('#op_count').text(result.op_count);
					$('#ip_count').text(result.ip_count);
					$('#return_ip_count').text(result.rn_ip_count);
					$('#non_return_ip_count').text(result.nrn_ip_count);
				}
			});

		}
	</script>