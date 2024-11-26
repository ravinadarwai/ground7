<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from Ground7.dreamstechnologies.com/html/setting-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:18:15 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Ground 7</title>

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

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="assets/css/feather.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global" />
        </div>
    </div>

<div class="main-wrapper">

    <?php include 'navbar.php'; ?>


<section class="breadcrumb breadcrumb-list mb-0">
<span class="primary-right-round"></span>
<div class="container">
<h1 class="text-white">Change Password</h1>
<ul>
<li><a href="index.php">Home</a></li>
<li>Change Password</li>
</ul>
</div>
</section>


<div class="dashboard-section coach-dash-section">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="dashboard-menu coaurt-menu-dash">
<ul>
<li>
<a href="coach-dashboard.php">
<img src="assets/img/icons/dashboard-icon.svg" alt="Icon">
<span>Dashboard</span>
</a>
</li>
<li>
<a href="all-court.php">
<img src="assets/img/icons/court-icon.svg" alt="Icon">
<span> Courts</span>
</a>
</li>
<li>
<a href="coach-request.php">
<img src="assets/img/icons/request-icon.svg" alt="Icon">
<span>Requests</span>
<span class="court-notify">03</span>
</a>
</li>
<li>
<a href="coach-booking.php">
<img src="assets/img/icons/booking-icon.svg" alt="Icon">
<span>Bookings</span>
</a>
</li>
<li>
<a href="coach-chat.php">
<img src="assets/img/icons/chat-icon.svg" alt="Icon">
<span>Chat</span>
</a>
</li>
<li>
<a href="coach-earning.php">
<img src="assets/img/icons/invoice-icon.svg" alt="Icon">
<span>Earnings</span>
</a>
</li>
<li>
<a href="coach-wallet.php">
<img src="assets/img/icons/wallet-icon.svg" alt="Icon">
<span>Wallet</span>
</a>
</li>
<li>
<a href="coach-profile.php" class="active">
<img src="assets/img/icons/profile-icon.svg" alt="Icon">
<span>Profile Setting</span>
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<div class="content court-bg">
<div class="container">
<div class="coach-court-list profile-court-list">
<ul class="nav">
<li><a href="coach-profile.php">Profile</a></li>
<li><a href="setting-lesson.php">Lesson</a></li>
<li><a href="setting-availability.php">Availability</a></li>
<li><a class="active" href="setting-password.php">Change Password</a></li>
<li><a href="profile-othersetting.php">Other Settings</a></li>
</ul>
</div>
<div class="row">
<div class="col-sm-12">
<div class="profile-detail-group">
<div class="card ">
<form>
<div class="row">
<div class="col-lg-7 col-md-7">
<div class="input-space">
<label class="form-label">Old Password</label>
<input type="text" class="form-control" id="password" placeholder="Enter Old Password">
</div>
</div>
<div class="col-lg-7 col-md-7">
<div class="input-space">
<label class="form-label">New Password</label>
<input type="text" class="form-control" id="new-password" placeholder="Enter New Password">
</div>
</div>
<div class="col-lg-7 col-md-7">
<div class="input-space mb-0">
<label class="form-label">Confirm Password</label>
<input type="text" class="form-control" id="confirm-password" placeholder="Enter Confirm Password">
</div>
</div>
</div>
</form>
</div>
<div class="save-changes text-end">
<a href="javascript:;" class="btn btn-primary reset-profile">Reset</a>
<a href="javascript:;" class="btn btn-secondary save-profile">Save Change</a>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include 'footer.php'; ?>

</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.0.min.js" type="2bea283cc1a5eab775188b6d-text/javascript"></script>

<script src="assets/js/bootstrap.bundle.min.js" type="2bea283cc1a5eab775188b6d-text/javascript"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="2bea283cc1a5eab775188b6d-text/javascript"></script>
<script src="assets/plugins/datatables/datatables.min.js" type="2bea283cc1a5eab775188b6d-text/javascript"></script>

<script src="assets/plugins/select2/js/select2.min.js" type="2bea283cc1a5eab775188b6d-text/javascript"></script>

<script src="assets/js/script.js" type="2bea283cc1a5eab775188b6d-text/javascript"></script>
<script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="2bea283cc1a5eab775188b6d-|49" defer></script></body>

<!-- Mirrored from Ground7.dreamstechnologies.com/html/setting-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:18:15 GMT -->
</html>