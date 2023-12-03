<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        if ($_POST['action'] === 'login') {
            $user = $_POST["user"];
            $pass = $_POST["password"];
            $result = login($user, $pass);
            echo $result; // Send the result back to the AJAX call
        }
    }

    function login($user, $password){
        
        echo "user $user and password: $password";
    }

    echo "Unauthorised";
    // echo array('status' => 'error', 'message' => 'Unauthorised', 'status_code' => '401');
?>