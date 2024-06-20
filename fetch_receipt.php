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

// Check if request ID is received
if (isset($_POST['request_id'])) {
    $requestId = $_POST['request_id'];
    error_log("Request ID received: $requestId"); // Debugging line

    // Fetch the receipt data from the database
    $sql = "SELECT * FROM receipts WHERE request_id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $requestId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $receipt = $result->fetch_assoc();
            error_log("Receipt data: " . json_encode($receipt)); // Debugging line
            echo json_encode(array('status' => 'success', 'data' => $receipt));
        } else {
            error_log("No receipt found for the given request ID."); // Debugging line
            echo json_encode(array('status' => 'error', 'message' => 'No receipt found for the given request ID.'));
        }

        $stmt->close();
    } else {
        error_log("Failed to prepare statement."); // Debugging line
        echo json_encode(array('status' => 'error', 'message' => 'Failed to prepare statement.'));
    }
} else {
    error_log("Request ID is missing."); // Debugging line
    echo json_encode(array('status' => 'error', 'message' => 'Request ID is missing.'));
}

$conn->close();
?>
