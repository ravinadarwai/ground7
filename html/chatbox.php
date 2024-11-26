<?php
session_start();
include('../config.php'); // Ensure this contains the PDO connection setup

// Check if user is logged in


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['userid'])) {
        // Redirect to login page if not logged in
        header('Location: login_page.php'); // Change this to your login page
        exit();
    }

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


<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from html/user-bookings.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:16:42 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Ground 7</title>

    <meta name="twitter:description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand." />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand." />
    <meta name="keywords"
        content="badminton, coaching, event, players, training, courts, tournament, athletes, courts rent, lessons, court booking, stores, sports faqs, leagues, chat, wallet, invoice" />
    <meta name="author" content="Dreamguys - Ground7" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@dreamguystech" />
    <meta name="twitter:title" content="Ground7 -  Booking Coaches, Venue for tournaments, Court Rental template" />
    <meta name="twitter:image" content="assets/img/meta-image.jpg" />
    <meta name="twitter:image:alt" content="Ground7" />
    <meta property="og:url" content="https://Ground7.dreamguystech.com/" />
    <meta property="og:title" content="Ground7 -  Booking Coaches, Venue for tournaments, Court Rental template" />
    <meta property="og:description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand." />
    <meta property="og:image" content="../assets/img/meta-image.jpg" />
    <meta property="og:image:secure_url" content="assets/img/meta-image.jpg" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="600" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl.theme.default.min.css" />

    <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css" />

    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css" />

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />

    <link rel="stylesheet" href="assets/css/feather.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="./chatbox/styles.css">
    <style>
        .modal-body input[type="text"],
        .modal-body input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
        }

        .modal-body input[type="text"],
        .modal-body input[type="password"] {
            width: 450px !important;
        }
        
    </style>

</head>

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global" />
        </div>
    </div>

    <div class="main-wrapper ">
        <?php include('navbar.php'); ?>


        <style>
            body {
                background: radial-gradient(circle, rgba(28, 132, 133, 1) 27%, rgba(64, 159, 129, 1) 74%);
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f9;
                padding: 0px !important;
            }
        </style>

        <!-- /* .btn{
            width: 120px;
    text-decoration: none;
    border: 1px;
    background: rgb(37, 230, 133);
    padding: 10px 15px;
    border-radius: 20px;
    margin-bottom: 20px;
    color: #fff;
        } */ -->

        <div class="chatbox">
            <div class="doremon">
                <a href="./chatbox/post.php" class="btn0"><i class="fa-solid fa-circle-plus"></i> Create Post</a>
            </div>
            <?php
            // Fetch all posts
            $sql = "SELECT * FROM posts";
            $stmt = $conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results into an associative array
            ?>

            <div class="posts">
                <?php if (count($result) > 0): ?>
                    <?php foreach ($result as $row): ?>
                        <div class="post">
                            <div class="post-header">
                                <h3><i class="fa-solid fa-user"></i>&nbsp;<?php echo htmlspecialchars($row['username']); ?></h3>

                                <!-- Three dots for dropdown -->
                                <div class="dropdown">
                                    <span class="three-dots" onclick="toggleDropdown(<?php echo $row['id']; ?>)">&#x22EE;</span>
                                    <div class="dropdown-menu" id="dropdown-menu-<?php echo $row['id']; ?>" style="display: none;">
                                        <form action="./chatbox/delete_post.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn1"><i class="fa-solid fa-trash-can"></i>Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="post-description">
                                <p id="description-<?php echo $row['id']; ?>" class="description-content">
                                    <?php echo nl2br(htmlspecialchars($row['description'])); ?>
                                </p>

                                <?php if (strlen($row['description']) > 150): ?>
                                    <a href="javascript:void(0);" onclick="toggleDescription(<?php echo $row['id']; ?>)" id="read-more-<?php echo $row['id']; ?>" class="read-more">Read More</a>
                                <?php endif; ?>
                            </div>

                            <!-- Display image or video -->
                            <?php if ($row['media_type'] == 'image'): ?>
                                <img src="<?php echo $row['media_url']; ?>" class="media">
                            <?php elseif ($row['media_type'] == 'video'): ?>
                                <video src="<?php echo $row['media_url']; ?>" class="media" controls></video>
                            <?php endif; ?>

                            <div class="interaction">
                                <span id="like-count-<?php echo $row['id']; ?>"><?php echo $row['likes']; ?></span>

                                <!-- Like Form -->
                                <form action="" method="POST" style="display:inline;">
                                    <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn" style="border:none; background:none;">
                                        <i class="fa-regular fa-heart" id="heart-icon-<?php echo $row['id']; ?>"></i>
                                    </button>
                                </form>

                                <!-- Comment Count Section -->
                                <?php

                                $commentCountSql = "SELECT COUNT(*) as comment_count FROM comments WHERE post_id = :post_id";
                                $commentCountStmt = $conn->prepare($commentCountSql);
                                $commentCountStmt->execute(['post_id' => $row['id']]);
                                $commentCountResult = $commentCountStmt->fetch(PDO::FETCH_ASSOC);
                                $commentCount = $commentCountResult['comment_count'] ?? 0; // Default to 0 if no comments
                                ?>
                                <span><?php echo $commentCount; ?>
                                    <a href="javascript:void(0);" onclick="toggleComments(<?php echo $row['id']; ?>)">Comment</a>
                                </span>
                                <!-- Comment Section -->
                                <div class="comments  mt-5" id="comments-section-<?php echo $row['id']; ?>" style="display: none; ">
                                    <h4>Comments</h4>
                                    <?php

                                    // Fetch comments for the current post
                                    $commentSql = "SELECT c.comment_text, u.username FROM comments c INNER JOIN users u ON c.user_id = u.id WHERE c.post_id = :post_id";
                                    $commentStmt = $conn->prepare($commentSql);
                                    $commentStmt->execute(['post_id' => $row['id']]);
                                    ?>
                                    <?php if ($commentStmt->rowCount() > 0): ?>
                                        <?php while ($comment = $commentStmt->fetch(PDO::FETCH_ASSOC)): ?>
                                            <p><strong><?php echo htmlspecialchars($comment['username']); ?>:</strong> <?php echo htmlspecialchars($comment['comment_text']); ?></p>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <p>No comments yet.</p>
                                    <?php endif; ?>

                                    <!-- Add Comment -->
                                    <form action="" method="POST">
                                        <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                                        <textarea name="comment_text" placeholder="Write a comment..." required></textarea>
                                        <button type="submit" class="btn">Add Comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No posts yet.</p>
                <?php endif; ?>
            </div>

        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_id'])) {
            if (!isset($_SESSION['userid'])) {
                // Redirect to login page if not logged in
                header('Location: login_page.php'); // Change this to your login page
                exit();
            }

            // Get the post ID from the POST request
            $post_id = $_POST['post_id'];
            $user_id = $_SESSION['userid']; // Assuming you store user ID in session

            // Check if the user has already liked the post
            $checkLikeSql = "SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id";
            $checkLikeStmt = $conn->prepare($checkLikeSql);
            $checkLikeStmt->execute(['post_id' => $post_id, 'user_id' => $user_id]);

            if ($checkLikeStmt->rowCount() === 0) {
                // User has not liked the post yet; proceed to add a like
                $likeSql = "INSERT INTO likes (post_id, user_id) VALUES (:post_id, :user_id)";
                $likeStmt = $conn->prepare($likeSql);
                $likeStmt->execute(['post_id' => $post_id, 'user_id' => $user_id]);

                // Increment like count in posts table
                $updateLikesSql = "UPDATE posts SET likes = likes + 1 WHERE id = :post_id";
                $updateStmt = $conn->prepare($updateLikesSql);
                $updateStmt->execute(['post_id' => $post_id]);

                // Get the updated like count
                $getLikeCountSql = "SELECT likes FROM posts WHERE id = :post_id";
                $getLikeCountStmt = $conn->prepare($getLikeCountSql);
                $getLikeCountStmt->execute(['post_id' => $post_id]);
                $likeCount = $getLikeCountStmt->fetchColumn();

                // Return the like action and updated like count
                echo json_encode(['action' => 'liked', 'post_id' => $post_id, 'like_count' => $likeCount]);
            } else {
                // User already liked the post; proceed to remove the like
                $deleteLikeSql = "DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id";
                $deleteLikeStmt = $conn->prepare($deleteLikeSql);
                $deleteLikeStmt->execute(['post_id' => $post_id, 'user_id' => $user_id]);

                // Decrement like count in posts table
                $updateLikesSql = "UPDATE posts SET likes = likes - 1 WHERE id = :post_id";
                $updateStmt = $conn->prepare($updateLikesSql);
                $updateStmt->execute(['post_id' => $post_id]);

                // Get the updated like count
                $getLikeCountSql = "SELECT likes FROM posts WHERE id = :post_id";
                $getLikeCountStmt = $conn->prepare($getLikeCountSql);
                $getLikeCountStmt->execute(['post_id' => $post_id]);
                $likeCount = $getLikeCountStmt->fetchColumn();

                // Return the unlike action and updated like count
                echo json_encode(['action' => 'unliked', 'post_id' => $post_id, 'like_count' => $likeCount]);
            }
        }
        ?>


        <script>
function toggleDescription(postId) {
    var description = document.getElementById('description-' + postId);
    var readMoreLink = document.getElementById('read-more-' + postId);

    // Check if the description is currently expanded or collapsed
    if (description.style.maxHeight) {
        // If expanded, collapse it
        description.style.maxHeight = null;
        readMoreLink.innerHTML = "Read More"; // Change link text back
    } else {
        // If collapsed, expand it
        description.style.maxHeight = description.scrollHeight + "px"; // Set to the scroll height for expansion
        readMoreLink.innerHTML = "Read Less"; // Change link text to indicate collapse
    }
}

        </script>
        <script src="./chatbox/script.js"></script>

        <?php include 'footer.php'; ?>

    </div>

    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js" type="22969ea9bbb12eca6b9f86cb-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="22969ea9bbb12eca6b9f86cb-text/javascript"></script>
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"
        type="22969ea9bbb12eca6b9f86cb-text/javascript"></script>
    <script src="assets/plugins/datatables/datatables.min.js" type="22969ea9bbb12eca6b9f86cb-text/javascript"></script>

    <script src="assets/plugins/owl-carousel/owl.carousel.min.js"
        type="22969ea9bbb12eca6b9f86cb-text/javascript"></script>

    <script src="assets/plugins/fancybox/jquery.fancybox.min.js"
        type="22969ea9bbb12eca6b9f86cb-text/javascript"></script>

    <script src="assets/plugins/select2/js/select2.min.js" type="22969ea9bbb12eca6b9f86cb-text/javascript"></script>

    <script src="assets/js/script.js" type="22969ea9bbb12eca6b9f86cb-text/javascript"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="22969ea9bbb12eca6b9f86cb-|49" defer></script>
    <script src="https://kit.fontawesome.com/76064baaa2.js" crossorigin="anonymous"></script>

</body>

<!-- Mirrored from html/user-bookings.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:17:01 GMT -->