<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csystem"; 

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(array('status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error)));
}

// Log the received POST data for debugging
file_put_contents('php://stderr', print_r($_POST, TRUE));

// Check if data is received
if (isset($_POST['clearanceFullName']) && isset($_POST['clearancePurokNo']) && isset($_POST['clearancePurpose'])) {
    // Get the POST data
    $fullName = $_POST['clearanceFullName'];
    $purokNo = $_POST['clearancePurokNo'];
    $purpose = $_POST['clearancePurpose'];
    $userId = 1; // Assuming you have the user ID from session or another source

    // Insert the data into the clearance_requests table
    $sql = "INSERT INTO clearance_requests (user_id, full_name, purok_no, purpose) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isis", $userId, $fullName, $purokNo, $purpose);

    if ($stmt->execute()) {
        echo json_encode(array('status' => 'success', 'message' => 'Clearance request submitted successfully'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Error: ' . $stmt->error));
    }

    $stmt->close();
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Required fields are missing.'));
}

$conn->close();
?>
