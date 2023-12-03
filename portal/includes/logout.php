<?php
    setcookie('mau_user_token', '', time() - 3600, '/');
	setcookie('mau_user_data', '', time() - 3600, '/');
    header('Location: ../index.php');
?>