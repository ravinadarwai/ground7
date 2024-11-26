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
?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html/coach-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:15:26 GMT -->

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

        .card-header-btns .btn {
            margin-bottom: 5px;
        }

        .card-header-btns {
            padding-left: 0;
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
                <div class="row">
                    <div class="card dashboard-card statistic-simply">
                        <div class="card-header">
                            <h4>Statistics</h4>
                            <p>Track progress and improve performance</p>
                        </div>
                        <div class="row">
                        <?php
try {
    include('../config.php'); // Assuming this file contains your database connection

    $turf_owners_id = $user_id; // Example: Set $user_id based on session or authentication

    // Correct SQL query with the placeholder :turf_ownerid
    $sql = "SELECT COUNT(*) AS total_games FROM games WHERE turf_owners_id = :turf_owners_id";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind the value correctly, using :turf_ownerid as defined in the SQL query
    $stmt->bindValue(':turf_owners_id', $turf_owners_id, PDO::PARAM_INT);
    
    // Execute the statement
    $stmt->execute();
    
    // Fetch the result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_games = $row['total_games'] ?? 0; // Default to 0 if no games are found
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<div class="col-xl-4 col-lg-4 col-md-6 d-flex">
    <div class="statistics-grid flex-fill">
        <div class="statistics-content">
            <h3 id="courts-booked"><?php echo $total_games; ?></h3>
            <p>Total Games</p>
        </div>
        <div class="statistics-icon">
            <img src="assets/img/icons/statistics-01.svg" alt="Icon">
        </div>
    </div>
</div>


                         
<?php
try {
    include('../config.php'); // Include your database connection

    // SQL query to count users from the turfuser table
    $turf_id = $user_id; // Example: Set $user_id based on session or authentication

    // Correct SQL query with the placeholder :turf_id
    $sql = "SELECT COUNT(*) AS total_users FROM turfuser WHERE turf_id = :turf_id";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind the value correctly, using :turf_id as defined in the SQL query
    $stmt->bindValue(':turf_id', $turf_id, PDO::PARAM_INT);
    
    // Execute the statement
    $stmt->execute();
    
    // Fetch the result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_users = $row['total_users'] ?? 0; // Default to 0 if no users are found
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>


<div class="col-xl-4 col-lg-4 col-md-6 d-flex">
    <div class="statistics-grid flex-fill">
        <div class="statistics-content">
            <h3 id="upcoming-events"><?php echo $total_users; ?></h3> <!-- Display the user count -->
            <p>Upcoming Users</p>
        </div>
        <div class="statistics-icon">
            <img src="assets/img/icons/upcomming-event.png" alt="Icon">
        </div>
    </div>
</div>

<?php
try {
    include('../config.php'); // Include your database connection

    // SQL query to count users from the turfuser table
    $turf_id = $user_id; // Example: Set $user_id based on session or authentication

    // Correct SQL query with the placeholder :turf_id
    $sql = "SELECT COUNT(*) AS total_events FROM events WHERE turf_id = :turf_id";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind the value correctly, using :turf_id as defined in the SQL query
    $stmt->bindValue(':turf_id', $turf_id, PDO::PARAM_INT);
    
    // Execute the statement
    $stmt->execute();
    
    // Fetch the result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_users = $row['total_events'] ?? 0; // Default to 0 if no users are found
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>           

                            <!-- Upcoming Events -->
                            <div class="col-xl-4 col-lg-4 col-md-6 d-flex">
                                <div class="statistics-grid flex-fill">
                                    <div class="statistics-content">
                                        <h3 id="upcoming-events"><?php echo $total_users; ?></h3> <!-- Placeholder -->
                                        <p>Upcoming Events</p>
                                    </div>
                                    <div class="statistics-icon">
                                        <img src="assets/img/icons/upcomming-event.png" alt="Icon">
                                    </div>
                                </div>
                            </div>

                            <!-- Monthly Payments -->
                           
                        </div>
                    </div>
                </div>




                <div class="row">

                    <div class="col-xl-3 col-lg-12 d-flex">



                    </div>
                    <?php
                    include('../config.php');

                    // Check if user is logged in
                    if (!isset($_SESSION['user_id'])) {
                        header("Location: login.php");
                        exit();
                    }

                    // Fetch turf owner's data
                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT id FROM turf_owners WHERE id = :user_id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':user_id', $user_id);
                    $stmt->execute();

                    $turf_owner = $stmt->fetch(PDO::FETCH_ASSOC);
                    $turf_id = $turf_owner['id'];

                    // Fetch availability data from turf_availability table
                    $sql_availability = "SELECT date, open_time, close_time, is_holiday FROM turf_availability WHERE turf_id = :turf_id";
                    $stmt_availability = $conn->prepare($sql_availability);
                    $stmt_availability->bindParam(':turf_id', $turf_id);
                    $stmt_availability->execute();

                    $availability_data = $stmt_availability->fetchAll(PDO::FETCH_ASSOC);

                    // Get current date and day
                    $currentDate = new DateTime();
                    $days = [];

                    // Generate the next 7 days
                    for ($i = 0; $i < 6; $i++) {
                        $date = clone $currentDate; // Clone the current date to avoid modifying it
                        $date->modify("+$i day");
                        $formattedDate = $date->format('Y-m-d'); // Format as Y-m-d for comparison
                        $displayDate = $date->format('d M Y'); // Display format (e.g., 23 Jul 2023)
                        $dayName = $date->format('l'); // Get the day name (e.g., Monday)

                        // Find the matching availability for the date
                        $availability = null;
                        foreach ($availability_data as $data) {
                            if ($data['date'] == $formattedDate) {
                                $availability = $data;
                                break;
                            }
                        }

                        // If availability is found, use it; otherwise, set default times or holiday message
                        $open_time = $availability['open_time'] ?? '00:00'; // Default time
                        $close_time = $availability['close_time'] ?? '00:00'; // Default time
                        $is_holiday = $availability['is_holiday'] ?? 0;

                        $days[] = [
                            'date' => $displayDate,
                            'day' => $dayName,
                            'open_time' => $open_time,
                            'close_time' => $close_time,
                            'is_holiday' => $is_holiday
                        ];
                    }
                    ?>


                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card dashboard-card">
                                <div class="card-header card-header-info">
                                    <div class="court-table-head">
                                        <h4>My Availability</h4>
                                        <p>Easily communicate your availability for a seamless turf experience.</p>
                                    </div>
                                    <div class="my-availability">
                                        <div class="edit-availability" style="text-align:center;">
                                            <a href="edit_time" class="btn btn-secondary"><i
                                                    class="feather-edit"></i>Edit Availability</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="availability-group">
                                    <div class="row">
                                        <?php foreach ($days as $day): ?>
                                            <div class="col-xl-2 col-lg-3 col-md-4">
                                                <div
                                                    class="availability-box <?= ($day['date'] === $currentDate->format('d M Y')) ? 'highlight' : '' ?>">
                                                    <!-- Highlight today -->
                                                    <div class="available-date">
                                                        <h6><?= htmlspecialchars($day['date']) ?></h6>
                                                        <span><?= htmlspecialchars($day['day']) ?></span>
                                                    </div>
                                                    <div class="available-time">
                                                        <?php if ($day['is_holiday']): ?>
                                                            <span>Holiday</span>
                                                        <?php else: ?>
                                                            <span>Time</span>
                                                            <h5><?= htmlspecialchars($day['open_time']) ?> to
                                                                <?= htmlspecialchars($day['close_time']) ?>
                                                            </h5>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-7 col-lg-12 d-flex">
                            <div class="card dashboard-card flex-fill">
                                <div class="card-header card-header-info">
                                    <div class="card-header-inner">
                                        <h4>My Games</h4>
                                        <p>Expertly manage your game bookings</p>
                                    </div>
                                    <div class="card-header-btns" style="padding-left:0;">
                                        <button class="btn btn-primary me-2">
                                            <a href="game_edit?user_id=<?php echo $user_id; ?>"
                                                style="color: white; text-decoration: none;">Edit Games</a>
                                        </button>

                                        <button class="btn btn-secondary">
                                            <a href="view_all_games.php" style="color: white; text-decoration: none;">View All Games</a>
                                        </button>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav-Games" role="tabpanel">
                                        <div class="table-responsive dashboard-table-responsive">
                                            <table class="table dashboard-card-table">
                                                <tbody>
                                                    <!-- Game 1 -->
                                                    <tr>
                                                        <td>
                                                <tbody>
                                                    <?php
                                                    // Assuming you have a PDO database connection in $conn
                                                    include('../config.php'); // Ensure this file uses the PDO connection

                                                    $user_id = $_SESSION['user_id']; // Get the user ID from session

                                                    // Fetch user's booked games from the `games` table
                                                    $sql = "SELECT g.id, g.game_name, g.court_type, g.max_players, g.duration, g.price_per_person, g.game_description, g.game_image 
        FROM games g
        WHERE g.turf_owners_id = :user_id LIMIT 4";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                                                    $stmt->execute();
                                                    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    foreach ($games as $game): ?>
                                                        <tr id="game-row-<?= $game['id']; ?>">
                                                            <!-- Use game ID for unique identification -->
                                                            <td>
                                                                <div class="academy-info">
                                                                    <a href="game-details.php?game_id=<?= $game['id']; ?>"
                                                                        class="academy-img">
                                                                        <img src="../admin/<?= $game['game_image']; ?>"
                                                                            alt="<?= $game['game_name']; ?>">
                                                                    </a>
                                                                    <div class="academy-content">
                                                                        <h6><a data-bs-toggle="modal"
                                                                                data-bs-target="#upcoming-game"><?= $game['game_name']; ?></a>
                                                                        </h6>
                                                                        <span>Court: <?= $game['court_type']; ?></span>
                                                                        <ul>
                                                                            <li>Max Players: <?= $game['max_players']; ?>
                                                                            </li>
                                                                            <li>Duration: <?= $game['duration']; ?></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6>Description</h6>
                                                                <p>
                                                                    <?php
                                                                    $description = explode(' ', $game['game_description']);
                                                                    $short_description = implode(' ', array_slice($description, 0, 5));
                                                                    echo $short_description . '...';
                                                                    ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <h4>$<?= number_format($game['price_per_person'], 2); ?>
                                                                </h4>
                                                            </td>
                                                            <td>
                    <a href="delete_game.php?id=<?= $game['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this game?');">Delete</a>
                </td>
                                                        </tr>
                                                    <?php endforeach; ?>


                                                </tbody>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 
                        <div class="col-xl-5 col-lg-12 d-flex flex-column">
                            <div class="card payment-card ">
                                <div class="payment-info ">
                                    <div class="payment-content">
                                        <p>Your Wallet Balance</p>
                                        <h2>$4,544</h2>
                                    </div>
                                    <div class="payment-btn">
                                        <a href="javascript:void(0);" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#add-payment">Add Payment</a>
                                    </div>
                                </div>







                            </div>
                            <div class="card dashboard-card statistic-simply">
                                <div class="card-header card-header-info view-all-fav">
                                    <div class="card-header-inner">
                                        <h4>Earnings</h4>
                                    </div>
                                    <div class="sortby-section invoice-sort">
                                        <div class="sorting-info">
                                            <div class="sortby-filter-group court-sortby">
                                                <div class="sortbyset week-bg me-0">
                                                    <div class="sorting-select">
                                                        <select class="form-control select">
                                                            <option>This Week</option>
                                                            <option>One Day</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="radial-chart"></div>
                                </div>
                            </div>


                        </div> -->

                    </div>
                    <?php

                    // Fetching data from the turfuser table
                    try {
                        $sql = "SELECT * FROM turfuser LIMIT 3"; // Limiting to 3 users
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $turfUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        echo "Error fetching data: " . $e->getMessage();
                    }

                    // Properly close the connection
                    $conn = null;
                    ?>

                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <div class="card dashboard-card mb-0 p-1">
                                <div class="card-header card-header-info border-0">
                                    <div class="card-header-inner mx-3 mt-2">
                                        <h4>Players</h4>
                                        <p>Join the Turf Games community at various locations around the you.
                                        </p>
                                    </div>
                                    <div class="card-header-btns">
                                        <nav>
                                            <div class="nav nav-tabs" role="tablist">
                                                <button class="nav-link active" id="nav-Recent-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-Recent" type="button" role="tab"
                                                    aria-controls="nav-Recent" aria-selected="true"><a href="view_all_users" style="color: #fff;">view</a></button>
                                            </div>
                                        </nav>
                                    </div>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav-Recent" role="tabpanel"
                                        aria-labelledby="nav-Recent-tab" tabindex="0">
                                        <div class="table-responsive table-datatble">
                                            <table class="table table-borderless dashboard-card-table m-2">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Photo</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Contact No</th>
                                                        <th>Location</th>
                                                        <th>Aadhar No</th>
                                                        <th>Aadhar Image</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($turfUsers)): ?>
                                                        <?php foreach ($turfUsers as $user): ?>
                                                            <tr>
                                                                <td>
                                                                    <img src="<?php echo $user['photo']; ?>" alt="User Photo"
                                                                        style="width: 50px; height: auto;">
                                                                </td>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <span class="table-head-name flex-grow-1">
                                                                            <a data-bs-toggle="modal"
                                                                                data-bs-target="#user-details-<?php echo $user['id']; ?>"><?php echo htmlspecialchars($user['name']); ?></a>
                                                                            <span><?php echo htmlspecialchars($user['location']); ?></span>
                                                                        </span>
                                                                    </h2>
                                                                </td>
                                                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                                                <td><?php echo htmlspecialchars($user['contact_no']); ?></td>
                                                                <td><?php echo htmlspecialchars($user['location']); ?></td>
                                                                <td><?php echo htmlspecialchars($user['aadhar_no']); ?></td>
                                                                <td>
                                                                    <img src="<?php echo $user['aadhar_image']; ?>"
                                                                        alt="Aadhar Image" style="width: 50px; height: auto;">
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown dropdown-action">
                                                                        <a href="#" class="action-icon dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="fas fa-ellipsis"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item"
                                                                                href="download.php?id=<?php echo $user['id']; ?>">
                                                                                <i class="feather-download"></i> Download
                                                                            </a>
                                                                            <a class="dropdown-item"
                                                                                href="delete.php?id=<?php echo $user['id']; ?>"
                                                                                onclick="return confirm('Are you sure you want to delete this user?');">
                                                                                <i class="feather-trash"></i> Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <!-- Modal for user details -->
                                                            <div class="modal fade" id="user-details-<?php echo $user['id']; ?>"
                                                                tabindex="-1" role="dialog" aria-labelledby="userDetailsLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="userDetailsLabel">User
                                                                                Details for
                                                                                <?php echo htmlspecialchars($user['name']); ?>
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <img src="<?php echo $user['photo']; ?>"
                                                                                alt="User Photo" class="img-fluid">
                                                                            <p>Email:
                                                                                <?php echo htmlspecialchars($user['email']); ?>
                                                                            </p>
                                                                            <p>Contact No:
                                                                                <?php echo htmlspecialchars($user['contact_no']); ?>
                                                                            </p>
                                                                            <p>Location:
                                                                                <?php echo htmlspecialchars($user['location']); ?>
                                                                            </p>
                                                                            <p>Aadhar No:
                                                                                <?php echo htmlspecialchars($user['aadhar_no']); ?>
                                                                            </p>
                                                                            <img src="<?php echo $user['aadhar_image']; ?>"
                                                                                alt="Aadhar Image" class="img-fluid">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="8" class="text-center">No users found.</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <?php include('footer.php');  ?>


        </div>



    </div>



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