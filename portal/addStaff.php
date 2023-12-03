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
    if(isset($_POST["add_staff_btn"])){

        include "includes/db.php";

        $fname = $_POST["first_name"];
        $lname = $_POST["last_name"];
        $oname = $_POST["other_name"];
        $email = $_POST["email_address"];
        $phone = $_POST["phone_number"];
        $is_admin = $_POST["is_admin"];
        $rank = $_POST["rank"];
        $address = $_POST["address"];
        $default_password = `$2y$10\$PT3oDwhK8qKubeQPuTDBrOYsRG6XP2PkE8/qF0bbYqYpL7aoyaGJy`;

        if($lname == ""){

            $message = '
                <div class="alert alert-danger" role="alert">
                    Last name is required!
                </div>
            ';

        }else if($fname == ""){

            $message = '
                <div class="alert alert-danger" role="alert">
                    First name is required!
                </div>
            ';
            
        }else if($email == ""){

            $message = '
                <div class="alert alert-danger" role="alert">
                    Email is required!
                </div>
            ';
            
        }else if($phone == ""){

            $message = '
                <div class="alert alert-danger" role="alert">
                    Phone is required!
                </div>
            ';
            
        }else if($is_admin == ""){

            $message = '
                <div class="alert alert-danger" role="alert">
                    Answer the Admin Question!
                </div>
            ';
            
        }else if($rank == ""){

            $message = '
                <div class="alert alert-danger" role="alert">
                    Rank is Required!
                </div>
            ';
            
        }else{

            $insertQuery = "INSERT INTO users (user_id, first_name, last_name, other_name, phone_number , email, password, rank_id, address, is_admin, created_at, updated_at) VALUES (DEFAULT, '$fname', '$lname', '$oname', '$phone', '$email', '$default_password', '$rank', '$address', '$is_admin', 'now()', NULL)";

            if ($conn->query($insertQuery) === TRUE) {
                $message = '
                    <div class="alert alert-success" role="alert">
                        The staff <strong>'.$fname.'</strong> has been added successfully!
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
											<h4 class="box-title">Add New Staff</h4>							
											<div class="box-controls pull-right d-md-flex d-none">
											</div>
										</div>
									</div>
                                    <?php if($message != ""){ echo $message;} ?>
									<div class="box">
                                        <div class="p-40">
                                            <form action="#" method="post">
                                                <div class="form-group">
                                                    <label class="form-label">Full Name:</label>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa-solid fa-user"></i>
                                                                </div>
                                                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa-solid fa-user"></i>
                                                                </div>
                                                                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa-solid fa-user"></i>
                                                                </div>
                                                                <input type="text" class="form-control" name="other_name" placeholder="Other Names">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <label class="form-label">Email Address</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-envelope"></i></span>
                                                        <input type="email" class="form-control ps-15 bg-transparent" name="email_address" placeholder="Email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Phone Number</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-envelope"></i></span>
                                                        <input type="tel" class="form-control ps-15 bg-transparent" name="phone_number" placeholder="Phone Number" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Is He/She Administrative Staff?</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-user-tie"></i></span>
                                                        <select name="is_admin" id="is_admin" class="form-control ps-15 bg-transparent" required>
                                                            <option value="0" selected>Not Admin</option>
                                                            <option value="1">Yes, He/She is an Admin</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <?php
                                                    include "includes/db.php";
                                                    $rank_query = "SELECT * FROM ranks";
                                                    $ranks = $conn->query($rank_query);

                                                    // if ($result->num_rows > 0) {echo "We found many"; };
                                                ?>
                                                <div class="form-group">
                                                    <label class="form-label">Rank?</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-ranking-star"></i></span>
                                                        <select name="rank" id="rank" class="form-control ps-15 bg-transparent" required>
                                                            <option value="" selected disabled>Select Staff Rank</option>
                                                            <?php
                                                                while ($rank = $ranks->fetch_assoc()) {
                                                                    echo "<option value='" . $rank["rank_id"] . "'>" . $rank["rank"] . "</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-location"></i></span>
                                                        <textarea name="address" class="form-control ps-15 bg-transparent" placeholder="Address"></textarea>
                                                    </div>
                                                </div>

                                                <button type="submit" name="add_staff_btn" class="waves-effect waves-light btn mb-5 bg-gradient-primary">Submit</button>
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
