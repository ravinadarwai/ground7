<?php
include('../../config.php');
if (isset($_GET['id'])) {
    // Get the user ID from the URL
    $userId = intval($_GET['id']); // Use intval to ensure it's an integer

    try {
        // Create a new PDO connection
      
        // Prepare the DELETE statement
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Redirect back to the user table with a success message
            header("Location: table-basic.php?msg=User deleted successfully");
            exit();
        } else {
            echo "Error deleting user.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}

// Close connection
$conn = null;
?>
