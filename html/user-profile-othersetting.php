<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from Ground7.dreamstechnologies.com/html/user-profile-othersetting.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:17:04 GMT -->
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
<h1 class="text-white">User Profile</h1>
</div>
</section>


<div class="dashboard-section">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="dashboard-menu">
<ul> 
<li>
<a href="user-bookings.php">
<img src="assets/img/icons/booking-icon.svg" alt="Icon">
<span>My Bookings</span>
</a>
</li> 
<li>
<a href="user-invoice.php">
<img src="assets/img/icons/invoice-icon.svg" alt="Icon">
<span>Invoices</span>
</a>
</li> 
<li>
<a href="user-profile.php" class="active">
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
<li><a href="user-profile.php">Profile</a></li>
<li><a href="user-setting-password.php">Change Password</a></li>
<li><a class="active" href="user-profile-othersetting.php">Other Settings</a></li>
</ul>
</div>
<div class="row">
<div class="col-sm-12">
<div class="profile-detail-group">
<div class="card ">
<form>
<div class="row">
<div class="col-lg-12">
<div class="appoint-head">
<h4>Change Email</h4>
</div>
<div class="input-space other-setting-form">
<label class="form-label"> Enter New Email Address</label>
<input type="email" class="form-control" placeholder="Enter New Email Address">
</div>
</div>
<div class="col-lg-12">
<div class="appoint-head">
<h4>Change Phone Number</h4>
</div>
<div class="input-space other-setting-form">
<label class="form-label">New Phone Number</label>
<input type="email" class="form-control" placeholder="Enter New  Phone Number">
</div>
</div>
<div class="col-lg-12">
<div class="deactivate-account-blk">
<div class="deactivate-detail">
<h4>Deactivate Account</h4>
<p>Click delete button to deactivate the account</p>
</div>
<a href="javascript:void(0)" class="btn deactive-btn" data-bs-toggle="modal" data-bs-target="#deactive"><i class="feather-zap-off"></i>Deactive Account</a>
</div>
</div>
</div>
</form>
</div>
<div class="save-changes text-end">
<a href="javascript:;" class="btn btn-primary reset-profile">Reset</a>
<a href="javascript:;" class="btn btn-secondary save-profile" data-bs-toggle="modal" data-bs-target="#success-mail">Save Change</a>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include 'footer.php'; ?>


<div class="modal custom-modal fade deactive-modal" id="deactive" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-md">
<div class="modal-content">
<div class="modal-header">
<a class="close" data-bs-dismiss="modal" aria-label="Close">
<span class="align-center" aria-hidden="true"><i class="feather-x"></i></span>
</a>
</div>
<div class="modal-body">

<div class="account-deactive">
<img src="assets/img/icons/deactive-profile.svg" alt="Icon">
<h3>Are You Sure You Want to Deactive Account</h3>
<p>If yes please click “Yes” button</p>
<div class="convenient-btns">
<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary d-inline-flex align-items-center">
Yes <span><i class="feather-arrow-right-circle ms-2"></i></span>
</a>
<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-secondary d-inline-flex align-items-center">
No <span><i class="feather-arrow-right-circle ms-2"></i></span>
</a>
</div>
</div>

</div>
</div>
</div>
</div>


<div class="modal custom-modal fade deactive-modal" id="success-mail" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-md">
<div class="modal-content">
<div class="modal-header">
<a class="close" data-bs-dismiss="modal" aria-label="Close">
<span class="align-center" aria-hidden="true"><i class="feather-x"></i></span>
</a>
</div>
<div class="modal-body">

<div class="account-deactive">
<img src="assets/img/icons/email-success.svg" alt="Icon">
<h3>Email Changed Successfully</h3>
<p>Check your email on the confirmation</p>
<div class="convenient-btns">
<a href="javascript:void(0);" class="btn btn-primary d-inline-flex align-items-center me-0">
<span><i class="feather-arrow-left-circle me-2"></i></span>Back to Dashboard
</a>
</div>
</div>

</div>
</div>
</div>
</div>

</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.0.min.js" type="afbdf2c258e50ae9b314bec5-text/javascript"></script>

<script src="assets/js/bootstrap.bundle.min.js" type="afbdf2c258e50ae9b314bec5-text/javascript"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="afbdf2c258e50ae9b314bec5-text/javascript"></script>
<script src="assets/plugins/datatables/datatables.min.js" type="afbdf2c258e50ae9b314bec5-text/javascript"></script>

<script src="assets/plugins/select2/js/select2.min.js" type="afbdf2c258e50ae9b314bec5-text/javascript"></script>

<script src="assets/js/script.js" type="afbdf2c258e50ae9b314bec5-text/javascript"></script>
<script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="afbdf2c258e50ae9b314bec5-|49" defer></script></body>

<!-- Mirrored from Ground7.dreamstechnologies.com/html/user-profile-othersetting.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:17:05 GMT -->
</html>