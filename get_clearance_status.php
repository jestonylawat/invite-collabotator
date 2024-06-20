<?php
header('Content-Type: application/json'); 

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); 
}

// Assume user_id is passed via GET request
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

if ($user_id > 0) {
    // Fetch clearance request status for the given user_id
    $sql_clearance = "SELECT id, status, purpose FROM clearance_requests WHERE user_id = $user_id ORDER BY created_at DESC LIMIT 1";
    $result_clearance = $conn->query($sql_clearance);

    if ($result_clearance->num_rows > 0) {
        // Fetch the status and purpose
        $clearance = $result_clearance->fetch_assoc();
        $request_id = $clearance["id"];
        $status = $clearance["status"];
        $purpose = $clearance["purpose"]; 
        
        // Initialize receipt content
        $receiptContent = "Receipt not sent.";

        // Fetch receipt details if status is "Receipt Sent"
        if ($status === "Receipt Sent") {
            $sql_receipt = "SELECT request_id, user_id, amount, payment_date FROM receipts WHERE request_id = $request_id AND status = 'Paid' ORDER BY payment_date DESC LIMIT 1";
            $result_receipt = $conn->query($sql_receipt);

            if ($result_receipt->num_rows > 0) {
                // Fetch the receipt details
                $receipt = $result_receipt->fetch_assoc();
                $request_id = $receipt["request_id"];
                $amount = $receipt["amount"];
                $payment_date = $receipt["payment_date"];
                $user_id = $receipt["user_id"];

                $receiptContent = "Request ID: $request_id<br>User ID: $user_id<br>Purpose: $purpose<br>Amount: $amount<br>Payment Date: $payment_date";
            } else {
                $receiptContent = "No receipt found.";
            }
        }

        // Return the status and receipt content as JSON
        echo json_encode(array("status" => $status, "receiptContent" => $receiptContent));
    } else {
        echo json_encode(array("status" => "not found", "receiptContent" => ""));
    }
} else {
    echo json_encode(array("status" => "invalid user_id", "receiptContent" => ""));
}

$conn->close();
?>
