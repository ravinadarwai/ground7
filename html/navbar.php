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
    .modal-backdrop {
      display: none;
    }
    .header .navbar-header .navbar-brand{
      display: flex;
      justify-content: center;
    }
    .header .main-menu-wrapper .menu-header .menu-logo img{
      width: 100px;
    }
    .logo-size{
      width: 100px;
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
                    <img src="assets/img/Group 100.svg"
                        class="img-fluid logo-size" alt="Logo" />
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="../index.php" class="menu-logo">
                        <img src="assets/img/Group 100.svg"
                            class="img-fluid" alt="Logo" />
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i></a>
                </div>
                <ul class="main-nav">
                    <li>
                        <a href="play.php">Play</a>

                    </li>
                    <li>
                        <a href="book.php">Book</a>
                    </li>
                    <li>
                        <a href="comming-soon.php">ChatBox</a>
                    </li>

                    <ul class="hidden logout">
                        <a href="login.html">
                            <li class="has-submenu" style="color:#000;">Logout</li>
                        </a>
                    </ul>

                </ul>
            </div>
            <ul class="nav header-navbar-rht logged-in">
                <li class="nav-item">
                    <a class="nav-link btn btn-secondary" href="../admin/turf_registraion.php"><span><i
                                class="feather-check-circle"></i></span>Book Your Turf</a>
                </li>



                <li class="nav-item dropdown has-arrow logged-item block">
                    <?php if (isset($_SESSION['username'])): // Check if the user is logged in 
                    ?>
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
                        <?php else: // If the user is not logged in, show the login button 
              ?>
                <a class="btn btn-primary" href="login_page.php">Login</a>
              <?php endif; ?>
            </li>

          </ul>
        </nav>
    </div>
</header>