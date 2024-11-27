<?php
session_start();
include('../config.php'); // Ensure this contains the PDO connection setup
// Check if the user is logged in by verifying the session
if (!isset($_SESSION['userid'])) {
}

// Set the user ID either from the session or the URL parameter if available
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : (isset($_GET['id']) ? $_GET['id'] : null);

if ($userid === null) {
    echo "No user ID provided.";
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
                    <div class="master-academy dull-whitesmoke-bg card">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <div class="d-sm-flex justify-content-start align-items-center">
                                <a href="javascript:void(0);"><img class="corner-radius-10"
                                        src="assets/img/profiles/avatar-02.png" alt="User" /></a>
                                <div class="info">
                                    <div class="d-flex justify-content-start align-items-center mb-3">
                                        <span
                                            class="text-white dark-yellow-bg color-white me-2 d-flex justify-content-center align-items-center">4.5</span>
                                        <span>300 Reviews</span>
                                    </div>
                                    <h3 class="mb-2">Kevin Anderson</h3>
                                    <p>Certified Badminton Coach with a deep understanding of the sport's strategies.
                                    </p>
                                </div>
                            </div>
                            <div class="white-bg">
                                <p class="mb-1">Starts From</p>
                                <h3 class="d-inline-block primary-text mb-0">$150</h3>
                                <span>/hr</span>
                            </div>
                        </div>
                    </div>
                    <?php
include '../config.php';

// Get the turf_id from the URL
$turf_id = isset($_GET['id']) ? $_GET['id'] : 26; // Default to 26 if not set

// Prepare the SQL query
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
            $slots[] = $slot_start . ' - ' . $slot_end; // Slot in start time - end time format
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
                <div class="list-unstyled owl-carousel date-slider owl-theme mb-40" id="date-slider">
                    <?php foreach ($availability as $date => $slots): ?>
                        <?php
                            // Get the day of the week
                            $dayOfWeek = date("l", strtotime($date));
                        ?>
                        <div class="item date-item" data-date="<?= $date ?>" data-day="<?= $dayOfWeek ?>">
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


<script>
    // Add an event listener to each date button to load the time slots
    document.querySelectorAll('.date-item').forEach(function(dateButton) {
    dateButton.addEventListener('click', function() {
        var date = this.getAttribute('data-date');
        var timeSlotsContainer = document.getElementById('time-slots');
        timeSlotsContainer.innerHTML = ''; // Clear previous slots

        <?php foreach ($availability as $date => $slots): ?>
            if (date === '<?= $date ?>') {
                <?php if ($slots === 'Holiday'): ?>
                    timeSlotsContainer.innerHTML = "<p>No slots available for this date. It's a holiday.</p>";
                <?php else: ?>
                    <?php foreach ($slots as $slot): ?>
                        var slotDiv = document.createElement('div');
                        slotDiv.classList.add('col-md-3', 'slot');
                        slotDiv.innerHTML = '<button class="btn btn-secondary slot-btn" data-slot="<?= $slot ?>"><?= $slot ?></button>';
                        timeSlotsContainer.appendChild(slotDiv);
                    <?php endforeach; ?>
                <?php endif; ?>
            }
        <?php endforeach; ?>
    });
});

// Disable slot button after it is clicked and keep it disabled if clicked again
document.addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('slot-btn')) {
        if (!event.target.classList.contains('disabled')) {
            event.target.disabled = true;
            event.target.classList.add('disabled');
            event.target.innerHTML = 'Booked'; // Change text to show it's booked
        }
    }
});
</script>


                    <script>

                        // Function to dynamically generate all days of the current month
                        function generateDates() {
                            const dateSlider = document.getElementById("date-slider");
                            const today = new Date();

                            for (let i = 0; i < 30; i++) { // Generate dates for the next 30 days
                                const date = new Date();
                                date.setDate(today.getDate() + i);

                                const formattedDate = date.toISOString().split("T")[0]; // YYYY-MM-DD format
                                const dayName = date.toLocaleString("default", { weekday: "long" });
                                const monthName = date.toLocaleString("default", { month: "short" });

                                const dayItem = document.createElement("div");
                                dayItem.classList.add("booking-date-item");
                                dayItem.dataset.date = formattedDate;
                                dayItem.innerHTML = `
            <h6>${dayName}</h6>
            <p>${monthName} ${date.getDate()}</p>`;
                                dayItem.addEventListener("click", () => showTimeSlots(formattedDate));
                                dateSlider.appendChild(dayItem);
                            }
                        }
                        generateDates();


                        // Function to show time slots for the selected day
                        function showTimeSlots(date) {
                            const timeSlotsContainer = document.getElementById("time-slots");
                            timeSlotsContainer.innerHTML = ""; // Clear previous slots

                            // Fetch available slots from the backend
                            fetch(`get_slots.php?date=${date}&turf_id=1`) // Replace '1' with the actual turf ID
                                .then(response => response.json())
                                .then(slots => {
                                    if (slots.length === 0) {
                                        timeSlotsContainer.innerHTML = `
                    <div class="col-12"><p>No slots available for the selected date.</p></div>`;
                                    } else {
                                        slots.forEach(slot => {
                                            const slotItem = document.createElement("div");
                                            slotItem.classList.add("col-12", "col-sm-4", "col-md-3");
                                            slotItem.innerHTML = `
                        <div class="time-slot">
                            <span>${slot}</span><i class="fa-regular fa-check-circle"></i>
                        </div>`;
                                            timeSlotsContainer.appendChild(slotItem);
                                        });
                                    }
                                })
                                .catch(err => {
                                    console.error("Error fetching slots:", err);
                                });
                        }


                        // Call the function to populate the dates
                        generateDates();
                    </script>

                    <div class="text-center btn-row">
                        <button class="btn btn-primary btn-icon" onclick="nextStep(2)">Next <i
                                class="feather-arrow-right-circle ms-1"></i></button>
                    </div>
                </section>
            </div>

            <!-- Step 2: Booking Confirmation -->
            <div class="step" id="step2" style="display: none;">
                <section class="card booking-order-confirmation">
                    <h5 class="mb-3">Booking Details</h5>
                    <ul class="booking-info d-lg-flex justify-content-start align-items-center">
                        <li>
                            <h6>Coach Name</h6>
                            <p>Kevin Anderson</p>
                        </li>
                        <li>
                            <h6>Appointment Date</h6>
                            <p>Mon, Apr 27</p>
                        </li>
                        <li>
                            <h6>Appointment Start time</h6>
                            <p>05:25 AM</p>
                        </li>
                        <li>
                            <h6>Appointment End time</h6>
                            <p>06:25 AM</p>
                        </li>
                    </ul>
                    <h5 class="mb-3">Contact Information</h5>
                    <ul class="contact-info d-lg-flex justify-content-start align-items-center">
                        <li>
                            <h6>Name</h6>
                            <p>Rodick Tramliar</p>
                        </li>
                        <li>
                            <h6>Contact Email Address</h6>
                            <p>[email&#160;protected]</p>
                        </li>
                        <li>
                            <h6>Phone Number</h6>
                            <p>+1 56565 556558</p>
                        </li>
                    </ul>
                    <h5 class="mb-3">Payment Information</h5>
                    <ul class="payment-info d-lg-flex justify-content-start align-items-center">
                        <li>
                            <h6>Coach Price</h6>
                            <p class="primary-text">($150 * 3 hours)</p>
                        </li>
                        <li>
                            <h6>Subtotal</h6>
                            <p class="primary-text">$350.00</p>
                        </li>
                    </ul>
                    <div class="text-center btn-row">
                        <button class="btn btn-primary me-3 btn-icon" onclick="prevStep(1)"><i
                                class="feather-arrow-left-circle me-1"></i> Back</button>
                        <button class="btn btn-secondary btn-icon" onclick="nextStep(3)">Next <i
                                class="feather-arrow-right-circle ms-1"></i></button>
                    </div>
                </section>
            </div>

            <!-- Step 3: Payment -->
            <div class="step" id="step3" style="display: none;">
                <section>
                    <div class="text-center mb-40">
                        <h3 class="mb-1">Payment</h3>
                        <p class="sub-title">Securely make your payment for the booking. Contact support for assistance.
                        </p>
                    </div>
                    <div class="row checkout">
                        <div class="col-12 col-lg-7">
                            <div class="card booking-details">
                                <h3 class="border-bottom">Order Summary</h3>
                                <ul>
                                    <li><i class="feather-calendar me-2"></i>27, April 2023</li>
                                    <li><i class="feather-clock me-2"></i>05:00 PM to 07:00 PM</li>
                                    <li><i class="feather-users me-2"></i>Total Hours : 3 Hrs</li>
                                </ul>
                            </div>
                            <div style="text-align: center;">
                                <img src="assets/img/sports-stadium_18181639.gif" alt="Payment Animation"
                                    style="max-width: 60%; height: auto; object-fit: cover;">
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <aside class="card payment-modes">
                                <h3 class="border-bottom">Checkout</h3>
                                <div class="radio" style="text-align: center;">
                                    <img src="assets/img/money_17110647.gif" alt="Payment Animation"
                                        style="width: 40%; max-width: 50%; height: auto; object-fit: cover;">
                                    <img src="assets/img/happy_11186841.gif" alt="Payment Animation"
                                        style="width: 30%; max-width: 30%; height: auto; object-fit: cover;">
                                </div>
                                <hr />
                                <ul class="order-sub-total">
                                    <li>
                                        <p>Sports</p>
                                        <h6>Cricket</h6>
                                    </li>
                                    <li>
                                        <p>Total Slot(S) Base Price</p>
                                        <h6>₹2,400</h6>
                                    </li>
                                    <li>
                                        <p>Service charge</p>
                                        <h6>+₹48</h6>
                                    </li>
                                </ul>
                                <div class="order-total d-flex justify-content-between align-items-center">
                                    <h5>Order Total</h5>
                                    <h5>₹2448</h5>
                                </div>
                                <div class="form-check d-flex justify-content-start align-items-center policy">
                                    <div class="d-inline-block"><input class="form-check-input" type="checkbox" value
                                            id="policy" /></div>
                                    <label class="form-check-label" for="policy">By clicking 'Send Request', I agree to
                                        Dreamsport <a href="privacy-policy.html">Privacy Policy</a> and <a
                                            href="terms-condition.html">Terms of Use</a></label>
                                </div>
                                <div class="d-grid btn-block">
                                    <button type="button" class="btn btn-primary" id="rzp-button1">Proceed $200</button>
                                </div>
                            </aside>
                        </div>
                        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                        <script>
                            var options = {
                                "key": "rzp_test_6Z0qG8Q5GjXmzZ", // Enter the Key ID generated from the Dashboard
                                "amount": "20000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                "currency": "USD",
                                "name": "Dreamsport",
                                "description": "Payment for booking",
                                "image": "https://example.com/your_logo",
                                "order_id": "", //This is a sample Order ID. Pass the id obtained in the response of Step 1
                                "handler": function (response) {
                                    alert(response.razorpay_payment_id);
                                    alert(response.razorpay_order_id);
                                    alert(response.razorpay_signature);
                                },
                                "prefill": {
                                    "name": "",
                                    "email": "",
                                    "contact": ""
                                },
                                "notes": {
                                    "address": "Razorpay Corporate Office"
                                },
                                "theme": {
                                    "color": "#F37254"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            document.getElementById('rzp-button1').onclick = function (e) {
                                rzp1.open();
                                e.preventDefault();
                            }
                        </script>
                    </div>
                    <div class="text-center btn-row">
                        <button class="btn btn-primary me-3 btn-icon" onclick="prevStep(2)"><i
                                class="feather-arrow-left-circle me-1"></i> Back</button>
                    </div>
                </section>
            </div>
        </div>

        <script>
            function nextStep(stepNumber) {
                document.querySelectorAll('.step').forEach(step => step.style.display = 'none');
                document.getElementById(step${ stepNumber }).style.display = 'block';
            }

            function prevStep(stepNumber) {
                document.querySelectorAll('.step').forEach(step => step.style.display = 'none');
                document.getElementById(step${ stepNumber }).style.display = 'block';
            }

            function submitForm() {
                alert("Form Submitted Successfully!");
                // Place your form submission logic here.
            }
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