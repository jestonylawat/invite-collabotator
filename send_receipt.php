<?php
// Include database configuration
include 'configure.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send_receipt'])) {
    $request_id = $_POST['request_id'];

    // Fetch user_id from the clearance_requests table
    $query = "SELECT user_id FROM clearance_requests WHERE id = :request_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':request_id', $request_id);
    $stmt->execute();
    $request = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $request['user_id'];

    // Assume a fixed amount for the example; in a real scenario, you would get this from the form or business logic
    $amount = 100.00; 
    $payment_date = date('Y-m-d H:i:s');
    $status = 'Paid';

    // Insert the receipt into the receipts table
    $query = "INSERT INTO receipts (request_id, user_id, amount, payment_date, status) 
              VALUES (:request_id, :user_id, :amount, :payment_date, :status)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':request_id', $request_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':payment_date', $payment_date);
    $stmt->bindParam(':status', $status);

    if ($stmt->execute()) {
        // Optionally, update the status in clearance_requests to 'Receipt Sent'
        $update_query = "UPDATE clearance_requests SET status = 'Receipt Sent' WHERE id = :request_id";
        $update_stmt = $pdo->prepare($update_query);
        $update_stmt->bindParam(':request_id', $request_id);
        $update_stmt->execute();

        // Redirect back to the payment management page
        header('Location: payment.php');
        exit;
    } else {
        echo "Failed to send the receipt.";
    }

    // Close the database connection
    unset($pdo);
} else {
    echo "Invalid request.";
}
?>
