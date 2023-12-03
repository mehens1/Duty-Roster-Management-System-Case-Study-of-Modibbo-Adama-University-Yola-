<?php
    if(isset($_COOKIE['mau_user_token']) || $_COOKIE['mau_user_token'] == "") {
        $token = $_COOKIE['mau_user_token'];
        $jsonData = $_COOKIE['mau_user_data'];
        $data = json_decode($jsonData, true);
    } else {
        header('Location: https://google.com');
        // header('Location: http://localhost/mau_security_app/index.php');
    }
?>