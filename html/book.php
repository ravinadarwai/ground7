<?php
session_start();
include('../config.php'); // Ensure this contains the PDO connection setup

$userid=isset($_SESSION['userid']);

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from Ground 7.dreamstechnologies.com/html/coaches-map.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:14:17 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Ground 7</title>

<meta name="twitter:description" content="Elevate your badminton business withGround 7 template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Elevate your badminton business withGround 7 template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
<meta name="keywords" content="badminton, coaching, event, players, training, courts, tournament, athletes, courts rent, lessons, court booking, stores, sports faqs, leagues, chat, wallet, invoice">
<meta name="author" content="Dreamguys - Ground 7">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@dreamguystech">
<meta name="twitter:title" content="Ground 7 -  Booking Coaches, Venue for tournaments, Court Rental template">
<meta name="twitter:image" content="assets/img/meta-image.jpg">
<meta name="twitter:image:alt" content="Ground 7">
<meta property="og:url" content="https://Ground 7.dreamguystech.com/">
<meta property="og:title" content="Ground 7 -  Booking Coaches, Venue for tournaments, Court Rental template">
<meta property="og:description" content="Elevate your badminton business withGround 7 template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
<meta property="og:image" content="../assets/img/meta-image.jpg">
<meta property="og:image:secure_url" content="assets/img/meta-image.jpg">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="600">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/feather.css">

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global" />
        </div>
    </div>

<div class="main-wrapper">

<?php include('navbar.php'); ?>


<section class="breadcrumb breadcrumb-list mb-0">
<span class="primary-right-round"></span>
<div class="container">
<h1 class="text-white">Book</h1>
<ul>
<li><a href="../index.php">Home</a></li>
<li>Book</li>
</ul>
</div>
</section>


<div class="content map-content">
<div class="container-fluid">
<div class="row">
<div class="col-xl-7">
<div class="map-list-blk">
<?php 
// Include the PDO connection
include('../config.php'); // Assuming this contains the PDO connection setup

$coaches = []; // Initialize the array

// Sample code for fetching coaches data from the database using PDO
$query = "SELECT * FROM turf_owners";
$stmt = $conn->prepare($query); // Prepare the query
$stmt->execute(); // Execute the query

// Fetch all results as an associative array
$coaches = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if $coaches is populated before the foreach loop
if (!empty($coaches)) {
    foreach ($coaches as $coach) {
        // Your code for processing each coach
    }
} else {
    echo "No coaches found.";
}
?>
<div class="row">
    <?php foreach($coaches as $coach): ?>
    <div class="col-lg-12">
       <div class="featured-venues-item">
          <div class="listing-item listing-item-grid coach-listview">
             <div class="listing-img">
                <a href="coach-detail.php?id=<?= $coach['id'] ?>">
                <img src="../admin/<?= $coach['image'] ?>" alt="Coach Image">
                </a>
                <!-- <div class="fav-item-venues">
                   <span class="tag tag-blue"><?= $coach['level'] ?></span>
                </div> -->
             </div>
             <div class="listing-content">
                <div class="list-reviews near-review near-review-list">
                   <div class="d-flex align-items-center">
                   <span><strong>Owner:</strong> <?= $coach['owner_name'] ?></span>
                   </div>
                   <span class="mile-away"><span>Open from</span> <?= date('h:i A', strtotime($coach['open_time'])) ?> <span>to</span> <?= date('h:i A', strtotime($coach['close_time'])) ?></span>
                   </div>
                <h3 class="listing-title">
                   <a href="coach-detail.php?id=<?= $coach['id'] ?>"><?= $coach['turf_name'] ?></a>
                </h3>
                <ul class="mb-2">
                   <li><span><i class="feather-map-pin me-2"></i><?= $coach['turf_location'] ?></span></li>
                </ul>
                <div class="listing-details-group">
                   <p><?= $coach['description'] ?></p>
                </div>
                <ul class="profile-coache-list">
                   <li>
                      <a href="userturfregistration.php?id=<?= $coach['id'] ?>" class="btn btn-secondary w-100"><i class="feather-calendar me-2"></i> Book Now</a>
                   </li>
                </ul>
             </div>
          </div>
       </div>
    </div>
    <?php endforeach; ?>
</div>


</div>
</div>
<div class="col-xl-5 map-right">
<div id="map" class="map-listing"></div>
</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>


</div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialize the map centered on Indore
        const map = L.map('map').setView([22.7196, 75.8577], 12);

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Turf areas data (modify this array to add or change locations)
        const turfAreas = [
    { name: "Indore Turf Arena", location: [22.7240, 75.8470] },
    { name: "Turf Zone", location: [22.7350, 75.8730] },
    { name: "The Turf", location: [22.7460, 75.8736] },
    { name: "Green Turf", location: [22.7213, 75.8375] },
    { name: "Madhya Pradesh Sports Academy", location: [22.7185, 75.8270] },
    { name: "Mega Turf", location: [22.7468, 75.8534] },
    { name: "Indore Sports Complex", location: [22.7255, 75.8678] },
    { name: "Eagle Turf", location: [22.7218, 75.8685] },
    { name: "Turf Factory", location: [22.7431, 75.8740] },
    { name: "Boys' Sports School", location: [22.7244, 75.8445] },
    { name: "Cricket Turf at Khajrana", location: [22.7390, 75.8450] },
    { name: "Fit Turf", location: [22.7260, 75.8610] },
    { name: "Lions Turf", location: [22.7305, 75.8700] },
    { name: "Sukhliya Turf", location: [22.7248, 75.8540] },
    { name: "Cricket Ground at Vijaynagar", location: [22.7190, 75.8710] }
];


        // Add markers for each turf area
        turfAreas.forEach(turf => {
            L.marker(turf.location)
                .addTo(map)
                .bindPopup(turf.name);
        });
    </script>
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.0.min.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>

<script src="assets/js/bootstrap.bundle.min.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>

<script src="assets/plugins/select2/js/select2.min.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>

<script src="assets/js/moment.min.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>

<!-- // <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I" type="552793404e3ec40d9c05c1f7-text/javascript"></script> -->
<!-- // <script src="assets/js/map.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script> --> 

<script src="assets/js/script.js" type="552793404e3ec40d9c05c1f7-text/javascript"></script>
<script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="552793404e3ec40d9c05c1f7-|49" defer></script></body>

<!-- Mirrored from Ground 7.dreamstechnologies.com/html/coaches-map.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:14:22 GMT -->
</html>