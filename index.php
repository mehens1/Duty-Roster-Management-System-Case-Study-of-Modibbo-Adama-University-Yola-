<?php

$message = "";

    // if (isset($_POST["login"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {

        // Retrieve form data
        $user_id = $_POST['user_id'];
        $password = $_POST['user_pass'];

        if($user_id == ""){

            $message = '
                <div class="p-10">
                    <div class="alert alert-danger text-center" role="alert">
                        Email or Phone Number is Required!
                    </div>
                </div>
            ';

        }elseif($password == ""){

            $message = '
                <div class="p-10">
                    <div class="alert alert-danger text-center" role="alert">
                        Password Required!
                    </div>
                </div>
            ';

        }else{

            require_once("portal/includes/db.php");

            $login_query = 'SELECT u.*, r.* FROM users u LEFT JOIN ranks r ON u.rank_id = r.rank_id WHERE u.email = ? OR u.phone_number = ? LIMIT 1';
            $stmt = $conn->prepare($login_query);

            // Bind the parameters and execute the query
            $stmt->bind_param("ss", $user_id, $user_id);
            $stmt->execute();

            // Get the result
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {

                $row = $result->fetch_assoc();
                $db_password = $row["password"];
                
                if (password_verify($password, $db_password)) {

                    // remove password field
                    unset($row['password']);

                    // Serialize the modified user data array
                    $userDataString = serialize($row);
                    // Generate random bytes (salt) to enhance security
                    $salt = random_bytes(16);
                    // Combine user data with random bytes
                    $combinedData = $userDataString . bin2hex($salt);
                    // Generate a hash of the combined data
                    $token = hash('sha256', $combinedData);

                    // Check if the user_id exists in the token table
                    $check_query = "SELECT COUNT(*) as count FROM tokens WHERE user_id = ?";
                    $stmt_check = $conn->prepare($check_query);
                    $stmt_check->bind_param("i", $row["user_id"]);
                    $stmt_check->execute();
                    $result_check = $stmt_check->get_result();
                    $row_check = $result_check->fetch_assoc();
                    $count = $row_check['count'];

                    // Close the check statement
                    $stmt_check->close();

                    if($count > 0){

                        // If user_id exists, perform an UPDATE
                        $update_token_query = "UPDATE tokens SET token = ?, last_login = NOW() WHERE user_id = ?";
                        $stmt_update = $conn->prepare($update_token_query);
                        $stmt_update->bind_param("si", $token, $row["user_id"]);
                        $stmt_update->execute();

                        if ($stmt_update->affected_rows > 0) {
                            storage_and_session($token, $row);
                        } else {
                            
                            $message = '
                                <div class="p-10">
                                    <div class="alert alert-danger text-center" role="alert">
                                        Error updating token: '.$conn->error.' 
                                    </div>
                                </div>
                            ';
                        }

                        // Close the update statement
                        $stmt_update->close();

                    }else{

                        $userId = $row["user_id"];
                        $insert_token_query = "INSERT INTO tokens (token, user_id, is_valid, last_login, created_at) VALUES (?, ?, 1, NOW(), NOW())";

                        $stmt_insert = $conn->prepare($insert_token_query);

                        if ($stmt_insert) {
                            // Assuming $token and $row["id"] are defined before this point
                            
                            // Bind parameters
                            $stmt_insert->bind_param("si", $token, $userId);
                            
                            // Execute prepared statement
                            if ($stmt_insert->execute()) {
                                // Success: token recorded
                                storage_and_session($token, $row);
                            } else {
                                // Error handling
                                echo "Error: " . $stmt_insert->error;
                            }

                            // Close prepared statement
                            $stmt_insert->close();
                        } else {
                            // Error in prepare statement
                            echo "Error: " . $conn->error;
                        }

                    }


                } else {
                    $message = '
                        <div class="p-10">
                            <div class="alert alert-danger text-center" role="alert">
                                Incorrect login credentials!
                            </div>
                        </div>
                    ';
                }

            } else {
                $message = '
                    <div class="p-10">
                        <div class="alert alert-danger text-center" role="alert">
                            Incorrect login credentials!
                        </div>
                    </div>
                ';
            }

            $stmt->close();
            $conn->close();

            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            

        }

    }

    function storage_and_session($userToken, $userData){

        // echo "<script>";
        // echo "var userToken = " . json_encode($userToken) . ";";
        // echo "var userData = " . json_encode($userData) . ";";
        // echo "localStorage.setItem('mau_user_token', JSON.stringify(userToken));";
        // echo "localStorage.setItem('mau_user_data', JSON.stringify(userData));";
        // echo "window.location.href = 'portal/index.php';";
        // echo "</script>";

        setcookie('mau_user_token', $userToken, time() + 86400, '/');
        $jsonData = json_encode($userData);
        setcookie('mau_user_data', $jsonData, time() + 86400, '/');
        header('Location: portal/index.php');
        exit;
        

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="portal/assets/images/favicon.png">

    <title>Log in :: MAU Security Duty System</title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="portal/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="portal/css/style.css">
	<link rel="stylesheet" href="portal/css/skin_color.css">	
	<link rel="stylesheet" href="portal/css/bootstrap_extend.css">	
	<link rel="stylesheet" href="portal/assets/fontawesome/css/all.css">	

</head>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url(portal/assets/images/bg.jpg)">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">MAU Security Guard System</h2>
								<p class="mb-0">Sign in to continue</p>							
							</div>
                            <?php if($message != ""){ echo $message; }; ?>
							<div class="p-40">
								<form action="#" name="loginForm" id="loginForm" method="post">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="fa-solid fa-user"></i></span>
											<input type="text" name="user_id" id="user_id" class="form-control ps-15 bg-transparent" placeholder="Phone Number or Email Address...">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="fa-solid fa-lock"></i></span>
											<input type="password" name="user_pass" id="user_pass" class="form-control ps-15 bg-transparent" placeholder="Password">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="remember_me_chkBox" name="remember_me_chkBox">
											<label for="remember_me_chkBox">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-end">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot Password?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" name="login" id="login" class="btn btn-danger mt-10">SIGN IN</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>	
							</div>						
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="portal/js/vendors.min.js"></script>
	<script src="portal/js/pages/chat-popup.js"></script>
    <script src="portal/assets/icons/feather-icons/feather.min.js"></script>	
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
