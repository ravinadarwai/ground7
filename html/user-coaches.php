<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from Ground7.dreamstechnologies.com/html/user-coaches.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:18:16 GMT -->
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
<h1 class="text-white">Invoice</h1>
<ul>
<li><a href="index.php">Home</a></li>
<li>Invoice</li>
</ul>
</div>
</section>


<div class="dashboard-section">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="dashboard-menu">
<ul>
<li>
<a href="user-dashboard.php">
<img src="assets/img/icons/dashboard-icon.svg" alt="Icon">
<span>Dashboard</span>
</a>
</li>
<li>
<a href="user-bookings.php">
<img src="assets/img/icons/booking-icon.svg" alt="Icon">
<span>My Bookings</span>
</a>
</li>
<li>
<a href="user-chat.php">
<img src="assets/img/icons/chat-icon.svg" alt="Icon">
<span>Chat</span>
</a>
</li>
<li>
<a href="user-invoice.php" class="active">
<img src="assets/img/icons/invoice-icon.svg" alt="Icon">
<span>Invoices</span>
</a>
</li>
<li>
<a href="user-wallet.php">
<img src="assets/img/icons/wallet-icon.svg" alt="Icon">
<span>Wallet</span>
</a>
</li>
<li>
<a href="user-profile.php">
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

<div class="row">
<div class="col-lg-12">
<div class="sortby-section court-sortby-section">
<div class="sorting-info">
<div class="row d-flex align-items-center">
<div class="col-xl-6 col-lg-6 col-sm-12 col-12">
<div class="coach-court-list">
<ul class="nav">
<li><a href="user-invoice.php">Courts</a></li>
<li><a class="active" href="user-coaches.php">Coaches</a></li>
</ul>
</div>
</div>
<div class="col-xl-6 col-lg-6 col-sm-12 col-12">
<div class="sortby-filter-group court-sortby">
<div class="sortbyset week-bg">
<div class="sorting-select">
<select class="form-control select">
<option>This Week</option>
<option>One Day</option>
</select>
</div>
</div>
<div class="sortbyset">
<span class="sortbytitle">Sort By</span>
<div class="sorting-select">
<select class="form-control select">
<option>Relevance</option>
<option>Price</option>
</select>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="court-tab-content">
<div class="card card-tableset">
<div class="card-body">
<div class="coache-head-blk">
<div class="row align-items-center">
<div class="col-md-5">
<div class="court-table-head">
<h4>Invoices</h4>
<p>Easy Access to Your Billing History</p>
</div>
</div>
<div class="col-md-7">
<div class="table-search-top invoice-search-top">
<div id="tablefilter"></div>
<div class="request-coach-list select-filter">
<div class="sortby-filter-group court-sortby">
<div class="sortbyset m-0">
<div class="sorting-select">
<select class="form-control select">
<option>All Invoices</option>
<option>Completed</option>
<option>Inprogress</option>
</select>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="table-responsive table-datatble">
<table class="table datatable">
<thead class="thead-light">
<tr>
<th>ID</th>
<th>Coach Name</th>
<th>Invoice</th>
<th>Date & Time </th>
<th>Payment</th>
<th>Paid On</th>
<th>Status</th>
<th>Download</th>
<th></th>
</tr>
</thead>
<tbody>
<tr>
<td><a href="invoice.php" class="text-primary">#CO14</a></td>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm flex-shrink-0"><img class="avatar-img" src="assets/img/featured/featured-05.jpg" alt="User Image"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Kevin Anderson</a>
<span class="book-active">Booked on : 25 May 2023</span>
</span>
</h2>
</td>
<td>Onetime</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>04:00 PM - 06:00 PM</span></h4>
</td>
<td><span class="pay-dark fs-16">$150</span></td>
<td>Mon, Jul 12</td>
<td><span class="badge bg-success"><i class="feather-check-square me-1"></i>Paid</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;"><i class="feather-download"></i>Download</a></td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash"></i>Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td><a href="invoice.php" class="text-primary">#CO15</a></td>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm flex-shrink-0"><img class="avatar-img" src="assets/img/featured/featured-06.jpg" alt="User Image"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Angela Roudrigez</a>
<span class="book-active">Booked on : 26 May 2023</span>
</span>
</h2>
</td>
<td>Single Lesson</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>01:00 PM - 04:00 PM</span></h4>
</td>
<td><span class="pay-dark fs-16">$200</span></td>
<td>Mon, Jul 12</td>
<td><span class="badge bg-info"><i class="feather-clock me-1"></i>Pending</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;"><i class="feather-download"></i>Download</a></td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash"></i>Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td><a href="invoice.php" class="text-primary">#CO16</a></td>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm flex-shrink-0"><img class="avatar-img" src="assets/img/featured/featured-07.jpg" alt="User"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Evon Raddick</a>
<span class="book-active">Booked on : 27 May 2023</span>
</span>
</h2>
</td>
<td>Onetime</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>05:00 PM - 08:00 PM</span></h4>
</td>
<td><span class="pay-dark fs-16">$150</span></td>
<td>Mon, Jul 12</td>
<td><span class="badge bg-danger"><i class="feather-clock me-1"></i>Failed</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;"><i class="feather-download"></i>Download</a></td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash"></i>Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td><a href="invoice.php" class="text-primary">#CO17</a></td>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm flex-shrink-0"><img class="avatar-img" src="assets/img/featured/featured-08.jpg" alt="User"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Harry Richardson</a>
<span class="book-active">Booked on : 28 May 2023</span>
</span>
</h2>
</td>
<td>Onetime</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>01:00 PM - 04:00 PM</span></h4>
</td>
<td><span class="pay-dark fs-16">$90</span></td>
<td>Mon, Jul 20</td>
<td><span class="badge bg-success"><i class="feather-check-square me-1"></i>Paid</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;"><i class="feather-download"></i>Download</a></td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash"></i>Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td><a href="invoice.php" class="text-primary">#CO18</a></td>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm flex-shrink-0"><img class="avatar-img" src="assets/img/featured/featured-09.jpg" alt="User"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Pete Hill</a>
<span class="book-active">Booked on : 29 May 2023</span>
</span>
</h2>
</td>
<td>Onetime</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>03:00 PM - 08:00 PM</span></h4>
</td>
<td><span class="pay-dark fs-16">$180</span></td>
<td>Mon, Jul 12</td>
<td><span class="badge bg-success"><i class="feather-check-square me-1"></i>Paid</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;"><i class="feather-download"></i>Download</a></td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash"></i>Delete</a>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="tab-footer">
<div class="row">
<div class="col-md-6">
<div id="tablelength"></div>
</div>
<div class="col-md-6">
<div id="tablepage"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include 'footer.php'; ?>

</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.0.min.js" type="bef2eab87675be2cf3892d50-text/javascript"></script>

<script src="assets/js/bootstrap.bundle.min.js" type="bef2eab87675be2cf3892d50-text/javascript"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="bef2eab87675be2cf3892d50-text/javascript"></script>
<script src="assets/plugins/datatables/datatables.min.js" type="bef2eab87675be2cf3892d50-text/javascript"></script>

<script src="assets/plugins/select2/js/select2.min.js" type="bef2eab87675be2cf3892d50-text/javascript"></script>

<script src="assets/js/script.js" type="bef2eab87675be2cf3892d50-text/javascript"></script>
<script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="bef2eab87675be2cf3892d50-|49" defer></script></body>

<!-- Mirrored from Ground7.dreamstechnologies.com/html/user-coaches.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:18:16 GMT -->
</html>