<?php
// Database connection
include('../config.php'); // Ensure this file uses the PDO connection

// Check if the connection is established
if (!isset($conn)) {
    die("Database connection was not established.");
}

// Initialize an array to hold error messages
$errors = [];

// Set the upload directory for images
$target_dir = "uploads/";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect Turf Details
    $turf_name = trim($_POST['turf_name']);
    $turf_location = trim($_POST['turf_location']);
    $turf_area = trim($_POST['turf_area']);
    $grounds_number = trim($_POST['grounds_number']);
    $open_time = trim($_POST['open_time']);
    $close_time = trim($_POST['close_time']);
    $description = trim($_POST['description']); // Collect turf description

    // Collect Owner Details
    $owner_name = trim($_POST['owner_name']);
    $owner_email = trim($_POST['owner_email']);
    $owner_contact = trim($_POST['owner_contact']);
    $owner_address = trim($_POST['owner_address']);
    $owner_aadhar = trim($_POST['owner_aadhar']);

    // Collect User Credentials
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    // Validate turf image upload
    if (isset($_FILES['turf_image']) && $_FILES['turf_image']['error'] == 0) {
        $turf_image = $target_dir . basename($_FILES["turf_image"]["name"]);
        $imageFileType = strtolower(pathinfo($turf_image, PATHINFO_EXTENSION));

        // Check if the file is a valid image
        $check = getimagesize($_FILES["turf_image"]["tmp_name"]);
        if ($check === false) {
            $errors[] = "Turf image file is not a valid image.";
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed for the turf image.";
        }

        // Check file size (optional)
        if ($_FILES["turf_image"]["size"] > 5000000) { // Limit to 5MB
            $errors[] = "Sorry, your turf image is too large.";
        }

        // Try to upload file if no issues found
        if (empty($errors) && !move_uploaded_file($_FILES["turf_image"]["tmp_name"], $turf_image)) {
            $errors[] = "Sorry, there was an error uploading the turf image.";
        }
    } else {
        $errors[] = "Turf image not uploaded.";
    }

    // Validate owner image upload
    if (isset($_FILES['owner_image']) && $_FILES['owner_image']['error'] == 0) {
        $owner_image = $target_dir . basename($_FILES["owner_image"]["name"]);
        $imageFileType = strtolower(pathinfo($owner_image, PATHINFO_EXTENSION));

        // Check if the file is a valid image
        $check = getimagesize($_FILES["owner_image"]["tmp_name"]);
        if ($check === false) {
            $errors[] = "Owner image file is not a valid image.";
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed for the owner image.";
        }

        // Check file size (optional)
        if ($_FILES["owner_image"]["size"] > 5000000) { // Limit to 5MB
            $errors[] = "Sorry, your owner image is too large.";
        }

        // Try to upload file if no issues found
        if (empty($errors) && !move_uploaded_file($_FILES["owner_image"]["tmp_name"], $owner_image)) {
            $errors[] = "Sorry, there was an error uploading the owner image.";
        }
    } else {
        $errors[] = "Owner image not uploaded.";
    }

    // If there are no errors, insert the data into the database
    if (empty($errors)) {
        // Prepare SQL statement
        $sql = "INSERT INTO turf_owners (turf_name, turf_location, turf_area, grounds_number, open_time, close_time, description, image, owner_name, owner_email, owner_contact, owner_address, owner_aadhar, owner_image, username, email, password) 
        VALUES (:turf_name, :turf_location, :turf_area, :grounds_number, :open_time, :close_time, :description, :turf_image, :owner_name, :owner_email, :owner_contact, :owner_address, :owner_aadhar, :owner_image, :username, :email, :hashed_password)";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':turf_name', $turf_name);
        $stmt->bindParam(':turf_location', $turf_location);
        $stmt->bindParam(':turf_area', $turf_area);
        $stmt->bindParam(':grounds_number', $grounds_number);
        $stmt->bindParam(':open_time', $open_time);
        $stmt->bindParam(':close_time', $close_time);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':turf_image', $turf_image);
        $stmt->bindParam(':owner_name', $owner_name);
        $stmt->bindParam(':owner_email', $owner_email);
        $stmt->bindParam(':owner_contact', $owner_contact);
        $stmt->bindParam(':owner_address', $owner_address);
        $stmt->bindParam(':owner_aadhar', $owner_aadhar);
        $stmt->bindParam(':owner_image', $owner_image);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':hashed_password', $hashed_password);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Registration failed. Please try again.";
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>
