<?php
include('../../config.php'); // Ensure this contains the PDO connection setup
if (isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['userid']; // Get the logged-in user's ID

    // Check if the user has already liked the post
    $checkLikeSql = "SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id";
    $stmt = $conn->prepare($checkLikeSql);
    $stmt->execute(['post_id' => $post_id, 'user_id' => $user_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // The user already liked the post, no action needed
        echo ""; 
    } else {
        // Update likes in the posts table
        $likeSql = "UPDATE posts SET likes = likes + 1 WHERE id = :post_id";
        $stmt = $conn->prepare($likeSql);
        $stmt->execute(['post_id' => $post_id]);

        // Insert the user's like into the likes table
        $insertLikeSql = "INSERT INTO likes (post_id, user_id) VALUES (:post_id, :user_id)";
        $stmt = $conn->prepare($insertLikeSql);
        $stmt->execute(['post_id' => $post_id, 'user_id' => $user_id]);

        // Retrieve the updated like count
        $likeCountSql = "SELECT likes FROM posts WHERE id = :post_id";
        $stmt = $conn->prepare($likeCountSql);
        $stmt->execute(['post_id' => $post_id]);
        $likes = $stmt->fetchColumn();

        // Return the updated like count
        echo $likes;
    }
}

?>
