<?php
// Include database connection file
include 'db_connection.php';

// Initialize session 
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['adminusername'];
    $password = $_POST['adminpassword']; 

    // For debugging purposes: print received username and password
    error_log("Received Username: $username");
    error_log("Received Password: $password");

    // Prepare and execute the SQL query to check if the provided username and password match an admin in the database
    $sql = "SELECT * FROM admin WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        error_log("Failed to prepare statement: " . $conn->error);
        echo "failure";
        exit;
    }

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    error_log("Number of rows found: " . $result->num_rows);

    if ($result->num_rows == 1) {
        // Login successful
        // Store user data in session variables for later use
        $user_data = $result->fetch_assoc();
        $_SESSION['user_id'] = $user_data['user_id']; // Changed from 'id' to 'user_id'
        $_SESSION['username'] = $user_data['username'];

        // Return success response
        echo "success";
    } else {
        // Login failed
        // Return failure response
        echo "failure";
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
