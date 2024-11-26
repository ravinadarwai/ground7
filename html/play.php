<?php
session_start();
include('../config.php'); // Ensure this contains the PDO connection setup


$userid = isset($_SESSION['userid']);

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html/blog-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:17:54 GMT -->

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

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .listing-img {
            display: flex;
            /* Use flexbox for alignment */
            justify-content: center;
            /* Center the image horizontally */
            align-items: center;
            /* Center the image vertically */
            width: 100%;
            /* Full width of the container */
            overflow: hidden;
            /* Hide overflow to maintain layout */
        }

        .listing-img img {
            max-width: 100%;
            /* Ensure the image scales down */
            height: auto;
            /* Maintain aspect ratio */
            display: block;
            /* Prevent extra space below images */
        }

        /* Optional: Add a fixed height if needed */
        .listing-img img {
            height: 200px;
            /* Set a specific height for uniformity */
            object-fit: cover;
            /* Cover the space without stretching */
        }
    </style>
</head>

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global">
        </div>
    </div>

    <div class="main-wrapper blog">

        <?php include('navbar.php'); ?>


        <div class="breadcrumb breadcrumb-list mb-0">
            <span class="primary-right-round"></span>
            <div class="container">
                <h1 class="text-white">Play</h1>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li>Play</li>
                </ul>
            </div>
        </div>


        <div class="content blog-grid">
            <div class="container">

                <div class="row">
                    <?php
                    include('../config.php'); // Ensure this contains the PDO connection setup

                    // Prepare and execute the query
                    $query = "SELECT * FROM game_categories"; // Replace 'games' with your actual table name
                    $stmt = $conn->prepare($query); // Use your PDO connection variable
                    $stmt->execute();
                    $games = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results as an associative array

                    // Check if $games is populated before the foreach loop
                    if (!empty($games)) {
                        foreach ($games as $game) {
                            // Assuming your 'games' table has 'name' and 'image' fields
                    ?>
                            <div class="col-lg-3 col-md-6 d-flex">
                                <div class="service-grid w-100 aos" data-aos="fade-up">
                                    <div class="service-img">
                                        <a href="blog-details.php?id=<?php echo $game['id']; ?>">
                                            <img src="../superadmin/html/<?php echo $game['image']; ?>" width="100%" style="height:40dvh; object-fit:cover;" class="img-fluid"
                                                alt="<?php echo $game['name']; ?>" />
                                        </a>
                                    </div>
                                    <div class="service-content">
                                        <h4>
                                            <a href="blog-details.php?id=<?php echo $game['id']; ?>"><?php echo $game['name']; ?></a>
                                        </h4>
                                        <a href="blog-details.php?id=<?php echo $game['id']; ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<div class='col-12 text-center'>No games found.</div>";
                    }
                    ?>
                </div>




            </div>
        </div>

        <?php include 'footer.php'; ?>


    </div>


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js" type="e7b018a2d6d83ef7c5ac0825-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="e7b018a2d6d83ef7c5ac0825-text/javascript"></script>

    <script src="assets/plugins/select2/js/select2.min.js" type="e7b018a2d6d83ef7c5ac0825-text/javascript"></script>

    <script src="assets/js/script.js" type="e7b018a2d6d83ef7c5ac0825-text/javascript"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="e7b018a2d6d83ef7c5ac0825-|49" defer></script>
</body>

<!-- Mirrored from html/blog-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:17:58 GMT -->

</html>