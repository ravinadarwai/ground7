<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: turf_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

include('../config.php'); // Ensure this file contains the correct PDO connection

// Fetch user details from the turf_owners table
$sql = "SELECT username, email FROM turf_owners WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$user_id]);
$turf_owner = $stmt->fetch(PDO::FETCH_ASSOC);

// If the user doesn't exist, redirect or handle the error
if (!$turf_owner) {
    echo "User not found";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Ground 7</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Main wrapper styling */
.main-wrapper {
    padding: 20px;
}

/* Container to center content */
.container {
    max-width: 600px; /* Adjust the max width for a smaller form */
    margin: 0 auto; /* Center align */
}

/* Card styling */
.card {
    padding: 20px;
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

/* Form label styling */
.form-label {
    font-weight: bold; /* Make labels bold */
}

/* Input field styling */
.input-space {
    margin-bottom: 15px; /* Space between input fields */
}

/* General input styles */
.form-control {
    border: 1px solid #ccc; /* Light gray border */
    border-radius: 5px; /* Rounded corners */
    transition: border-color 0.3s, box-shadow 0.3s; /* Smooth transition */
}

/* Input focus effect */
.form-control:focus {
    border-color: rgb(9, 126, 82); /* Change border color on focus */
    box-shadow: 0 0 5px rgba(9, 126, 82, 0.5); /* Add shadow effect */
    outline: none; /* Remove default outline */
}

/* Button styling */
.btn {
    border-radius: 5px; /* Rounded corners for buttons */
    padding: 10px 15px; /* Button padding */
    transition: background-color 0.3s, transform 0.2s; /* Smooth transition for hover effects */
}

/* Save Changes button hover effect */
.btn-primary:hover {
    background-color: rgb(9, 126, 82); /* Darken background on hover */
    transform: translateY(-2px); /* Slight lift effect */
}

/* Reset button hover effect */
.btn-secondary:hover {
    background-color: rgba(9, 126, 82, 0.1); /* Lighten background on hover */
    transform: translateY(-2px); /* Slight lift effect */
}

/* Responsive styling for smaller screens */
@media (max-width: 768px) {
    .container {
        padding: 10px; /* Add padding for smaller screens */
    }
    
    .card {
        padding: 15px; /* Reduce card padding */
    }
    
    .form-control {
        font-size: 14px; /* Smaller font size for inputs */
    }
}
/* Input field hover effect */
.form-control {
    border: 1px solid #ccc; /* Light gray border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px; /* Padding inside input */
    transition: border-color 0.3s, box-shadow 0.3s; /* Smooth transition */
}

/* Input hover effect */
.form-control:hover {
    border-color: rgb(9, 126, 82); /* Change border color on hover */
    box-shadow: 0 0 5px rgba(9, 126, 82, 0.5); /* Add shadow effect */
}

/* Input focus effect */
.form-control:focus {
    border-color: rgb(9, 126, 82); /* Change border color on focus */
    box-shadow: 0 0 5px rgba(9, 126, 82, 0.5); /* Add shadow effect */
    outline: none; /* Remove default outline */
}
.col-lg-7{
    width: 100%;
}



    </style>
</head>

<body>
<div class="main-wrapper">
    <div class="content court-bg">
        <div class="container">
            <div class="coach-court-list profile-court-list">
                <ul class="nav">
                    <li><a href="turf_admin.php">Back</a></li>
                    <li><a class="active" href="setting-password.html">Change Password</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="profile-detail-group">
                        <div class="card">
                            <form id="changeProfileForm">
                                <div class="row">
                                    <!-- Username -->
                                    <div class="col-lg-7 col-md-7">
                                        <div class="input-space">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter New username" value="<?php echo $turf_owner['username']; ?>">
                                        </div>
                                    </div>
                                    
                                    <!-- Email -->
                                    <div class="col-lg-7 col-md-7">
                                        <div class="input-space">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter New Email" value="<?php echo $turf_owner['email']; ?>">
                                        </div>
                                    </div>

                                    <!-- Old Password -->
                                    <div class="col-lg-7 col-md-7">
                                        <div class="input-space">
                                            <label class="form-label">Old Password</label>
                                            <input type="password" class="form-control" id="old-password" placeholder="Enter Old Password">
                                        </div>
                                    </div>

                                    <!-- New Password -->
                                    <div class="col-lg-7 col-md-7">
                                        <div class="input-space">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="new-password" placeholder="Enter New Password">
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="col-lg-7 col-md-7">
                                        <div class="input-space mb-0">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm-password" placeholder="Enter Confirm Password">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Save Changes -->
                        <div class="save-changes text-end">
                            <button type="button" class="btn btn-primary" id="reset-profile">Reset</button>
                            <button type="button" class="btn btn-secondary" id="save-profile">Save Change</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('save-profile').addEventListener('click', function() {
        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const oldPassword = document.getElementById('old-password').value;
        const newPassword = document.getElementById('new-password').value;

        const formData = new FormData();
        formData.append('username', username);
        formData.append('email', email);
        formData.append('oldPassword', oldPassword);
        formData.append('newPassword', newPassword);

        fetch('path_to_php_file.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                // Optionally redirect to another page
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>

</body>
</html>
