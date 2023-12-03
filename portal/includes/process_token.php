<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the token sent via POST request
    $token = $_POST['token'];

    // Process the token as needed
    // For example, you can store it in a PHP variable
    $data = $token;

    // You can perform any other operations with $data here

    // Send a response back to the client-side JavaScript
    echo "Token received: " . $data;
} else {
    // Handle if it's not a POST request
    echo "Invalid request method.";
}
?>
