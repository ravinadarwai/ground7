<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html/booking-completed.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:18:17 GMT -->
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
<h1 class="text-white">Bookings</h1>
<ul>
<li><a href="index.php">Home</a></li>
<li>Bookings</li>
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
<a href="coach-booking.php" class="active">
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
<a href="coach-profile.php">
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
<li><a href="coach-booking.php">Upcoming</a></li>
<li><a class="active" href="booking-completed.php">Completed</a></li>
<li><a href="booking-cancelled.php">Cancelled</a></li>
</ul>
</div>
</div>
<div class="col-xl-6 col-lg-6 col-sm-12 col-12">
<div class="sortby-filter-group court-sortby">
<div class="sortbyset week-bg">
<div class="sorting-select">
<span class="select-icon"><img src="assets/img/icons/calendar-icon.svg" alt="Icon"></span>
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
<div class="col-lg-6">
<div class="court-table-head">
<h4>Bookings</h4>
<p>Effortlessly track and manage your completed bookings</p>
</div>
</div>
<div class="col-lg-6">
<div class="coach-active-blk">
<div id="tablefilter"></div>
<div class="card-header-btns">
<nav>
<div class="nav nav-tabs" role="tablist">
<button class="nav-link active" id="nav-Recent-tab" data-bs-toggle="tab" data-bs-target="#nav-Recent" type="button" role="tab" aria-controls="nav-Recent" aria-selected="true">Court</button>
<button class="nav-link" id="nav-RecentCoaching-tab" data-bs-toggle="tab" data-bs-target="#nav-RecentCoaching" type="button" role="tab" aria-controls="nav-RecentCoaching" aria-selected="false">Coaching</button>
</div>
</nav>
</div>
</div>
</div>
</div>
</div>
<div class="tab-content">
<div class="tab-pane fade show active" id="nav-Recent" role="tabpanel" aria-labelledby="nav-Recent-tab" tabindex="0">
<div class="table-responsive">
<table class="table table-borderless datatable">
<thead class="thead-light">
<tr>
<th>Court Name</th>
<th>Player Name</th>
<th>Date & Time </th>
<th>Additional Guests</th>
<th>Payment</th>
<th>Details</th>
<th>Reviews</th>
<th></th>
</tr>
</thead>
<tbody>
<tr>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-01.jpg" alt="User"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Wing Sports Academy</a>
<span>Court 1 <span class="book-on-date">Booked
on : 26
May 2023</span></span>
</span>
</h2>
</td>
<td>
<h2 class="table-avatar">
<a href="my-profile.php" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/profiles/avatar-01.jpg" alt="User"></a>
<span class="table-head-name table-name-user flex-grow-1">
<a href="my-profile.php">Johnson</a>
</span>
</h2>
</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>06:00 PM - 08:00 PM</span></h4>
</td>
<td>2</td>
<td><span class="pay-dark">$160</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#complete-court"><i class="feather-eye"></i>View Details</a></td>
<td class="table-rating">
<div class="rating-point">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-edit"></i>Edit</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash"></i>Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-02.jpg" alt="User"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Feather Badminton</a>
<span>Court 1 <span class="book-on-date">Booked
on : 26
May 2023</span></span>
</span>
</h2>
</td>
<td>
<h2 class="table-avatar">
<a href="my-profile.php" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/profiles/avatar-02.jpg" alt="User"></a>
<span class="table-head-name table-name-user flex-grow-1">
<a href="my-profile.php">Andy</a>
</span>
</h2>
</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>06:00 PM - 08:00 PM</span></h4>
</td>
<td>2</td>
<td><span class="pay-dark">$120</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#complete-court"><i class="feather-eye"></i>View Details</a></td>
<td class="table-rating">
<div class="rating-point">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-edit"></i>Edit</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash"></i>Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-03.jpg" alt="User"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Bwing Sports Academy</a>
<span>Court 1 <span class="book-on-date">Booked
on : 26
May 2023</span></span>
</span>
</h2>
</td>
<td>
<h2 class="table-avatar">
<a href="my-profile.php" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/profiles/avatar-06.jpg" alt="User"></a>
<span class="table-head-name table-name-user flex-grow-1">
<a href="my-profile.php">Pranika</a>
</span>
</h2>
</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>06:00 PM - 08:00 PM</span></h4>
</td>
<td>2</td>
<td><span class="pay-dark">130</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#complete-court"><i class="feather-eye"></i>View Details</a></td>
<td class="table-rating">
<div class="rating-point">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-edit"></i>Edit</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash"></i>Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-04.jpg" alt="User"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Marsh Academy</a>
<span>Court 1 <span class="book-on-date">Booked
on : 26
May 2023</span></span>
</span>
</h2>
</td>
<td>
<h2 class="table-avatar">
<a href="my-profile.php" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/profiles/avatar-03.jpg" alt="User"></a>
<span class="table-head-name table-name-user flex-grow-1">
<a href="my-profile.php">Ariyan</a>
</span>
</h2>
</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>06:00 PM - 08:00 PM</span></h4>
</td>
<td>2</td>
<td><span class="pay-dark">$130</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#complete-court"><i class="feather-eye"></i>View Details</a></td>
<td class="table-rating">
<div class="rating-point">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-edit"></i>Edit</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash"></i>Delete</a>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="tab-pane fade" id="nav-RecentCoaching" role="tabpanel" aria-labelledby="nav-RecentCoaching-tab" tabindex="0">
<div class="table-responsive">
<table class="table table-borderless datatable">
<thead class="thead-light">
<tr>
<th>Court Name</th>
<th>Player Name</th>
<th>Date & Time </th>
<th>Additional Guests</th>
<th>Payment</th>
<th>Details</th>
<th>Reviews</th>
<th></th>
</tr>
</thead>
<tbody>
<tr>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-01.jpg" alt="User"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Wing Sports Academy</a>
<span>Court 1 <span class="book-on-date">Booked
on : 26 May 2023</span></span>
</span>
</h2>
</td>
<td>
<h2 class="table-avatar">
<a href="my-profile.php" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/profiles/avatar-01.jpg" alt="User"></a>
<span class="table-head-name table-name-user flex-grow-1">
<a href="my-profile.php">Johnson</a>
</span>
</h2>
</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>06:00 PM - 08:00 PM</span></h4>
</td>
<td>1</td>
<td><span class="pay-dark">$140</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#complete-coach"><i class="feather-eye"></i>View Details</a></td>
<td class="table-rating">
<div class="rating-point">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-edit"></i>Edit</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash"></i>Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-02.jpg" alt="User"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Feather Badminton</a>
<span>Court 1 <span class="book-on-date">Booked
on : 26 May 2023</span></span>
</span>
</h2>
</td>
<td>
<h2 class="table-avatar">
<a href="my-profile.php" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/profiles/avatar-02.jpg" alt="User"></a>
<span class="table-head-name table-name-user flex-grow-1">
<a href="my-profile.php">Andy</a>
</span>
</h2>
</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>06:00 PM - 08:00 PM</span></h4>
</td>
<td>3</td>
<td><span class="pay-dark">$130</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#complete-coach"><i class="feather-eye"></i>View Details</a></td>
<td class="table-rating">
<div class="rating-point">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-edit"></i>Edit</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash"></i>Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-03.jpg" alt="User"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Bwing Sports Academy</a>
<span>Court 1 <span class="book-on-date">Booked
on : 26 May 2023</span></span>
</span>
</h2>
</td>
<td>
<h2 class="table-avatar">
<a href="my-profile.php" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/profiles/avatar-06.jpg" alt="User"></a>
<span class="table-head-name table-name-user flex-grow-1">
<a href="my-profile.php">Pranika</a>
</span>
</h2>
</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>06:00 PM - 08:00 PM</span></h4>
</td>
<td>4</td>
<td><span class="pay-dark">$140</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#complete-coach"><i class="feather-eye"></i>View Details</a></td>
<td class="table-rating">
<div class="rating-point">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-edit"></i>Edit</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash"></i>Delete</a>
</div>
</div>
</td>
</tr>
<tr>
<td>
<h2 class="table-avatar">
<a href="#" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-04.jpg" alt="User"></a>
<span class="table-head-name flex-grow-1">
<a href="#">Marsh Academy</a>
<span>Court 1 <span class="book-on-date">Booked
on : 26 May 2023</span></span>
</span>
</h2>
</td>
<td>
<h2 class="table-avatar">
<a href="my-profile.php" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/profiles/avatar-03.jpg" alt="User"></a>
<span class="table-head-name table-name-user flex-grow-1">
<a href="my-profile.php">Ariyan</a>
</span>
</h2>
</td>
<td class="table-date-time">
<h4>Mon, Jul 11<span>06:00 PM - 08:00 PM</span></h4>
</td>
<td>1</td>
<td><span class="pay-dark">$150</span></td>
<td class="text-pink view-detail-pink"><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#complete-coach"><i class="feather-eye"></i>View Details</a></td>
<td class="table-rating">
<div class="rating-point">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
</div>
</td>
<td class="text-end">
<div class="dropdown dropdown-action table-drop-action">
<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-edit"></i>Edit</a>
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


<div class="modal custom-modal fade request-modal" id="complete-coach" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-md">
<div class="modal-content">
<div class="modal-header">
<div class="form-header modal-header-title">
<h4 class="mb-0">Coach Booking Details<span class="badge bg-success ms-2">Complete</span>
</h4>
</div>
<a class="close" data-bs-dismiss="modal" aria-label="Close">
<span class="align-center" aria-hidden="true"><i class="feather-x"></i></span>
</a>
</div>
<div class="modal-body">

<div class="row">
<div class="col-lg-12">
<div class="card dashboard-card court-information">
<div class="card-header">
<h4>Player Information</h4>
</div>
<div class="appointment-info">
<ul class="appointmentset">
<li>
<div class="appointment-item">
<div class="appointment-img">
<img src="assets/img/profiles/avatar-06.jpg" alt="User">
</div>
<div class="appointment-content">
<h6>Martina</h6>
<p>Since 05/05/2023</p>
</div>
</div>
</li>
<li>
<h6>Previosly Booked <i class="feather-alert-circle ms-1"></i></h6>
<p>22 Jan 2023</p>
</li>
<li>
<h6>No of Bookings</h6>
<p>2</p>
</li>
</ul>
</div>
</div>
<div class="card dashboard-card court-information">
<div class="card-header">
<h4>Coach Information</h4>
</div>
<div class="appointment-info">
<ul class="appointmentset">
<li>
<div class="appointment-item">
<div class="appointment-img">
<img src="assets/img/featured/featured-06.jpg" alt="Feature">
</div>
<div class="appointment-content">
<h6>Angela Roudrigez</h6>
<div class="table-rating">
<div class="rating-point">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<span>30 Reviews</span>
</div>
</div>
</div>
</div>
</li>
<li>
<h6>Location</h6>
<p>Santa Monica, CA</p>
</li>
<li>
<h6>Price Per Hour</h6>
<p><span class="color-green">$200.00</span> / hr</p>
</li>
<li>
<h6>Rank</h6>
<p>Expert</p>
</li>
</ul>
</div>
</div>
<div class="card dashboard-card court-information">
<div class="card-header">
<h4>Appointment Information</h4>
</div>
<div class="appointment-info appoin-border">
<ul class="appointmentset">
<li>
<h6>Booked On</h6>
<p>Mon, Jul 14</p>
</li>
<li>
<h6>Booking Type</h6>
<p>Onetime</p>
</li>
<li>
<h6>Date & Time</h6>
<p>Mon, Jul 14
<span>05:00 PM - 08:00 PM</span>
</p>
</li>
<li>
<h6>Total Number of Hours</h6>
<p>2</p>
</li>
</ul>
</div>
</div>
<div class="card dashboard-card court-information">
<div class="card-header">
<h4>Booking Days</h4>
</div>
<div class="booking-days">
<ul>
<li class="active">
<img src="assets/img/icons/reset.svg" class="me-2" alt="Icon">
<i class="feather-check-circle me-2"></i>
14 May 2023 - 7:00 PM
<i class="fa fa-check-circle ms-2"></i>
</li>
<li class="active">
<img src="assets/img/icons/reset.svg" class="me-2" alt="Icon">
<i class="feather-check-circle me-2"></i>
15 May 2023 - 7:00 PM
<i class="fa fa-check-circle ms-2"></i>
</li>
</ul>
</div>
</div>
<div class="card dashboard-card court-information">
<div class="card-header">
<h4>Payment Details</h4>
</div>
<div class="appointment-info appoin-border double-row">
<ul class="appointmentset">
<li>
<h6>Coaching Booking Amount</h6>
<p>$200</p>
</li>
<li>
<h6>Number of Hours</h6>
<p>2</p>
</li>
<li>
<h6>Service Charge</h6>
<p>$20</p>
</li>
</ul>
</div>
<div class="appointment-info appoin-border ">
<ul class="appointmentset">
<li>
<h6>Total Amount Paid</h6>
<p class="color-green">$180</p>
</li>
<li>
<h6>Paid On</h6>
<p>Mon, Jul 14</p>
</li>
<li>
<h6>Transaction ID</h6>
<p>#5464164445676781641</p>
</li>
<li>
<h6>Payment type</h6>
<p>Wallet</p>
</li>
</ul>
</div>
</div>
<div class="card dashboard-card court-information">
<div class="card-header">
<h4>Review Details</h4>
</div>
<div class="user-review-details">
<div class="user-review-img">
<img src="assets/img/profiles/avatar-02.jpg" alt="User">
</div>
<div class="user-review-content">
<div class="table-rating">
<div class="rating-point">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<span>5.0</span>
</div>
</div>
<span><i class="fa fa-check me-2" aria-hidden="true"></i>Yes, I would book
again.</span>
<h6>Absolutely perfect</h6>
<p>If you are looking for a perfect place for friendly matches with your
friends or a competitive match, It is the best place.</p>
<h5>Sent on 11/03/2023</h5>
</div>
</div>
</div>
</div>
</div>

</div>
<div class="modal-footer">
<div class="table-accept-btn">
<a href="javascript:;" data-bs-dismiss="modal" class="btn cancel-table-btn">Cancel</a>
</div>
</div>
</div>
</div>
</div>


<div class="modal custom-modal fade request-modal" id="complete-court" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-md">
<div class="modal-content">
<div class="modal-header">
<div class="form-header modal-header-title">
<h4 class="mb-0">Court Booking Details<span class="badge bg-success ms-2">Completed</span>
</h4>
</div>
<a class="close" data-bs-dismiss="modal" aria-label="Close">
<span class="align-center" aria-hidden="true"><i class="feather-x"></i></span>
</a>
</div>
<div class="modal-body">

<div class="row">
<div class="col-lg-12">
<div class="card dashboard-card court-information">
<div class="card-header">
<h4>Court Information</h4>
</div>
<div class="appointment-info">
<ul class="appointmentset">
<li>
<div class="appointment-item">
<div class="appointment-img">
<img src="assets/img/booking/booking-03.jpg" alt="User">
</div>
<div class="appointment-content">
<h6>Wing Sports Academy</h6>
<p class="color-green">Court 1</p>
</div>
</div>
</li>
<li>
<h6>Booked On</h6>
<p>$150 Upto 2 guests</p>
</li>
<li>
<h6>Price Per Guest</h6>
<p>$15</p>
</li>
<li>
<h6>Maximum Number of Guests</h6>
<p>2</p>
</li>
</ul>
</div>
</div>
<div class="card dashboard-card court-information">
<div class="card-header">
<h4>Player Information</h4>
</div>
<div class="appointment-info">
<ul class="appointmentset">
<li>
<div class="appointment-item">
<div class="appointment-img">
<img src="assets/img/profiles/avatar-06.jpg" alt="User">
</div>
<div class="appointment-content">
<h6>Martina</h6>
<p>Court 1</p>
</div>
</div>
</li>
<li>
<h6>Previosly Booked <i class="feather-alert-circle ms-1"></i></h6>
<p>22 Jan 2023</p>
</li>
<li>
<h6>No of Bookings</h6>
<p>2</p>
</li>
</ul>
</div>
</div>
<div class="card dashboard-card court-information">
<div class="card-header">
<h4>Appointment Information</h4>
</div>
<div class="appointment-info appoin-border">
<ul class="appointmentset">
<li>
<h6>Booked On</h6>
<p>Mon, Jul 14</p>
</li>
<li>
<h6>Date & Time</h6>
<p>Mon, Jul 14<span class="d-block">05:00 PM - 08:00 PM</span></p>
</li>
<li>
<h6>Total Number of Hours</h6>
<p>2</p>
</li>
</ul>
</div>
</div>
<div class="card dashboard-card court-information">
<div class="card-header">
<h4>Payment Details</h4>
</div>
<div class="appointment-info appoin-border double-row">
<ul class="appointmentset">
<li>
<h6>Court Booking Amount</h6>
<p>$150</p>
</li>
<li>
<h6>Additional Guests</h6>
<p>2</p>
</li>
<li>
<h6>Amount Additional Guests</h6>
<p>$30</p>
</li>
<li>
<h6>Service Charge</h6>
<p>$20</p>
</li>
</ul>
</div>
<div class="appointment-info appoin-border ">
<ul class="appointmentsetview">
<li>
<h6>Total Amount Paid</h6>
<p class="color-green">$180</p>
</li>
<li>
<h6>Paid On</h6>
<p>Mon, Jul 14</p>
</li>
<li>
<h6>Transaction ID</h6>
<p>#5464164445676781641</p>
</li>
<li>
<h6>Payment type</h6>
<p>Wallet</p>
</li>
</ul>
</div>
</div>
<div class="card dashboard-card court-information">
<div class="card-header">
<h4>Review Details</h4>
</div>
<div class="user-review-details">
<div class="user-review-img">
<img src="assets/img/profiles/avatar-01.jpg" alt="User">
</div>
<div class="user-review-content">
<div class="table-rating">
<div class="rating-point">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<span>5.0</span>
</div>
</div>
<span><i class="fa fa-check me-2" aria-hidden="true"></i>Yes, I would book
again.</span>
<h6>Absolutely perfect</h6>
<p>If you are looking for a perfect place for friendly matches with your
friends or a competitive match, It is the best place.</p>
<h5>Sent on 11/03/2023</h5>
</div>
</div>
</div>
</div>
</div>

</div>
<div class="modal-footer">
<div class="table-accept-btn">
<a href="javascript:;" data-bs-dismiss="modal" class="btn cancel-table-btn">Cancel</a>
</div>
</div>
</div>
</div>
</div>

</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.0.min.js" type="c985550e1c7de2f3c09053b8-text/javascript"></script>

<script src="assets/js/bootstrap.bundle.min.js" type="c985550e1c7de2f3c09053b8-text/javascript"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="c985550e1c7de2f3c09053b8-text/javascript"></script>
<script src="assets/plugins/datatables/datatables.min.js" type="c985550e1c7de2f3c09053b8-text/javascript"></script>

<script src="assets/plugins/select2/js/select2.min.js" type="c985550e1c7de2f3c09053b8-text/javascript"></script>

<script src="assets/js/script.js" type="c985550e1c7de2f3c09053b8-text/javascript"></script>
<script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="c985550e1c7de2f3c09053b8-|49" defer></script></body>

<!-- Mirrored from html/booking-completed.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:18:17 GMT -->
</html>