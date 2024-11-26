<?php
// Include your database configuration file
include('../config.php');

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if 'id' is passed in the URL
if (isset($_GET['id'])) {
    $game_id = $_GET['id'];

    // Prepare SQL DELETE statement to remove the game
    $sql = "DELETE FROM games WHERE id = :game_id AND turf_owners_id = :user_id";
    $stmt = $conn->prepare($sql);

    // Bind the game id and user id
    $stmt->bindValue(':game_id', $game_id, PDO::PARAM_INT);
    $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

    // Execute the deletion query
    if ($stmt->execute()) {
        // Success: Redirect back to the games list with a success message
        header("Location: games_list.php?status=deleted");
        exit();
    } else {
        // Error: Handle query failure
        echo "Error deleting the game.";
    }
} else {
    // Error: No game ID found in the URL
    echo "Invalid request.";
}
?>
