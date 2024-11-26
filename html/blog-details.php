<?php
session_start();
include('../config.php'); // Ensure this contains the PDO connection setup

$userid=isset($_SESSION['userid']);

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:17:58 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Ground 7</title>

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

    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .carding .listing-item .listing-img img {
            height: 30dvh;
            object-fit: cover;
        }

    </style>
</head>

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global" />
        </div>
    </div>

    <div class="main-wrapper blog">

    <?php include 'navbar.php'; ?>


        <div class="breadcrumb breadcrumb-list mb-0">
            <span class="primary-right-round"></span>
            <div class="container">
                <h1 class="text-white">Games Details</h1>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li>Games Details</li>
                </ul>
            </div>
        </div>
        <?php
       include('../config.php');

       // Check if 'id' is set in the URL
       if (isset($_GET['id'])) {
           $id = $_GET['id'];
   
           // Prepare and execute the query to fetch the specific game based on id
           $query = "SELECT * FROM game_categories WHERE id = :id";
           $stmt = $conn->prepare($query);
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->execute();
           $game = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the single row result
   
           if ($game) {
            // Your HTML output for the game details
            ?>

        <div class="content blog-details">
            <div class="container">
                <div class="row">
                <div class="col-sm-12 col-lg-8 col-lg-8">
                <div class="featured-venues-item">
                    <div class="listing-item blog-info">
                        <div class="listing-img">
                            <a href="blog-details.php?id=<?= $game['id'] ?>">
                                <img src="../superadmin/html/<?php echo $game['image']; ?>"  style="height:35rem; object-fit:cover;" alt="Game Image" class="img-fluid">
                            </a>
                            <div class="fav-item-venues news-sports">
                                <span class="tag tag-blue"><?= $game['name'] ?></span>
                            </div>
                        </div>
                        <div class="listing-content news-content">
                            <span class="tag"><?= $game['description'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "Game not found.";
        }
    } else {
        echo "No game ID specified.";
    }
?>


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

                    <div class="col-sm-12 col-md-4 col-lg-4 blog-sidebar theiaStickySidebar">
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
            <?php
include('../config.php'); // Ensure this contains the PDO connection setup

$categoryId = $_GET['id']; // Get the category ID from the URL

$query = "
SELECT 
    t.turf_name AS turf_name,          -- Turf owner's name
    t.image AS turf_image,             -- Turf owner's image
    t.turf_location AS turf_location,  -- Turf owner's location
    t.description AS turf_description  -- Turf owner's description
FROM 
    turf_owners t                  -- Select from turf owners
JOIN 
    games g ON g.turf_owners_id = t.id   -- Join games with turf owners
JOIN 
    game_categories gc ON g.game_name = gc.id  -- Join games with categories
WHERE 
    gc.id = :categoryId            -- Filter by category ID
";

$stmt = $conn->prepare($query);
$stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT); // Bind the category ID
$stmt->execute(); // Execute the query
$results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results as an associative array

// Check if results are populated before processing
if (!empty($results)) {
    ?>
    <section class="section featured-venues latest-news">
        <div class="container">
            <div class="section-heading aos" data-aos="fade-up">
                <h2> Related <span>Turf </span></h2>
                <p class="sub-title">
                    Discover the best turfs available for your favorite games, and explore their details.
                </p>
            </div>
            <div class="row">
                <div class="featured-slider-group">
                    <div class="owl-carousel featured-venues-slider owl-theme">
                        <?php
                        foreach ($results as $row) {
                            ?>
                          <div class="featured-venues-item aos" data-aos="fade-up">
    <div class="listing-item mb-0">
        <div class="listing-img">
        <a href="book.php">
        <img src="../admin/<?php echo htmlspecialchars($row['turf_image']); ?>" 
                     alt="Turf Image" class="img-fluid" />
            </a>
            <div class="fav-item-venues news-sports">
                <span class="tag tag-blue"><?php echo htmlspecialchars($row['turf_name']); ?></span>
            </div>
        </div>
        <div class="listing-content news-content">
            <div class="listing-venue-owner listing-dates">
                <span>Location: <?php echo htmlspecialchars($row['turf_location']); ?></span>
            </div>
            <p><?php echo htmlspecialchars($row['turf_description']); ?></p>
        </div>
    </div>
</div>

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

           
        </div>
    </section>
    <?php
} else {
    echo "<p>No turf owners found for this category.</p>";
}
$conn = null; // Close the database connection
?>







            <?php include 'footer.php'; ?>
        </div>


        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="assets/js/jquery-3.7.0.min.js" type="fc656700eaeb08c64f9c6840-text/javascript"></script>

        <script src="assets/js/bootstrap.bundle.min.js" type="fc656700eaeb08c64f9c6840-text/javascript"></script>

        <script src="assets/plugins/select2/js/select2.min.js" type="fc656700eaeb08c64f9c6840-text/javascript"></script>

        <script src="assets/plugins/owl-carousel/owl.carousel.min.js"
            type="fc656700eaeb08c64f9c6840-text/javascript"></script>

        <script src="assets/js/script.js" type="fc656700eaeb08c64f9c6840-text/javascript"></script>
        <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
            data-cf-settings="fc656700eaeb08c64f9c6840-|49" defer></script>
</body>

<!-- Mirrored from html/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:18:03 GMT -->

</html>