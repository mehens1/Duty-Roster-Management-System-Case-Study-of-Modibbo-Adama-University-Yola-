<?php
    // include "portal/includes/auth.php";
	
	if(isset($_COOKIE['mau_user_token'])) {
		$token = $_COOKIE['mau_user_token'];
		$jsonData = $_COOKIE['mau_user_data'];
		$data = json_decode($jsonData, true);
	} else {
		header('Location: ../index.php');
	}

    include "includes/db.php";
    $message = "";

    $staffId = $_GET["staffId"];
    $safeStaffId = $conn->real_escape_string($staffId);
    $getStaffQuery = "SELECT * FROM users WHERE user_id = '$safeStaffId'";
    $result = $conn->query($getStaffQuery);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $firstName = $row['first_name'];
            $lastName = $row['last_name'];
            $otherName = $row['other_name'];
            $phone_number = $row['phone_number'];
            $email = $row['email'];
            $rank_id = $row['rank_id'];
            $address = $row['address'];
            $isAdmin = $row['is_admin'];
        }
    } else {
        $message = '
            <div class="alert alert-danger" role="alert">
            Error executing the query: '.$conn->error.'!
            </div>
        ';
    }

    $message = "";
    if(isset($_POST["edit_staff_btn"])){

        include "includes/db.php";

        $fname = $_POST["first_name"];
        $lname = $_POST["last_name"];
        $oname = $_POST["other_name"];
        $email = $_POST["email_address"];
        $phone = $_POST["phone_number"];
        $is_admin = $_POST["is_admin"];
        $rank = $_POST["rank"];
        $address = $_POST["address"];
        
        $insertQuery = "UPDATE users SET 
            first_name = '$fname',
            last_name = '$lname',
            other_name = '$oname',
            phone_number = '$phone',
            email = '$email',
            rank_id = '$rank',
            address = '$address',
            is_admin = '$is_admin',
            updated_at = NOW()
            WHERE user_id = '$staffId'";

        if ($conn->query($insertQuery) === TRUE) {

            $firstName = $fname;
            $lastName = $lname;
            $otherName = $oname;
            $phone_number = $phone;
            $rank_id = $rank;
            $address = $address;
            $isAdmin = $is_admin;

            $message = '
                <div class="alert alert-success" role="alert">
                    The staff <strong>'.$fname.'</strong> has been updated successfully!
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
											<h4 class="box-title">Edit Staff Details</h4>							
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
                                                                <input type="text" class="form-control" value="<?php echo $lastName; ?>" name="last_name" placeholder="Last Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa-solid fa-user"></i>
                                                                </div>
                                                                <input type="text" class="form-control" value="<?php echo $firstName; ?>" name="first_name" placeholder="First Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa-solid fa-user"></i>
                                                                </div>
                                                                <input type="text" class="form-control" value="<?php echo $otherName; ?>" name="other_name" placeholder="Other Names">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <label class="form-label">Email Address</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-envelope"></i></span>
                                                        <input type="email" class="form-control ps-15 bg-transparent" value="<?php echo $email; ?>" name="email_address" placeholder="Email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Phone Number</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-envelope"></i></span>
                                                        <input type="tel" class="form-control ps-15 bg-transparent" value="<?php echo $phone_number; ?>" name="phone_number" placeholder="Phone Number" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Is He/She Administrative Staff?</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-user-tie"></i></span>
                                                        <select name="is_admin" id="is_admin" class="form-control ps-15 bg-transparent" required>
                                                            <option value="0" <?php if($isAdmin == 0){ echo "selected"; } ?> >Not Admin</option>
                                                            <option value="1" <?php if($isAdmin == 1){ echo "selected"; } ?>>Yes, He/She is an Admin</option>
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
                                                                    if($rank_id == $rank["rank_id"]){
                                                                        echo "<option selected value='" . $rank["rank_id"] . "'>" . $rank["rank"] . "</option>";
                                                                    }else{
                                                                        echo "<option value='" . $rank["rank_id"] . "'>" . $rank["rank"] . "</option>";
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-location"></i></span>
                                                        <textarea name="address" class="form-control ps-15 bg-transparent" placeholder="Address"><?php echo $address; ?></textarea>
                                                    </div>
                                                </div>

                                                <button type="submit" name="edit_staff_btn" class="waves-effect waves-light btn mb-5 bg-gradient-primary">Submit</button>
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
