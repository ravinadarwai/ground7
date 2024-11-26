<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('../config.php'); // Ensure this file uses PDO for the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare the SQL statement using PDO
    $sql = "SELECT id, username, turf_name, password FROM turf_owners WHERE email = :email";
    
    // Prepare statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':email', $email);
    
    // Execute statement
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        // User found
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['turf_name'] = $user['turf_name'];

            // Redirect to dashboard
            header("Location: turf_admin.php");
            exit();
        } else {
            // Invalid password
            echo "<script>alert('Invalid email or password');</script>";
        }
    } else {
        // Invalid email
        echo "<script>alert('Invalid email or password');</script>";
    }
}

// Close connection (optional, PDO does this automatically)
$conn = null; // If you need to explicitly close the connection
?>
