<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: turf_login.php");
    exit();
}

// Get user data from session
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

include('../config.php'); // Ensure this file contains the correct PDO connection

// Fetch turf owner data
$turf_owner = null; // Initialize the variable to avoid undefined variable error

if (isset($_GET['id'])) {
    $turf_owner_id = $_GET['id'];  // Get the ID from the URL
    
    // Fetch turf and owner data
    $sql = "SELECT * FROM turf_owners WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    // Execute the query and check if data was fetched
    if ($stmt->execute([$turf_owner_id])) {
        $turf_owner = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch data as associative array
        
        if (!$turf_owner) {
            echo "Turf owner not found.";
            exit;
        }
    } else {
        echo "Failed to fetch turf owner data.";
        exit;
    }
} else {
    echo "Invalid turf owner ID.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST['id'];
    $turf_name = $_POST['turf_name'];
    $turf_location = $_POST['turf_location'];
    $turf_area = $_POST['turf_area'];
    $grounds_number = $_POST['grounds_number'];
    $open_time = $_POST['open_time'];
    $close_time = $_POST['close_time'];
    $description = $_POST['description'];

    // Owner details
    $owner_name = $_POST['owner_name'];
    $owner_email = $_POST['owner_email'];
    $owner_contact = $_POST['owner_contact'];

    // Handle image upload if a file is uploaded
    if (isset($_FILES['owner_image']) && $_FILES['owner_image']['error'] == 0) {
        $image_name = $_FILES['owner_image']['name'];
        $image_tmp_name = $_FILES['owner_image']['tmp_name'];
        $upload_dir = 'uploads/';
        $image_path = $upload_dir . basename($image_name);

        if (move_uploaded_file($image_tmp_name, $image_path)) {
            // Update the image path in the database
            $sql = "UPDATE turf_owners SET turf_name = ?, turf_location = ?, turf_area = ?, grounds_number = ?, open_time = ?, close_time = ?, description = ?, owner_name = ?, owner_email = ?, owner_contact = ?, owner_image = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$turf_name, $turf_location, $turf_area, $grounds_number, $open_time, $close_time, $description, $owner_name, $owner_email, $owner_contact, $image_path, $id]);
        }
    } else {
        // Update without image
        $sql = "UPDATE turf_owners SET turf_name = ?, turf_location = ?, turf_area = ?, grounds_number = ?, open_time = ?, close_time = ?, description = ?, owner_name = ?, owner_email = ?, owner_contact = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$turf_name, $turf_location, $turf_area, $grounds_number, $open_time, $close_time, $description, $owner_name, $owner_email, $owner_contact, $id]);
    }
    
    echo "Turf and owner details updated successfully!";
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from Ground7.dreamstechnologies.com/html/coach-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:16:33 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Ground 7</title>

<meta name="twitter:description" content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
<meta name="keywords" content="badminton, coaching, event, players, training, courts, tournament, athletes, courts rent, lessons, court booking, stores, sports faqs, leagues, chat, wallet, invoice">
<meta name="author" content="Dreamguys - Ground7">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@dreamguystech">
<meta name="twitter:title" content="Ground7 -  Booking Coaches, Venue for tournaments, Court Rental template">
<meta name="twitter:image" content="assets/img/meta-image.jpg">
<meta name="twitter:image:alt" content="Ground7">
<meta property="og:url" content="https://Ground7.dreamguystech.com/">
<meta property="og:title" content="Ground7 -  Booking Coaches, Venue for tournaments, Court Rental template">
<meta property="og:description" content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
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

<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="assets/css/feather.css">

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

<div class="content court-bg">
<div class="container">
<div class="coach-court-list profile-court-list">
<ul class="nav">
<li><a class="active" href="coach-profile?id=<?php echo $user_id; ?>">Profile</a></li>
<li><a href="setting-password?id=<?php echo $user_id; ?>">Change Password</a></li>
</ul>
</div>
<div class="row">
<div class="col-sm-12">
<div class="profile-detail-blk">
<ul>
<li class="active"><a href="coach-profile.html">Profile Details </a></li>
</ul>
</div>
<div class="profile-detail-group">
<div class="card ">

<!-- HTML Form for Updating Turf Owner Details -->
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $turf_owner['id']; ?>">

    <!-- Turf Details Section -->
    <h4>Turf Details</h4>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="input-space">
                <label for="turf_name" class="form-label">Turf Name</label>
                <input type="text" class="form-control" id="turf_name" name="turf_name" value="<?php echo $turf_owner['turf_name'] ?? ''; ?>" placeholder="Enter Turf Name">
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="input-space">
                <label for="turf_location" class="form-label">Turf Location</label>
                <input type="text" class="form-control" id="turf_location" name="turf_location" value="<?php echo $turf_owner['turf_location'] ?? ''; ?>" placeholder="Enter Turf Location">
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="input-space">
                <label for="turf_area" class="form-label">Turf Area</label>
                <input type="number" class="form-control" id="turf_area" name="turf_area" value="<?php echo $turf_owner['turf_area'] ?? ''; ?>" placeholder="Enter Turf Area">
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="input-space">
                <label for="grounds_number" class="form-label">Number of Grounds</label>
                <input type="number" class="form-control" id="grounds_number" name="grounds_number" value="<?php echo $turf_owner['grounds_number'] ?? ''; ?>" placeholder="Enter Number of Grounds">
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="input-space">
                <label for="open_time" class="form-label">Open Time</label>
                <input type="time" class="form-control" id="open_time" name="open_time" value="<?php echo $turf_owner['open_time'] ?? ''; ?>">
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="input-space">
                <label for="close_time" class="form-label">Close Time</label>
                <input type="time" class="form-control" id="close_time" name="close_time" value="<?php echo $turf_owner['close_time'] ?? ''; ?>">
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="input-space">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter Turf Description"><?php echo $turf_owner['description'] ?? ''; ?></textarea>
            </div>
        </div>
    </div>

    <!-- Owner Details Section -->
    <h4>Owner Details</h4>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="input-space">
                <label for="name" class="form-label">Owner Name</label>
                <input type="text" class="form-control" id="name" name="owner_name" value="<?php echo $turf_owner['owner_name'] ?? ''; ?>" placeholder="Enter Owner Name">
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="input-space">
                <label for="email" class="form-label">Owner Email</label>
                <input type="email" class="form-control" id="email" name="owner_email" value="<?php echo $turf_owner['owner_email'] ?? ''; ?>" placeholder="Enter Owner Email">
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="input-space">
                <label for="phone" class="form-label">Owner Contact</label>
                <input type="text" class="form-control" id="phone" name="owner_contact" value="<?php echo $turf_owner['owner_contact'] ?? ''; ?>" placeholder="Enter Owner Contact">
            </div>
        </div>

        <!-- Upload Image Section -->
        <div class="col-lg-4 col-md-6">
            <div class="file-upload">
                <label for="owner_image" class="form-label">Upload Owner Image</label>
                <input type="file" class="form-control" id="owner_image" name="owner_image">
                <!-- Optionally show the current image -->
                <?php if (!empty($turf_owner['owner_image'])): ?>
                    <img src="<?php echo $turf_owner['owner_image']; ?>" alt="Owner Image" style="max-width: 100px; margin-top: 10px;">
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update</button>
</form>


</div>
<div class="save-changes text-end">
<a href="javascript:;" class="btn btn-primary reset-profile">Reset</a>
<a href="javascript:;" class="btn btn-secondary save-profile">Save Change</a>
</div>
</div>
</div>
</div>
</div>
</div>


<footer class="footer">
<div class="container">

<div class="footer-join">
<h2>We Welcome Your Passion And Expertise</h2>
<p class="sub-title">Join our empowering sports community today and grow with us.</p>
<a href="register.html" class="btn btn-primary"><i class="feather-user-plus"></i> Join With Us</a>
</div>


<div class="footer-top">
<div class="row">
<div class="col-lg-2 col-md-6">

<div class="footer-widget footer-menu">
<h4 class="footer-title">Contact us</h4>
<div class="footer-address-blk">
<div class="footer-call">
<span>Toll free Customer Care</span>
<p>+017 123 456 78</p>
</div>
<div class="footer-call">
<span>Need Live Suppot</span>
<p><a href="https://Ground7.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="84e0f6e1e5e9f7f4ebf6f0f7c4e1fce5e9f4e8e1aae7ebe9">[email&#160;protected]</a></p>
</div>
</div>
<div class="social-icon">
<ul>
<li>
<a href="javascript:void(0);" class="facebook"><i class="fab fa-facebook-f"></i> </a>
</li>
<li>
<a href="javascript:void(0);" class="twitter"><i class="fab fa-twitter"></i> </a>
</li>
<li>
<a href="javascript:void(0);" class="instagram"><i class="fab fa-instagram"></i></a>
</li>
<li>
<a href="javascript:void(0);" class="linked-in"><i class="fab fa-linkedin-in"></i></a>
</li>
</ul>
</div>
</div>

</div>
<div class="col-lg-2 col-md-6">

<div class="footer-widget footer-menu">
<h4 class="footer-title">Quick Links</h4>
<ul>
<li>
<a href="about-us.html">About us</a>
</li>
<li>
<a href="services.html">Services</a>
</li>
<li>
<a href="events.html">Events</a>
</li>
<li>
<a href="blog-grid.html">Blogs</a>
</li>
<li>
<a href="contact-us.html">Contact us</a>
</li>
</ul>
</div>

</div>
<div class="col-lg-2 col-md-6">

<div class="footer-widget footer-menu">
<h4 class="footer-title">Support</h4>
<ul>
<li>
<a href="contact-us.html">Contact Us</a>
</li>
<li>
<a href="faq.html">Faq</a>
</li>
<li>
<a href="privacy-policy.html">Privacy Policy</a>
</li>
<li>
<a href="terms-condition.html">Terms & Conditions</a>
</li>
<li>
<a href="pricing.html">Pricing</a>
</li>
</ul>
</div>

</div>
<div class="col-lg-2 col-md-6">

<div class="footer-widget footer-menu">
<h4 class="footer-title">Other Links</h4>
<ul>
<li>
<a href="coaches-grid.html">Coaches</a>
</li>
<li>
<a href="listing-grid.html">Sports Venue</a>
</li>
<li>
<a href="coach-details.html">Join As Coach</a>
</li>
<li>
<a href="coaches-map.html">Add Venue</a>
</li>
<li>
<a href="my-profile.html">My Account</a>
</li>
</ul>
</div>

</div>
<div class="col-lg-2 col-md-6">

<div class="footer-widget footer-menu">
<h4 class="footer-title">Our Locations</h4>
<ul>
<li>
<a href="javascript:void(0);">Germany</a>
</li>
<li>
<a href="javascript:void(0);">Russia</a>
</li>
<li>
<a href="javascript:void(0);">France</a>
</li>
<li>
<a href="javascript:void(0);">UK</a>
</li>
<li>
<a href="javascript:void(0);">Colombia</a>
</li>
</ul>
</div>

</div>
<div class="col-lg-2 col-md-6">

<div class="footer-widget footer-menu">
<h4 class="footer-title">Download</h4>
<ul>
<li>
<a href="#"><img src="assets/img/icons/icon-apple.svg" alt="Icon"></a>
</li>
<li>
<a href="#"><img src="assets/img/icons/google-icon.svg" alt="Icon"></a>
</li>
</ul>
</div>

</div>
</div>
</div>

</div>

<div class="footer-bottom">
<div class="container">

<div class="copyright">
<div class="row align-items-center">
<div class="col-md-6">
<div class="copyright-text">
<p class="mb-0">&copy; 2023 Ground7 - All rights reserved.</p>
</div>
</div>
<div class="col-md-6">

<div class="dropdown-blk">
<ul class="navbar-nav selection-list">
<li class="nav-item dropdown">
<div class="lang-select">
<span class="select-icon"><i class="feather-globe"></i></span>
<select class="select">
<option>English (US)</option>
<option>UK</option>
<option>Japan</option>
</select>
</div>
</li>
<li class="nav-item dropdown">
<div class="lang-select">
<span class="select-icon"></span>
<select class="select">
<option>$ USD</option>
<option>$ Euro</option>
</select>
</div>
</li>
</ul>
</div>

</div>
</div>
</div>

</div>
</div>

</footer>

</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.0.min.js" type="1517a10adac5fc5b3236d3da-text/javascript"></script>

<script src="assets/js/bootstrap.bundle.min.js" type="1517a10adac5fc5b3236d3da-text/javascript"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="1517a10adac5fc5b3236d3da-text/javascript"></script>
<script src="assets/plugins/datatables/datatables.min.js" type="1517a10adac5fc5b3236d3da-text/javascript"></script>

<script src="assets/plugins/select2/js/select2.min.js" type="1517a10adac5fc5b3236d3da-text/javascript"></script>

<script src="assets/js/script.js" type="1517a10adac5fc5b3236d3da-text/javascript"></script>
<script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="1517a10adac5fc5b3236d3da-|49" defer></script></body>

<!-- Mirrored from Ground7.dreamstechnologies.com/html/coach-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:16:41 GMT -->
</html>