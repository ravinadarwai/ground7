<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html/appointment-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:18:15 GMT -->
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
<h1 class="text-white">Profile Setting</h1>
<ul>
<li><a href="index.php">Home</a></li>
<li>Profile Setting</li>
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
<li><a class="active" href="coach-profile.php">Profile</a></li>
<li><a href="setting-lesson.php">Lesson</a></li>
<li><a href="setting-availability.php">Availability</a></li>
<li><a href="setting-password.php">Change Password</a></li>
<li><a href="profile-othersetting.php">Other Settings</a></li>
</ul>
</div>
<div class="row">
<div class="col-sm-12">
<div class="profile-detail-blk">
<ul>
<li><a href="coach-profile.php">Profile Details </a></li>
<li class="active"><a href="appointment-details.php">Appointment Details</a></li>
</ul>
</div>
<div class="profile-detail-group">
<div class="card ">
<form>
<div class="row">
<div class="appoint-head">
<h4>Amount</h4>
</div>
<div class="col-lg-6 col-md-6">
<div class="input-space link-apoint">
<label class="form-label">Select Currency type</label>
<select class="select">
<option>USD</option>
<option>Euro</option>
</select>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="input-space link-apoint">
<label class="form-label">For Onetime Appointment (USD)</label>
<input type="text" class="form-control" id="email" placeholder="Enter Amount">
</div>
</div>
<div class="col-md-12">
<div class="appoint-head coach-top">
<h4>Your Coaching Images</h4>
</div>
<div class="file-upload-text appointment-upload">
<div class="file-upload">
<img src="assets/img/icons/upload-icon.svg" class="img-fluid" alt="Upload">
<p>Upload Coaching Gallery </p>
<input type="file" id="file-input">
</div>
<div class="upload-show-img">
<div class="upload-images">
<img src="assets/img/booking/booking-01.jpg" alt="Uploader">
<a href="javascript:void(0);" class="btn btn-icon logo-hide-btn btn-sm"><i class="far fa-trash-alt"></i></a>
</div>
<div class="upload-images">
<img src="assets/img/booking/booking-02.jpg" alt="Uploader">
<a href="javascript:void(0);" class="btn btn-icon logo-hide-btn btn-sm"><i class="far fa-trash-alt"></i></a>
</div>
<div class="upload-images">
<img src="assets/img/booking/booking-03.jpg" alt="Uploader">
<a href="javascript:void(0);" class="btn btn-icon logo-hide-btn btn-sm"><i class="far fa-trash-alt"></i></a>
</div>
</div>
<h5>Image Should be minimum 152 * 152 Supported File format JPG,PNG,SVG</h5>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="appoint-head">
<h4>Video</h4>
</div>
<div class="input-space link-apoint">
<label class="form-label"> Link</label>
<div class="input-box">
<input type="text" class="form-control" id="name" placeholder="Enter Video Link">
<p>Video Supported File format MP4 Format</p>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="appoint-head">
<h4>Short Bio</h4>
</div>
<div class="info-about">
<label class="form-label">Enter Bio</label>
<textarea class="form-control" rows="3" placeholder="Enter Bio"></textarea>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="appoint-head">
<h4>Lesson With Me</h4>
</div>
<div class="info-about">
<label class="form-label">Enter Content</label>
<textarea class="form-control" rows="3" placeholder="Enter Content"></textarea>
<div class="check-single-lesson">
<div class="similar-player">
<div class="form-check d-flex align-items-center policy">
<div class="d-inline-block">
<input class="form-check-input" type="checkbox" value>
</div>
<label class="form-check-label">Single Lesson</label>
</div>
<ul>
<li>3 Days * 1 hour @ <span>$150.00</span></li>
</ul>
</div>
<div class="similar-player">
<div class="form-check d-flex align-items-center policy">
<div class="d-inline-block">
<input class="form-check-input" type="checkbox" value>
</div>
<label class="form-check-label">2 Player Lesson</label>
</div>
<ul>
<li>3 Days * 1 hour @ <span>$150.00</span></li>
<li> *4 players of similar age and ability</li>
</ul>
</div>
<div class="similar-player">
<div class="form-check d-flex align-items-center policy">
<div class="d-inline-block">
<input class="form-check-input" type="checkbox" value>
</div>
<label class="form-check-label">Small Group Lesson</label>
</div>
<ul>
<li>2 Days * 1 hour @ <span>$200.00</span></li>
<li> *4 players of similar age and ability</li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="appoint-head">
<h4>Coaching</h4>
</div>
<div class="info-about p-0 m-0 border-bottom-0">
<label class="form-label">Enter Bio</label>
<textarea class="form-control" rows="3" placeholder="Enter Bio"></textarea>
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


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.0.min.js" type="a5247537abfc4c55adba5b3c-text/javascript"></script>

<script src="assets/js/bootstrap.bundle.min.js" type="a5247537abfc4c55adba5b3c-text/javascript"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="a5247537abfc4c55adba5b3c-text/javascript"></script>
<script src="assets/plugins/datatables/datatables.min.js" type="a5247537abfc4c55adba5b3c-text/javascript"></script>

<script src="assets/plugins/select2/js/select2.min.js" type="a5247537abfc4c55adba5b3c-text/javascript"></script>

<script src="assets/js/script.js" type="a5247537abfc4c55adba5b3c-text/javascript"></script>
<script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="a5247537abfc4c55adba5b3c-|49" defer></script></body>

<!-- Mirrored from html/appointment-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:18:15 GMT -->
</html>