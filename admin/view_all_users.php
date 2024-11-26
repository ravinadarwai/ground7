<?php
include('../config.php');


// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: turf_login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Get the user ID from session

// Fetching data from the turfuser table
try {
    $sql = "SELECT * FROM turfuser "; // Limiting to 3 users
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $turfUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching data: " . $e->getMessage();
}

// Properly close the connection
$conn = null;
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


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .card-header {
            padding: 15px;
            /* Padding for the card header */
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
        }

        .table thead th {
            background-color: #097E52;
            color: white;
            padding: 12px;
            /* Padding for table header cells */
        }

        .table tbody td {
            padding: 12px;
            /* Padding for table body cells */
        }

        .table tbody tr:hover {
            background-color: #c8e6c9;
        }

        .table img {
            width: 80px;
            height: 60px;
            object-fit: cover;
        }

        .dropdown-menu {
            min-width: 150px;
        }
        
    </style>
</head>

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global">
        </div>
    </div>

    <div class="main-wrapper">
        <?php include('navbar.php'); ?>


        <div class="container mb-5">
            <div class="card shadow-sm">
                <div class="card-header ">
                    <h4 class="mb-0">Players</h4>
                    
                    <p class="mb-0">Join the Turf Games community at various locations around the you.
                    <button class="btn btn-success float-end" onclick="downloadExcel()">Download Excel</button>

                </div>
                <div class="table-responsive ">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>Location</th>
                                <th>Aadhar No</th>
                                <th>Aadhar Image</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($turfUsers)): ?>
                                <?php foreach ($turfUsers as $user): ?>
                                    <tr class="m-5">
                                        <td><img src="<?php echo $user['photo']; ?>" alt="User Photo"></td>
                                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                                        <td><?php echo htmlspecialchars($user['contact_no']); ?></td>
                                        <td><?php echo htmlspecialchars($user['location']); ?></td>
                                        <td><?php echo htmlspecialchars($user['aadhar_no']); ?></td>
                                        <td><img src="<?php echo $user['aadhar_image']; ?>" alt="Aadhar Image"></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="download.php?id=<?php echo $user['id']; ?>">Download</a>
                                                    <a class="dropdown-item text-danger"
                                                        href="delete.php?id=<?php echo $user['id']; ?>"
                                                        onclick="return confirm('Are you sure?');">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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
        <?php include('footer.php'); ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script>

<script>
    function downloadExcel() {
        // Extract data from table
        let table = document.querySelector('table');
        let workbook = XLSX.utils.table_to_book(table, {sheet: "Sheet1"});

        // Generate Excel file and trigger download
        XLSX.writeFile(workbook, 'turf_users.xlsx');
    }
</script>
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