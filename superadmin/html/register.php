<?php
// Check if form is submitted
if (isset($_POST['submit'])) {
    
    include('../../config.php'); // Make sure this points to your database connection

    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password
    $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    if (!preg_match($pattern, $password)) {
        // Redirect with error if validation fails
        header("Location: register.php?error=invalid_password");
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        // Redirect with error if passwords do not match
        header("Location: register.php?error=password_mismatch");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute SQL statement to insert the new admin
    $sql = "INSERT INTO superadmin (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);

    if ($stmt->execute()) {
        // Registration successful
        header("Location: login.php?success=registration_complete");
        exit();
    } else {
        // Registration failed
        header("Location: register.php?error=registration_failed");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
</head>
<body>
    <h2>Admin Registration</h2>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>
