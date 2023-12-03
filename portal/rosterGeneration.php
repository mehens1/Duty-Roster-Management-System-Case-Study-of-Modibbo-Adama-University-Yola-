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

    include "includes/db.php";
	
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
											<h4 class="box-title">Duty Roster</h4>						
                                            <h4 class="box-title"><strong class="text-danger"> :: Week <?php if(date('w') == 0){ echo date('W') + 1; }else{ echo date('W'); } ?></strong></h4>
											<div class="box-controls pull-right d-md-flex d-none">
                                                <button type="button" class="btn btn-primary" onclick="generateRoster()">Generate Roster</button>
											</div>
										</div>
									</div>
                                    <?php if($message != ""){ echo $message;}; ?>
                                    
									<div class="box">
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table id="duty_post_table" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                    <thead>
                                                        <tr>
                                                            <th>S/No.</th>
                                                            <th>Duty Position</th>
                                                            <th>Morning Duty</th>
                                                            <th>Night Duty</th>
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
                loadDutyTable();
            });

            function loadDutyTable() {
                var count = 0;
                $('#duty_post_table').DataTable().destroy();
                $('#duty_post_table').DataTable({
                    "ajax": {
                        "url": "functions/getCurrentWeekRoster.php", // Replace with the path to your PHP script
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
                        { "data": null,
                            "render": function(data, type, row) {
                                return data.position_name;
                            }
                        },
                        { "data": null,
                            "render": function(data, type, row) {
                                if(data.morning_other_name == null){
                                    var fullname = data.morning_last_name + " " + data.morning_first_name + " - " + data.morning_user_rank_name;
                                }else{
                                    var fullname = data.morning_last_name + " " + data.morning_first_name + " " + data.morning_other_name + " - " + data.morning_user_rank_name;
                                }
                                
                                return `${fullname}`;
                            }
                        },
                        { "data": null,
                            "render": function(data, type, row) {
                                if(data.night_other_name == null){
                                    var fullname = data.night_last_name + " " + data.night_first_name + " - " + data.night_user_rank_name;
                                }else{
                                    var fullname = data.night_last_name + " " + data.night_first_name + data.night_other_name + " - " + data.night_user_rank_name;
                                }
                                
                                return `${fullname}`;
                            }
                        }
                    ]
                });
            }

            function generateRoster() {

                var admin = <?php echo $data["user_id"]?>;

                $.ajax({
                url: 'functions/generateRoster.php',
                method: 'GET',
                data: {
                    user_id: admin,
                },
                success: function(response) {
                    alert(response);
                    if(response == "Duty Roaster Generated Successfully!"){
                        loadDutyTable();
                    };
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error('Error calling generateRoster.php:', error);
                }
                });
                
            }
        </script>
		
<?php include "includes/foot.php" ?>
