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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
/* Main Container */
/* Main Container */
.main-container {
    overflow-x:auto;
    width: 100%;
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border-radius: 15px;
    background-color: #fdfdfd;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
    transition: transform 0.3s ease;
}

.main-container:hover {
    transform: scale(1.02);
}

/* Header Section */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.header-info {
    color: #333;
}

.turf-name {
    font-size: 1.3rem;
    color: #4CAF50;
}

.time, .location {
    font-size: 1.1rem;
    color: #888;
}

.turf-image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 2px solid #4CAF50;
    object-fit: cover;
}

/* Content Section */
.content {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    gap: 20px;
}

.details {
    width: 65%;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.details h3 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 15px;
    text-transform: uppercase;
}

.details p {
    margin: 10px 0;
    font-size: 1rem;
    color: #555;
}

.sidebar {
    width: 30%;
    background-color: #4CAF50;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    color: white;
    text-align: center;
}

.sidebar-item {
    margin-bottom: 15px;
    font-size: 1.2rem;
    padding: 12px;
    background-color: #fff;
    color: #4CAF50;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.sidebar-item:hover {
    background-color: #3e8e41;
    color: white;
}

/* Table Section */
.content-wrapper {
    margin-top: 30px;
    background-color: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.content-wrapper h2 {
    font-size: 1.6rem;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    font-size: 1rem;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
    text-transform: uppercase;
}

td {
    background-color: #fff;
}

.img-placeholder {
    width: 50px;
    height: 50px;
    background-color: #ccc;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 12px;
    color: #666;
}

/* Responsive Design */
@media (max-width: 768px) {
    .header {
        flex-direction: column;
        align-items: flex-start;
    }

    .content {
        flex-direction: column;
    }

    .details, .sidebar {
        width: 100%;
    }

    .sidebar {
        margin-top: 20px;
    }
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
                    <a class="navbar-brand ms-4" href="index.html">
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

                        <li class="nav-item search-box">
                            <a class="nav-link text-muted" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search" style="display: none;">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
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
                                href="index.html" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
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
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <div class="sidebar-footer">
                <div class="row">
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i
                                class="ti-settings"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                                class="mdi mdi-gmail"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                                class="mdi mdi-power"></i></a>
                    </div>
                </div>
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
include('../../config.php'); // Ensure you include your database connection setup

// Get the turf owner ID from the query string
$turfId = $_GET['id'] ?? null; // Default to null if not provided

// Fetch turf details
try {
    $stmt = $conn->prepare("SELECT * FROM turf_owners WHERE id = :id");
    $stmt->execute(['id' => $turfId]);
    $turfDetails = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching turf details: " . $e->getMessage();
    exit;
}

// Fetch joint users related to the turf owner (assuming a relation exists)
try {
    $stmt = $conn->prepare("SELECT * FROM turfuser WHERE turf_id = :turf_id");
    $stmt->execute(['turf_id' => $turfId]);
    $turfuser = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching joint users: " . $e->getMessage();
    exit;
}
?>

<section class="main-container">
    <div class="header">
        <div class="header-info">
            <p class="turf-name">Turf name - <strong><?php echo htmlspecialchars($turfDetails['turf_name']); ?></strong></p>
            <p class="time">Time - <?php echo htmlspecialchars($turfDetails['open_time'] . ' - ' . $turfDetails['close_time']); ?></p>
            <p class="location">Location - <?php echo htmlspecialchars($turfDetails['turf_location']); ?></p>
        </div>
        <img src="<?php echo htmlspecialchars($turfDetails['owner_image']); ?>" alt="Turf image" class="turf-image">
    </div>
    <div class="content">
        <div class="details">
            <h3>Owner details</h3>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($turfDetails['owner_name']); ?></p>
            <p><strong>Owner Email:</strong> <?php echo htmlspecialchars($turfDetails['owner_email']); ?></p>
            <p><strong>Owner Contact:</strong> <?php echo htmlspecialchars($turfDetails['owner_contact']); ?></p>
            <p><strong>Owner Address:</strong> <?php echo htmlspecialchars($turfDetails['owner_address']); ?></p>
            <p><strong>Owner Aadhaar:</strong> <?php echo htmlspecialchars($turfDetails['owner_aadhar']); ?></p>
        </div>
        <div class="sidebar">
            <div class="sidebar-item">Gallery</div>
            <div class="sidebar-item">Review</div>
            <div class="sidebar-item">Location</div>
        </div>
    </div>

    <div class="content-wrapper">
        <h2>Joint Users</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Img</th>
            </tr>
            <?php foreach ($turfuser as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['contact_no']); ?></td>
                <td><div class="img-placeholder">Img</div></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
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
</body>

</html>