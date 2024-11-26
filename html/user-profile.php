<?php
session_start();
include("../config.php");

if (isset($_GET['full_name'])) {
    $full_name = $_GET['full_name'];

    $query = "SELECT * FROM users WHERE full_name = :full_name";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':full_name', $full_name, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header("Location: error-page.php");
        exit();
    }
} else {
    header("Location: error-page.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Validate and sanitize inputs
        $name = htmlspecialchars(trim($_POST['name']));
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $phone = htmlspecialchars(trim($_POST['phone']));
        $comments = htmlspecialchars(trim($_POST['comments']));
        $address = htmlspecialchars(trim($_POST['address']));
        $state = htmlspecialchars(trim($_POST['state']));
        $city = htmlspecialchars(trim($_POST['city']));
        $country = htmlspecialchars(trim($_POST['country']));
        $zipcode = htmlspecialchars(trim($_POST['zipcode']));
        
        // Handle file upload if a file is selected
        $profile_picture = $_FILES['profile_picture']['name'];
        if ($profile_picture) {
            $allowed_types = ['image/jpeg', 'image/png', 'image/svg+xml'];
            $file_size = $_FILES['profile_picture']['size']; // Get file size
            $max_size = 2 * 1024 * 1024; // 2MB
        
            if (in_array(mime_content_type($_FILES['profile_picture']['tmp_name']), $allowed_types)) {
                if ($file_size <= $max_size) {
                    $target_dir = "uploads/";
                    if (!file_exists($target_dir)) {
                        mkdir($target_dir, 0777, true); // Create directory if it doesn't exist
                    }
                    $profile_picture = uniqid() . "_" . basename($profile_picture); // Ensure unique file names
                    $target_file = $target_dir . $profile_picture;
                    if (!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {
                        throw new Exception("Error uploading file.");
                    }
                } else {
                    throw new Exception("File is too large. Max file size is 2MB.");
                }
            } else {
                throw new Exception("Invalid file type. Only JPG, PNG, or SVG files are allowed.");
            }
        }
        

        // Prepare the query to update user information
        $update_user_query = "UPDATE users SET full_name = :name, email = :email, phone = :phone, comments = :comments, address = :address, state = :state, city = :city, country = :country, zipcode = :zipcode";

        // If there is a new profile picture, update the path
        if ($profile_picture) {
            $update_user_query .= ", profile_picture = :profile_picture";
        }

        // Add WHERE clause
        $update_user_query .= " WHERE id = :user_id";

        // Prepare the statement
        $stmt = $conn->prepare($update_user_query);

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':comments', $comments);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':zipcode', $zipcode);
        if ($profile_picture) {
            $stmt->bindParam(':profile_picture', $target_file);
        }
        $stmt->bindParam(':user_id', $user['id']);
        $stmt->execute();

        $_SESSION['message'] = "Profile updated successfully!";
        header("Location: user-profile.php?full_name=" . urlencode($name));
    } catch (Exception $e) {
        error_log($e->getMessage());
        $_SESSION['error'] = "An error occurred while updating the profile: " . $e->getMessage();
    }
}
?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
    </div>
<?php unset($_SESSION['error']); endif; ?>

<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['message']; ?>
    </div>
<?php unset($_SESSION['message']); endif; ?>

<?php
// Check if the key exists before accessing
$state = isset($user['state']) ? $user['state'] : 'Default State';
$city = isset($user['city']) ? $user['city'] : 'Default City';
$country = isset($user['country']) ? $user['country'] : 'Default Country';
$zipcode = isset($user['zipcode']) ? $user['zipcode'] : 'Default Zipcode';


?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from Ground7.dreamstechnologies.com/html/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:17:04 GMT -->
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

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="assets/css/feather.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global" />
        </div>
    </div>

<div class="main-wrapper">

<?php include 'navbar.php'; ?>

<section class="breadcrumb breadcrumb-list mb-0">
<span class="primary-right-round"></span>
<div class="container">
<h1 class="text-white">Profile Setting</h1>
<ul>
<li><a href="index.php">Home</a></li>
<li>Profile Setting</li>
</ul>
</div>
</section>


<div class="dashboard-section">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="dashboard-menu">
<ul>
<li>
<a href="user-bookings.php">
<img src="assets/img/icons/booking-icon.svg" alt="Icon">
<span>My Bookings</span>
</a>
</li>
<li>
<a href="user-invoice.php">
<img src="assets/img/icons/invoice-icon.svg" alt="Icon">
<span>Invoices</span>
</a>
</li>
<li>
<a href="user-profile.php" class="active">
<img src="assets/img/icons/profile-icon.svg" alt="Icon">
<span>Profile Setting</span>
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<div class="content court-bg">
<div class="container">

<div class="row">
<div class="col-sm-12">
<div class="profile-detail-group">
<div class="card ">
<form action="" method="POST" enctype="multipart/form-data">
  <!-- Profile Picture Upload -->
  <div class="row">
    <div class="col-md-12">
      <div class="file-upload-text">
        <div class="file-upload">
        <?php
// Example of how you might fetch the profile picture from the database
$profile_picture = $user['profile_picture']; // Assuming `$user` is an associative array
?>
<img src="<?php echo htmlspecialchars($profile_picture); ?>" class="img-fluid" alt="Upload">

          <p>Upload Photo</p>
          <span>
            <i class="feather-edit-3"></i>
            <input type="file" name="profile_picture" id="file-input">
          </span>
        </div>
        <h5>Upload a logo with a minimum size of 150 * 150 pixels (JPG, PNG, SVG).</h5>
      </div>
    </div>
    
    <!-- User's Name -->
    <div class="col-lg-4 col-md-6">
      <div class="input-space">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $user['full_name']; ?>" placeholder="Enter Name">
      </div>
    </div>

    <!-- User's Email -->
    <div class="col-lg-4 col-md-6">
      <div class="input-space">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?= $user['email']; ?>" placeholder="Enter Email Address">
      </div>
    </div>

    <!-- User's Phone -->
    <div class="col-lg-4 col-md-6">
      <div class="input-space">
        <label class="form-label">Phone Number</label>
        <input type="text" class="form-control" name="phone" id="phone" 
       value="<?= isset($user['phone']) ? htmlspecialchars($user['phone']) : ''; ?>" 
       placeholder="Enter Phone Number">
      </div>
    </div>

    <!-- User's Comments -->
    <div class="col-lg-12 col-md-12">
      <div class="info-about">
        <label for="comments" class="form-label">Information about You</label>
        <textarea class="form-control" name="comments" id="comments" rows="3" placeholder="About">
    <?= isset($user['comments']) ? htmlspecialchars($user['comments']) : ''; ?>
</textarea>
      </div>
    </div>

    <!-- User's Address Details -->
    <div class="address-form-head">
      <h4>Address</h4>
    </div>
    <div class="col-lg-12 col-md-12">
      <div class="input-space">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" name="address" id="address" 
       value="<?= isset($user['address']) ? htmlspecialchars($user['address']) : ''; ?>" 
       placeholder="Enter Address">      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="input-space">
        <label class="form-label">State</label>
        <input type="text" class="form-control" name="state" id="state" 
       value="<?= isset($user['state']) ? htmlspecialchars($user['state']) : ''; ?>" 
       placeholder="Enter State">      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="input-space">
        <label class="form-label">City</label>
        <input type="text" class="form-control" name="city" id="city" 
       value="<?= isset($user['city']) ? htmlspecialchars($user['city']) : ''; ?>" 
       placeholder="Enter City">      </div>
    </div>

    <div class="col-lg-4 col-md-4">
  <div class="input-space">
    <label class="form-label">Country</label>
    <select class="select" name="country">
      <option value="<?= isset($user['country']) ? htmlspecialchars($user['country']) : ''; ?>">
        <?= isset($user['country']) ? htmlspecialchars($user['country']) : 'Select Country'; ?>
      </option>
      <!-- Add other countries as options -->
      <option value="USA">USA</option>
      <option value="Canada">Canada</option>
      <option value="India">India</option>
      <option value="UK">UK</option>
    </select>
  </div>
</div>

<div class="col-lg-4 col-md-6">
  <div class="input-space mb-0">
    <label class="form-label">Zipcode</label>
    <input type="text" class="form-control" name="zipcode" id="zipcode" 
           value="<?= isset($user['zipcode']) ? htmlspecialchars($user['zipcode']) : ''; ?>" 
           placeholder="Enter Zipcode">
  </div>
</div>

    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Update Profile</button>
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


<?php include 'footer.php'; ?>
</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.0.min.js" type="7849b910cd06bc3c7e2a021b-text/javascript"></script>

<script src="assets/js/bootstrap.bundle.min.js" type="7849b910cd06bc3c7e2a021b-text/javascript"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="7849b910cd06bc3c7e2a021b-text/javascript"></script>
<script src="assets/plugins/datatables/datatables.min.js" type="7849b910cd06bc3c7e2a021b-text/javascript"></script>

<script src="assets/plugins/select2/js/select2.min.js" type="7849b910cd06bc3c7e2a021b-text/javascript"></script>

<script src="assets/js/script.js" type="7849b910cd06bc3c7e2a021b-text/javascript"></script>
<script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="7849b910cd06bc3c7e2a021b-|49" defer></script></body>

<!-- Mirrored from Ground7.dreamstechnologies.com/html/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:17:04 GMT -->
</html>