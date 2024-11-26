<style>
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

    .logout {
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: left;
        background-color: #fff;
        color: #000;
    }
    .logo-size{
      width: 100px;
    }
    .header .main-menu-wrapper .menu-header .menu-logo img{
      width: 100px;
    }
    .header .navbar-header .navbar-brand{
      display: flex;
      justify-content: center;
    }
</style>
<header class="header header-sticky">
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
                <a href="../index.php" class="navbar-brand logo">
                <img src="../html/assets/img/Group 100.svg"
                class="img-fluid logo-size" alt="Logo" />
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="../index.php" class="menu-logo">
                    <img src="../html/assets/img/Group 100.svg"
                    class="img-fluid logo-size" alt="Logo" />
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i></a>
                </div>
                <ul class="main-nav">

                    <ul class=" hidden">
                        <li class="has-submenu">
                            <a href="html/play.php">Profile</a>
                        </li>
                        <li class="has-submenu">
                            <a href="html/play.php">Dashboard</a>
                        </li>
                    </ul>
                  
                   
                    <ul class="hidden logout">
                        <a href="lognout.php"><li class="has-submenu" style="color:#000;">Logout</li></a>
                    </ul>

                </ul>
            </div>
            <ul class="nav header-navbar-rht logged-in">
                <li class="nav-item">
                    <a class="nav-link btn btn-secondary" href="../admin/turf_registraion.php"><span><i
                                class="feather-check-circle"></i></span>Book Your Turf</a>
                </li>
               

                
<li class="nav-item dropdown has-arrow logged-item block">
  <?php if (isset($_SESSION['username'])): // Check if the user is logged in ?>
    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
      <span class="user-img">
        <img class="rounded-circle" src="../profile_image.jpg" width="31" alt="User Image">
      </span>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
      <div class="user-header">
        <div class="avatar avatar-sm">
          <img src="../profile_image.jpg" alt="User" class="avatar-img rounded-circle">
        </div>
        <div class="user-text">
          <a href="#">
            <?php 
              echo htmlspecialchars(string: $_SESSION['username']); 
            ?>
          </a><br>
        </div>
      </div>
      <p><a class="dropdown-item" href="logout.php">Logout</a></p>
    </div>
  <?php else: // If the user is not logged in, show the login button ?>
    <a href="login_page.php" class="btn btn-primary">Login</a>
  <?php endif; ?>
</li>


            </ul>
        </nav>
    </div>
</header>
<section class="breadcrumb breadcrumb-list mb-0">
            <span class="primary-right-round"></span>
            <div class="container">
                <h1 class="text-white">Turf Dashboard</h1>
                <ul>
                    <li><a href="index.html">"Welcome to Turf Dashboard"</a></li>

                    </a></li>
                </ul>
            </div>
        </section>


        <?php
$current_page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME); // Get filename without extension
?>

<div class="dashboard-section coach-dash-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-menu coaurt-menu-dash">
                    <ul>
                        <li class="small-li">
                            <a href="turf_admin.php" class="<?= $current_page == 'turf_admin' ? 'active' : '' ?>">
                                <img src="assets/img/icons/dashboard-icon.svg" alt="Icon">
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="small-li">
                            <a href="view_all_users.php" class="<?= $current_page == 'view_all_users' ? 'active' : '' ?>">
                                <img src="assets/img/icons/booking-icon.svg" alt="Icon">
                                <span>Bookings</span>
                            </a>
                        </li>

                        <li class="small-li">
                            <a href="view_all_games.php" class="<?= $current_page == 'view_all_games' ? 'active' : '' ?>">
                                <img src="assets/img/icons/invoice-icon.svg" alt="Icon">
                                <span>Games</span>
                            </a>
                        </li>

                        <li class="small-li">
                            <a href="gallery.php" class="<?= $current_page == 'gallery' ? 'active' : '' ?>">
                                <img src="assets/img/icons/wallet-icon.svg" alt="Icon">
                                <span>Gallery & Location</span>
                            </a>
                        </li>

                        <li class="small-li">
                            <a href="upcoming_event.php?id=<?php echo $user_id; ?>" class="<?= $current_page == 'upcoming_event' ? 'active' : '' ?>">
                                <img src="assets/img/icons/wallet-icon.svg" alt="Icon">
                                <span>Upcoming Events</span>
                            </a>
                        </li>

                        <li class="small-li">
                            <a href="coach-profile.php?id=<?php echo $user_id; ?>" class="<?= $current_page == 'coach-profile' ? 'active' : '' ?>">
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