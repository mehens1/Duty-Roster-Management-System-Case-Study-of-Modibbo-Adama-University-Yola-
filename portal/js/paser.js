function jsToPhp(data) {
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    var token = localStorage.getItem("mau_user_token");

    // AJAX POST request to send the token to a PHP file
    $.ajax({
        type: "POST",
        url: "process_token.php", // Replace with your PHP file URL
        data: { token: token },
        success: function(response) {
            alert(response); // Alert the response from the PHP script
        }
    });
}
    