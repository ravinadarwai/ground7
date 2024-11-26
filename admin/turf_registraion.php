<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Ground7 - Turf Registration</title>

    <meta name="description" content="Register as a coach with Ground7 and start your sports journey.">
    <meta name="keywords" content="coach registration, badminton, sports, Ground7">
    <link rel="shortcut icon" type="turf_image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
            /* Light background color for contrast */
        }

        .form-container {
            background: #ffffff;
            /* White background for the form */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px 0;
        }

        .step {
            display: none;
            /* Hide all steps initially */
        }

        .step.active {
            display: block;
            /* Show the active step */
        }

        .btn {
            margin-top: 10px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="file"],
        input[type="time"],
        input[type="password"] {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            margin: 5px 0 20px 0;
            /* Space between fields */
        }

        h2 {
            margin-bottom: 20px;
        }

        .btn {
            background-color: #AAF40C;

            color: #000;
        }

        .shadow-card p .gredient {
            background: linear-gradient(to right, #28CF20 0%, #5CCFAB 100%);
            -webkit-background-clip: text;
            color: transparent;
        }


        .button {
            all: unset;
            display: flex;
            align-items: center;
            position: relative;
            padding: 0.3em 1.6em;
            border: #097E52 solid 0.15em;
            border-radius: 0.25em;
            color: #097E52;
            font-size: 1.5em;
            font-weight: 600;
            cursor: pointer;
            overflow: hidden;
            transition: border 300ms, color 300ms;
            user-select: none;
        }

        .button p {
            z-index: 1;
        }

        .button:hover {
            color: #fff;
        }

        .button:active {
            border-color: teal;
        }

        .button::after,
        .button::before {
            content: "";
            position: absolute;
            width: 9em;
            aspect-ratio: 1;
            background: mediumspringgreen;
            opacity: 50%;
            border-radius: 50%;
            transition: transform 500ms, background 300ms;
        }

        .button::before {
            left: 0;
            transform: translateX(-8em);
        }

        .button::after {
            right: 0;
            transform: translateX(8em);
        }

        .button:hover:before {
            transform: translateX(-1em);
        }

        .button:hover:after {
            transform: translateX(1em);
        }

        .button:active:before,
        .button:active:after {
            background: teal;
        }
    </style>
</head>

<body>
    <div id="global-loader">
        <div class="loader-img">
            <img src="assets/img/ball-loader.png" class="img-fluid" alt="Global">
        </div>
    </div>

    <div class="main-wrapper authendication-pages m-1">
        <div class="content">
            <div class="container wrapper no-padding">
                <div class="row no-margin vph-100">
                    <div class="col-lg-6 no-padding">
                        <div class="banner-bg register">
                            <div class="h-100 d-flex justify-content-center align-items-center">
                                <div class="text-bg register text-center">
                                    <button type="button" class="btn btn-limegreen text-capitalize"><i class="fa-solid fa-thumbs-up me-3"></i>Register Now</button>
                                    <p>Register now as Turf Owner and be a part of Ground7.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 no-padding">
                        <div class="dull-pg">
                            <div class="d-flex align-items-center justify-content-center vph-100">
                                <div class="col-lg-10 mx-auto">
                                    <header class="text-center">
                                        <a href="index.html">
                                            <img style="height: 11dvh;width: 6rem; object-fit: cover;margin-left: 3rem;" src="../html/assets/img/Group 100.svg"
                                                class="img-fluid" alt="Logo" />
                                        </a>
                                    </header>
                                    <div class="shadow-card">
                                        <h2>Turf Registration</h2>
                                        <p>Start your journey as a Turf owner with <span class="gredient">Ground7</span>.</p>




                                        <div class="form-container">
                                            <form id="registrationForm" method="POST" action="registrationform.php" enctype="multipart/form-data">
                                                <!-- Step 1: Turf Details -->
                                                <div class="step active" id="turfDetails">
                                                    <h2>Turf Details</h2>
                                                    <label for="turf_name">Turf Name:</label>
                                                    <input type="text" name="turf_name" placeholder="Enter Name" required>

                                                    <label for="turf_location">Turf Location:</label>
                                                    <input type="text" name="turf_location" placeholder="Enter Turf Location" required>


                                                    <label for="turf_area">Turf Area (in sq. meters):</label>
                                                    <input type="text" placeholder="1200*1200" name="turf_area" required>

                                                    <label for="grounds_number">Number of Grounds:</label>
                                                    <input type="number" name="grounds_number" placeholder="1" required>

                                                    <label for="open_time">Open Time:</label>
                                                    <div style="display: flex; align-items: center;">
                                                        <input type="time" name="open_time" required>
                                                        <select name="open_time_period" required style="margin-left: 5px; padding: 5px; border: 1px solid #ced4da; border-radius: 5px; width: 100px;">
                                                            <option value="AM" style="padding: 5px;">AM</option>
                                                            <option value="PM" style="padding: 5px;">PM</option>
                                                        </select>
                                                    </div>

                                                    <label for="close_time">Close Time:</label>
                                                    <div style="display: flex; align-items: center;">
                                                        <input type="time" name="close_time" required>
                                                        <select name="open_time_period" required style="margin-left: 5px; padding: 5px; border: 1px solid #ced4da; border-radius: 5px; width: 100px;">
                                                            <option value="AM" style="padding: 5px;">AM</option>
                                                            <option value="PM" style="padding: 5px;">PM</option>
                                                        </select>
                                                    </div>

                                                    <label for="turf_image">Turf Image:</label>
                                                    <input type="file" name="turf_image" required>

                                                    <label for="description" style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 10px;">Turf Description:</label>
                                                    <textarea name="description" placeholder="Enter Turf Description" required style="width: 100%; height: 150px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;"></textarea>

                                                    <button type="button" class=" button btn-limegreen" onclick="nextStep('turfDetails', 'ownerDetails')">Next</button>

                                                </div>

                                                <!-- Step 2: Owner Details -->
                                                <div class="step" id="ownerDetails">
                                                    <h2>Owner Details</h2>
                                                    <label for="owner_name">Owner Name:</label>
                                                    <input type="text" name="owner_name" placeholder="Enter Owner Name" required>

                                                    <label for="owner_email">Owner Email:</label>
                                                    <input type="email" name="owner_email" placeholder="Enter Owner Email" required>

                                                    <label for="owner_contact">Owner Contact:</label>
                                                    <input type="text" name="owner_contact" placeholder="Enter Owner Contact" required>

                                                    <label for="owner_address">Owner Address:</label>
                                                    <input type="text" name="owner_address" placeholder="Enter Owner Address" required>


                                                    <label for="owner_aadhar">Owner Aadhar Card Number:</label>
                                                    <input type="text" name="owner_aadhar" placeholder="Enter Aadhar Number" required pattern="^\d{12}$" title="Aadhar number must be 12 digits" />

                                                    <label for="owner_image">Upload Owner Image:</label>
                                                    <input type="file" name="owner_image" accept="image/*" required>

                                                    <button type="button" class="button" onclick="nextStep('ownerDetails', 'userDetails')">Next</button>
                                                </div>

                                                <!-- Step 3: User Credentials -->
                                                <div class="step" id="userDetails">
                                                    <h2>User Credentials</h2>
                                                    <label for="username">Username:</label>
                                                    <input type="text" name="username" placeholder="Enter User Name" required>

                                                    <label for="email">Email:</label>
                                                    <input type="email" name="email" placeholder="Enter User Email" required>

                                                    <div style="position: relative; width: 100%;">
                                                        <label for="password">Password:</label>
                                                        <input type="password" name="password" placeholder="Enter Password" required style="padding-right: 30px;">
                                                        <i class="fa-solid fa-eye" id="passwordEye" onclick="togglePassword()" style="position: absolute; top: 59%; right: 10px; transform: translateY(-50%); cursor: pointer;"></i>
                                                    </div>
                                                    <button type="button" class="button" onclick="proceedToPayment()">Proceed to Payment</button>

                                                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    function togglePassword() {
        const passwordInput = document.querySelector('input[name="password"]');
        const passwordEye = document.getElementById('passwordEye');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordEye.classList.remove('fa-eye');
            passwordEye.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordEye.classList.remove('fa-eye-slash');
            passwordEye.classList.add('fa-eye');
        }
    }

    function proceedToPayment() {
        // Gather user data
        const username = document.querySelector('input[name="username"]').value;
        const email = document.querySelector('input[name="email"]').value;
        const amount = 500 * 100; // Example amount in paise (₹500.00)

        const options = {
            key: "rzp_test_lhmCfPyu3URHxq", // Replace with your Razorpay Key ID
            amount: amount,
            currency: "INR",
            name: username,
            description: "Registration Payment",
            image: "https://your-logo-url.png", // Replace with your logo URL
            handler: function (response) {
                // After successful payment, redirect the user
                window.location.href = "success.php?payment_id=" + response.razorpay_payment_id;
            },
            prefill: {
                name: username,
                email: email,
            },
            theme: {
                color: "#3399cc",
            },
        };

        const razorpay = new Razorpay(options);
        razorpay.open();
    }
</script>
                                                </div>
                                            </form>


                                        </div>

                                        <script>
                                            function nextStep(currentStep, nextStep) {
                                                const inputs = document.querySelectorAll(`#${currentStep} input[required]`);
                                                let allFilled = true;
                                                inputs.forEach(input => {
                                                    if (!input.value) {
                                                        allFilled = false;
                                                        input.classList.add('is-invalid');
                                                    } else {
                                                        input.classList.remove('is-invalid');
                                                    }
                                                });

                                                if (allFilled) {
                                                    document.getElementById(currentStep).classList.remove('active');
                                                    document.getElementById(nextStep).classList.add('active');
                                                }
                                            }

                                            function previousStep(currentStep, previousStep) {
                                                document.getElementById(currentStep).classList.remove('active');
                                                document.getElementById(previousStep).classList.add('active');
                                            }
                                        </script>
                                    </div>
                                    <div class="bottom-text text-center">
                                        <p>Already have an account? <a href="turf_login.php">Login!</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/js/jquery-3.7.0.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script src="assets/js/script.js"></script>
</body>

</html>