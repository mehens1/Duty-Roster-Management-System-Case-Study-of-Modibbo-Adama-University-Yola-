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
    if(isset($_POST["add_position_btn"])){

        include "includes/db.php";

        $unhandled_post_name = trim($_POST["post_name"]);
        $post_name = mysqli_real_escape_string($conn, $unhandled_post_name);
        $staff_required = $_POST["staff_required"];
        
        $insertQuery = "INSERT INTO duty_positions (position_id, position_name, staff_required) VALUES (DEFAULT, '$post_name', '$staff_required')";

        if ($conn->query($insertQuery) === TRUE) {
            $message = '
                <div class="alert alert-success" role="alert">
                    The Duty Position <strong>'.$unhandled_post_name.'</strong> has been added successfully!
                </div>
            ';
        }else{

            $message = '
                <div class="alert alert-danger" role="alert">
                    Error: '.$conn->error.'!
                </div>
            ';

        }


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
											<h4 class="box-title">Add Duty Post</h4>							
											<div class="box-controls pull-right d-md-flex d-none">
											</div>
										</div>
									</div>
                                    <?php if($message != ""){ echo $message;} ?>
									<div class="box">
                                        <div class="p-40">
                                            <form action="#" method="post">
                                                <div class="form-group">
                                                    <label class="form-label">Post Name</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-location"></i></span>
                                                        <input type="text" class="form-control ps-15 bg-transparent" name="post_name" placeholder="Post Name (Eg.Vice Chancellor Residence Mbamba)" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">No. of Staff Required Per Day</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-user"></i></span>
                                                        <input type="number" value="2" class="form-control ps-15 bg-transparent" name="staff_required" placeholder="Staff Required (Eg. 2)" required>
                                                    </div>
                                                </div>

                                                <button type="submit" name="add_position_btn" class="waves-effect waves-light btn mb-5 bg-gradient-primary">Submit</button>
                                            </form>
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
