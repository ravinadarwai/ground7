<?php
session_name('superadminname'); // Set the custom session name
session_start();
include('../../config.php'); // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user details from the database
    $query = "SELECT * FROM superadmin WHERE email = :email LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists
    if ($user) {
        // Validate password (assuming password is hashed in the database)
        if (password_verify($password, $user['password'])) {
            // Set session variables for logged-in user
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];

            // Redirect to a protected page (dashboard, for example)
            header('Location: turf-admins.php');
            exit();
        } else {
            echo "<script>alert('Invalid password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('User not found. Please check your email or register.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: #222D32;
      font-family: 'Roboto', sans-serif;
    }

    .login-box {
      width: 100%;
      max-width: 400px;
      background: #1A2226;
      color: #ECF0F5;
      padding: 40px 30px;
      text-align: center;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .login-key {
      font-size: 80px;
      background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 10px;
    }

    .login-title {
      font-size: 24px;
      font-weight: bold;
      letter-spacing: 1px;
      color: #ECF0F5;
      margin-bottom: 30px;
    }

    .form-group {
      text-align: left;
      margin-bottom: 20px;
      position: relative;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      background: #1A2226;
      border: none;
      border-bottom: 2px solid #0DB8DE;
      color: #ECF0F5;
      font-weight: bold;
    }

    .form-control:focus {
      border-color: #27EF9F;
      outline: none;
    }

    .form-control-label {
      font-size: 12px;
      color: #A2A4A4;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .btn-primary {
      width: 100%;
      padding: 10px;
      background-color: #0DB8DE;
      border: none;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
      border-radius: 5px;
    }

    .btn-primary:hover {
      background-color: #27EF9F;
    }

    .toggle-password {
      position: absolute;
      top: 40%;
      right: 10px;
      cursor: pointer;
      color: #A2A4A4;
    }
  </style>
</head>
<body>

  <div class="login-box">
      <div class="login-key">
          <i class="fa fa-key" aria-hidden="true"></i>
      </div>
      <div class="login-title">ADMIN PANEL</div>

      <form method="post" action="">
          <div class="form-group">
              <label class="form-control-label">EMAIL</label>
              <input type="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
              <label class="form-control-label">PASSWORD</label>
              <input type="password" name="password" class="form-control" id="password" required>
              <span class="toggle-password" onclick="togglePassword()">
                  <i class="fa fa-eye" id="toggleIcon"></i>
              </span>
          </div>
          <button type="submit" class="btn-primary">LOGIN</button>
      </form>
  </div>

  <script>
    function togglePassword() {
      const passwordField = document.getElementById("password");
      const toggleIcon = document.getElementById("toggleIcon");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
      } else {
        passwordField.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
      }
    }
  </script>
</body>
</html>
