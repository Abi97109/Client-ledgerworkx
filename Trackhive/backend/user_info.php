<?php
header("Content-Type: application/json");

// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db   = "trackhive";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Database connection failed"]);
    exit;
}

// Helper functions
function validate_username($username)
{
    return preg_match('/^[a-zA-Z ]+$/', $username);
}
function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function validate_role($role)
{
    return in_array($role, ['admin', 'user']);
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action === "fetch") {
    $result = $conn->query("SELECT id, username, email, role, created_at FROM user_info ORDER BY id ASC");
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = [
            "id" => $row['id'],
            "username" => $row['username'],
            "email" => $row['email'],
            "role" => ucfirst($row['role']),
            "created" => substr($row['created_at'], 0, 10)
        ];
    }
    echo json_encode(["success" => true, "users" => $users]);
    exit;
} elseif ($action === "add") {
    $username = trim($_POST['username'] ?? "");
    $email = trim($_POST['email'] ?? "");
    $role = strtolower(trim($_POST['role'] ?? "user"));
    $password = password_hash($_POST['password'] ?? "changeme", PASSWORD_DEFAULT);

    $errors = [];
    if (!validate_username($username)) $errors['username'] = "Username must only contain letters and spaces.";
    if (!validate_email($email)) $errors['email'] = "Invalid email format.";
    if (!validate_role($role)) $errors['role'] = "Invalid role selected.";

    // Check duplicate email
    $stmt = $conn->prepare("SELECT id FROM user_info WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) $errors['email'] = "Email already exists!";
    $stmt->close();

    if ($errors) {
        echo json_encode(["success" => false, "errors" => $errors]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO user_info (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $role);
    if ($stmt->execute()) {
        $id = $stmt->insert_id;
        $created = date("Y-m-d");
        echo json_encode(["success" => true, "user" => ["id" => $id, "username" => $username, "email" => $email, "role" => ucfirst($role), "created" => $created]]);
    } else {
        echo json_encode(["success" => false, "errors" => ["general" => "Failed to add user."]]);
    }
    $stmt->close();
    exit;
} elseif ($action === "update") {
    $id = intval($_POST['id'] ?? 0);
    $username = trim($_POST['username'] ?? "");
    $email = trim($_POST['email'] ?? "");
    $role = strtolower(trim($_POST['role'] ?? "user"));

    $errors = [];
    if (!is_numeric($id) || $id < 1) $errors['id'] = "Invalid user ID.";
    if (!validate_username($username)) $errors['username'] = "Username must only contain letters and spaces.";
    if (!validate_email($email)) $errors['email'] = "Invalid email format.";
    if (!validate_role($role)) $errors['role'] = "Invalid role selected.";

    // Check duplicate email (exclude self)
    $stmt = $conn->prepare("SELECT id FROM user_info WHERE email=? AND id<>?");
    $stmt->bind_param("si", $email, $id);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) $errors['email'] = "Email already exists!";
    $stmt->close();

    if ($errors) {
        echo json_encode(["success" => false, "errors" => $errors]);
        exit;
    }

    $stmt = $conn->prepare("UPDATE user_info SET username=?, email=?, role=? WHERE id=?");
    $stmt->bind_param("sssi", $username, $email, $role, $id);
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "user" => ["id" => $id, "username" => $username, "email" => $email, "role" => ucfirst($role)]]);
    } else {
        echo json_encode(["success" => false, "errors" => ["general" => "Failed to update user."]]);
    }
    $stmt->close();
    exit;
} elseif ($action === "delete") {
    $id = intval($_POST['id'] ?? 0);
    if ($id < 1) {
        echo json_encode(["success" => false, "error" => "Invalid user ID."]);
        exit;
    }
    $stmt = $conn->prepare("DELETE FROM user_info WHERE id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "msg" => "User ID $id is deleted."]);
    } else {
        echo json_encode(["success" => false, "error" => "Failed to delete user."]);
    }
    $stmt->close();
    exit;
} else {
    echo json_encode(["success" => false, "error" => "Invalid request."]);
    exit;
}
