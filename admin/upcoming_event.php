<?php
session_start();
include('../config.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: turf_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Include the database configuration

// Check if the connection is established
if (!isset($conn)) {
    die("Database connection failed.");
}

// Initialize an array for errors
$errors = [];

// Set the upload directory for images
$target_dir = "uploads/events/";

// Check if the turf_id is set in the URL
if (isset($_GET['id'])) {
    $turf_id = $_GET['id']; // Capture turf_id from URL
} else {
    die("Turf ID not provided.");
}
// Add this before your SQL execution block
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect event details
    $event_name = trim($_POST['event_name']);
    $event_date = trim($_POST['event_date']);
    $event_time = trim($_POST['event_time']);
    $event_location = trim($_POST['event_location']);
    $event_description = trim($_POST['event_description']);
    $price = trim($_POST['price']);
    
    // Initialize event_image variable
    $event_image = null;

    // Basic input validation
    if (empty($event_name) || empty($event_date) || empty($event_time) || empty($event_location) || empty($event_description) || empty($price) || empty($_FILES['event_image']['name'])) {
        $errors[] = "All fields are required.";
    }

    // Check if the file was uploaded without errors
    if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] === UPLOAD_ERR_OK) {
        // Specify the target path for the uploaded file
        $target_file = $target_dir . basename($_FILES['event_image']['name']);
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['event_image']['tmp_name'], $target_file)) {
            // Assign the file name to $event_image for database insertion
            $event_image = basename($_FILES['event_image']['name']);
        } else {
            $errors[] = "Failed to upload image.";
        }
    } else {
        $errors[] = "Image file is required.";
    }

    // If there are no errors, insert the event data into the database
    if (empty($errors)) {
        $sql = "INSERT INTO events (event_name, event_date, event_time, event_location, event_description, event_image, price, turf_id) 
                VALUES (:event_name, :event_date, :event_time, :event_location, :event_description, :event_image, :price, :turf_id)";

        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':event_name', $event_name);
        $stmt->bindParam(':event_date', $event_date);
        $stmt->bindParam(':event_time', $event_time);
        $stmt->bindParam(':event_location', $event_location);
        $stmt->bindParam(':event_description', $event_description);
        $stmt->bindParam(':event_image', $event_image);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':turf_id', $turf_id);

        // Execute and check
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Event added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $stmt->errorInfo()[2] . "</div>";
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>" . $error . "</div>";
        }
    }
}



// Close the connection
$conn = null;
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

        .form-section {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .form-section h2 {
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Availability</title>

</head>

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global">
        </div>
    </div>

    <div class="main-wrapper">
        <?php include('navbar.php'); ?>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-section" style="border: 1px solid green; margin:20px;">
                    <button class="btn btn-custom" style="position: absolute; top: 20px; right: 35px;"><a href="show _event?id=<?php echo $user_id; ?> " style=" color:#fff; text-decoration: none;">View</a></button>
                    
                    <h2 class="text-center">Add Upcoming Event</h2>

                    <form id="addEventForm" method="POST" action="" enctype="multipart/form-data">
                        <!-- Event Name -->
                        <div class="form-group">
                            <label for="event_name">Event Name</label>
                            <input type="text" class="form-control" name="event_name" id="event_name" placeholder="Enter event name" required>
                        </div>

                        <!-- Event Date -->
                        <div class="form-group">
                            <label for="event_date">Event Date</label>
                            <input type="date" class="form-control" name="event_date" id="event_date" required>
                        </div>

                        <!-- Event Time -->
                        <div class="form-group">
                            <label for="event_time">Event Time</label>
                            <input type="time" class="form-control" name="event_time" id="event_time" required>
                        </div>
                        <div class="form-group">
                            <label for="price">price</label>
                            <input type="price" class="form-control" name="price" id="price" required>
                        </div>
                        <!-- Event Location -->
                        <div class="form-group">
                            <label for="event_location">Event Location</label>
                            <input type="text" class="form-control" name="event_location" id="event_location" placeholder="Enter location" required>
                        </div>

                        <!-- Event Description -->
                        <div class="form-group">
                            <label for="event_description">Event Description</label>
                            <textarea class="form-control" name="event_description" id="event_description" rows="4" placeholder="Write a brief description of the event" required></textarea>
                        </div>

                        <!-- Event Image -->
                        <div class="form-group">
                            <label for="event_image">Upload Event Image</label>
                            <input type="file" class="form-control-file" name="event_image" id="event_image" accept="image/*" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-block">Add Event</button>
                        <style>
                            .btn {
                                background-color: #097E52;
                                color: #fff;
                            }

                            .btn:hover {
                                background-color: #0A1A38;
                                color: #fff;
                            }

                            .form-control:hover {
                                border-color: #007bff;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }

                            .form-control-file:hover {
                                border-color: #007bff;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }

                            .form-control:focus {
                                border-color: #007bff;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }

                            .form-control-file:focus {
                                border-color: #007bff;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                            

                        </style>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <?php include('footer.php');  ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

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