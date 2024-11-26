<?php
session_start();
include('../config.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: turf_login.php");
    exit();
}

// Check if turf_id is provided in the URL
if (isset($_GET['id'])) {
    $turf_id = $_GET['id'];

    // Prepare the SQL statement to fetch events
    $sql = "SELECT * FROM events WHERE turf_id = :turf_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':turf_id', $turf_id);
    $stmt->execute();

    // Fetch events
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    die("Turf ID not provided.");
}

// Close the connection
$conn = null;
?>

<!DOCTYPE html lang="en">

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
        <meta name="twitter:title"
            content="Ground7 -  Booking Coaches, Venue for tournaments, Court Rental template">
        <meta name="twitter:image" content="assets/img/meta-image.jpg">
        <meta name="twitter:image:alt" content="Ground7">
        <meta property="og:url" content="https://Ground7.dreamguystech.com/">
        <meta property="og:title"
            content="Ground7 -  Booking Coaches, Venue for tournaments, Court Rental template">
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

        <!-- Bootstrap 5 and necessary meta tags -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles -->
        <style>
            .read-more-content {
                display: none;
            }

            .read-more-btn {
                color: #007bff;
                cursor: pointer;
            }

            .table td img {
                max-width: 150px;
                border-radius: 8px;
            }

            .table td {
                vertical-align: middle;
            }

            .table {
                margin-bottom: 30px;
            }

            /* Make the back button float at the bottom */
            .back-btn {
                margin-top: 20px;
            }
        </style>
    </head>

    
        <div id="global-loader">
            <div class="loader-img">
                <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global">
            </div>
        </div>

        <div class="main-wrapper">
            <?php include('navbar.php'); ?>
            <div class="container mt-5">
                <h1 class="text-center">Event Details</h1>

                <!-- If events exist -->
                <?php if (count($events) > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-4">
                            <thead class="table-dark">
                                <tr>
                                    <th>Image</th>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($events as $event): ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo htmlspecialchars($event['event_image']); ?>"
                                                alt="<?php echo htmlspecialchars($event['event_name']); ?>" class="img-fluid">
                                        </td>
                                        <td><?php echo htmlspecialchars($event['event_name']); ?></td>
                                        <td><?php echo htmlspecialchars($event['event_date']); ?></td>
                                        <td><?php echo htmlspecialchars($event['event_time']); ?></td>
                                        <td><?php echo htmlspecialchars($event['event_location']); ?></td>
                                        <td style="max-width: 200px;">
                                            <?php
                                            $description = htmlspecialchars($event['event_description']);
                                            if (strlen($description) > 100) {
                                                echo substr($description, 0, 100) . '<span class="read-more-content">' . substr($description, 100) . '</span><span class="read-more-btn"> Read More</span>';
                                            } else {
                                                echo $description;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <!-- If no events found -->
                    <div class="alert alert-warning" role="alert">
                        No events found for this turf.
                    </div>
                <?php endif; ?>

                <!-- Back to Dashboard Button -->
            
            </div>
        </div>
        <!-- jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            $(document).on('click', '.read-more-btn', function () {
                var readMoreText = $(this).siblings('.read-more-content');
                if (readMoreText.is(':visible')) {
                    readMoreText.hide();
                    $(this).text(' Read More');
                } else {
                    readMoreText.show();
                    $(this).text(' Read Less');
                }
            });
        </script>


        <?php include('footer.php'); ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="assets/js/jquery-3.7.0.min.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>

        <script src="assets/js/bootstrap.bundle.min.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>

        <script src="assets/plugins/select2/js/select2.min.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>

        <script src="assets/plugins/apexchart/apexcharts.min.js"
            type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>
        <script src="assets/plugins/apexchart/chart-data.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>

        <script src="assets/js/script.js" type="b982b0fe9ac7fcf2b7eab402-text/javascript"></script>
        <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
            data-cf-settings="b982b0fe9ac7fcf2b7eab402-|49" defer></script>
        </body>

        <!-- Mirrored from html/coach-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:16:05 GMT -->

        </html>