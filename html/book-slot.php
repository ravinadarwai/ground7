<?php
session_start();
include('../config.php'); // Ensure this contains the PDO connection setup

// Check if the user is logged in by verifying the session
if (!isset($_SESSION['userid'])) {
    echo "You are not logged in.";
    exit();
}

// Set the user ID either from the session or the URL parameter if available
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : (isset($_GET['id']) ? $_GET['id'] : null);

if ($userid === null) {
    echo "No user ID provided.";
    exit();
}

// Retrieve `bookingId`, `gameName`, and `gamePrice` from the URL parameters
$bookingId = isset($_GET['id']) ? $_GET['id'] : null;
$gameName = isset($_GET['game_name']) ? $_GET['game_name'] : null;
$gamePrice = isset($_GET['game_price']) ? $_GET['game_price'] : null;

// Validate if all required parameters are present
if ($bookingId === null || $gameName === null || $gamePrice === null) {
    echo "Missing booking details.";
    exit();
}

// Fetch the user details from the users table using either google_id or user_id
try {
    // First, attempt to find the user by google_id
    $stmt = $conn->prepare("SELECT first_name, last_name, email, phone FROM users WHERE google_id = :userid OR id = :userid");
    $stmt->execute(['userid' => $userid]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // if ($user) {
    //     // Display the user's details
    //     echo "<h3>User Details:</h3>";
    //     echo "<p>Name: " . htmlspecialchars($user['first_name']) . " " . htmlspecialchars($user['last_name']) . "</p>";
    //     echo "<p>Email: " . htmlspecialchars($user['email']) . "</p>";
    //     echo "<p>Phone: " . htmlspecialchars($user['phone']) . "</p>";
    // } else {
    //     echo "User not found.";
    // }

    // // Display the booking details
    // echo "<h3>Booking Details:</h3>";
    // echo "<p>User ID: $userid</p>";
    // echo "<p>Booking ID: $bookingId</p>";
    // echo "<p>Game Name: $gameName</p>";
    // echo "<p>Game Price: ₹$gamePrice</p>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coach-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:14:31 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Ground7</title>

    <meta name="twitter:description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
    <meta name="keywords"
        content="badminton, coaching, event, players, training, courts, tournament, athletes, courts rent, lessons, court booking, stores, sports faqs, leagues, chat, wallet, invoice">
    <meta name="author" content="Dreamguys - Ground7">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@dreamguystech">
    <meta name="twitter:title" content="Ground7 -  Booking Coaches, Venue for tournaments, Court Rental template">
    <meta name="twitter:image" content="assets/img/meta-image.jpg">
    <meta name="twitter:image:alt" content="Ground7">
    <meta property="og:url" content="https://Ground7.dreamguystech.com/">
    <meta property="og:title" content="Ground7 -  Booking Coaches, Venue for tournaments, Court Rental template">
    <meta property="og:description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand.">
    <meta property="og:image" content="../assets/img/meta-image.jpg">
    <meta property="og:image:secure_url" content="assets/img/meta-image.jpg">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .container {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .booking-date-item {
            cursor: pointer;
            padding: 10px;
            margin: 5px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .booking-date-item:hover {
            background-color: #d5d5d5;
        }

        .time-slot {
            padding: 10px;
            margin: 5px;
            background-color: #e9ecef;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }

        .time-slot:hover {
            background-color: #d9edf7;
        }
    </style>
</head>

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global" />
        </div>
    </div>

    <div class="main-wrapper venue-coach-details coach-detail">
        <?php include 'navbar.php'; ?>



        <div class="banner">
            <img src="assets/img/bg/coach-detail-bg.jpg" alt="Banner">
        </div>

        <div class="container">
            <!-- Step 1: Time & Date Selection -->
            <div class="step" id="step1">
                <section class="card mb-40">
                    <div class="text-center mb-40">
                        <h3 class="mb-1">Time & Date</h3>
                        <p class="sub-title">Book your training session at a time and date that suits your needs.</p>
                    </div>
                    <?php
                    // Include database configuration
                    include('../config.php'); // Adjust path as needed
                    
                    // Query to fetch the coach's information
                    $query = "SELECT * FROM turf_owners"; // Replace with your actual query
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $coach = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Check if data is fetched successfully
                    if ($coach) {
                        echo '<div class="dull-bg corner-radius-10 coach-info d-md-flex justify-content-start align-items-start m-5 p-5">';
                        echo '<div class="info w-100">';
                        echo '<h3 class="d-flex align-items-center justify-content-start mb-0">' . htmlspecialchars($coach['turf_name']) . '<span class="d-flex justify-content-center align-items-center"><i class="fas fa-check-double"></i></span></h3>';
                        echo '<p>' . htmlspecialchars($coach['description']) . '</p>';
                        echo '<ul class="d-sm-flex align-items-center">';
                        echo '<li><img src="assets/img/flag/india.png" alt="Icon">' . htmlspecialchars($coach['turf_location']) . '</li>';
                        echo '</ul>';
                        echo '<hr>';
                        echo '<div class="selected-game-info">';
                        echo '<h4>Selected Game: ' . htmlspecialchars($gameName) . '</h4>';
                        echo '<p>Price : ₹' . htmlspecialchars($gamePrice) . '</p>';
                        echo '</div>';
                        echo '</div>'; // Close info div
                        echo '</div>'; // Close coach-info div
                    } else {
                        echo '<p>No coach data found.</p>';
                    }
                    ?>

                    <?php
                    include '../config.php';
                    // Get the turf_id from the URL
                    $turf_id = isset($_GET['id']) ? $_GET['id'] : 26; // Default to 26 if not set
                    $sql = "SELECT date, open_time, close_time, is_holiday FROM turf_availability WHERE turf_id = :turf_id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':turf_id', $turf_id, PDO::PARAM_INT);
                    $stmt->execute();

                    $availability = [];
                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            if ($row['is_holiday'] == 1) {
                                $availability[$row['date']] = "Holiday";
                                continue;
                            }

                            $open_time = strtotime($row['open_time']);
                            $close_time = strtotime($row['close_time']);
                            $slots = [];

                            while ($open_time < $close_time) {
                                $slot_start = date("g:i A", $open_time);
                                $open_time = strtotime('+1 hour', $open_time);
                                $slot_end = date("g:i A", $open_time);
                                $slots[] = $slot_start . ' - ' . $slot_end;
                            }

                            $availability[$row['date']] = $slots;
                        }
                    } else {
                        echo "No data found for the provided turf ID.";
                    }
                    ?>

                    <div class="row text-center">
                        <div class="col-12">
                            <div class="card time-date-card">
                                <section class="booking-date">
                                    <h3 class="mb-1" style="padding: 30px;">Select Your Slots</h3>
                                    <div class="list-unstyled owl-carousel date-slider owl-theme mb-40"
                                        id="date-slider">
                                        <?php foreach ($availability as $date => $slots): ?>
                                            <?php
                                            $dayOfWeek = date("l", strtotime($date));
                                            ?>
                                            <div class="item date-item" data-date="<?= $date ?>"
                                                data-day="<?= $dayOfWeek ?>">
                                                <button class="btn btn-primary"><?= $dayOfWeek . ', ' . $date ?></button>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="row" id="time-slots">
                                        <!-- Time slots will be injected here based on date selection -->
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>

                    <form id="selectionForm" method="POST" action="">
                        <input type="hidden" id="selectedDate" name="selectedDate">
                        <input type="hidden" id="selectedSlot" name="selectedSlot">
                        <button type="button" class="btn btn-primary" onclick="nextStep(2)">Confirm Selection</button>
                    </form>
                </section>
            </div>
            <script>
                // Function to handle date and slot selection
                document.querySelectorAll('.date-item button').forEach(function (button) {
                    button.addEventListener('click', function () {
                        // Get selected date and day
                        const selectedDate = this.getAttribute('data-date');
                        const selectedDay = this.getAttribute('data-day');

                        // Update the booking confirmation section
                        document.getElementById('confirmationDate').textContent = `${selectedDay}, ${selectedDate}`;

                        // Show the time slots for the selected date
                        const selectedSlots = document.querySelector(`[data-date='${selectedDate}']`).dataset.slots;
                        const slotContainer = document.getElementById('time-slots');
                        slotContainer.innerHTML = ''; // Clear previous slots

                        selectedSlots.forEach(function (slot) {
                            const slotDiv = document.createElement('div');
                            slotDiv.classList.add('slot-item');
                            slotDiv.textContent = slot;
                            slotContainer.appendChild(slotDiv);
                        });

                        // Handle time slot selection and update
                        slotContainer.addEventListener('click', function (e) {
                            if (e.target.classList.contains('slot-item')) {
                                const selectedSlot = e.target.textContent;
                                document.getElementById('confirmationSlot').textContent = selectedSlot;
                                document.getElementById('selectedSlot').value = selectedSlot;
                            }
                        });
                    });
                });
            </script>


            <!-- Step 2: Booking Confirmation -->
            <div class="step" id="step2" style="display: none;">
                <section class="card booking-order-confirmation">
                    <h5 class="mb-3">Booking Details</h5>

                    <ul class="booking-info d-lg-flex justify-content-start align-items-center">
                        <li>
                            <h6>Coach Name</h6>
                            <p><?php echo htmlspecialchars($coach['turf_name']); ?></p>
                        </li>
                        <li>
                            <h6>Booking Date</h6>
                            <p id="confirmationDate">Date not selected</p> <!-- Will be updated dynamically -->
                        </li>
                        <li>
                            <h6>Selected Time Slot</h6>
                            <p id="confirmationSlot">Slot not selected</p> <!-- Will be updated dynamically -->
                        </li>
                    </ul>
                    <?php
                    // Assuming you have the user and game price data available
                    $userPhone = htmlspecialchars($user['phone']); // Get the user's phone number
                    $gamePriceInPaise = $gamePrice * 100; // Convert price to paise (Razorpay expects the amount in paise)
                    
                    // Make sure $gamePrice is numeric before multiplying
                    if (!is_numeric($gamePrice)) {
                        $gamePriceInPaise = 0; // Default to 0 if the price isn't valid
                    }
                    ?>

                    <h5 class="mb-3">Contact Information</h5>
                    <?php if ($user) { ?>
                        <ul class="contact-info d-lg-flex justify-content-start align-items-center">
                            <?php
                            // Check if user has first and last name
                            if (!empty($user['first_name']) && !empty($user['last_name'])) {
                                echo "<li><h6>Name</h6><p>" . htmlspecialchars($user['first_name']) . " " . htmlspecialchars($user['last_name']) . "</p></li>";
                            } else {
                                echo "<li><h6>Name</h6><p>Update your profile</p></li>";
                            }
                            ?>
                            <li>
                                <h6>Contact Email Address</h6>
                                <p><?php echo htmlspecialchars($user['email']); ?></p>
                            </li>
                            <li>
                                <h6>Phone Number</h6>
                                <p><?php echo htmlspecialchars($user['phone']); ?></p>
                            </li>
                        </ul>
                    <?php } else {
                        echo "User not found.";
                    } ?>

                    <h5 class="mb-3">Payment Information</h5>
                    <ul class="payment-info d-lg-flex justify-content-start align-items-center">
                        <li>
                            <h6>Game Name</h6>
                            <p class="primary-text"><?php echo htmlspecialchars($gameName); ?></p>
                        </li>
                        <li>
                            <h6>Price</h6>
                            <p class="primary-text"><?php echo htmlspecialchars($gamePrice); ?></p>
                        </li>
                    </ul>

                    <div class="text-center btn-row">
                        <button class="btn btn-primary me-3 btn-icon" onclick="prevStep(1)">
                            <i class="feather-arrow-left-circle me-1"></i> Back
                        </button>
                        <div class="d-grid btn-block">
                            <button type="button" class="btn btn-primary" id="rzp-button1">Proceed with
                                ₹<?php echo $gamePrice; ?></button>
                        </div>
                    </div>
                </section>
            </div>
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            <script>
                var options = {
                    "key": "rzp_test_uxKdzs7v17Ts4S", // Enter the Key ID generated from the Dashboard
                    "amount": "<?php echo $gamePriceInPaise; ?>", // Amount is in paise (100 paise = 1 INR)
                    "currency": "INR", // Assuming game price is in INR
                    "name": "Dreamsport",
                    "description": "Payment for booking",
                    "image": "https://example.com/your_logo", // Change to your logo URL
                    "order_id": "", // This should be populated with the Razorpay order ID after creating an order
                    "handler": function (response) {
                        alert(response.razorpay_payment_id);
                        alert(response.razorpay_order_id);
                        alert(response.razorpay_signature);
                    },
                    "prefill": {
                        "name": "<?php echo htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']); ?>", // User's full name
                        "email": "<?php echo htmlspecialchars($user['email']); ?>", // User's email
                        "contact": "<?php echo $userPhone; ?>" // User's phone number
                    },
                    "notes": {
                        "address": "Razorpay Corporate Office"
                    },
                    "theme": {
                        "color": "#F37254" // Customize the theme color
                    }
                };

                var rzp1 = new Razorpay(options);
                document.getElementById('rzp-button1').onclick = function (e) {
                    rzp1.open();
                    e.preventDefault();
                };
            </script>


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


        </div>
    </div>
    <!-- PHP Processing Logic -->
    <!-- <script>
        let selectedSlot = null;

        function showAvailability(day) {
            const availability = getAvailability(day);

            const timeSlotsContainer = document.getElementById('time-slots');
            timeSlotsContainer.innerHTML = '';

            availability.forEach((slot) => {
                const timeSlot = document.createElement('div');
                timeSlot.className = 'col-12 col-sm-4 col-md-3';
                timeSlot.innerHTML = `
                <div class="time-slot ${slot.isAvailable ? '' : 'active'}" onclick="selectSlot('${slot.time}')">
                    <span>${slot.time}</span>
                    <i class="fa-regular fa-check-circle"></i>
                </div>
            `;
                timeSlotsContainer.appendChild(timeSlot);
            });
        }

        function selectSlot(time) {
            selectedSlot = time;
            const timeSlots = document.querySelectorAll('.time-slot');
            timeSlots.forEach((slot) => {
                slot.classList.remove('selected');
                if (slot.querySelector('span').textContent === time) {
                    slot.classList.add('selected');
                }
            });
        }

        function validateSelection() {
            if (selectedSlot === null) {
                alert('Please select a time slot');
                return false;
            }
            return true;
        }

        function getAvailability(day) {
            const availability = [{
                    time: '2:00 PM',
                    isAvailable: true
                },
                {
                    time: '3:00 PM',
                    isAvailable: false
                },
                {
                    time: '4:00 PM',
                    isAvailable: true
                },
            ];
            return availability;
        }
    </script> -->

    <script>
    document.getElementById('rzp-button1').onclick = function (e) {
        // Collect necessary data for the booking
        var bookingData = {
            razorpay_payment_id: 'razorpay_payment_id_placeholder', // Replace with actual Razorpay payment ID after successful payment
            razorpay_order_id: 'razorpay_order_id_placeholder', // Replace with actual Razorpay order ID
            razorpay_signature: 'razorpay_signature_placeholder', // Replace with actual Razorpay signature
            user_id: <?php echo $user['id']; ?>, // Pass the logged-in user's ID
            game_id: <?php echo $gameId; ?>, // Pass the selected game ID
            booking_date: document.getElementById('confirmationDate').textContent,
            selected_slot: document.getElementById('confirmationSlot').textContent
        };

        // Send the data to the backend (payment_success.php) for processing
        fetch('payment_success.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams(bookingData)
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Show the response message (success/failure)
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Something went wrong. Please try again.');
        });
        
        // Prevent default form submission
        e.preventDefault();
    };
</script>

    <script>

        
        function scrollToSection(id) {
            const element = document.getElementById(id);
            if (element) {
                window.scrollTo({
                    top: element.offsetTop,
                    behavior: 'smooth'
                });
            }
        }
    </script>
    <script>
        let selectedDate = "null";
        let selectedSlot = "null";

        // Handle Date Selection
        document.querySelectorAll('.date-item').forEach(function (dateButton) {
            dateButton.addEventListener('click', function () {
                selectedDate = this.getAttribute('data-date');
                document.getElementById("confirmationSlot").textContent = `${selectedDate}`
                console.log('Selected Date:', selectedDate);
                showTimeSlots(selectedDate);
            });
        });

        // Function to show time slots for the selected date
        function showTimeSlots(date) {
            const timeSlotsContainer = document.getElementById('time-slots');
            timeSlotsContainer.innerHTML = ''; // Clear previous slots

            // Example of slot data for the selected date (replace this with actual dynamic data)
            const slots = <?php echo json_encode($availability); ?>;

            if (slots[date] === "Holiday") {
                timeSlotsContainer.innerHTML = `<p>No slots available for this date. It's a holiday.</p>`;
            } else {
                slots[date].forEach(function (slot) {
                    const slotDiv = document.createElement('div');
                    slotDiv.classList.add('col-md-3', 'slot');
                    slotDiv.innerHTML = `<button class="btn btn-secondary slot-btn" data-slot="${slot}">${slot}</button>`;
                    timeSlotsContainer.appendChild(slotDiv);
                });
            }
        }

        // Handle Time Slot Selection
        document.addEventListener('click', function (event) {
            if (event.target && event.target.classList.contains('slot-btn')) {
                if (!event.target.disabled) {
                    event.target.disabled = true;
                    event.target.classList.add('disabled');
                    event.target.innerHTML = 'Booked';
                    selectedSlot = event.target.getAttribute('data-slot');
                    document.getElementById("confirmationDate").textContent = `${selectedSlot}`
                    console.log('Selected Slot:', selectedSlot);
                }
            }
        });

    </script>
    <script>


        // Slot selection
        // Handle Time Slot Selection
        document.addEventListener('click', function (event) {
            if (event.target && event.target.classList.contains('slot-btn')) {
                if (!event.target.disabled) {
                    event.target.disabled = true;
                    event.target.classList.add('disabled');
                    event.target.innerHTML = 'Booked...';

                    // Make an AJAX request to mark the slot as booked (or use a form submission)
                    const slotTime = event.target.getAttribute('data-slot');
                    const date = selectedDate;

                    // Example of AJAX request (using Fetch API)
                    fetch('book_slot.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ date, slot: slotTime })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Your booking has been confirmed!');
                            } else {
                                alert('Error booking the slot.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('There was an error with your booking.');
                        });
                }
            }
        });


        function submitSelection() {
            if (selectedDate && selectedSlot) {
                // Set hidden input values for form submission
                document.getElementById('selectedDate').value = selectedDate;
                document.getElementById('selectedSlot').value = selectedSlot;

                // Dynamically update the second step UI
                document.getElementById('confirmationDate').textContent = selectedDate;
                document.getElementById('confirmationSlot').textContent = selectedSlot;

                // Display the second step and hide the first step
                document.getElementById('step1').style.display = 'none';  // Hide first step
                document.getElementById('step2').style.display = 'block'; // Show second step
            } else {
                alert('Please select both a date and a time slot.');
            }
        }

    </script>
    <script>
        function nextStep(stepNumber) {
            document.querySelectorAll('.step').forEach(step => step.style.display = 'none');
            document.getElementById(`step${stepNumber}`).style.display = 'block';
        }

        function prevStep(stepNumber) {
            document.querySelectorAll('.step').forEach(step => step.style.display = 'none');
            document.getElementById(`step${stepNumber}`).style.display = 'block';
        }


        function submitForm() {
            alert("Form Submitted Successfully!");
            // Place your form submission logic here.
        }
    </script>

    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js" type="e06bcb4dc914a7bea883db46-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="e06bcb4dc914a7bea883db46-text/javascript"></script>

    <script src="assets/plugins/owl-carousel/owl.carousel.min.js"
        type="e06bcb4dc914a7bea883db46-text/javascript"></script>

    <script src="assets/plugins/select2/js/select2.min.js" type="e06bcb4dc914a7bea883db46-text/javascript"></script>

    <script src="assets/plugins/fancybox/jquery.fancybox.min.js"
        type="e06bcb4dc914a7bea883db46-text/javascript"></script>

    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"
        type="e06bcb4dc914a7bea883db46-text/javascript"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"
        type="e06bcb4dc914a7bea883db46-text/javascript"></script>

    <script src="assets/js/script.js" type="e06bcb4dc914a7bea883db46-text/javascript"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="e06bcb4dc914a7bea883db46-|49" defer></script>
</body>

<!-- Mirrored from coach-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:14:56 GMT -->

</html>