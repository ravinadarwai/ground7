<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('../config.php'); // Ensure this file uses PDO for the database connection

$errors = []; // Initialize an empty array to hold error messages

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: turf_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $game_name = htmlspecialchars(trim($_POST['game_name']));
    $game_description = htmlspecialchars(trim($_POST['game_description']));
    $court_type = htmlspecialchars(trim($_POST['court_type']));
    $max_players = filter_input(INPUT_POST, 'max_players', FILTER_VALIDATE_INT);
    $duration = filter_input(INPUT_POST, 'duration', FILTER_VALIDATE_INT);
    $price_per_person = filter_input(INPUT_POST, 'price_per_person', FILTER_VALIDATE_FLOAT);
    $turf_owners_id = $user_id; // Use the user ID stored in session
    $field_errors = [
        'game_name' => '',
        'game_description' => '',
        'court_type' => '',
        'max_players' => '',
        'duration' => '',
        'price_per_person' => ''
    ];
    
    // Validate and sanitize input
    $game_name = filter_input(INPUT_POST, 'game_name', FILTER_SANITIZE_STRING);
    if (!$game_name) {
        $field_errors['game_name'] = "Game name is required.";
    }
    
    $game_description = filter_input(INPUT_POST, 'game_description', FILTER_SANITIZE_STRING);
    if (!$game_description) {
        $field_errors['game_description'] = "Game description is required.";
    }
    
    $court_type = filter_input(INPUT_POST, 'court_type', FILTER_SANITIZE_STRING);
    if (!$court_type) {
        $field_errors['court_type'] = "Court type is required.";
    }
    
    $max_players = filter_input(INPUT_POST, 'max_players', FILTER_VALIDATE_INT);
    if (!$max_players) {
        $field_errors['max_players'] = "Max players must be a valid number.";
    }
    
    $duration = filter_input(INPUT_POST, 'duration', FILTER_VALIDATE_INT);
    if (!$duration) {
        $field_errors['duration'] = "Duration must be a valid number.";
    }
    
    $price_per_person = filter_input(INPUT_POST, 'price_per_person', FILTER_VALIDATE_FLOAT);
    if (!$price_per_person) {
        $field_errors['price_per_person'] = "Price per person must be a valid number.";
    }
    
    // Proceed if there are no errors
    if (empty($errors)) {
        // Set the target directory for uploads
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // Create directory if it doesn't exist
        }

        // Generate a unique file name for the uploaded file
        $target_file = $target_dir . uniqid() . '-' . basename($_FILES["game_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image
        $check = getimagesize($_FILES["game_image"]["tmp_name"]);
        if ($check === false) {
            $errors[] = "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size (limit: 2MB)
        if ($_FILES["game_image"]["size"] > 2000000) {
            $errors[] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk === 0) {
            $errors[] = "Sorry, your file was not uploaded.";
        } else {
            // Try to upload file
            if (move_uploaded_file($_FILES["game_image"]["tmp_name"], $target_file)) {
                // SQL query to insert the game details
                $sql = "INSERT INTO games (game_name, game_description, court_type, max_players, duration, price_per_person, game_image, turf_owners_id)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

                // Prepare and bind
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bindParam(1, $game_name);
                    $stmt->bindParam(2, $game_description);
                    $stmt->bindParam(3, $court_type);
                    $stmt->bindParam(4, $max_players, PDO::PARAM_INT);
                    $stmt->bindParam(5, $duration, PDO::PARAM_INT);
                    $stmt->bindParam(6, $price_per_person, PDO::PARAM_STR);
                    $stmt->bindParam(7, $target_file);
                    $stmt->bindParam(8, $turf_owners_id, PDO::PARAM_INT);

                    // Execute the statement
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success text-center'>Game details updated successfully.</div>";
                    } else {
                        $errors[] = "Error: Could not execute query. " . $stmt->errorInfo()[2];
                    }

                    // Close statement
                    $stmt->closeCursor();
                }
            } else {
                $errors[] = "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Display errors if any
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger text-center'>$error</div>";
        }
    }
}

// Fetch game categories from the database
$query = "SELECT * FROM game_categories";
$stmt = $conn->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- HTML content -->

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

        .card-header-btns .btn {
            margin-bottom: 5px;
        }

        .card-header-btns {
            padding-left: 0;
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



        /* General form-group styling */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        /* Custom File Input Styling */
        .custom-file-upload {
            position: relative;
            display: inline-block;
            cursor: pointer;
            font-weight: bold;
            color: #4a90e2;
            padding: 10px 15px;
            background-color: #f7f8fc;
            border: 2px dashed #ddd;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-align: center;
        }

        .custom-file-upload:hover {
            background-color: #e8f0fe;
            border-color: #4a90e2;
        }

        .custom-file-upload::after {
            content: 'Choose File';
            display: inline-block;
            margin-left: 10px;
            color: #4a90e2;
        }

        /* Hide the actual file input */
        .custom-file-upload input[type="file"] {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        /* Icon Styling */
        .custom-file-upload::before {
            content: '📁';
            font-size: 1.2rem;
            margin-right: 5px;
            color: #4a90e2;
        }


        .form-control {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            color: #333;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            border-radius: 8px;
            appearance: none;
            /* Remove default arrow */
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        /* Add custom arrow for select */
        .form-control::after {
            content: '\25BC';
            /* Downward arrow */
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            pointer-events: none;
            color: #999;
        }

        .form-control:hover {
            border-color: #4a90e2;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.3);
        }

        .form-control:focus {
            border-color: #36d1dc;
            box-shadow: 0 0 8px rgba(54, 209, 220, 0.4);
        }

        /* Option Styling */
        .form-control option {
            padding: 10px;
            background-color: #fff;
            color: #333;
        }

        .form-control option:disabled {
            color: #999;
        }
        

        /* Responsive Form Container */
.form-container {
    max-width: 600px; /* Limit the max width for larger screens */
    margin: auto; /* Center the form */
    padding: 20px; /* Add padding for aesthetics */
}

/* Flexbox for Form Row */
.form-row {
    display: flex;
    flex-wrap: wrap; /* Allow wrapping on smaller screens */
    gap: 1rem; /* Space between fields */
}

/* Responsive Form Control */
.form-control {
    padding: 12px;
    font-size: 1rem;
    color: #333;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    outline: none;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    flex: 1 1 100%; /* Make full width by default */
}

/* Specific width for half-width fields on larger screens */
@media (min-width: 576px) {
    .form-control {
        flex: 1 1 calc(50% - 0.5rem); /* Two fields side by side */
    }
}

/* Hover and Focus Effects for Input Fields */
.form-control:hover,
.form-control:focus {
    border-color: #36d1dc;
    box-shadow: 0 0 5px rgba(54, 209, 220, 0.3);
}

/* Responsive Button Styling */
.btn-primary {
    display: block;
    width: 100%;
    padding: 12px;
    font-size: 1rem;
    font-weight: 600;
    color: #fff;
    background-color: #36d1dc;
    border: none;
    border-radius: 8px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    cursor: pointer;
}

/* Button Hover Effects */
.btn-primary:hover {
    background-color: #1ea1b5;
    transform: translateY(-2px);
}

.btn-primary:active {
    background-color: #178593;
    transform: translateY(1px);
}

/* Media Query for Smaller Devices */
@media (max-width: 576px) {
    .form-row {
        flex-direction: column; /* Stack fields vertically on small screens */
    }

    .form-control {
        flex: 1 1 100%; /* Full width for all fields */
    }
}

    </style>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global">
        </div>
    </div>

    <div class="main-wrapper">
        <?php include('navbar.php'); ?>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-container p-4 shadow">
                        <h2 class="text-center mb-4">Edit Game Details</h2>
                        <hr>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="gameImage">Upload Game Image</label>
                                <div class="custom-file-upload">
                                    <input type="file" id="gameImage" name="game_image" required>
                                    <?php if (isset($errors['game_image'])): ?>
                                                    <div class="invalid-feedback"><?php echo $errors['game_image']; ?></div>
                                                <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="gameName">Game Name</label>
                                <select class="form-control" id="gameName" name="game_name" required>
                                    <option value="" disabled selected>Select Game Name</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="gameDescription">Game Description</label>
                                <textarea class="form-control" id="gameDescription" name="game_description" rows="3" placeholder="Describe the game" required></textarea>
                                <?php if (isset($errors['game_description'])): ?>
                                                    <div class="invalid-feedback"><?php echo $errors['game_description']; ?></div>
                                                <?php endif; ?>

                            </div>
                            <div class="form-group">
        <label for="court_type">Court Type</label>
        <input type="text" name="court_type" class="form-control" value="<?php echo htmlspecialchars($court_type ?? '', ENT_QUOTES); ?>">
        <?php if ($field_errors['court_type']): ?>
            <div class="alert alert-danger"><?php echo $field_errors['court_type']; ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="max_players">Max Players</label>
        <input type="number" name="max_players" class="form-control" value="<?php echo htmlspecialchars($max_players ?? '', ENT_QUOTES); ?>">
        <?php if ($field_errors['max_players']): ?>
            <div class="alert alert-danger"><?php echo $field_errors['max_players']; ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="duration">Duration</label>
        <input type="number" name="duration" class="form-control" value="<?php echo htmlspecialchars($duration ?? '', ENT_QUOTES); ?>">
        <?php if ($field_errors['duration']): ?>
            <div class="alert alert-danger"><?php echo $field_errors['duration']; ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="price_per_person">Price Per Person</label>
        <input type="number" step="0.01" name="price_per_person" class="form-control" value="<?php echo htmlspecialchars($price_per_person ?? '', ENT_QUOTES); ?>">
        <?php if ($field_errors['price_per_person']): ?>
            <div class="alert alert-danger"><?php echo $field_errors['price_per_person']; ?></div>
        <?php endif; ?>
    </div>


                            <input type="hidden" name="turf_owners_id" value="<?php echo $user_id; ?>">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

</html>