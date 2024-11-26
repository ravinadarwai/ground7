<?php
session_start();
include('../config.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Enable error reporting for PDO
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch availability data for the next 7 days
$sql = "SELECT date, open_time, close_time, is_holiday 
        FROM turf_availability 
        WHERE turf_id = :user_id AND date >= CURDATE() 
        ORDER BY date ASC LIMIT 7";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$availability_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch holiday data for the current month
$current_month = date('Y-m');
$sql_holidays = "SELECT date FROM turf_availability WHERE turf_id = :user_id AND is_holiday = 1 AND DATE_FORMAT(date, '%Y-%m') = :current_month";
$stmt_holidays = $conn->prepare($sql_holidays);
$stmt_holidays->bindParam(':user_id', $user_id);
$stmt_holidays->bindParam(':current_month', $current_month);
$stmt_holidays->execute();
$holiday_data = $stmt_holidays->fetchAll(PDO::FETCH_ASSOC);

// Initialize an array of dates for the next 7 days
$dates = [];
for ($i = 0; $i < 7; $i++) {
    $dates[] = date('Y-m-d', strtotime("+$i days"));
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $availability_dates = $_POST['availability_date'];
    $open_times = $_POST['open_time'];
    $close_times = $_POST['close_time'];
    $holidays = isset($_POST['holiday']) ? $_POST['holiday'] : [];

    for ($i = 0; $i < count($availability_dates); $i++) {
        $date = $availability_dates[$i];
        $open_time = !empty($open_times[$i]) ? $open_times[$i] : null;
        $close_time = !empty($close_times[$i]) ? $close_times[$i] : null;
        $is_holiday = in_array($date, $holidays);

        // If it's a holiday, set the open and close times to null
        if ($is_holiday) {
            $open_time = null;
            $close_time = null;
        }

        // Insert or update availability data
        $sql = "INSERT INTO turf_availability (turf_id, date, open_time, close_time, is_holiday)
                VALUES (:user_id, :date, :open_time, :close_time, :is_holiday)
                ON DUPLICATE KEY UPDATE 
                    open_time = VALUES(open_time),
                    close_time = VALUES(close_time),
                    is_holiday = VALUES(is_holiday)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':open_time', $open_time);
        $stmt->bindParam(':close_time', $close_time);
        $stmt->bindParam(':is_holiday', $is_holiday, PDO::PARAM_BOOL);
        $stmt->execute();
    }

    header("Location: edit_time.php?success=1");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Ground7</title>

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
    <style>
        .availability-box {
            /* Your existing styles */
        }

        .availability-box.highlight {
            background-color: #f0f8ff;
            /* Light blue background */
            border: 2px solid #007bff;
            /* Blue border */
            transition: 0.3s;
            /* Smooth transition */
        }

        .availability-box.highlight h6,
        .availability-box.highlight span {
            font-weight: bold;
            /* Bold text for better visibility */
        }
    </style>
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Availability</title>
   
</head>
<body>
<div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global">
        </div>
    </div>

    <div class="main-wrapper">
        <?php include('navbar.php'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header text-white" style="background-color: rgb(9, 126, 82); border-radius:20px;">
    <h4 style="color:#fff;">Edit Availability</h4>
</div>
            <div class="card-body">
                <!-- Success message after update -->
                <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                    <div class="alert alert-success">
                        Availability updated successfully!
                    </div>
                <?php endif; ?>

                <!-- Availability update form -->
                <form action="" method="POST">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Open Time</th>
                                    <th>Close Time</th>
                                    <th>Holiday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dates as $date): ?>
                                    <tr>
                                        <td>
                                            <input type="date" name="availability_date[]" class="form-control" value="<?php echo $date; ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="time" name="open_time[]" class="form-control" value="<?php 
                                                // Check if the date exists in availability data
                                                $found = false;
                                                foreach ($availability_data as $day) {
                                                    if ($day['date'] === $date) {
                                                        $found = true;
                                                        echo $day['open_time'];
                                                        break;
                                                    }
                                                }
                                                if (!$found) {
                                                    echo '09:00'; // Default open time
                                                }
                                            ?>" required>
                                        </td>
                                        <td>
                                            <input type="time" name="close_time[]" class="form-control" value="<?php 
                                                if ($found) {
                                                    echo $day['close_time'];
                                                } else {
                                                    echo '17:00'; // Default close time
                                                }
                                            ?>" required>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" name="holiday[]" value="<?php echo $date; ?>" class="form-check-input"
                                                    <?php // Check if the date is a holiday
                                                    foreach ($availability_data as $day) {
                                                        if ($day['date'] === $date && $day['is_holiday']) {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?>>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label for="holiday" class="form-check-label">Holiday</label>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="background-color: rgb(9, 126, 82);">Update Availability</button>

                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-white" style="background-color: rgb(9, 126, 82); border-radius:20px;">
                <h4 style="color:#fff;">Holidays This Month</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($holiday_data)): ?>
                    <ul class="list-group">
                        <?php foreach ($holiday_data as $holiday): ?>
                            <li class="list-group-item"><?php echo date('d-m-Y', strtotime($holiday['date'])); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-muted">No holidays this month.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        function toggleTimeFields(checkbox, index) {
            const openTimeInput = document.getElementsByName('open_time[]')[index];
            const closeTimeInput = document.getElementsByName('close_time[]')[index];

            if (checkbox.checked) {
                openTimeInput.value = '';
                closeTimeInput.value = '';
                openTimeInput.disabled = true;
                closeTimeInput.disabled = true;
            } else {
                openTimeInput.disabled = false;
                closeTimeInput.disabled = false;
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const holidayCheckboxes = document.querySelectorAll('input[name="holiday[]"]');
            holidayCheckboxes.forEach((checkbox, index) => {
                checkbox.addEventListener('change', function() {
                    toggleTimeFields(checkbox, index);
                });
                toggleTimeFields(checkbox, index); // Initialize the checkbox state
            });
        });
    </script>

<?php        include('footer.php');  ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>

    <script src="assets/plugins/select2/js/select2.min.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>

    <script src="assets/plugins/apexchart/apexcharts.min.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>
    <script src="assets/plugins/apexchart/chart-data.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>

    <script src="assets/js/script.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="b982b0fe9ac7fcf2b7eab402-|49" defer></script>
    </body>

    <!-- Mirrored from html/coach-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:16:05 GMT -->

</html>
