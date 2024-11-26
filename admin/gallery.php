<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: turf_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

include('../config.php'); // Your database connection

$imagePath = ""; // Variable to store the uploaded image path

// Fetch the current location from the database
$locationSql = "SELECT location FROM gallery WHERE user_id = ? LIMIT 1";
$locationStmt = $conn->prepare($locationSql);
$locationStmt->execute([$user_id]);
$currentLocation = $locationStmt->fetchColumn();

// Handling form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    // Handle upload action
    if ($_POST['action'] === 'upload') {
        // Retrieve form data
        $newLocation = trim($_POST['location']); // Trim to avoid unnecessary spaces

        // Check if the new location is provided and needs to be updated
        if (!empty($newLocation) && $newLocation !== $currentLocation) {
            // Update the location in the database
            $updateLocationSql = "UPDATE gallery SET location = ? WHERE user_id = ?";
            $updateLocationStmt = $conn->prepare($updateLocationSql);
            $updateLocationStmt->execute([$newLocation, $user_id]);
            $currentLocation = $newLocation; // Update the current location variable
            echo "<div class='alert alert-success text-center'>Location updated successfully!</div>";
        }

        // Image upload handling
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "uploads/";
            // Ensure the uploads directory exists
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }

            $fileName = basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $newFileName = time() . '_' . $fileName; // Unique file name
            $target_file = $target_dir . $newFileName;
            $uploadOk = 1;

            // Check if image file is an actual image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check === false) {
                echo "<div class='alert alert-danger text-center'>File is not an image.</div>";
                $uploadOk = 0;
            }

            // Check file size (limit to 2MB)
            if ($_FILES["image"]["size"] > 2000000) {
                echo "<div class='alert alert-danger text-center'>Sorry, your file is too large.</div>";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                echo "<div class='alert alert-danger text-center'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 due to an error
            if ($uploadOk === 0) {
                echo "<div class='alert alert-danger text-center'>Sorry, your file was not uploaded.</div>";
            } else {
                // Check if user_id exists in turf_owners before inserting into gallery
                $checkSql = "SELECT id FROM turf_owners WHERE id = ?";
                $checkStmt = $conn->prepare($checkSql);
                $checkStmt->execute([$user_id]);

                if ($checkStmt->rowCount() > 0) {
                    // Try to upload file
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        // Save the file path and location in the database
                        $sql = "INSERT INTO gallery (user_id, image, location) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($sql);

                        if ($stmt->execute([$user_id, $target_file, $currentLocation])) {
                            echo "<div class='alert alert-success text-center'>Image uploaded successfully!</div>";
                        } else {
                            echo "<div class='alert alert-danger text-center'>Failed to save the image and location in the database.</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger text-center'>Sorry, there was an error uploading your file.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger text-center'>Invalid user ID. Cannot insert into gallery.</div>";
                }
            }
        } elseif (isset($_FILES['image'])) {
            echo "<div class='alert alert-danger text-center'>Error uploading file.</div>";
        }
    } elseif ($_POST['action'] === 'delete') {
        // Delete image functionality
        $image_id = $_POST['image_id'];

        // Fetch image path from the database
        $sql = "SELECT image FROM gallery WHERE id = ? AND user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$image_id, $user_id]);
        $image = $stmt->fetchColumn();

        if ($image) {
            // Delete from filesystem
            if (unlink($image)) {
                // Delete from database
                $deleteSql = "DELETE FROM gallery WHERE id = ? AND user_id = ?";
                $deleteStmt = $conn->prepare($deleteSql);
                if ($deleteStmt->execute([$image_id, $user_id])) {
                    echo "<div class='alert alert-success text-center'>Image deleted successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>Failed to delete image from database.</div>";
                }
            } else {
                echo "<div class='alert alert-danger text-center'>Failed to delete image from filesystem.</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>Invalid image ID.</div>";
        }
    }
}

// Fetch all uploaded images from the database
$sql = "SELECT id, image, location FROM gallery WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$user_id]);
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Ground7</title>

    <meta name="twitter:description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
    <meta name="keywords"
        content="badminton, coaching, event, players, training, courts, tournament, athletes, courts rent, lessons, court booking, stores, sports faqs, leagues, chat, wallet, invoice">
    <meta name="author" content="Dreamguys - Ground7">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@dreamguystech">
    <meta name="twitter:title" content="Ground7 -  Booking Coaches, Venue for tournaments, Court Rental template">
    <meta name="twitter:image" content="assets/img/meta-image.jpg">
    <meta name="twitter:image:alt" content="Ground7">
    <meta property="og:url" content="https://Ground7.dreamguystech.com/">
    <meta property="og:title" content="Ground7 -  Booking Coaches, Venue for tournaments, Court Rental template">
    <meta property="og:description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
    <meta property="og:image" content="../assets/img/meta-image.jpg">
    <meta property="og:image:secure_url" content="assets/img/meta-image.jpg">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .availability-box {
            /* Your existing styles */
        }

        .availability-box.highlight {
            background-color: #f0f8ff;
            /* Light blue background */
            border: 2px solid #007bff;
            /* Blue border */
            transition: 0.3s;
            /* Smooth transition */
        }

        .availability-box.highlight h6,
        .availability-box.highlight span {
            font-weight: bold;
            /* Bold text for better visibility */
        }

        .card {
            margin: 10px;
        }
    </style>
</head>
<body>
<div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global">
        </div>
    </div>

    <div class="main-wrapper">
        <?php include('navbar.php'); ?>
    <div class="content court-bg">
        <div class="container">
            <div class="profile-detail-group">
                <div class="card">
                    <h4>Upload Image</h4>
                    <form id="changeProfileForm" enctype="multipart/form-data" method="POST" action="">
                        <div class="row">
                            <!-- Location Input Field -->
                            <div class="col-lg-7 col-md-7">
                                <div class="input-space">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location" value="<?php echo htmlspecialchars($currentLocation); ?>" required>
                                </div>
                            </div>
                            <!-- Image Upload Field -->
                            <div class="col-lg-7 col-md-7">
                                <div class="input-space">
                                    <label class="form-label">Upload Image</label>
                                    <input style="padding: 10px;" type="file" class="form-control" id="image" name="image" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="save-changes text-end">
                            <input type="hidden" name="action" value="upload">
                            <button type="submit" class="btn btn-primary" style="background-color:#097E52;">Upload Image</button>
                        </div>
                    </form>
                </div>

                <div class="profile-detail-group mt-4">
                    <h4>Uploaded Images</h4>
                    <div class="row">
                        <?php if (!empty($images)): ?>
                            <?php foreach ($images as $image): ?>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card">
                                        <img src="<?php echo htmlspecialchars($image['image']); ?>" alt="Uploaded Image" class="card-img-top img-fluid">
                                        <div class="card-body text-center">
                                            <hr>
                                            <form method="POST" action="">
                                                <input type="hidden" name="image_id" value="<?php echo $image['id']; ?>">
                                                <input type="hidden" name="action" value="delete">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No images uploaded yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Add your footer here -->


<?php        include('footer.php');  ?>
</div>
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>

    <script src="assets/plugins/select2/js/select2.min.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>

    <script src="assets/plugins/apexchart/apexcharts.min.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>
    <script src="assets/plugins/apexchart/chart-data.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>

    <script src="assets/js/script.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="b982b0fe9ac7fcf2b7eab402-|49" defer></script>
    </body>

    <!-- Mirrored from html/coach-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:16:05 GMT -->

</html>