<?php
// Include your database configuration file
include('../config.php');

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: turf_login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Get the user ID from session

// Fetch all games associated with the logged-in user
$sql = "SELECT g.id, g.game_name, g.court_type, g.max_players, g.duration, g.price_per_person, g.game_description, g.game_image, g.created_at, g.updated_at 
        FROM games g
        WHERE g.turf_owners_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);

if ($stmt->execute()) {
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Handle error
    $games = []; // Set to an empty array to avoid undefined variable
    echo "Error executing query.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Ground7</title>
    <meta name="description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/feather.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .availability-box {
            /* Your existing styles */
        }

        .availability-box.highlight {
            background-color: #f0f8ff;
            /* Light blue background */
            border: 2px solid #007bff;
            /* Blue border */
            transition: 0.3s;
            /* Smooth transition */
        }

        .availability-box.highlight h6,
        .availability-box.highlight span {
            font-weight: bold;
            /* Bold text for better visibility */
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
            /* Ensure rounded corners for the table */
        }

        .table thead th {
            background-color: #097E52;
            /* Green header */
            color: white;
        }

        .table tbody tr:hover {
            background-color: #c8e6c9;
            /* Light green on hover */
        }

        .table img {
            width: 100px;
            /* Fixed image width */
            height: 80px;
            /* Fixed image height */
            object-fit: cover;
            /* Maintain aspect ratio */
        }

        .card-title {
            font-size: 1.25rem;
            color: #2e7d32;
            /* Darker green for titles */
        }

        .card-description {
            height: 50px;
            /* Limit height for description */
            overflow: hidden;
            /* Hide overflow */
        }

        .game-price {
            color: #388e3c;
            /* Dark green for price */
            font-weight: bold;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin-bottom: 15px;
        }

        /* General styling */
        .table {
            font-size: 1.1em;
        }

        .table td,
        .table th {
            padding: 15px;
            white-space: nowrap;
        }

        .table img {
            width: 120px;
            height: auto;
            border-radius: 8px;
        }

        .card-title,
        .card-description,
        .game-price {
            font-size: 1.1em;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .table {
                font-size: 1em;
            }

            .table td,
            .table th {
                padding: 10px;
            }

            .table img {
                width: 90px;
                /* Smaller image size on mobile */
            }

            .card-title,
            .card-description,
            .game-price {
                font-size: 1em;
                /* Adjust font size */
            }
        }

        @media (max-width: 576px) {
            .table {
                font-size: 0.9em;
            }

            .table td,
            .table th {
                padding: 8px;
            }

            .table img {
                width: 70px;
                /* Further reduce image size for very small screens */
            }

            .card-title,
            .card-description,
            .game-price {
                font-size: 0.9em;
            }
        }
    </style>
</head>

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global">
        </div>
    </div>

    <div class="main-wrapper">
        <?php include('navbar.php'); ?>

        <div class="container my-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>My Games</h2>
                <div class="action-buttons">
                    <a href="game_edit.php" class="btn btn-success" style="background:#097E52">Edit Games</a>
                </div>
            </div>
            <p>Expertly manage your game bookings</p>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Game Name</th>
                            <th>Court Type</th>
                            <th>Max Players</th>
                            <th>Duration</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($games)): ?>
                            <?php foreach ($games as $game): ?>
                                <tr>
                                    <td><img src="../admin/<?= htmlspecialchars($game['game_image']); ?>"
                                            alt="<?= htmlspecialchars($game['game_name']); ?>"></td>
                                    <td class="card-title"><?= htmlspecialchars($game['game_name']); ?></td>
                                    <td><?= htmlspecialchars($game['court_type']); ?></td>
                                    <td><?= htmlspecialchars($game['max_players']); ?></td>
                                    <td><?= htmlspecialchars($game['duration']); ?> mins</td>
                                    <td class="card-description">
                                        <?= htmlspecialchars(substr($game['game_description'], 0, 50)) . '...'; ?></td>
                                    <td class="game-price">$<?= number_format($game['price_per_person'], 2); ?></td>
                                    <td>
                                        <a href="delete_game.php?id=<?= $game['id']; ?>" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this game?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">No games found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>


        </div>

        <?php include('footer.php'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>