<?php
include('../config.php'); // Ensure this contains the PDO connection setup

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if form is submitted
if (isset($_POST['submit'])) {

    // Retrieve form data
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $gender = trim($_POST['gender']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate password
    $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    if (!preg_match($pattern, $password)) {
        $errors['password'] = 'Password must be at least 8 characters, include one uppercase letter, one number, and one special character.';
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match. Please try again.';
    }

    // Check if email or username already exists
    $sql = "SELECT * FROM users WHERE email = :email OR username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $errors['duplicate'] = 'Email or username already exists. Please use a different one.';
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Hash the password and insert the user into the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, username, first_name, last_name, gender, password) VALUES (:email, :username, :first_name, :last_name, :gender, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful! Redirecting to login page.'); window.location.href = 'login_page.php';</script>";
            exit();
        } else {
            $errors['registration'] = 'Registration failed. Please try again later.';
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from Ground7.dreamstechnologies.com/html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:17:26 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Ground 7</title>

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
/* Style the select dropdown */
.select-p {
    border-radius: 10px;
    padding: 10px;
    padding-left: 20px;
    font-size: 16px;
    height: 60px;
    background-color: #FAFAFA;
    border-style: none;
    color: #6B7385;
    appearance: none; /* Remove default arrow */
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20width%3D%2210%22%20height%3D%225%22%3E%3Cpath%20fill%3D%22%236B7385%22%20d%3D%22M0%200l5%205%205-5z%22/%3E%3C/svg%3E"); 
    background-repeat: no-repeat;
    background-position: right 15px center;
    background-size: 12px;
    outline: none; /* Remove the outline */
    box-shadow: none; /* Remove the shadow that can appear on focus */
}

/* Style the options within the select */
.select-p option {
    color: black;
    background-color: #FAFAFA;
    padding: 10px; /* Not all browsers will apply padding to <option> */
    font-size: 16px;
}

/* Additional styling for hover and focus states */
.select-p:hover,
.select-p:focus {
    border-color: #009688; /* Add border color when hovered or focused */
    outline: none; /* Ensure no outline appears on focus */
    box-shadow: none; /* Remove any default shadow */
}

/* Option hover effect - not all browsers support this */
.select-p option:hover {
    background-color: #F0F0F0;
    color: #333;
}


    </style>
</head>

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global" />
        </div>
    </div>

    <div class="main-wrapper authendication-pages">

        <div class="content">
            <div class="container wrapper no-padding">
                <div class="row no-margin vph-100">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 no-padding">
                        <div class="banner-bg register">
                            <div class="row no-margin h-100">
                                <div class="col-sm-10 col-md-10 col-lg-10 mx-auto">
                                    <div class="h-100 d-flex justify-content-center align-items-center">
                                        <div class="text-bg register text-center">
                                            <button type="button" class="btn btn-limegreen text-capitalize"><i
                                                    class="fa-solid fa-thumbs-up me-3"></i>register Now</button>
                                            <p>Register now for our innovative sports software solutions, designed to
                                                tackle challenges in everyday sports activities and events.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mx-auto">
                        <header class="text-center">
                            <a href="../index.php" class="navbar-brand logo">
                                <img style="height: 11dvh;width: 6rem; object-fit: cover;" src="assets/img//Group 100.svg"
                                    class="img-fluid" alt="Logo" />
                            </a>
                        </header>
                        <div class="shadow-card">
                            <h2 style="margin-bottom:30px;">Get Started With Ground 7</h2>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                                    <?php if (isset($errors['email'])): ?>
                                        <div class="text-danger"><?php echo $errors['email']; ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                    <?php if (isset($errors['duplicate'])): ?>
                                        <div class="text-danger"><?php echo $errors['duplicate']; ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                    <select class="form-control form-select-lg select-p" name="gender" required>
                                        <option disabled selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    <?php if (isset($errors['password'])): ?>
                                        <div class="text-danger"><?php echo $errors['password']; ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                                    <?php if (isset($errors['confirm_password'])): ?>
                                        <div class="text-danger"><?php echo $errors['confirm_password']; ?></div>
                                    <?php endif; ?>
                                </div>
                                <button class="btn btn-secondary register-btn d-inline-flex justify-content-center align-items-center w-100" type="submit" name="submit">Create Account</button>
                            </form>

                            <div class="bottom-text text-center" style="margin-top:15px;">
                                <p>Have an account? <a href="login_page.php">Login!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


    <script src="assets/js/jquery-3.7.0.min.js" type="e3efb2416812954c1b178c5e-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="e3efb2416812954c1b178c5e-text/javascript"></script>

    <script src="assets/plugins/select2/js/select2.min.js" type="e3efb2416812954c1b178c5e-text/javascript"></script>

    <script src="assets/js/script.js" type="e3efb2416812954c1b178c5e-text/javascript"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="e3efb2416812954c1b178c5e-|49" defer></script>
</body>

<!-- Mirrored from Ground7.dreamstechnologies.com/html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:17:28 GMT -->

</html>