<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "root";
$db   = "Trackhive";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_POST['reset_password'])) {
    $email = $_SESSION['email'] ?? '';
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (!$email) {
        $msg = urlencode("Session expired. Please try again.");
        header("Location: ../frontend/forgotpassword.html?msg=$msg");
        exit;
    }

    if ($password === $confirm_password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $update = $conn->prepare("UPDATE USER_INFO SET password=? WHERE email=?");
        $update->bind_param("ss", $hashedPassword, $email);

        if ($update->execute()) {
            unset($_SESSION['email']);
            $msg = urlencode("✅ Password reset successful! Please login.");
            // Redirect to your sign-in / sign-up page
            header("Location: ../frontend/reset_password.html?msg=$msg");
            exit;
        } else {
            $msg = urlencode("Error updating password. Please try again.");
            header("Location: ../frontend/reset_password.html?msg=$msg");
            exit;
        }
    } else {
        $msg = urlencode("Passwords do not match!");
        header("Location: ../frontend/reset_password.html?msg=$msg");
        exit;
    }
}
