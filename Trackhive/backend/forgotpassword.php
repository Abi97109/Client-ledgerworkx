<?php
session_start();

// Database connection
$host = "localhost";
$user = "root";
$pass = "root";
$db   = "Trackhive";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_POST['check_email'])) {
    $email = trim($_POST['email']);

    // Check if email exists
    $stmt = $conn->prepare("SELECT * FROM USER_INFO WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Email exists – allow password reset
        $_SESSION['email'] = $email;

        // Redirect to reset password page
        header("Location: ../frontend/reset_password.html"); // Use PHP to handle reset
        exit;
    } else {
        // Email not found – show error
        $msg = urlencode("Email not Registered");
        header("Location: ../frontend/forgotpassword.html?msg=$msg");
        exit;
    }
}
