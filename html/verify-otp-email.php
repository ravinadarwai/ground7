<?php
session_start();
include('../config.php');  // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredOtp = $_POST['otp'];

    // Check if OTP from session matches the entered OTP
    if (isset($_SESSION['otp']) && $_SESSION['otp'] == $enteredOtp) {
        // OTP is valid, proceed to insert data into the database
        $email = $_SESSION['email'];
        
        // Insert the email and set full_name to email; the rest will be NULL
        $stmt = $conn->prepare("
            INSERT INTO users (email, full_name, verifiedEmail, created_at, updated_at) 
            VALUES (:email, :full_name, 1, NOW(), NOW())
        ");
        
        // Bind parameters and execute the query
     // Error handling for database query
try {
    $stmt->execute([
        ':email' => $email,
        ':full_name' => $email // Set the full name as the email
    ]);
    $_SESSION['username'] = $email;  // Store the username in the session

    // Clear OTP and email session
    unset($_SESSION['otp']);
    unset($_SESSION['email']);

    echo "Email verified and user data inserted successfully.";
    header("Location: ../index.php");  // Redirect to home page or dashboard
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


}
}
?>
