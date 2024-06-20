<?php
// Include database configuration
include 'configure.php';

// Fetch approved clearance requests from the database
$query = "SELECT*FROM clearance_requests
          WHERE status = 'Approved'";
$stmt = $pdo->query($query);
$approved_requests = $stmt->fetchAll(PDO::FETCH_ASSOC); 

// Close the database connection
unset($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Approved Clearance Requests</h2>
        <a href="adminhome.php" class="btn btn-secondary mb-3">Back</a> <!-- Back button -->
        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Purok No</th>
                    <th>Purpose</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($approved_requests as $request): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($request['user_id']); ?></td>
                        <td><?php echo htmlspecialchars($request['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($request['purok_no']); ?></td>
                        <td><?php echo htmlspecialchars($request['purpose']); ?></td>
                        <td><?php echo htmlspecialchars($request['created_at']); ?></td>
                        <td><?php echo htmlspecialchars($request['status']); ?></td>
                        <td>
                            <form action="send_receipt.php" method="post">
                                <input type="hidden" name="request_id" value="<?php echo htmlspecialchars($request['id']); ?>">
                                <button type="submit" name="send_receipt" class="btn btn-primary">Send Receipt</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>
