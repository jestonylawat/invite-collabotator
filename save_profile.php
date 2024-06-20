<?php
include 'configure.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $purokNo = $photo = ""; 

    // Sanitize input
    $name = trim($_POST["fullName"]);
    $purokNo = trim($_POST["purokNo"]);
    $userId = 1; // Assuming you have the user ID from session or another source

    // Initialize the response array
    $response = [];

    // Check if file is uploaded and there are no errors
    if (isset($_FILES["profilePhoto"]) && $_FILES["profilePhoto"]["error"] == 0) {
        $allowed_ext = array("jpg", "jpeg", "png", "gif");
        $file_ext = pathinfo($_FILES["profilePhoto"]["name"], PATHINFO_EXTENSION);

        // Validate file extension
        if (in_array($file_ext, $allowed_ext)) {
            // Read file content
            $temp_name = $_FILES["profilePhoto"]["tmp_name"];
            $photo = file_get_contents($temp_name); // Read file content as binary
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Invalid file format. Please upload a JPG, JPEG, PNG, or GIF file.'
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Error uploading file. Please try again.'
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO profiles (user_id, full_name, purok_no, photo) VALUES (:user_id, :name, :purokNo, :photo)";
    if ($stmt = $pdo->prepare($sql)) {
        // Bind parameters
        $stmt->bindParam(":user_id", $param_user_id);
        $stmt->bindParam(":name", $param_name);
        $stmt->bindParam(":purokNo", $param_purokNo);
        $stmt->bindParam(":photo", $param_photo, PDO::PARAM_LOB);

        // Set parameters
        $param_user_id = $userId;
        $param_name = $name;
        $param_purokNo = $purokNo;
        $param_photo = $photo;

        // Execute the statement
        if ($stmt->execute()) {
            $response = array(
    'status' => 'success',
    'message' => 'Profile saved successfully',
    'redirect' => 'userhome.php' // or any other URL you want to redirect to
);

        } else {
            $response = [
                'status' => 'error',
                'message' => 'Oops! Something went wrong. Please try again later.'
            ];
        }

        // Close the statement
        unset($stmt);
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Failed to prepare the statement.'
        ];
    }

    // Close the connection
    unset($pdo);

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
