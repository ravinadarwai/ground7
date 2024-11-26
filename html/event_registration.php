<?php
session_start();
include('../config.php');

// Check if user is logged in
if (!isset($_SESSION['userid'])) {
    header('Location: login_page.php');
    exit();
}

// Fetch user data based on session user ID
$user_id = $_SESSION['userid'];
$query_user = "SELECT * FROM users WHERE id = :user_id"; // Assuming your users table has 'id' as primary key
$stmt_user = $conn->prepare($query_user);
$stmt_user->bindParam(':user_id', $user_id);
$stmt_user->execute();
$user = $stmt_user->fetch(PDO::FETCH_ASSOC);

// Check if event ID is passed via URL
if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    // Fetch event details based on event ID
  // Fetch event details along with turf name based on event ID
$query_event = "
SELECT events.*, turf_owners.turf_name 
FROM events 
LEFT JOIN turf_owners ON events.turf_id = turf_owners.id 
WHERE events.id = :event_id";  // Filter by event_id
$stmt_event = $conn->prepare($query_event);
$stmt_event->bindParam(':event_id', $event_id);
$stmt_event->execute();
$event = $stmt_event->fetch(PDO::FETCH_ASSOC);

// Check if the event exists
if (!$event) {
echo "Event not found!";
exit();
}

} else {
    echo "No event selected!";
    exit();
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl.theme.default.min.css" />

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />

    <link rel="stylesheet" href="assets/css/feather.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,700&display=swap" rel="stylesheet">
    <style>
body {
    background: url(../html/assets/img/bgform.jpg);
    font-family: 'Open Sans', sans-serif;
    background-repeat: no-repeat;
    margin: 0; /* Remove default body margins */
    padding: 0; /* Remove default body padding */
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.2);
    z-index: -1;
}

.container-1 {
    margin: 40px 0; /* Adjust as necessary */
}

.title-heading {
    text-align: center;
    font-weight: 700;
    color: #333;
    margin-bottom: 30px;
}

.form-container {
    background: #ffffff14;
    border-radius: 15px;
    border: 1px solid #fff;
    padding: 40px;
    backdrop-filter: blur(15px);
    transition: box-shadow 0.3s ease;
    margin-bottom: 0; /* Ensure no margin is set here */
}

.form-container:hover {
    box-shadow: 0 6px 20px #f0f0f0c7;
}

.form-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px; /* Spacing between rows */
}

.form-group {
    flex: 1;
    margin-right: 10px; /* Space between columns */
}

.form-group:last-child {
    margin-right: 0; /* No margin for the last group */
}

.form-container input[type="text"],
.form-container input[type="email"],
.form-container input[type="number"],
.form-container input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-top: none;
    border-right: none;
    border-left: none;
    border-radius: 0;

    background-color: transparent !important;
    font-size: 16px;
    color: #fff;
}

input:focus {
    border-color: #80bdff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    background-color: rgba(255, 255, 255, 0.2);
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

    .title-heading {
        font-size: 24px;
    }

    .btn-submit {
        font-size: 16px;
        padding: 8px 10px;
    }
}
.form-group {
            position: relative;
        }

        .floating-label {
            position: absolute;
            top: 5px;
            left: 10px;
            font-size: 15px;
            color: #fff;
            transition: all 0.2s ease-in-out;

        }

        input:focus+.floating-label {
            top: -10px;
            font-size: 12px;
        }

    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container-1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-container">
                <h2 class="title-heading" style="text-shadow: 2px 2px 4px #FFFFFF;">Event Registration for <?php echo htmlspecialchars($event['event_name']); ?></h2>
                <form class="styled-form" action="submit_event_registration.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
                    
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter your name" id="name" name="name" value="<?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Enter your email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" class="form-control" id="location" name="location" required>
                            <label class="floating-label" for="location">Enter Address</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="phone" name="phone" required>
                            <label class="floating-label" for="phone">Contact No.</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" class="form-control" id="turf" name="turf" value="<?php echo isset($event['turf_name']) ? htmlspecialchars($event['turf_name']) : 'Turf not available'; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="event" name="event" value="<?php echo htmlspecialchars($event['event_name']); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <input type="number" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($event['price']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="persons" name="persons" required>
                            <label class="floating-label" for="persons">No. of persons</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="image" style="color: #fff;">Upload Image</label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-submit">Submit Registration</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js" type="e1c338c635059fe21fb791f2-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="e1c338c635059fe21fb791f2-text/javascript"></script>

    <script src="assets/plugins/select2/js/select2.min.js" type="e1c338c635059fe21fb791f2-text/javascript"></script>

    <script src="assets/plugins/owl-carousel/owl.carousel.min.js"
        type="e1c338c635059fe21fb791f2-text/javascript"></script>

    <script src="assets/js/script.js" type="e1c338c635059fe21fb791f2-text/javascript"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="e1c338c635059fe21fb791f2-|49" defer></script>
</body>
</html>
