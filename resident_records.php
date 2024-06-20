<?php
// Include database configuration
include 'configure.php';

// Fetch resident records from the database
$stmt = $pdo->query("SELECT * FROM profiles");
$resident_records = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Close the database connection
unset($pdo); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Resident Records</h2>
        <table class="table"> 
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Purok No.</th>
                    <th>Profile Photo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resident_records as $record): ?>
                    <tr>
                        <td><?php echo $record['full_name']; ?></td>
                        <td><?php echo $record['purok_no']; ?></td>
                        <td><img src="data:image/jpeg;base64,<?php echo base64_encode($record['photo']); ?>" width="100" alt="Profile Photo"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
