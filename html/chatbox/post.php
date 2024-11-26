<?php
include('../../config.php'); // Ensure this contains the PDO connection setup

// Check if user is logged in
if (!isset($_SESSION['userid'])) {
    // Redirect to login page if not logged in
    header('Location: ../login_page.php'); // Change this to your login page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $description = $_POST['description'];
    $media = $_FILES['media'];

    // Check if the uploaded file is an image or video
    $mediaType = strpos($media['type'], 'image') !== false ? 'image' : 'video';
    $mediaPath = 'uploads/' . basename($media['name']);

    // Move the uploaded file to the uploads directory
    if (move_uploaded_file($media['tmp_name'], $mediaPath)) {
        try {
            // Prepare the SQL statement
            $sql = "INSERT INTO posts (username, description, media_url, media_type) VALUES (:username, :description, :media_url, :media_type)";
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':media_url', $mediaPath);
            $stmt->bindParam(':media_type', $mediaType);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Post created successfully!";
            } else {
                echo "Error: Could not create post.";
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error uploading media!";
    }

    // Redirect after creating post
    header('Location: ./chatbox.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Post</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            padding: 0;
            margin: 0;
            overflow-y: hidden;
            overflow-x: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100dvh;
            background-color: #369984;   
            background-image:
                radial-gradient(at 47% 33%, hsl(167.27, 44%, 41%) 0, transparent 59%),
                radial-gradient(at 82% 65%, hsl(179.42, 63%, 72%) 0, transparent 55%);
            background-repeat: no-repeat;
        }

        .btn {
            margin-top: 20px;
        }

        .post-form {
            margin-top: 0;
            backdrop-filter: blur(8px) saturate(200%);
            -webkit-backdrop-filter: blur(8px) saturate(200%);
            background-color: rgba(17, 25, 40, 0.16);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.125);
        }

        .cancel {
            display: flex;
            text-decoration: none;
            justify-content: end;
            align-items: end;
            padding: 10px;
            color: #000;
        }

        .cancel:hover {
            color: red;
        }
       .btn{
        cursor: pointer;
            width: 120px;
    text-decoration: none;
    border: 1px;
    background: rgb(37, 230, 133);
    padding: 20px 20px;
    border-radius: 20px;
    margin-bottom: 20px;
    color: #fff;
        } 
    </style>
</head>
<script src="https://kit.fontawesome.com/76064baaa2.js" crossorigin="anonymous"></script>

<body>
    <div class="post-form">
        <a href="../chatbox.html" class="cancel" style="color: #fff;"><i class="fa-solid fa-xmark"></i></a>
        <h2 style="color: #fff;">CREATE YOUR POST</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="username" placeholder="Your Name" required>
            <textarea name="description" placeholder="Post Description" required></textarea><br>
            <label for="img/video" style="color: #fff; font-weight:600;"> Select Image/Video</label><br>
            <input type="file" name="media" accept="image/*,video/*" required>
            <button type="submit" class="btn">Create Post</button>
        </form>
    </div>
</body>

</html>