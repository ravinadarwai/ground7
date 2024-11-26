<?php
session_start();
include('../config.php'); // Ensure this contains the PDO connection setup

// Check if user is logged in
if (!isset($_SESSION['userid'])) {
    // Redirect to login page if not logged in
    header('Location: login_page.php'); // Change this to your login page
    exit();
}
$userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mirrored from Ground 7.dreamstechnologies.com/html/coaches-map.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:14:17 GMT -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Ground 7</title>

    <meta name="twitter:description" content="Elevate your badminton business withGround 7 template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Elevate your badminton business withGround 7 template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
    <meta name="keywords" content="badminton, coaching, event, players, training, courts, tournament, athletes, courts rent, lessons, court booking, stores, sports faqs, leagues, chat, wallet, invoice">
    <meta name="author" content="Dreamguys - Ground 7">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@dreamguystech">
    <meta name="twitter:title" content="Ground 7 -  Booking Coaches, Venue for tournaments, Court Rental template">
    <meta name="twitter:image" content="assets/img/meta-image.jpg">
    <meta name="twitter:image:alt" content="Ground 7">
    <meta property="og:url" content="https://Ground 7.dreamguystech.com/">
    <meta property="og:title" content="Ground 7 -  Booking Coaches, Venue for tournaments, Court Rental template">
    <meta property="og:description" content="Elevate your badminton business withGround 7 template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
    <meta property="og:image" content="../assets/img/meta-image.jpg">
    <meta property="og:image:secure_url" content="assets/img/meta-image.jpg">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,700&display=swap" rel="stylesheet">

    <style>
        body {
            background: url(../html/assets/img/bgform.jpg);
            background-size: cover;
            font-family: 'Open Sans', sans-serif;
            background-repeat: no-repeat;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.2);
            /* Adjust opacity for brightness */
            z-index: -1;
            /* Keeps overlay behind content */
        }

        .form-container {
            background: #ffffff14;
            border-radius: 15px;
            border: 1px solid #fff;
            padding: 40px;
            margin: 40px 0;
            backdrop-filter: blur(15px);
        }

        .form-container:hover {

            box-shadow: 0 6px 20px #f0f0f0c7;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            color: #333;
        }

        /* Placeholder styling */
        .form-container input::placeholder {
            color: #ffffff !important;
            /* Set placeholder text color to white */
            opacity: 1;
            /* Optional: adjust the opacity if needed */
            font-size: small;
        }

        .form-row {
            display: flex;
            /* Use flexbox to arrange items */
            justify-content: space-between;
            /* Space between columns */
            margin-bottom: 15px;
            /* Space between rows */
        }

        .form-group {
            flex: 1;
            position: relative;
            /* Allow each group to grow */
            margin-right: 15px;
            /* Space between columns */
        }

        .floating-label {
            position: absolute;
            top: 5px;
            left: 2px;
            font-size: 15px;
            color: #fff;
            transition: all 0.2s ease-in-out;
        }

        input:focus+.floating-label {
            top: -10px;
            font-size: 12px;
        }

        .form-group:last-child {
            margin-right: 0;
            /* Remove margin for the last group */
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="number"],
        .form-container input[type="file"] {
            width: 100%;
            padding: 5px 10px !important;
            border: 1px solid #ced4da;
            border-top: none;
            border-right: none;
            border-left: none;
            border-radius: 0;
            background-color: transparent !important;
            /* Ensure transparent background */
            font-size: 16px;
            box-sizing: border-box;
            height: 40px;
            color: #fff;
            /* Optional: Makes text color white */
        }

        input:focus {
            border-color: #80bdff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
            background-color: rgba(255, 255, 255, 0.2);
            /* Light translucent background */
            outline: none;
        }

        .btn-submit {
            background-color: #097e52;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0A1A38;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            h2 {
                font-size: 24px;
            }

            .btn-submit {
                font-size: 16px;
                padding: 8px 10px;
            }
        }
    </style>
</head>

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global" />
        </div>
    </div>

    <div class="main-wrapper">

        <?php include 'navbar.php'; ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="form-container">
                        <h2 style="text-shadow: 2px 2px 4px #FFFFFF;">User Registration</h2>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" required id="name">
                                    <label class="floating-label" for="name">Enter your name</label>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required id="email">
                                    <label class="floating-label" for="email">Enter your email</label>
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="form-group">
                                    <input type="number" name="contact_no" class="form-control" required id="contact_no">
                                    <label class="floating-label" for="contact_no">Contact No.</label>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="location" class="form-control" required id="location">
                                    <label class="floating-label" for="location">Enter Address</label>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" name="aadhar_no" class="form-control" required id="aadhar_no">
                                    <label class="floating-label" for="aadhar_no">Aadhar No.</label>
                                </div>

                                <div class="form-group">
                                    <input type="file" name="photo" accept="image/*" class="form-control-file" required id="photo">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="aadhar_image" style="color:#fff;">Upload Aadhar Card:</label>
                                    <input type="file" name="aadhar_image" accept="image/*" class="form-control-file" required id="aadhar_image">
                                </div>
                            </div>

                            <button type="submit" style="border-radius: 20px;" class="btn-submit">Submit</button>
                        </form>

        <script>
            const labels = document.querySelectorAll('.floating-label');
            labels.forEach(label => {
                label.addEventListener('click', () => {
                    label.previousElementSibling.focus();
                });
            });
        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Registration Successful</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Your registration has been successfully completed!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="errorMessage">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>

    <script src="assets/plugins/select2/js/select2.min.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>

    <script src="assets/js/moment.min.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>

    <script src="assets/js/script.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I" type="552793404e3ec40d9c05c1f7-text/javascript"></script>
    <script src="assets/js/map.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="552793404e3ec40d9c05c1f7-|49" defer></script>
</body>

<!-- Mirrored from Ground 7.dreamstechnologies.com/html/coaches-map.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:14:22 GMT -->

</html>
<script>
    // Function to show the success modal
    function showSuccessModal() {
        $('#successModal').modal('show');
    }

    // Function to show the error modal with a message
    function showErrorModal(message) {
        $('#errorMessage').text(message);
        $('#errorModal').modal('show');
    }
</script>

<?php
// Include your database configuration
include('../config.php'); // Ensure this file contains the PDO connection setup

try {
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize input data
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $contact_no = filter_var($_POST['contact_no'], FILTER_SANITIZE_NUMBER_INT);
        $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
        $aadhar_no = filter_var($_POST['aadhar_no'], FILTER_SANITIZE_STRING); // Handle leading zeros

        // Get the turf_id from the URL
        $turf_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Make sure to handle cases where id is not provided

        // Basic validation checks
        if (strlen($aadhar_no) !== 12) {
            echo "<script>showErrorModal('Aadhar number must be 12 digits long.');</script>";
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>showErrorModal('Invalid email format.');</script>";
            exit;
        }

        // Check if email already exists (optional)
        $checkEmail = $conn->prepare("SELECT COUNT(*) FROM turfuser WHERE email = :email");
        $checkEmail->bindParam(':email', $email);
        $checkEmail->execute();
        if ($checkEmail->fetchColumn() > 0) {
            echo "<script>showErrorModal('Email already registered.');</script>";
            exit;
        }

        // File upload validation
        $allowed_file_types = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($_FILES['photo']['type'], $allowed_file_types) || !in_array($_FILES['aadhar_image']['type'], $allowed_file_types)) {
            echo "<script>showErrorModal('Only JPG, JPEG, PNG files are allowed.');</script>";
            exit;
        }

        // Handle photo upload
        $photo = $_FILES['photo'];
        $photo_name = basename($photo["name"]);
        $photo_target = "uploads/photos/" . time() . "_" . $photo_name;
        if (!move_uploaded_file($photo["tmp_name"], $photo_target)) {
            echo "<script>showErrorModal('Failed to upload photo.');</script>";
            exit;
        }

        // Handle Aadhar image upload
        $aadhar_image = $_FILES['aadhar_image'];
        $aadhar_image_name = basename($aadhar_image["name"]);
        $aadhar_image_target = "uploads/aadhar/" . time() . "_" . $aadhar_image_name;
        if (!move_uploaded_file($aadhar_image["tmp_name"], $aadhar_image_target)) {
            echo "<script>showErrorModal('Failed to upload Aadhar image.');</script>";
            exit;
        }

        // Insert user data into the database
        $stmt = $conn->prepare("INSERT INTO turfuser (name, email, contact_no, location, aadhar_no, photo, aadhar_image, turf_id) VALUES (:name, :email, :contact_no, :location, :aadhar_no, :photo, :aadhar_image, :turf_id)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contact_no', $contact_no);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':aadhar_no', $aadhar_no);
        $stmt->bindParam(':photo', $photo_target);
        $stmt->bindParam(':aadhar_image', $aadhar_image_target);
        $stmt->bindParam(':turf_id', $turf_id);

        if ($stmt->execute()) {
            echo "<script>showSuccessModal();</script>";
        } else {
            echo "<script>showErrorModal('Registration failed. Please try again.');</script>";
        }
    }
} catch (Exception $e) {
    echo "<script>showErrorModal('An error occurred: " . $e->getMessage() . "');</script>";
}
?>
</body>

</html>