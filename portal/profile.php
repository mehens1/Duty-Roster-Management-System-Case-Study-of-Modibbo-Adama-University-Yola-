<?php
    // include "portal/includes/auth.php";
	
	if(isset($_COOKIE['mau_user_token'])) {
		$token = $_COOKIE['mau_user_token'];
		$jsonData = $_COOKIE['mau_user_data'];
		$data = json_decode($jsonData, true);
	} else {
		header('Location: ../index.php');
	}
	
?>
<?php include "includes/head.php" ?>
		
		<div class="wrapper">
			<div id="loader"></div>

			<?php include "includes/header.php"; ?>
			<?php include "includes/aside.php"; ?>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<div class="container-full">
					<!-- Main content -->
					<section class="content">
						<div class="row">
							<div class="col-xl-8 col-12">
								<div class="row">
									<div class="box bg-transparent no-shadow mb-0">
										<div class="box-header no-border">
											<h4 class="box-title">Previous Complains</h4>							
											<div class="box-controls pull-right d-md-flex d-none">
											<a href="#">View All</a>
											</div>
										</div>
									</div>
									<div class="box">
										<div class="box-body py-0">
											<div class="table-responsive">
												<table class="table no-border mb-0">
													<tbody>
														<tr>
															<td>
																<div class="bg-danger h-50 w-50 l-h-50 rounded text-center">
																<p class="mb-0 fs-20 fw-600">A1</p>
																</div>
															</td>
															<td class="fw-600">Biology Course</td>
															<td class="text-fade">StarterReplacement.pdf</td>
															<td class="fw-500"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Only view</td>
															<td class="text-fade">78 members</td>
															<td class="fw-600">47 MB</td>
														</tr>
														<tr>
															<td>
																<div class="bg-info h-50 w-50 l-h-50 rounded text-center">
																<p class="mb-0 fs-20 fw-600">B1</p>
																</div>
															</td>
															<td class="fw-600">Contemporary Art</td>
															<td class="text-fade">Loremipsum.doc</td>
															<td class="fw-500 text-warning"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Edit available</td>
															<td class="text-fade">78 members</td>
															<td class="fw-600">78 MB</td>
														</tr>
														<tr>
															<td>
																<div class="bg-primary h-50 w-50 l-h-50 rounded text-center">
																<p class="mb-0 fs-20 fw-600">C1</p>
																</div>
															</td>
															<td class="fw-600">Programming Language</td>
															<td class="text-fade">phpcore.mp3</td>
															<td class="fw-500"><span class="badge badge-sm badge-dot badge-primary me-10"></span>Only view</td>
															<td class="text-fade">48 members</td>
															<td class="fw-600">12 MB</td>
														</tr>
														<tr>
															<td>
																<div class="bg-success h-50 w-50 l-h-50 rounded text-center">
																<p class="mb-0 fs-20 fw-600">A2</p>
																</div>
															</td>
															<td class="fw-600">Geometry Course</td>
															<td class="text-fade">dummyabz.pdf</td>
															<td class="fw-500"><span class="badge badge-sm badge-dot badge-primary me-10"></span>Only view</td>
															<td class="text-fade">24 members</td>
															<td class="fw-600">18 MB</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>							
							</div>

							<?php include "includes/rightPanel.php" ?>
							
						</div>
					</section>
					<!-- /.content -->
				</div>
			</div>
			<!-- /.content-wrapper -->
			<?php include "includes/footer.php"; ?>

			<!-- Control Sidebar -->
			<?php include "includes/asideModal.php"; ?>
			<!-- /.control-sidebar -->
			
			<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
			<div class="control-sidebar-bg" style="background-color: red"></div>
		
		</div>
		<!-- ./wrapper -->
			
		<?php include "includes/chatBox.php" ?>
		
		<!-- Page Content overlay -->
		
<?php include "includes/foot.php" ?>
