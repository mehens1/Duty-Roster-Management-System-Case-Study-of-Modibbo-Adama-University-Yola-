<?php
    // include "portal/includes/auth.php";
	
	if(isset($_COOKIE['mau_user_token'])) {
		$token = $_COOKIE['mau_user_token'];
		$jsonData = $_COOKIE['mau_user_data'];
		$data = json_decode($jsonData, true);
	} else {
		header('Location: ../index.php');
	}

    $message = "";

	
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
											<h4 class="box-title">Duty Post(s)</h4>							
											<div class="box-controls pull-right d-md-flex d-none">
											</div>
										</div>
									</div>
                                    <?php if($message != ""){ echo $message;} ?>
									<div class="box">
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table id="duty_post_table" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                    <thead>
                                                        <tr>
                                                            <th>S/No.</th>
                                                            <th>Duty Post Name</th>
                                                            <th>No. of Staff Required</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tbody>
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

        <script>
            $(document).ready(function() {
                var count = 0;
                $('#duty_post_table').DataTable({
                    "ajax": {
                        "url": "functions/getPost.php", // Replace with the path to your PHP script
                        "type": "GET",
                        "dataType": "json",
                        "dataSrc": "data"
                    },
                    "columns": [
                        { "data": null,
                            "render": function(data, type, row) {
                                count++;
                                return count;
                            }
                        },
                        { "data": "position_name" },
                        { "data": "staff_required" },
                        { "data": null,
                            "render": function(data, type, row) {
                                return `<button type="button" class="btn btn-danger"><i class="fa-regular fa-eye"></i></button>`;
                            }
                        }
                    ]
                });
            });
        </script>
		
<?php include "includes/foot.php" ?>
