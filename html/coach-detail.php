<?php
session_start();
include('../config.php'); // Ensure this contains the PDO connection setup
// Check if the user is logged in by verifying the session
if (!isset($_SESSION['userid'])) {
}

// Set the user ID either from the session or the URL parameter if available
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : (isset($_GET['id']) ? $_GET['id'] : null);

if ($userid === null) {
    echo "No user ID provided.";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coach-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:14:31 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Ground7</title>

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

    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global" />
        </div>
    </div>

    <div class="main-wrapper venue-coach-details coach-detail">
        <?php include 'navbar.php'; ?>



        <div class="banner">
            <img src="assets/img/bg/coach-detail-bg.jpg" alt="Banner">
        </div>

        <div class="content">
            <div class="container">

                <div class="row move-top">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <?php
                        // Include database configuration
                        include('../config.php'); // Adjust path as needed

                        // Query to fetch the coach's information
                        $query = "SELECT * FROM turf_owners"; // Replace with your actual query
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $coach = $stmt->fetch(PDO::FETCH_ASSOC);

                        // Check if data is fetched successfully
                        if ($coach) {
                            // Display the coach's information in the HTML structure
                            echo '<div class="dull-bg corner-radius-10 coach-info d-md-flex justify-content-start align-items-start">';
                            echo '<div class="profile-pic">';
                            echo '<a href="javascript:void(0);"><img alt="User" class="corner-radius-10"  src="../admin/' . htmlspecialchars($coach['image']) . ' "></a>'; // Assuming profile_pic is a field in your table
                            echo '</div>';
                            echo '<div class="info w-100">';
                            echo '<div class="d-sm-flex justify-content-between align-items-start">';
                            echo '<h3 class="d-flex align-items-center justify-content-start mb-0">' . htmlspecialchars($coach['turf_name']) . '<span class="d-flex justify-content-center align-items-center"><i class="fas fa-check-double"></i></span></h3>';
                            echo '</div>';
                            echo '<p>' . htmlspecialchars($coach['description']) . '</p>'; // Assuming a description field exists
                            echo '<ul class="d-sm-flex align-items-center">';
                            echo '<li class="d-flex align-items-center">';
                            echo '<div class="white-bg d-flex align-items-center review">';
                            echo '</div>';
                            echo '</li>';
                            echo '<li><img src="assets/img/flag/india.png" alt="Icon">' . htmlspecialchars($coach['turf_location']) . '</li>'; // Assuming a location field
                            echo '</ul>';
                            echo '<hr>';
                            echo '<ul class="d-xl-flex">';
                            // Replace the previous rank, sessions completed, and joined date with open_time and close_time
                            echo '<li class="d-flex align-items-center"><img src="time.png" alt="Icon" style="width: 20px; height: 20px;">Open Time: ' . htmlspecialchars($coach['open_time']) . '</li>';
                            // Assuming open_time field
                            echo '<li class="d-flex align-items-center"><img src="time.png" alt="Icon" style="width: 20px; height: 20px;">Close Time: ' . htmlspecialchars($coach['close_time']) . '</li>'; // Assuming close_time field
                            echo '</ul>';
                            echo '<div class="white-bg book-coach">';
                            echo '<div class="d-grid btn-block mt-3">';
                            echo '<a href="book-slot.php?id=' . htmlspecialchars($coach['id']) . '" class="btn btn-secondary d-inline-flex justify-content-center align-items-center mt-5"><i class="feather-calendar"></i>Book Now</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>'; // Close info div
                            echo '</div>'; // Close coach-info div
                        } else {
                            echo '<p>No coach data found.</p>';
                        }
                        ?>
                     
                        <div class="venue-options white-bg mb-4">
                            <ul class="clearfix">
                                <li><a href="javascript:void(0);" onclick="scrollToSection('games')">Games</a></li>
                                <li><a href="javascript:void(0);" onclick="scrollToSection('gallery')">Gallery</a></li>
                                <li><a href="javascript:void(0);" onclick="scrollToSection('reviews')">Reviews</a></li>
                                <li><a href="javascript:void(0);" onclick="scrollToSection('location')">Locations</a></li>
                            </ul>
                        </div>

                        <div class="accordion" id="accordionPanel">
                            <?php


                            try {
                                // Fetch images from the database for the specific user
                                $sql = "SELECT image FROM gallery WHERE user_id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute([$userid]);
                                $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Fetch games associated with the turf owner
                                $sqlGames = "SELECT game_name, game_description, game_image, price_per_person FROM games WHERE turf_owners_id = ?";
                                $stmtGames = $conn->prepare($sqlGames);
                                $stmtGames->execute([$userid]);
                                $games = $stmtGames->fetchAll(PDO::FETCH_ASSOC);
                            } catch (PDOException $e) {
                                // Handle SQL errors
                                echo "Error fetching data: " . $e->getMessage();
                                exit();
                            }
                            ?>


                            <!-- Section for displaying games -->
                            <div class="accordion-item mb-4" id="games">
                                <h4 class="accordion-header" id="panelsStayOpen-games">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseGames" aria-expanded="false" aria-controls="panelsStayOpen-collapseGames">
                                        Available Games
                                    </button>
                                </h4>
                                <div id="panelsStayOpen-collapseGames" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-games">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <?php if (!empty($games)): ?>
                                                <?php foreach ($games as $game): ?>
                                                    <div class="col-md-4 mb-4">
                                                        <div class="card">
                                                            <img class="card-img-top img-fluid rounded" style="object-fit: cover; width: 100%; height: 200px;" src="../admin/<?php echo htmlspecialchars($game['game_image']); ?>" alt="<?php echo htmlspecialchars($game['game_name']); ?>">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?php echo htmlspecialchars($game['game_name']); ?></h5>
                                                                <p class="card-text"><?php echo htmlspecialchars($game['game_description']); ?></p>
                                                                <p class="card-text"><strong>Price: <?php echo htmlspecialchars($game['price_per_person']); ?> per person</strong></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <p>No games found for this turf owner.</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            // Start the session at the very beginning of your script




                            // Fetch images from the database
                            $sql = "SELECT image FROM gallery WHERE user_id = ?"; // Use the correct column name
                            $stmt = $conn->prepare($sql);

                            try {
                                $stmt->execute([$userid]);
                                $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            } catch (PDOException $e) {
                                // Handle any SQL errors
                                echo "Error fetching images: " . $e->getMessage();
                                exit();
                            }
                            ?>

                            <div class="accordion-item mb-4" id="gallery">
                                <h4 class="accordion-header" id="panelsStayOpen-gallery">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                        Gallery
                                    </button>
                                </h4>
                                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-gallery">
                                    <div class="accordion-body">
                                        <div class="owl-carousel gallery-slider owl-theme">
                                            <?php if (!empty($images)): ?>
                                                <?php foreach ($images as $image): ?>
                                                    <div class="gallery-widget-item">
                                                        <a class="corner-radius-10" href="../admin/<?php echo htmlspecialchars($image['image']); ?>" data-fancybox="gallery2">
                                                            <img class="img-fluid corner-radius-10" alt="Image" src="../admin/<?php echo htmlspecialchars($image['image']); ?>">
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <p>No images found in the gallery.</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Include jQuery and Owl Carousel scripts here if not already included -->
                            <script src="path/to/jquery.min.js"></script>
                            <script src="path/to/owl.carousel.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $(".gallery-slider").owlCarousel({
                                        items: 3, // Adjust the number of items as needed
                                        loop: true,
                                        margin: 10,
                                        nav: true,
                                        dots: false
                                    });
                                });
                            </script>


                            <div class="accordion-item mb-4" id="reviews">
                                <div class="accordion-header" id="panelsStayOpen-reviews">
                                    <div class="accordion-button d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-controls="panelsStayOpen-collapseSix">
                                        <span class="w-75 mb-0">
                                            Reviews
                                        </span>
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-gradient pull-right write-review add-review" data-bs-toggle="modal" data-bs-target="#add-review">Write a review</a>
                                </div>
                                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-reviews">
                                    <div class="accordion-body">
                                        <div class="row review-wrapper">
                                            <div class="col-lg-3">

                                            </div>
                                            <div class="col-lg-9">
                                                <div class="recommended">

                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        // Fetch and display reviews
                                        try {
                                            $stmt = $conn->query("SELECT * FROM reviews ORDER BY created_at DESC");
                                            $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($reviews as $review) {
                                                echo '<div class="review-box d-md-flex">';
                                                // echo '<div class="review-profile">';
                                                // echo '<img src="assets/img/profiles/avatar-01.jpg" class="img-fluid" alt="User">';
                                                // echo '</div>';
                                                echo '<div class="review-info">';
                                                echo '<h6 class="mb-2 title">' . htmlspecialchars($review['reviewer_name']) . ' on ' . date("d/m/Y", strtotime($review['created_at'])) . '</h6>';
                                                echo '<div class="rating">';
                                                for ($i = 1; $i <= 5; $i++) {
                                                    echo '<i class="fas fa-star ' . ($i <= $review['rating'] ? 'filled' : '') . '"></i>';
                                                }
                                                echo '<span>' . htmlspecialchars($review['rating']) . '.0</span>';
                                                echo '</div>';
                                                echo '<h6>' . htmlspecialchars($review['review_title']) . '</h6>';
                                                echo '<p>' . htmlspecialchars($review['review_text']) . '</p>';
                                                echo '<span class="post-date">Sent on ' . date("d/m/Y", strtotime($review['created_at'])) . '</span>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        } catch (PDOException $e) {
                                            error_log($e->getMessage());
                                            echo "<script>alert('Could not fetch reviews.');</script>";
                                        }
                                        ?>



                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-load-more d-flex justify-content-center align-items-center">Load More<i class="feather-plus-square"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-0" id="location">
                                <h4 class="accordion-header" id="panelsStayOpen-location">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
                                        Location
                                    </button>
                                </h4>
                                <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-location">
                                    <div class="accordion-body">
                                        <?php
                                        // Fetching the 'location' for the Google Maps iframe from the database
                                        // Update 'user_id' to the actual column name in your gallery table
                                        $sql = "SELECT location FROM gallery WHERE user_id = ?"; // Adjust if necessary
                                        $stmt = $conn->prepare($sql);

                                        try {
                                            $stmt->execute([$userid]); // Assuming $userid is available
                                            $location = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch location as associative array
                                        } catch (PDOException $e) {
                                            // Handle any SQL errors
                                            echo "Error fetching location: " . $e->getMessage();
                                            exit();
                                        }
                                        ?>

                                        <?php if (!empty($location['location'])): ?>
                                            <div class="google-maps">
                                                <iframe src="<?php echo htmlspecialchars($location['location']); ?>" height="445" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        <?php else: ?>
                                            <p>Location not available.</p>
                                        <?php endif; ?>

                                        <div class="dull-bg d-flex justify-content-start align-items-center mb-0">
                                            <div class="white-bg me-2">
                                                <i class="fas fa-location-arrow"></i>
                                            </div>
                                            <div class="">
                                                <h6>Our Venue Location</h6>
                                                <p>70 Bright St New York, USA</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <?php
                    $query = "
SELECT events.*, turf_owners.turf_name, turf_owners.image 
FROM events 
LEFT JOIN turf_owners ON events.turf_id = turf_owners.id
"; // Modified query to join tables

                    $stmt = $conn->prepare($query); // Use your PDO connection variable
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results as an associative array
                    ?>

                    <div class="col-sm-12 col-md-12 col-lg-12 blog-sidebar theiaStickySidebar">
                        <div class="card">
                            <h4>Recent Events</h4>
                            <ul class="latest-posts">
                                <?php foreach ($result as $event): ?>
                                    <li>
                                        <div class="post-thumb">
                                            <a href="event_registration.php?id=<?php echo htmlspecialchars($event['id']); ?>">
                                                <img class="img-fluid" src="../admin/<?php echo htmlspecialchars($event['image']); ?>" alt="Post">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <p>Turf Name:<?php echo htmlspecialchars($event['turf_name']); ?></p>
                                            <h6>
                                                <a href="event_registration.php?id=<?php echo htmlspecialchars($event['id']); ?>">
                                                    Event Name: <?php echo htmlspecialchars($event['event_name']); ?>
                                                </a>
                                            </h6>
                                            <!-- Display the event date -->
                                            <small class="text-muted">
                                                <?php echo date("F j, Y", strtotime($event['event_date'])); ?>
                                            </small>
                                        </div>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </div>

                </div>

            </div>


        </div>


        <?php include 'footer.php'; ?>

        <!-- Modal Structure -->
        <div class="modal custom-modal fade payment-modal" id="add-review" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="mb-0">Write a Review</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-space">
                                        <label class="form-label">Your Name <span>*</span></label>
                                        <input type="text" class="form-control" name="reviewer_name" placeholder="Enter Your Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-space">
                                        <label class="form-label">Title of your review</label>
                                        <input type="text" class="form-control" name="review_title" placeholder="If you could say it in one sentence, what would you say?">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-space">
                                        <label class="form-label">Your Review <span>*</span></label>
                                        <textarea class="form-control" name="review_text" rows="3" placeholder="Enter Your Review" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-space review">
                                        <label class="form-label">Rating <span>*</span></label>
                                        <div class="star-rating">
                                            <input id="star-5" type="radio" name="rating" value="5" required>
                                            <label for="star-5" title="5 stars"><i class="active fa fa-star"></i></label>
                                            <input id="star-4" type="radio" name="rating" value="4">
                                            <label for="star-4" title="4 stars"><i class="active fa fa-star"></i></label>
                                            <input id="star-3" type="radio" name="rating" value="3">
                                            <label for="star-3" title="3 stars"><i class="active fa fa-star"></i></label>
                                            <input id="star-2" type="radio" name="rating" value="2">
                                            <label for="star-2" title="2 stars"><i class="active fa fa-star"></i></label>
                                            <input id="star-1" type="radio" name="rating" value="1">
                                            <label for="star-1" title="1 star"><i class="active fa fa-star"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="terms-accept">
                                        <div class="d-flex align-items-center form-check">
                                            <input type="checkbox" id="terms_accept" class="form-check-input" required>
                                            <label for="terms_accept">I have read and accept <a href="terms-condition.html">Terms &amp; Conditions</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Submit Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- PHP Processing Logic -->
        <?php
        include('../config.php'); // Ensure this points to your actual config file

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Collect and sanitize input data
            $reviewer_name = htmlspecialchars(trim($_POST['reviewer_name']));
            $review_title = htmlspecialchars(trim($_POST['review_title']));
            $review_text = htmlspecialchars(trim($_POST['review_text']));
            $rating = intval($_POST['rating']);

            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO reviews (reviewer_name, review_title, review_text, rating) VALUES (?, ?, ?, ?)");

            // Execute the statement with the bound values
            if ($stmt->execute([$reviewer_name, $review_title, $review_text, $rating])) {
                echo "<script>alert('Review submitted successfully.');</script>";
            } else {
                echo "<script>alert('Error: Could not submit the review.');</script>";
            }
        }

        // Close the database connection (optional)
        $conn = null;
        ?>
        <script>
            function scrollToSection(id) {
                // Smooth scroll to the section with the given id
                const element = document.getElementById(id);
                if (element) {
                    window.scrollTo({
                        top: element.offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        </script>

        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="assets/js/jquery-3.7.0.min.js" type="e06bcb4dc914a7bea883db46-text/javascript"></script>

        <script src="assets/js/bootstrap.bundle.min.js" type="e06bcb4dc914a7bea883db46-text/javascript"></script>

        <script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="e06bcb4dc914a7bea883db46-text/javascript"></script>

        <script src="assets/plugins/select2/js/select2.min.js" type="e06bcb4dc914a7bea883db46-text/javascript"></script>

        <script src="assets/plugins/fancybox/jquery.fancybox.min.js" type="e06bcb4dc914a7bea883db46-text/javascript"></script>

        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js" type="e06bcb4dc914a7bea883db46-text/javascript"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js" type="e06bcb4dc914a7bea883db46-text/javascript"></script>

        <script src="assets/js/script.js" type="e06bcb4dc914a7bea883db46-text/javascript"></script>
        <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="e06bcb4dc914a7bea883db46-|49" defer></script>
</body>

<!-- Mirrored from coach-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:14:56 GMT -->

</html>