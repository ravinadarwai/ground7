<?php
include('../../config.php'); // Ensure this contains the PDO connection setup

if (isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

    // Retrieve the image path from the post
    $sql = "SELECT media_url FROM posts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $media_url = $row['media_url'];

        // Delete the image file if it exists
        if (file_exists($media_url)) {
            unlink($media_url);
        }

        // Delete post after image is removed
        $sql = "DELETE FROM posts WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
    }

    header("Location: chatbox.html");
}
?>
