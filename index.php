<?php
session_start();
include('config.php'); // Ensure this contains your PDO connection setup


?>




<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:12:30 GMT -->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
  <title>Ground 7</title>

  <meta name="twitter:description"
    content="Elevate your turf locations business with Ground7. Empower Turfs & players, optimize court performance and unlock industry-leading success for your brand." />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description"
    content="Elevate your turf business with Ground7. Empower Turfs & players, optimize court performance and unlock industry-leading success for your brand." />
  <meta name="keywords"
    content="cricket, football, basketball, event, players, training, courts, tournament, athletes, courts rent, lessons, court booking, stores, sports faqs, leagues, chat." />
  <meta name="author" content="G7 - Ground7" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@dreamguystech" />
  <meta name="twitter:title" content="Ground7 -  Booking Turfs, Venue for tournaments, Court Rental template" />
  <meta name="twitter:image" content="assets/img/meta-image.jpg" />
  <meta name="twitter:image:alt" content="Ground7" />
  <meta property="og:url" content="https://Ground7.dreamguystech.com/" />
  <meta property="og:title" content="Ground7 -  Booking Turfs, Venue for tournaments, Court Rental" />
  <meta property="og:description"
    content="Elevate your turf business with Dream Sports template. Empower Turfs & players, optimize court performance and unlock industry-leading success for your brand." />
  <meta property="og:image" content="../assets/img/meta-image.jpg" />
  <meta property="og:image:secure_url" content="assets/img/meta-image.jpg" />
  <meta property="og:image:type" content="image/png" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="600" />
  <link rel="shortcut icon" type="image/x-icon" href="html/assets/img/favicon.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="html/assets/img/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="html/assets/img/apple-touch-icon-152x152.png" />

  <link rel="stylesheet" href="html/assets/css/bootstrap.min.css" />

  <link rel="stylesheet" href="html/assets/plugins/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="html/assets/plugins/owl-carousel/owl.theme.default.min.css" />

  <link rel="stylesheet" href="html/assets/plugins/aos/aos.css" />

  <link rel="stylesheet" href="html/assets/plugins/fontawesome/css/fontawesome.min.css" />
  <link rel="stylesheet" href="html/assets/plugins/fontawesome/css/all.min.css" />

  <link rel="stylesheet" href="html/assets/plugins/select2/css/select2.min.css" />

  <link rel="stylesheet" href="html/assets/css/feather.css" />

  <link rel="stylesheet" href="html/assets/css/style.css" />
  <style>
    .ball {
      width: 60px;
      height: 40px;
      position: absolute;
      top: 0%;
      left: 10%;
      margin-left: -20px;
      border-radius: 50%;
      animation: ball-fall 1.11s ease-in infinite alternate, ball-right 5s linear infinite, ball-spin 1s linear infinite;
      /* Spin animation */
      ;
    }

    @keyframes ball-fall {
      0% {
        top: 0%
      }

      100% {
        top: 93%;
      }
    }

    @keyframes ball-right {
      0% {
        left: 0%;
      }

      100% {
        left: 100%;
      }
    }

    @keyframes ball-spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
        /* Full rotation */
      }
    }

    .listing-item .listing-img img {
      height: 30dvh;
      object-fit: cover;
    }

    .listing-details-group p {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      /* Limit to two lines */
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .listing-details-group li span {
      display: inline-block;
      /* Make sure the span behaves like a block */
      max-height: 3.6em;
      /* Assuming line-height of 1.8em for two lines */
      overflow: hidden;
      white-space: nowrap;
      /* Prevent wrapping */
      text-overflow: ellipsis;
      /* Show ellipsis for overflow */
      vertical-align: top;
      line-height: 1.8em;
      /* Adjust based on your design */
    }

    .service-grid .service-img img {
      height: 40dvh;
      object-fit: cover;
      width: 100dvw;
    }

    .spin {
      animation: ball-spin 1s linear infinite;
    }

    .hidden {
      display: none;
    }

    @media (max-width: 575px) {
      .hidden {
        display: block;
      }

      .hidden li {
        line-height: 20px;
        padding: 12px 15px;
        font-weight: 500;
        color: #fff;
      }

      .hidden li a {
        color: #fff;
      }
    }

    .brand-slider-group .testimonial-brand-slider.owl-carousel .owl-item img {
      max-width: 180px;
    }

    .logout {
      position: absolute;
      bottom: 0;
      width: 100%;
      text-align: left;
      background-color: #fff;
      color: #000;
    }

    .modal-backdrop {
      display: none;
    }

    .work-section .work-img .work-img-right {
      z-index: 1;
    }

    .header .navbar-header .navbar-brand {
      display: flex;
      justify-content: flex-end;
    }

    .header .main-menu-wrapper .menu-header .menu-logo img {
      width: 100px;
    }

    @media (max-width: 991.98px) {
      .private-venue .convenient-btns.become-owner a:first-child {
        margin-bottom: 0px;
        margin-right: 0px;
      }
    }
  </style>
</head>

<body>
  <div id="global-loader">
    <div class="loader-img">
      <img src="html/assets/img/ball-loader.png" class="img-fluid" alt="Global" />
    </div>
  </div>

  <div class="main-wrapper">
    <header class="header header-trans">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg header-nav">
          <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
              <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </a>
            <a href="#" class="navbar-brand logo">
              <img src="html/assets/img/Group-white (1).svg" class="img-fluid logo-size" alt="Logo" />
            </a>
          </div>
          <div class="main-menu-wrapper">
            <div class="menu-header">
              <a href="#" class="menu-logo">
                <img src="html/assets/img/Group 100.svg" class="img-fluid logo-size" alt="Logo" />
              </a>
              <a id="menu_close" class="menu-close" href="javascript:void(0);">
                <i class="fas fa-times"></i></a>
            </div>
            <ul class="main-nav">



              <li class="">
                <a href="html/play.php">Play</a>
              </li>
              <li>
                <a href="html/book.php">Book</a>
              </li>
              <li>
                <a href="./html/comming-soon.php">ChatBox</a>
              </li>



              <?php if (isset($_SESSION['username'])): ?>
                <ul class="hidden logout">
                  <a href="html/logout.php">
                    <li class="" style="color:#000;">Logout</li>
                  </a>
                </ul>
              <?php else: ?>
                <ul class="hidden login"
                  style="position: fixed; bottom: 0; left: 0; width: 100%; text-align: center; margin: 10px;">
                  <a href="html/login_page.php">
                    <li class="btn btn-secondary"
                      style="color:#fff; border-radius: 5px; padding: 10px 20px; width: 150px;">Login</li>
                  </a>
                </ul>
              <?php endif; ?>


            </ul>
          </div>
          <!-- rightside-profile -->

          <ul class="nav header-navbar-rht logged-in">
  <li class="nav-item">
    <a class="nav-link btn btn-secondary" href="html/book.php">
      <span><i class="feather-check-circle"></i></span> Book Your Turf
    </a>
  </li>

  <li class="nav-item dropdown has-arrow logged-item block">
    <?php if (isset($_SESSION['username'])): // Check if the user is logged in ?>
      <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
        <span class="user-img">
          <!-- Display user image or a default image if none is provided -->
          <img class="rounded-circle"
            src="<?php echo isset($_SESSION['profile_image']) ? $_SESSION['profile_image'] : 'profile_image.jpg'; ?>"
            width="31" alt="User Image">
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-end">
        <div class="user-header">
          <div class="avatar avatar-sm">
            <!-- Display user image or a default image -->
            <img
              src="<?php echo isset($_SESSION['profile_image']) ? $_SESSION['profile_image'] : 'profile_image.jpg'; ?>"
              alt="User" class="avatar-img rounded-circle">
          </div>
          <div class="user-text">
            <a href="html/user-profile.php?full_name=<?php echo urlencode($_SESSION['username']); ?>">
              <?php echo htmlspecialchars($_SESSION['username']); // Display the username ?>
            </a><br>
          </div>
        </div>
        <p><a class="dropdown-item" href="html/logout.php">Logout</a></p>
      </div>
    <?php else: // If the user is not logged in, show the login button ?>
      <a class="btn btn-primary" href="html/login_page.php">Login</a>
    <?php endif; ?>
  </li>
</ul>

          <!-- rightside-profile -->
        </nav>
      </div>
    </header>

    <section class="hero-section">
      <div class="ball">
        <img src="html/assets/img/icons/foot.svg" alt="Banner" />
      </div>
      <div class="banner-shapes">
        <div class="banner-dot-one">
          <span></span>
        </div>
        <div class="banner-cock-two">
          <img src="html/assets/img/icons/cricket-bat.svg" alt="Banner" />
          <span></span>
        </div>
        <div class="banner-dot-two">
          <span></span>
        </div>
      </div>
      <div class="container">
        <div class="home-banner">
          <div class="row align-items-center w-100">
            <div class="col-lg-7 col-md-10 mx-auto">
              <div class="section-search aos" data-aos="fade-up">
                <h4>World-Class Turf for Ultimate Games with Friends!</h4>
                <h1>
                  Play More: Discover Turf Options for <span>Fun with Friends!</span>
                </h1>
                <p class="sub-info">
                  Reserve Your Spot for Friendly Matches
                </p>
                <ul class="nav header-navbar-rht" style="gap: 10px; margin-top: 1rem;">

                  <li class="nav-item">
                    <a class="nav-link btn btn-secondary" href="html/about-us.php"><span></i></span>Learn More</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="banner-imgs text-center aos" data-aos="fade-up">
                <img class="img-fluid" src="html/assets/img/bg/Group 377.png" alt="Banner" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section work-section">
      <div class="work-cock-img">
        <img class="spin" src="html/assets/img/icons/rugby.svg  " alt="Icon" />
      </div>
      <div class="work-img">
        <div class="work-img-right">
          <img src="html/assets/img/bg/cricket_3.png" alt="Icon" />
        </div>
      </div>
      <div class="container">
        <div class="section-heading aos" data-aos="fade-up">
          <h2>How It <span>Works</span></h2>
          <p class="sub-title">
            Simplifying the booking process for Turfs/Courts.
          </p>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex">
            <div class="work-grid w-100 aos" data-aos="fade-up">
              <div class="work-icon">
                <div class="work-icon-inner">
                  <img src="html/assets/img/icons/work-icon1.svg" alt="Icon" />
                </div>
              </div>
              <div class="work-content">
                <h5>
                  <a href="admin/turf_registraion.php">Join As Turf Owner</a>
                </h5>
                <p>
                  Register quickly and access our platform in seconds. Create your account now!
                </p>
                <a class="btn" href="admin/turf_registraion.php">
                  Register Now <i class="feather-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex">
            <div class="work-grid w-100 aos" data-aos="fade-up">
              <div class="work-icon">
                <div class="work-icon-inner">
                  <img src="html/assets/img/icons/work-icon2.svg" alt="Icon" />
                </div>
              </div>
              <div class="work-content">
                <h5>
                  <a href="html/book.php">Select Turf/Court</a>
                </h5>
                <p>
                  Book premium turfs and courts for quality facilities and expert guidance to enhance your sports
                  experience.</p>
                <a class="btn" href="html/book.php">
                  Go To Turfs <i class="feather-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex">
            <div class="work-grid w-100 aos" data-aos="fade-up">
              <div class="work-icon">
                <div class="work-icon-inner">
                  <img src="football_2817822.png" alt="Icon" />
                </div>
              </div>
              <div class="work-content">
                <h5>
                  <a href="html/play.php">Select Games</a>
                </h5>
                <p>
                  Compete in an exhilarating turf game where every move counts, and only the cleverest strategists claim
                  victory! </p>
                <a class="btn" href="html/play.php">
                  Book Now <i class="feather-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section featured-venues">
      <div class="container">
        <div class="section-heading aos" data-aos="fade-up">
          <h2>Featured <span>Turfs</span></h2>
          <p class="sub-title">
            Experience premier venues with state-of-the-art turf designed to elevate your performance!
          </p>
        </div>
        <div class="row">
          <div class="featured-slider-group">
            <div class="owl-carousel featured-venues-slider owl-theme">

              <?php
              // Include the PDO connection
              include('config.php'); // Assuming this contains the PDO connection setup
              
              // Fetch data from the turf_owners table
              $query = "SELECT * FROM turf_owners";
              $stmt = $conn->prepare($query); // Prepare the query
              $stmt->execute(); // Execute the query
              
              // Fetch all results as an associative array
              $venues = $stmt->fetchAll(PDO::FETCH_ASSOC);

              if (!empty($venues)) {
                foreach ($venues as $venue) {
                  // Replace static data with dynamic data from the database
                  echo '<div class="featured-venues-item aos" data-aos="fade-up">';
                  echo '<div class="listing-item mb-0">';
                  echo '<div class="listing-img">';
                  echo '<a href="html/coach-detail.php?id=' . $venue['id'] . '">';
                  echo '<img src="admin/' . $venue['image'] . '" class="img-fluid" alt="Venue" />';
                  echo '</a>';
                  echo '<div class="fav-item-venues">';
                  // if ($venue['rating'] >= 4.5) {
                  //     echo '<span class="tag tag-blue">Top Rated</span>';
                  // }
                  echo '<h5 class="tag tag-primary">' .
                    '<span class="mile-away"><span>Open from</span> ' .
                    date('h:i A', strtotime($venue['open_time'])) .
                    ' <span>to</span> ' .
                    date('h:i A', strtotime($venue['close_time'])) .
                    '</span>' . '</h5>';

                  echo '</div>';
                  echo '</div>';
                  echo '<div class="listing-content">';

                  echo '<h3 class="listing-title"> <a href="html/coach-detail.php?id=' . $venue['id'] . '">' . $venue['turf_name'] . '</a></h3>';
                  echo '<div class="listing-details-group">';
                  echo '<p>' . $venue['description'] . '</p>';
                  echo '<ul>';
                  echo '<li><span><i class="feather-map-pin"></i>' . $venue['turf_location'] . '</span></li>';
                  echo '<li><span><i class="feather-calendar"></i>Turf Area: <span class="primary-text">' . $venue['turf_area'] . '</span></span></li>';
                  echo '</ul>';
                  echo '</div>';
                  echo '<div class="listing-button">';
                  echo '<div class="listing-venue-owner">';
                  echo '<a class="navigation" href="html/coach-detail.php?id=' . $venue['id'] . '">';
                  echo '<img src="admin/' . $venue['owner_image'] . '" alt="Owner" /> ' . $venue['owner_name'] . '</a>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                echo "No venues found.";
              }
              ?>
            </div>
          </div>
        </div>
        <div class="view-all text-center aos" data-aos="fade-up">
          <a href="html/book.php" class="btn btn-secondary d-inline-flex align-items-center">View All Turfs<span
              class="lh-1"><i class="feather-arrow-right-circle ms-2"></i></span></a>
        </div>
      </div>
    </section>

    <section class="section service-section featured-section">
      <div class="work-cock-img">
        <img src="html/assets/img/icons/cricket-bat2.svg" alt="Service" />
      </div>
      <div class="container">
        <div class="section-heading aos" data-aos="fade-up">
          <h2>Explore Our <span>Games</span></h2>
          <p class="sub-title">
            Explore exciting games that challenge your skills and ignite your passion for competition!
          </p>
        </div>
        <div class="row">
          <?php

          // Prepare and execute the query
          $query = "SELECT * FROM game_categories Limit 4"; // Replace 'games' with your actual table name
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
                    <a href="html/blog-details.php?id=<?php echo $game['id']; ?>">
                      <img src="superadmin/html/<?php echo $game['image']; ?>" class="img-fluid"
                        alt="<?php echo $game['name']; ?>" />
                    </a>
                  </div>
                  <div class="service-content">
                    <h4>
                      <a href="html/blog-details.php?id=<?php echo $game['id']; ?>"><?php echo $game['name']; ?></a>
                    </h4>
                    <a href="html/blog-details.php?id=<?php echo $game['id']; ?>">Learn More</a>
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
        <div class="view-all text-center aos" data-aos="fade-up">
          <a href="html/play.php" class="btn btn-secondary d-inline-flex align-items-center">
            View All Games
            <span class="lh-1"><i class="feather-arrow-right-circle ms-2"></i></span>
          </a>
        </div>
      </div>
    </section>


    <section class="section convenient-section">
      <div class="cock-img">
        <div class="cock-img-one">
          <img src="html/assets/img/icons/cock-01.svg" alt="Icon" />
        </div>
        <div class="cock-img-two">
          <img src="html/assets/img/icons/cock-02.svg" alt="Icon" />
        </div>
        <div class="cock-circle">
          <img src="html/assets/img/bg/cock-shape.png" alt="Icon" />
        </div>
      </div>
      <div class="container">
        <div class="convenient-content aos" data-aos="fade-up">
          <h2>Convenient & Flexible Scheduling</h2>
          <p>
            Find and book turf/court conveniently with our online system that
            matches your schedule and location.
          </p>
        </div>
        <div class="convenient-btns aos" data-aos="fade-up">
          <a href="html/book.php" class="btn btn-primary d-inline-flex align-items-center">
            Book a Turf
            <span class="lh-1"><i class="feather-arrow-right-circle ms-2"></i></span>
          </a>
          <a href="html/about-us.php" class="btn btn-secondary d-inline-flex align-items-center">
            Learn More
            <span class="lh-1"><i class="feather-arrow-right-circle ms-2"></i></span>
          </a>
        </div>
      </div>
    </section>



    <section class="section journey-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex align-items-center">
            <div class="start-your-journey aos" data-aos="fade-up">
              <h2>
                Start Your Journey With<br>
                <span class="active-sport">Ground7 </span> Today.
              </h2>
              <p>
                At Ground 7, we prioritize your experience and satisfaction by facilitating seamless access to turfs,
                ensuring an enjoyable booking process while continuously enhancing our services based on your feedback.
              </p>
              <p>
                Ground 7 is dedicated to delivering superior services, ensuring that users have the best experience
                possible when booking and accessing local turfs.
              </p>
              <span class="stay-approach">Stay Ahead With Our Innovative Approach:</span>
              <div class="journey-list">
                <ul>
                  <li>
                    <i class="fa-solid fa-circle-check"></i>Convenient Booking Process
                  </li>
                  <li>
                    <i class="fa-solid fa-circle-check"></i>User-Centric Approach
                  </li>
                  <li>
                    <i class="fa-solid fa-circle-check"></i>Diverse Options
                  </li>
                </ul>
                <ul>
                  <li>
                    <i class="fa-solid fa-circle-check"></i>Feedback and Continuous Improvement
                  </li>
                  <li>
                    <i class="fa-solid fa-circle-check"></i>Commitment to Quality
                  </li>
                  <li>
                    <i class="fa-solid fa-circle-check"></i>Modern Turf Systems
                  </li>
                </ul>
              </div>
              <div class="convenient-btns">

                <a href="html/about-us.php" class="btn btn-secondary d-inline-flex align-items-center">
                  <span><i class="feather-align-justify me-2"></i></span>Learn
                  More
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="journey-img aos" data-aos="fade-up">
              <img src="html/assets/img/Untitled design (1).png" class="img-fluid" alt="User" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section group-coaching">
      <div class="container">
        <div class="section-heading aos" data-aos="fade-up">
          <h2>Our <span>Features</span></h2>
          <p class="sub-title">
            ​Ground 7 offers a wide range of innovative features designed to enhance the user experience when finding
            and booking local turfs.
          </p>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex">
            <div class="work-grid coaching-grid w-100 aos" data-aos="fade-up">
              <div class="work-icon">
                <div class="work-icon-inner">
                  <img style="width: 90px;" src="html/assets/img/icons/location.gif" alt="Icon" />
                </div>
              </div>
              <div class="work-content">
                <h3>Nearby Location</h3>
                <p>
                  Users that searching nearby turf locations, there are various options available depending on your
                  geographic location.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex">
            <div class="work-grid coaching-grid w-100 aos" data-aos="fade-up">
              <div class="work-icon">
                <div class="work-icon-inner">
                  <img style="width: 90px;" src="html/assets/img/icons/resgister.gif" alt="Icon" />
                </div>
              </div>
              <div class="work-content">
                <h3>Easy Registration</h3>
                <p>
                  Ground 7 offers a user-friendly platform where individuals can easily discover turf and courts through
                  a straightforward registration process.​
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex">
            <div class="work-grid coaching-grid w-100 aos" data-aos="fade-up">
              <div class="work-icon">
                <div class="work-icon-inner">
                  <img style="width: 90px;" src="html/assets/img/icons/information.gif" alt="Icon" />
                </div>
              </div>
              <div class="work-content">
                <h3>Turfs information</h3>
                <p>
                  ​Ground 7 serves as a comprehensive platform for users seeking turf information and booking services.​
                </p><br>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex">
            <div class="work-grid coaching-grid w-100 aos" data-aos="fade-up">
              <div class="work-icon">
                <div class="work-icon-inner">
                  <img style="width: 90px;" src="html/assets/img/icons/categories.gif" alt="Icon" />
                </div>
              </div>
              <div class="work-content">
                <h3>Game Categories</h3>
                <p>
                  ​Ground 7 offers a diverse range of game categories suitable for play on turf, catering to various
                  interests and age groups.​
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex">
            <div class="work-grid coaching-grid w-100 aos" data-aos="fade-up">
              <div class="work-icon">
                <div class="work-icon-inner">
                  <img style="width: 90px;" src="html/assets/img/icons/schedule.gif" alt="Icon" />
                </div>
              </div>
              <div class="work-content">
                <h3>Game Scheduling</h3>
                <p>
                  Ground 7 allows users to effortlessly book game times, ensuring a convenient and hassle-free
                  experience in reserving sports Venues.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex">
            <div class="work-grid coaching-grid w-100 aos" data-aos="fade-up">
              <div class="work-icon">
                <div class="work-icon-inner">
                  <img style="width: 90px;" src="html/assets/img/icons/online.gif" alt="Icon" />
                </div>
              </div>
              <div class="work-content">
                <h3>Online Booking</h3>
                <p>
                  Ground 7 specializes in providing easy booking solutions for sports facilities, making it convenient
                  for users to find and reserve turf and courts.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section earn-money">
      <div class="cock-img cock-position">
        <div class="cock-img-one">
          <img src="html/assets/img/icons/cock-01.svg" alt="Icon" />
        </div>
        <div class="cock-img-two">
          <img src="html/assets/img/icons/cock-02.svg" alt="Icon" />
        </div>
        <div class="cock-circle">
          <img src="html/assets/img/bg/cock-shape.png" alt="Icon" />
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="private-venue aos" data-aos="fade-up">
              <div class="convenient-btns become-owner" role="tablist">
                <a href="javascript:void(0);"
                  class="btn btn-secondary become-venue d-inline-flex align-items-center nav-link active"
                  id="nav-Recent-tab" data-bs-toggle="tab" data-bs-target="#nav-Recent" role="tab"
                  aria-controls="nav-Recent" aria-selected="true">
                  Become A Turf Owner
                </a>
                <a href="javascript:void(0);"
                  class="btn btn-primary become-coche d-inline-flex align-items-center nav-link"
                  id="nav-RecentCoaching-tab" data-bs-toggle="tab" data-bs-target="#nav-RecentCoaching" role="tab"
                  aria-controls="nav-RecentCoaching" aria-selected="false">
                  Become A User
                </a>
              </div>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="nav-Recent" role="tabpanel" aria-labelledby="nav-Recent-tab"
                  tabindex="0">
                  <h2>
                    Get More Users By Providing Your Turf Services
                  </h2>
                  <p>
                    By focusing on these strategies, you can effectively increase your user base and establish your
                    business as a foremost provider of turf services in your area.
                  </p>
                  <div class="earn-list">
                    <ul>
                      <li>
                        <i class="fa-solid fa-circle-check"></i>Get Unlimited Access To Ground 7.
                      </li>
                      <li>
                        <i class="fa-solid fa-circle-check"></i>Build Your Decided Public
                      </li>
                      <li>
                        <i class="fa-solid fa-circle-check"></i>Get More Users
                      </li>
                    </ul>
                  </div>
                  <div class="convenient-btns">
                    <a href="admin/turf_registraion.php" class="btn btn-secondary d-inline-flex align-items-center">
                      <span class="lh-1"><i class="feather-user-plus me-2"></i></span>Join With Us
                    </a>
                  </div>
                </div>
              </div>
              <div class="tab-content">
                <div class="tab-pane fade show" id="nav-RecentCoaching" role="tabpanel" aria-labelledby="nav-Recent-tab"
                  tabindex="0">
                  <h2>
                    Get Unlimited Access To Ground7 Features
                  </h2>
                  <p>
                    Joining our network offers you the unique opportunity to stay up-to-date on the latest developments
                    related to turf community, exclusive offers.
                  </p>
                  <div class="earn-list">
                    <ul>
                      <li>
                        <i class="fa-solid fa-circle-check"></i>Unlimited Access
                      </li>
                      <li>
                        <i class="fa-solid fa-circle-check"></i>Nearby Turf Location
                      </li>
                      <li>
                        <i class="fa-solid fa-circle-check"></i>Easy Booking
                      </li>
                    </ul>
                  </div>
                  <div class="convenient-btns">
                    <a href="html/registration.php" class="btn btn-secondary d-inline-flex align-items-center">
                      <span class="lh-1"><i class="feather-user-plus me-2"></i></span>Join With Us
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section best-services" id="faq">
      <div class="container">
        <div class="section-heading aos" data-aos="fade-up">
          <h2>Extra Benefits, Unmatched <span>Service Excellence</span></h2>
          <p class="sub-title">
            We aim to address common inquiries from users and turf owners about the services offered by Ground7.
          </p>
        </div>
        <div class="row">

          <div class="col-lg-6">
            <?php
            try {
              include('config.php'); // Include the database connection
            
              // SQL query to count verified turfs
              $sql = "SELECT COUNT(*) AS verified_turfs FROM turf_owners WHERE is_verified = 1";

              // Prepare and execute the query
              $stmt = $conn->prepare($sql);
              $stmt->execute();

              // Fetch the result
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              $verified_turfs = $row['verified_turfs'] ?? 0; // Default to 0 if no turfs are found
            
            } catch (PDOException $e) {
              echo "Error: " . $e->getMessage();
            }
            try {

              $sql = "SELECT COUNT(*) AS total_games FROM game_categories";

              // Prepare and execute the query
              $stmt = $conn->prepare($sql);
              $stmt->execute();

              // Fetch the result
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              $total_games = $row['total_games'] ?? 0; // Default to 0 if no games are found
            
            } catch (PDOException $e) {
              echo "Error: " . $e->getMessage();
            }
            ?>

            <div class="best-service-img aos" data-aos="fade-up">
              <img src="html/assets/img/stump1.jpg" class="img-fluid" alt="Service" />
              <div class="service-count-blk">
                <div class="coach-count">
                  <h3>Turfs</h3>
                  <h2><span class="counter-up"><?php echo $verified_turfs; ?></span>+</h2>
                  <!-- Show verified turfs count -->
                  <h4>
                    Many turf fields on Ground7 connect sports enthusiasts with nearby venues.
                  </h4>
                </div>
                <div class="coach-count coart-count">
                  <h3>Games</h3>
                  <h2><span class="counter-up"><?php echo $total_games; ?></span>+</h2> <!-- Dynamic games count -->
                  <h4>
                    Numerous games on Ground7 allow users to easily book their ideal game location.
                  </h4>
                </div>

              </div>
            </div>

          </div>
          <div class="col-lg-6">
            <div class="ask-questions aos" data-aos="fade-up">
              <h3>Frequently Asked Questions</h3>
              <p>
                Here are some frequently asked questions from users and turf owners:
              </p>
              <div class="faq-info">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <a href="javascript:;" class="accordion-button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        What is Ground7?
                      </a>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="accordion-content">
                          <p>
                            Ground7 is a platform that connects sports enthusiasts with turf facilities, allowing users
                            to find and book nearby turfs easily. Turf owners can also list their facilities to increase
                            visibility and attract more clients.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <a href="javascript:;" class="accordion-button collapsed" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        How do I find a turf facility near me?
                      </a>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="accordion-content">
                          <p>
                            Simply enter your location or select the desired type of turf, and our search feature will
                            display all available options nearby. You can filter results based on amenities, user
                            ratings, and more.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <a href="javascript:;" class="accordion-button collapsed" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        How can turf owners list their facility on Ground7?
                      </a>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="accordion-content">
                          <p>
                            Turf owners can create an account on Ground7 and fill out a detailed form to list their
                            facility. Providing high-quality images and comprehensive descriptions will help attract
                            more clients.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                      <a href="javascript:;" class="accordion-button collapsed" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        How does booking work on Ground7?
                      </a>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="accordion-content">
                          <p>
                            Users can select their desired turf, choose an available time slot, and complete the booking
                            through our secure online system. Confirmation and details will be sent via email.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                      <a href="javascript:;" class="accordion-button collapsed" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Can turf owners manage their bookings?
                      </a>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="accordion-content">
                          <p>
                            Yes, turf owners can access a management dashboard to view upcoming bookings, update
                            facility information, and respond to user inquiries.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

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

    <section class="section featured-venues latest-news">
      <div class="container">
        <div class="section-heading aos" data-aos="fade-up">
          <h2>The Latest <span>Events</span></h2>
          <p class="sub-title">
            Our mission is to connect sports enthusiasts with the perfect venues for their games, and we are here to
            support your active lifestyle.
          </p>
        </div>
        <div class="row">
          <div class="featured-slider-group">
            <div class="owl-carousel featured-venues-slider owl-theme">
              <?php
              if ($result && count($result) > 0) {
                foreach ($result as $row) {
                  ?>
                  <div class="featured-venues-item aos" data-aos="fade-up">
                    <div class="listing-item mb-0">
                      <div class="listing-img">
                        <a href="html/event_registration.php?id=<?php echo htmlspecialchars($row['id']); ?>">
                          <img src="admin/<?php echo htmlspecialchars($row['event_image']); ?>"
                            alt="<?php echo htmlspecialchars($row['event_name']); ?>" />
                        </a>
                        <div class="fav-item-venues news-sports">
                          <span class="tag tag-blue"><?php echo htmlspecialchars($row['event_location']); ?></span>
                          <span class="tag bg-success text-white">Rs-<?php echo htmlspecialchars($row['price']); ?></span>

                        </div>
                      </div>
                      <div class="listing-content news-content">
                        <div class="listing-venue-owner listing-dates">
                          <a href="javascript:;" class="navigation">
                            <img src="admin/<?php echo htmlspecialchars($row['image']); ?>" alt="Turf Owner" />
                            <?php echo htmlspecialchars($row['turf_name']); ?>
                          </a>
                          <span><i class="feather-calendar"></i><?php echo htmlspecialchars($row['event_date']); ?></span>
                        </div>
                        <h3 class="listing-title">
                          <a
                            href="html/event_registration.php?id=<?php echo htmlspecialchars($row['id']); ?>"><?php echo htmlspecialchars($row['event_name']); ?></a>
                        </h3>
                        <div class="listing-button read-new">
                          <span>
                            <img src="html/assets/img/icons/clock.svg" alt="User" />
                            <?php echo htmlspecialchars($row['event_time']); ?> <br>
                          </span>
                        </div>
                        <?php echo htmlspecialchars($row['event_description']); ?>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              } else {
                echo "<p>No events found</p>";
              }
              $conn = null; // Close the database connection
              ?>
            </div>
          </div>
        </div>


      </div>
    </section>


    <section class="section newsletter-sport">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="subscribe-style aos" data-aos="fade-up">
              <div class="banner-blk">
                <img src="html/assets/img/shoes.jpg" class="img-fluid" alt="Subscribe" />
              </div>
              <?php
              include('config.php'); // Ensure this contains your PDO connection setup
              
              ini_set('display_errors', 1);
              ini_set('display_startup_errors', 1);
              error_reporting(E_ALL);

              // Initialize a message variable
              $message = '';
              $messageType = '';

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = trim($_POST['email']);

                // Validate email format
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $message = 'Invalid email format.';
                  $messageType = 'danger'; // You can define CSS classes for different message types
                } else {
                  // Check if email already exists
                  $sql = "SELECT * FROM subscribers WHERE email = :email";
                  $stmt = $conn->prepare($sql);
                  $stmt->bindParam(':email', $email);
                  $stmt->execute();

                  if ($stmt->rowCount() > 0) {
                    $message = 'This email is already subscribed.';
                    $messageType = 'warning';
                  } else {
                    // Insert the email into the database
                    $sql = "INSERT INTO subscribers (email) VALUES (:email)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':email', $email);

                    if ($stmt->execute()) {
                      $message = 'Thank you for subscribing!';
                      $messageType = 'success';
                    } else {
                      $message = 'Subscription failed. Please try again later.';
                      $messageType = 'danger';
                    }
                  }
                }

                // Only show the modal if there's a message
                if ($message) {
                  echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('modalMessage').innerText = '{$message}';
                    var modal = new bootstrap.Modal(document.getElementById('messageModal'));
                    modal.show();
                });
              </script>";
                }
              }
              ?>

              <div class="banner-info">
                <img src="html/assets/img/icons/subscribe.svg" class="img-fluid" alt="Subscribe" />
                <h2>Subscribe to Newsletter</h2>
                <p>Just for you, exciting news updates.</p>
                <form action="" method="POST" class="subscribe-blk bg-white">
                  <div class="input-group align-items-center" style="padding: 5px 15px;">
                    <i class="feather-mail"></i>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address"
                      aria-label="email" required style="height: 45px;" />
                    <div class="subscribe-btn-grp" style="padding-top: 0px; padding-bottom: 0px; ">
                      <input type="submit" class="btn btn-secondary btn-sm"
                        style="height: 40px; line-height: 30px; padding: 0px 15px;" value="Subscribe" />
                    </div>
                  </div>
                </form>
              </div>
              <!-- Modal Structure -->
              <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="messageModalLabel">Notification</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalMessage">
                      <!-- Message will be displayed here -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="container">
        <div class="footer-join aos" data-aos="fade-up">
          <h2>Welcome to Ground7!
          </h2>
          <p class="sub-title">
            Join our empowering sports community today and grow with us.
          </p>
          <a href="admin/turf_registraion.php" class="btn btn-primary"><i class="feather-user-plus"></i> Join With
            Us</a>
        </div>

        <div class="footer-top">
          <div class="row" style="justify-content: center;">
            <div class="col-lg-2 col-md-6">
              <div class="footer-widget footer-menu">
                <h4 class="footer-title">Contact us</h4>
                <div class="footer-address-blk">
                  <div class="footer-call">
                    <span>Toll-Free Customer Care</span>
                    <p>
                      <a href="tel:+91 7744999848" style="color:#6B707B;">+91 7744999848</a>
                    </p>
                  </div>
                  <div class="footer-call">
                    <span>Need Live Support</span>
                    <p>
                      <a href="mailto:Boby.soni1997@gmail.com" style="color:#6B707B;">Boby.soni1997@gmail.com</a>
                      <!-- Replace with the actual email -->
                    </p>
                  </div>
                </div>

                <div class="social-icon">
                  <ul>
                    <li>
                      <a href="https://www.facebook.com/people/Ground7/61567248455957/" class="facebook"><i
                          class="fab fa-facebook-f"></i>
                      </a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/ground7official/" class="instagram"><i
                          class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                      <a href="https://www.linkedin.com/company/ground-7/" class="linked-in"><i
                          class="fab fa-linkedin-in"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-6">
              <div class="footer-widget footer-menu">
                <h4 class="footer-title">Quick Links</h4>
                <ul>
                  <li>
                    <a href="html/about-us.php">About us</a>
                  </li>
                  <li>
                    <a href="html/play.php">Games</a>
                  </li>
                  <li>
                    <a href="html/book.php">Turf</a>
                  </li>
                  <li>
                    <a href="html/contact-us.php">Contact us</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-md-6">
              <div class="footer-widget footer-menu">
                <h4 class="footer-title">Support</h4>
                <ul>
                  <li>
                    <a href="#faq">FAQs</a>
                  </li>
                  <li>
                    <a href="html/privacy-policy.php">Privacy Policy</a>
                  </li>
                  <li>
                    <a href="html/terms-condition.php">Terms & Conditions</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-md-6">
              <div class="footer-widget footer-menu">
                <h4 class="footer-title">Other Links</h4>
                <ul>
                  <li>
                    <a href="html/play.php">Play</a>
                  </li>
                  <li>
                    <a href="html/book.php">Book</a>
                  </li>
                  <li>
                    <a href="html/comming-soon.php">ChatBox</a>
                  </li>
                  <li>
                </ul>
              </div>
            </div>

            <div class="col-lg-2 col-md-6">
              <div class="footer-widget footer-menu">
                <h4 class="footer-title"></h4>
                <a href="../index.php" class="navbar-brand logo">
                  <img style="height: 120px;width: 100px; object-fit: cover;" src="html/assets/img/Group-white.svg"
                    class="img-fluid" alt="Logo" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <div class="container">
          <div class="copyright">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="copyright-text">
                  <p class="mb-0">
                    &copy; 2024 Ground7 - All rights reserved.
                  </p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <div class="progress-wrap active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="
            transition: stroke-dashoffset 10ms linear 0s;
            stroke-dasharray: 307.919px, 307.919px;
            stroke-dashoffset: 228.265px;
          "></path>
    </svg>
  </div>
  <script>
    function togglePassword() {
      document.getElementById('password').type = password.type === 'password' ? 'text' : 'password';
    }
  </script>

  <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="html/assets/js/jquery-3.7.0.min.js" type="e2bef4451ba3f851b33ff01e-text/javascript"></script>

  <script src="html/assets/js/bootstrap.bundle.min.js" type="e2bef4451ba3f851b33ff01e-text/javascript"></script>

  <script src="html/assets/plugins/select2/js/select2.min.js" type="e2bef4451ba3f851b33ff01e-text/javascript"></script>

  <script src="html/assets/plugins/owl-carousel/owl.carousel.min.js"
    type="e2bef4451ba3f851b33ff01e-text/javascript"></script>

  <script src="html/assets/plugins/aos/aos.js" type="e2bef4451ba3f851b33ff01e-text/javascript"></script>

  <script src="html/assets/js/jquery.waypoints.js" type="e2bef4451ba3f851b33ff01e-text/javascript"></script>
  <script src="html/assets/js/jquery.counterup.min.js" type="e2bef4451ba3f851b33ff01e-text/javascript"></script>

  <script src="html/assets/js/backToTop.js" type="e2bef4451ba3f851b33ff01e-text/javascript"></script>

  <script src="html/assets/js/script.js" type="e2bef4451ba3f851b33ff01e-text/javascript"></script>
  <script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
    data-cf-settings="e2bef4451ba3f851b33ff01e-|49" defer></script>
</body>

<!-- Mirrored from html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:13:55 GMT -->

</html>