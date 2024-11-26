<?php
session_start(); // Ensure session is started
include_once '../../config.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the post ID and comment text from the POST request
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['userid']; // Assuming you store user ID in session
    $comment_text = $_POST['comment_text'];

    // Insert the comment into the database
    $sql = "INSERT INTO comments (post_id, user_id, comment_text) VALUES (:post_id, :user_id, :comment_text)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'post_id' => $post_id,
        'user_id' => $user_id,
        'comment_text' => $comment_text
    ]);

    // Redirect back to the chatbox page after submitting the comment
    header("Location: ./chatbox.php");
    exit();
}
?>
