<?php
// Include database connection file
include 'db_connection.php';

// Initialize session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password']; 

    // SQL query to check if the provided username and password match a user in the database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql); 

    if (mysqli_num_rows($result) == 1) {
        // Login successful
        // Store user data in session variables for later use
        $user_data = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user_data['id'];
        $_SESSION['username'] = $user_data['username'];
        // Add more session variables as needed

        // Return success response
        echo "success";
    } else {
        // Login failed
        // Return failure response
        echo "failure";
    }
}

// Close database connection
mysqli_close($conn);
?>
