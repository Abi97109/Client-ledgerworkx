<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db = "trackhive";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}
echo "file being read ";

if (isset($_POST['count'])) {
    $class_id = 101;
    $count = $_POST['count'];
    echo "value received! ";
    $sql = "INSERT INTO occupancy_data (class_id, occupancy_count)
          VALUES ('$class_id', '$count')";
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted";
    } else {
        if ($conn->errno == 1452) {
            echo "Invalid class_id: make sure it exists in 'classes' table";
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
    echo "value not received! ";
}
