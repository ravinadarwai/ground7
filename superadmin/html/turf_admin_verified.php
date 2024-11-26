<?php
session_name('superadminname'); // Ensure to use the custom session name
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: login.php'); // Adjust the path to your login page
    exit();
}

// The rest of your turf_admin.php code goes here
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Material Pro Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        body {
            overflow: auto !important;
        }

        .content-wrapper {
            width: 60%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: 'Arial', sans-serif;
            overflow: auto !important;
            height: 100dvh;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: auto !important;
        }

        /* th{
    background-color: rgba(0, 0, 0, .4);
    backdrop-filter: blur(18px) !important;
    padding: 10px 0px;
    border-radius: 5px !important;
} */

        thead th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 1.1rem;
        }

        tbody tr {
            text-align: center;
        }

        tbody td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            font-size: 1rem;
            color: #333;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .view-link {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
            cursor: pointer;
        }

        .view-link:hover {
            color: #0056b3;
        }

        @media (max-width: 600px) {

            thead th,
            tbody td {
                padding: 8px;
            }

            .content-wrapper {
                padding: 15px;
            }

            h1 {
                font-size: 1.5rem;
            }

            .content-wrapper {
                width: 100%;
                overflow: auto !important;
            }
        }

        .location-text {
    display: inline;
    text-decoration: none;
}

.see-more {
    display: none;
    text-decoration: none;
    color: #000;
}

.see-more-btn {
    color: #000;
    cursor: pointer;
    text-decoration: none;
}
.delete{
    text-decoration: none;
    color: #fff;
    padding: 8px;
    border: 1px solid lightgray;
    border-radius: 8px;
    background-color: rgb(221, 58, 58);
}
.delete:hover{
    color: whitesmoke;
    background-color: rgb(250, 0, 0);
}

    </style>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark" style="background-color: #177C82;">
                <div class="navbar-header" data-logobg="skin6" style="background-color: #177C82;">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <img src="../../html/assets/img/Group-white (1).svg" alt="homepage" class="dark-logo" />
                        </b>
                        <span class="logo-text">

                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block ">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white "
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto mt-md-0 ">
                    </ul>
                    <ul class="navbar-nav">
                    <a href="logout.php" style="color:#fff;"><i class="fa fa-sign-out me-2" aria-hidden="true"></i>Log out</a>

                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                <ul id="sidebarnav">
                        <!-- User Profile-->
                         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="turf-admins.php" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
                                    class="hide-menu">Dashboard</span></a></li> 
                  
                 
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="add_game_category.php" aria-expanded="false"><i class="mdi me-2 mdi-help-circle"></i><span
                                    class="hide-menu">Add Game Category</span></a>
                        </li> 
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="turf_admin_pending.php
                                " aria-expanded="false"><i class="fa-solid fa-user"></i><span
                                    class="hide-menu">Turf PendingAdmins</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                              href="turf_admin_verified" aria-expanded="false"><i class="fa-regular fa-user"></i><span
                                  class="hide-menu">Turf  verified Admins </span></a>
                      </li>
                    </ul>


                </nav>
            </div>
            <div class="sidebar-footer">
                <div class="row">
                    
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="logout.php" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                                class="mdi mdi-power"></i></a>
                    </div>
                </div>
            </div>
        </aside>
        <?php
        include('../../config.php'); // Assuming this contains the PDO connection setup

        // Query to fetch only unverified turf owners (is_verified = 0)
        $stmt = $conn->prepare("SELECT id, owner_name, turf_name, turf_location FROM turf_owners WHERE is_verified = 1");
        $stmt->execute();
        $turfOwners = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <!-- Display the list of unverified turf owners -->
        <h1 class="mt-4">Admin - Unverified Turf Owners</h1>
        <section class="content-wrapper">
            <table class="table-style">
                <tr>
                    <th>No.</th>
                    <th>Turf Name</th>
                    <th>Owner Name</th>
                    <th>Location</th>
                    <th></th>
                </tr>
                <?php foreach ($turfOwners as $index => $owner): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars($owner['turf_name']); ?></td>
                        <td><?php echo htmlspecialchars($owner['owner_name']); ?></td>
                        <td>
                            <span class="location-text">
                                <?php
                                $location = htmlspecialchars($owner['turf_location']);
                                if (strlen($location) > 5) {
                                    echo substr($location, 0, 6) . '';
                                } else {
                                    echo $location;
                                }
                                ?>
                            </span>
                            <span class="see-more" style="display:none;"><?php echo $location; ?></span>
                            <?php if (strlen($location) > 5) { ?>
                                <a href="javascript:void(0);" class="see-more-btn" onclick="toggleLocation(this)">...</a>
                            <?php } ?>
                        </td>
                        <td><a href="turf_owner_details.php?id=<?php echo $owner['id']; ?>" class="view-link">view</a></td>
                        <td><a href="" class="delete">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </div>
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <script>
        function toggleLocation(element) {
            var locationText = element.previousElementSibling.previousElementSibling;
            var fullText = element.previousElementSibling;

            if (fullText.style.display === "none") {
                locationText.style.display = "none";
                fullText.style.display = "inline";
                element.innerText = "<<<";
            } else {
                locationText.style.display = "inline";
                fullText.style.display = "none";
                element.innerText = "...";
            }
        }
    </script>
</body>

</html>