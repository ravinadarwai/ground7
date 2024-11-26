<?php
// Include your database connection
require '../config.php'; // Adjust the path according to your project structure

// Check if the 'id' parameter exists in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Prepare the SQL delete statement to remove the user
    $query = "DELETE FROM turfuser WHERE id = :id";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind the parameter to the query (Sanitize user input)
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

    // Execute the statement
    if ($stmt->execute()) {
        // Success: Redirect to the users list page or show a success message
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?status=deleted");
        exit();
    } else {
        // Error: Display an error message
        echo "Error deleting the user.";
    }
} else {
    // Error: No 'id' parameter found
    echo "Invalid request.";
}

// Close the connection (Optional for PDO, but good practice)
$conn = null;
?>
