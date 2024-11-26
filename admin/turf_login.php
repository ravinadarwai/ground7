<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('../config.php'); // Ensure this file uses PDO for the database connection

$errors = []; // Initialize an empty array to hold error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Proceed if there are no errors
    if (empty($errors)) {
        // Prepare the SQL statement using PDO
        $sql = "SELECT id, username, turf_name, password FROM turf_owners WHERE email = :email";
        
        // Prepare statement
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':email', $email);
        
        // Execute statement
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            // User found
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password is correct
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['turf_name'] = $user['turf_name'];

                // Redirect to dashboard
                header("Location: turf_admin.php");
                exit();
            } else {
                // Invalid password
                $errors['password'] = 'Invalid email or password';
            }
        } else {
            // Invalid email
            $errors['email'] = 'Invalid email or password';
        }
    }
}

// Close connection (optional, PDO does this automatically)
$conn = null; // If you need to explicitly close the connection
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Ground7 - Turf Registration</title>

    <meta name="description" content="Register as a coach with Ground7 and start your sports journey.">
    <meta name="keywords" content="coach registration, badminton, sports, Ground7">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        html,
        body {
            height: 100%;
            /* Make sure body takes full height */
            margin: 0;
            /* Remove default margin */
            overflow: hidden;
            /* Prevent scrollbars from appearing */
        }

        .main-wrapper {
            height: 100vh;
            /* Use full height of the viewport */
            overflow-y: auto;
            /* Allow vertical scrolling within the main content */
        }

        body {
            background-color: #f8f9fa;
            /* Light background color for contrast */
        }

        .form-container {
            background: #ffffff;
            /* White background for the form */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px 0;
        }

        .btn {
            margin-top: 10px;
        }

        .btn-limegreen {
            background-color: green;
            /* Custom color for buttons */
            color: white;
        }

        .btn-limegreen:hover {
            background-color: #45a049;
            /* Darker shade on hover */
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="file"],
        input[type="time"],
        input[type="password"] {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            margin: 5px 0 20px 0;
            /* Space between fields */
        }

        h2 {
            margin-bottom: 20px;
        }

        .button {
  all: unset;
  display: flex;
  align-items: center;
  position: relative;
  padding: 0.3em 1.6em;
  border: #097E52 solid 0.15em;
  border-radius: 0.25em;
  color: #097E52;
  font-size: 1.5em;
  font-weight: 600;
  cursor: pointer;
  overflow: hidden;
  transition: border 300ms, color 300ms;
  user-select: none;
}

.button p {
  z-index: 1;
}

.button:hover {
  color: #fff;
}

.button:active {
  border-color: teal;
}

.button::after, .button::before {
  content: "";
  position: absolute;
  width: 9em;
  aspect-ratio: 1;
  background: mediumspringgreen;
  opacity: 50%;
  border-radius: 50%;
  transition: transform 500ms, background 300ms;
}

.button::before {
  left: 0;
  transform: translateX(-8em);
}

.button::after {
  right: 0;
  transform: translateX(8em);
}

.button:hover:before {
  transform: translateX(-1em);
}

.button:hover:after {
  transform: translateX(1em);
}

.button:active:before,
.button:active:after {
  background: teal;
}
    </style>
</head>
<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global">
        </div>
    </div>

    <div class="main-wrapper authendication-pages">
        <div class="content">
            <div class="container wrapper no-padding">
                <div class="row no-margin vph-100">
                    <div class="col-lg-6 no-padding">
                        <div class="banner-bg register">
                            <div class="h-100 d-flex justify-content-center align-items-center">
                                <div class="text-bg register text-center">
                                    <button type="button" class="btn btn-limegreen text-capitalize">
                                        <i class="fa-solid fa-thumbs-up me-3"></i>Register Now
                                    </button>
                                    <p>Register now as a Turf Owner and be a part of Ground7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 no-padding">
                        <div class="dull-pg">
                            <div class="d-flex align-items-center justify-content-center vph-100">
                                <div class="col-lg-10 mx-auto">
                                    <header class="text-center">
                                        <a href="index.html">
                                            <img style="height: 11dvh;width: 6rem; object-fit: cover;margin-left: 3rem;" src="../html/assets/img/Group 100.svg"
                                                class="img-fluid" alt="Logo" />
                                        </a>
                                    </header>
                                    <div class="shadow-card">
                                        <h2>Turf Login</h2>
                                        <p>Login to your account to continue.</p>

                                        <div class="form-container">
                                            <form id="loginForm" method="POST" action="">
                                                <label for="email">Email:</label>
                                                <input type="email" name="email" placeholder="Enter Email" required class="<?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>">
                                                <?php if (isset($errors['email'])): ?>
                                                    <div class="invalid-feedback"><?php echo $errors['email']; ?></div>
                                                <?php endif; ?>

                                                <div style="position: relative; width: 100%;">
                                                    <label for="password">Password:</label>
                                                    <input type="password" name="password" placeholder="Enter Password" required style="padding-right: 30px;" class="<?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>">
                                                    <?php if (isset($errors['password'])): ?>
                                                        <div class="invalid-feedback"><?php echo $errors['password']; ?></div>
                                                    <?php endif; ?>
                                                    <i class="fa-solid fa-eye" id="passwordEye" onclick="togglePassword()" style="position: absolute; top: 59%; right: 20px; transform: translateY(-50%); cursor: pointer;"></i>
                                                </div>

                                                <script>
                                                    function togglePassword() {
                                                        const passwordInput = document.querySelector('input[name="password"]');
                                                        const passwordEye = document.getElementById('passwordEye');
                                                        if (passwordInput.type === 'password') {
                                                            passwordInput.type = 'text';
                                                            passwordEye.classList.remove('fa-eye');
                                                            passwordEye.classList.add('fa-eye-slash');
                                                        } else {
                                                            passwordInput.type = 'password';
                                                            passwordEye.classList.remove('fa-eye-slash');
                                                            passwordEye.classList.add('fa-eye');
                                                        }
                                                    }
                                                </script>

                                                <button type="submit" class="button btn-limegreen">Login</button>
                                            </form>
                                        </div>

                                        <div class="bottom-text text-center">
                                            <p>Don't have an account? <a href="turf_registraion.php">Register Now!</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
