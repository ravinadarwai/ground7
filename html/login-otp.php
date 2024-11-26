<?php
session_start();

// Redirect to email form if session email or OTP is not set
if (!isset($_SESSION['email']) || !isset($_SESSION['otp'])) {
    header("Location: verify-email-otp.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h4>Verify OTP</h4>
                    </div>
                    <div class="card-body">
                        <form action="verify-otp-email.php" method="post">
                            <div class="form-group">
                                <label for="otp">Enter OTP</label>
                                <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter the OTP sent to your email" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Verify OTP</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Didn't receive the OTP? <a href="resend-otp.php">Resend OTP</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
