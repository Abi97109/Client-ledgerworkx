<?php
session_start();

header('Content-Type: application/json');

$host = "localhost";
$user = "root";
$pass = "root";
$db   = "Trackhive";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed!"]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];

    if ($password !== $retype_password) {
        echo json_encode(["status" => "error", "message" => "Passwords do not match!"]);
        exit;
    }

    // ✅ Check if email exists
    $check = $conn->prepare("SELECT email FROM user_info WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Email already exists! Please log in instead."]);
        exit;
    }

    $check->close();

    // ✅ Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user_info (username, email, password, role) VALUES (?, ?, ?, 'user')");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';
        echo json_encode(["status" => "success", "message" => "Signup successful!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Something went wrong. Try again later."]);
    }
}
