<?php
session_start();
header('Content-Type: application/json');

$host = "localhost";
$user = "root";
$pass = "root";
$db   = "Trackhive";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password, role FROM USER_INFO WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $username, $hashedPassword, $role);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            // Role-based redirect
            if ($role === 'admin') {
                echo json_encode(['success' => true, 'redirect' => 'admin_dashboard.php']);
            } else {
                echo json_encode(['success' => true, 'redirect' => '../frontend/dashboard.html']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
    }

    $stmt->close();
}

$conn->close();
