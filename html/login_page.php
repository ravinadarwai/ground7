<?php
session_start();
include('../config.php'); // Include your database connection

// Store the previous page URL
if (!isset($_SESSION['prev_page']) && isset($_SERVER['HTTP_REFERER'])) {
    $_SESSION['prev_page'] = $_SERVER['HTTP_REFERER'];
}

$errors = []; // Initialize an array to hold error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate email
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    }

    // Validate password
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }

    // Only proceed if there are no validation errors
    if (empty($errors)) {
        // Fetch user details from the database
        $query = "SELECT id, email, username, password FROM users WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists
        if ($user) {
            // Validate password
            if (password_verify($password, $user['password'])) {
                // Set session variables for logged-in user
                $_SESSION['userid'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                // Set username only if it exists
                if (!empty($user['username'])) {
                    $_SESSION['username'] = $user['username']; // Set username
                } else {
                    $_SESSION['username'] = 'unknown'; // Handle case where username is missing
                }

                // Redirect back to the page user came from or to the homepage if not available
                if (isset($_SESSION['prev_page'])) {
                    $redirect_url = $_SESSION['prev_page'];
                    unset($_SESSION['prev_page']); // Clear the session variable
                } else {
                    $redirect_url = '../index.php'; // Default redirect
                }

                header('Location: ' . $redirect_url);
                exit();
            } else {
                $errors['password'] = 'Invalid password. Please try again.';
            }
        } else {
            $errors['email'] = 'User not found. Please check your email or register.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

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
    <div class="main-wrapper authendication-pages">
        <div class="content">
            <div class="container wrapper no-padding">
                <div class="row no-margin vph-100">
                    <div class="col-12 col-sm-12 col-lg-6 no-padding">
                        <div class="banner-bg login">
                            <div class="row no-margin h-100">
                                <div class="col-sm-10 col-md-10 col-lg-10 mx-auto">
                                    <div class="h-100 d-flex justify-content-center align-items-center">
                                        <div class="text-bg register text-center">
                                            <button type="button" class="btn btn-limegreen text-capitalize"><i class="fa-solid fa-thumbs-up me-3"></i>User Login</button>
                                            <p>Log in right away for our advanced sports software solutions, created to address issues in regular sporting events and activities.</p>
                                            <a href="<?php echo (isset($_SESSION['prev_page'])) ? $_SESSION['prev_page'] : '../index.php'; ?>" class="btn btn-secondary register-btn d-inline-flex justify-content-center align-items-center w-100 btn-block mt-3" style="font-size: 14px; padding: 0.5rem 1rem;" type="button">
                                                Back
                                                <i class="feather-arrow-left-circle ms-2"></i>
                                            </a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6 no-padding">
                        <div class="dull-pg">
                            <div class="row no-margin vph-100 d-flex align-items-center justify-content-center">
                                <div class="col-sm-10 col-md-10 col-lg-10 mx-auto">
                                    <header class="text-center">
                                        <a href="user-dashboard.html">
                                            <img style="height: 11dvh;width: 6rem; object-fit: cover;margin-left: 3rem;" src="assets/img/Group 100.svg"
                                                class="img-fluid" alt="Logo" />
                                        </a>

                                    </header>

                                    <div class="tab-container">
    <button id="emailTab" class="tab-button" onclick="showTab('email')">Login with Email</button>
    <button id="numberTab" class="tab-button" onclick="showTab('number')">Login with Phone</button>
</div>

<div class="tab-content hidden" id="emailTabContent">
    <form action="verify-email-otp.php" method="post">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Send OTP</button>
    </form>

  
</div>


<div class="tab-content" id="numberTabContent">
    <!-- Send OTP Form -->
    <form action="send-otp.php" method="post" id="sendOtpForm">
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter your phone number" required>
        </div>
        <button type="submit" class="btn btn-primary">Send OTP</button>
    </form>

    <!-- Verify OTP Form -->
    <form action="verify-otp.php" method="post" id="verifyOtpForm" class="hidden">
        <div class="form-group">
            <label for="otp">Enter OTP:</label>
            <input type="text" class="form-control" name="otp" placeholder="Enter the OTP" required>
        </div>
        <button type="submit" class="btn btn-success">Verify OTP</button>
    </form>
</div>


                                    <div>
                                        <a href="google-login.php" class="btn btn-danger btn-block">Login with Google</a>
                                        <a href="facebook-login.php" class="btn btn-primary btn-block">Login with Facebook</a>
                                    </div>

                                </div>

                                <div class="bottom-text text-center">
                                    <p>Don’t have an account? <a href="registration.php">Sign Up</a></p>
                                </div>
 <style>
  .tab-container {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
  }

  .tab-button {
      padding: 10px 20px;
      margin: 0 5px;
      cursor: pointer;
      border: none;
      background-color: #f0f0f0;
      border-bottom: 2px solid transparent;
      font-size: 16px;
  }

  .tab-button.active {
      background-color: #fff;
      border-bottom: 2px solid #007bff;
  }

  .tab-content.hidden {
      display: none;
  }
</style>
<script>
    document.getElementById('sendOtpForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const phoneInput = document.querySelector('input[name="phone"]').value;

    fetch('send-otp.php', {
        method: 'POST',
        body: new URLSearchParams({ phone: phoneInput }),
    })
        .then(response => response.text())
        .then(data => {
            alert(data); // Show success or error message
            this.classList.add('hidden');
            document.getElementById('verifyOtpForm').classList.remove('hidden');
        })
        .catch(error => console.error('Error:', error));
});

</script>

<script>
  function showTab(tab) {
      const emailTabContent = document.getElementById('emailTabContent');
      const numberTabContent = document.getElementById('numberTabContent');
      const emailTab = document.getElementById('emailTab');
      const numberTab = document.getElementById('numberTab');

      if (tab === 'email') {
          emailTabContent.classList.remove('hidden');
          numberTabContent.classList.add('hidden');
          emailTab.classList.add('active');
          numberTab.classList.remove('active');
      } else {
          numberTabContent.classList.remove('hidden');
          emailTabContent.classList.add('hidden');
          numberTab.classList.add('active');
          emailTab.classList.remove('active');
      }
  }

  // Default to email login
  showTab('email');
</script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePassword() {
            document.getElementById('password').type = password.type === 'password' ? 'text' : 'password';
        }
    </script>

    <script src="assets/js/jquery-3.7.0.min.js" type="de2c9db6d73847786f25645d-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="de2c9db6d73847786f25645d-text/javascript"></script>

    <script src="assets/plugins/select2/js/select2.min.js" type="de2c9db6d73847786f25645d-text/javascript"></script>

    <script src="assets/js/script.js" type="de2c9db6d73847786f25645d-text/javascript"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="de2c9db6d73847786f25645d-|49" defer></script>
</body>

</html>