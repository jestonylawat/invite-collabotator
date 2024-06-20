<?php
// Include database configuration
include 'configure.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve request ID and action from the form
    $request_id = $_POST['request_id'];
    $action = $_POST['action'];

    // Determine the new status based on the action
    $new_status = ($action == 'approve') ? 'Approved' : 'Rejected';

    // Prepare the SQL update query
    $query = "UPDATE clearance_requests SET status = :new_status WHERE id = :request_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':new_status', $new_status);
    $stmt->bindParam(':request_id', $request_id);

    // Execute the update query
    if ($stmt->execute()) {
        // Redirect back to the clearance requests page after updating
        header('Location: clearance_requests.php');
        exit;
    } else {
        echo "Failed to update the status.";
    }

    // Close the database connection
    unset($pdo);
} else {
    echo "Invalid request method.";
}
?>
