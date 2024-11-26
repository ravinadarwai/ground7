<!DOCTYPE html>
<html lang="en">

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

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(90deg, rgba(11, 98, 115, 1) 0%, rgba(22, 123, 131, 1) 35%, rgba(74, 166, 127, 1) 100%);
            ;
            color: #fff;
            scroll-behavior: smooth;
        }


        .container {
            display: flex;
            flex-direction: column;
        }

        .logo-lapy {
            display: none;
            position: absolute;
            right: -5px;
            top: 20px;
        }

        @media (max-width:480px) {
            .logo-responsive {
                display: none;
            }

            .logo-lapy {
                display: block;
                right: 0px;
                top: 10px;
            }
        }


        /* Sidebar styling */
        .sidebar-container {
            position: relative;
        }

        .sidebar {

            width: 250px;
            background-color: rgba(0, 0, 0, .4);
            backdrop-filter: blur(100px);
            -webkit-backdrop-filter: blur(10px);
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 1000;
        }

        .sidebar img {
            width: 100px;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            color: #fff;
            text-decoration: none;
            margin-bottom: 20px;
            font-size: 18px;
        }

        @media(max-width:480px) {
            .sidebar {
                padding-top: 4rem;
            }
        }

        .sidebar a i {
            margin-right: 10px;
        }

        /* Toggle button for smaller screens */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 2px;
            left: 5px;
            font-size: 30px;
            background: none;
            color: #fff;
            border: none;
            cursor: pointer;
            z-index: 1001;
            /* Ensure it's above the sidebar */
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                display: none;
                /* Initially hide the sidebar */
                position: fixed;
            }

            .sidebar-toggle {
                display: block;
                /* Show the toggle button */
            }

            .sidebar.show {
                display: flex;
                /* Show the sidebar when it's toggled */
            }

            .sidebar a {
                font-size: 16px;
            }
        }



        .main-content {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;

        }



        .post {
            background-color: rgba(0, 0, 0, .4);
            backdrop-filter: blur(100px);
            border-radius: 30px;
            -webkit-backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .post img {
            width: 100%;
            border-radius: 10px;
        }

        .post .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .post .post-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .post .post-header .post-user {
            font-size: 16px;
        }

        .post .post-header .post-location {
            font-size: 14px;
            color: #aaa;
        }

        .post .post-actions {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .post .post-actions i {
            margin-right: 10px;
            font-size: 20px;
        }

        .post .post-likes {
            font-size: 14px;
            margin-top: 10px;
        }

        .post .post-caption {
            font-size: 14px;
            margin-top: 10px;
        }

        .post .post-comments {
            font-size: 14px;
            color: #aaa;
            margin-top: 10px;
        }

        .suggestions {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            border-left: 1px solid #333;
        }

        .suggestions .suggestion {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .suggestions .suggestion img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .suggestions .suggestion .suggestion-info {
            flex: 1;
        }

        .suggestions .suggestion .suggestion-info .suggestion-name {
            font-size: 14px;
        }

        .suggestions .suggestion .suggestion-info .suggestion-follow {
            font-size: 12px;
            color: #aaa;
        }

        .suggestions .suggestion .suggestion-action {
            color: #0095f6;
            font-size: 14px;
            text-decoration: none;
        }

        .footer {
            font-size: 12px;
            color: #aaa;
            margin-top: 20px;
        }

        @media (min-width: 768px) {
            .container {
                flex-direction: row;
            }

            .sidebar {
                width: 250px;
                flex-direction: column;
                justify-content: flex-start;
            }

            .suggestions {
                width: 300px;
            }
        }

        /* popup */
        /* Ensure box-sizing consistency */
        /* Ensure box-sizing consistency */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        /* Popup styling */
        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            /* Prevents cutoff on smaller screens */
            overflow-y: auto;
            /* Allows scrolling if content overflows */
            z-index: 1000;
            /* Ensures popup is on top of other elements */
        }

        /* Popup container styling */
        .popup-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #333;
            border-radius: 10px;
            background-color: #000;
            overflow: hidden;
        }

        /* Header styling */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        .header .username {
            font-weight: bold;
            margin-left: 10px;
        }

        .header .options {
            font-size: 20px;
        }

        /* Post content styling */
        .post-content {
            margin-top: 10px;
        }

        .post-content .description {
            margin-top: 10px;
        }

        .post-content .hashtags {
            color: #00f;
            word-wrap: break-word;
        }

        /* Comments section styling */
        .comments {
            margin-top: 10px;
        }

        .comment {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .comment img {
            border-radius: 50%;
            width: 30px;
            height: 30px;
        }

        .comment .comment-text {
            margin-left: 10px;
        }

        .comment .comment-text .username {
            font-weight: bold;
        }

        .comment .comment-text .reply {
            color: #888;
            font-size: 12px;
        }

        /* Actions section styling */
        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .actions .likes {
            display: flex;
            align-items: center;
        }

        .actions .likes i {
            margin-right: 5px;
        }

        .actions .time {
            color: #888;
            font-size: 12px;
        }

        /* Add comment section styling */
        .add-comment {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .add-comment input {
            flex: 1;
            padding: 5px;
            border: none;
            border-radius: 20px;
            background-color: #333;
            color: #fff;
        }

        .add-comment button {
            background: none;
            border: none;
            color: #00f;
            margin-left: 10px;
        }

        .comments::-webkit-scrollbar {
            width: 5px;
        }

        .comments::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0);
        }

        .comments::-webkit-scrollbar-thumb {
            background-color: rgba(128, 128, 128, 0.5);
            border-radius: 10px;
        }

        /* popup */
        /* creat-post start */
        .create-post-container {
            text-align: center;
            background-color: #333333;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 90%;
            max-width: 400px;
        }

        .create-post-container h1 {
            color: #ffffff;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .create-post-upload-area {
            background-color: #2c2c2c;
            padding: 10px;
            border-radius: 10px;
            border: 2px dashed #555555;
            margin-bottom: 20px;
        }

        .create-post-upload-area i {
            font-size: 50px;
            margin-bottom: 20px;
        }

        .create-post-upload-area p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .create-post-upload-button {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .create-post-upload-button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            .create-post-upload-area {
                padding: 20px;
            }

            .create-post-upload-area i {
                font-size: 40px;
            }

            .create-post-upload-area p {
                font-size: 16px;
            }

            .create-post-upload-button {
                padding: 8px 16px;
                font-size: 14px;
            }
        }

        /* creat-post  end*/
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar-container">
            <button class="sidebar-toggle" onclick="toggleSidebar()">☰</button>
            <div class="sidebar" id="sidebar">
                <img class="logo-responsive" alt="Instagram Logo" height="100" src="assets/img/Group-white (1).svg" width="100" />
                <a href="#">
                    <i class="fas fa-home"></i> Home
                </a>
                <a href="#">
                    <i class="fas fa-heart"></i> Notifications
                </a>
                <a href="#">
                    <i class="fas fa-plus-square"></i> Create
                </a>
                <?php if (isset($_SESSION['username'])): // Check if the user is logged in 
                ?>
                    <a href="html/logout.php">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                <?php else: // If the user is not logged in, show the login button 
                ?>
                    <a href="html/login_page.php">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="suggestions">
        </div>
        <div class="main-content">
            <div class="logo-lapy">
                <img src="assets/img/Group-white (1).svg" height="20" width="60" alt="Google Logo">
            </div>
            <div class="post">
                <div class="post-header">
                    <img alt="User Profile Picture" height="40" src="https://storage.googleapis.com/a1aa/image/OscPrZzV9GI9NhJ0EW0EwYoyDRsu5sQkjYT183uYfu3O9E4JA.jpg" width="40" />
                    <div>
                        <div class="post-user">abhishek_panchal__456
                        </div>
                        <div class="post-location">
                            Bhopal - The City of Lakes
                        </div>
                    </div>
                </div>
                <img alt="Post Image" height="500" src="https://storage.googleapis.com/a1aa/image/BuIV6PkSOsKDApC9vxJ7VOyEPpR045rV8XvEF2fIMfEf0TgnA.jpg" width="500" />
                <div class="post-actions">
                    <i class="far fa-heart" id="post-like-1" onclick="likePost(1)">
                    </i>
                    <i class="far fa-comment" id="post-comment-1" onclick="document.querySelector('.popup').style.display = 'flex';"></i> <i class="far fa-paper-plane">
                    </i>
                    <i class="far fa-bookmark" style="margin-left: auto;">
                    </i>
                </div>
                <div class="post-likes" id="post-like-count-1">
                    36 likes
                </div>
                <div class="post-caption">
                    aman.panchal.singh.0786 🌿✨
                    <br />
                    ... more
                </div>
                <div class="post-comments">
                    View all 9 comments
                </div>
                <div class="post-comments">
                    Add a comment...
                </div>
            </div>

            <div class="post">
                <div class="post-header">
                    <img alt="User Profile Picture" height="40" src="https://storage.googleapis.com/a1aa/image/OscPrZzV9GI9NhJ0EW0EwYoyDRsu5sQkjYT183uYfu3O9E4JA.jpg" width="40" />
                    <div>
                        <div class="post-user">
                            ezsnippet
                        </div>
                        <div class="post-location">
                            Original audio
                        </div>
                    </div>
                </div>
                <img alt="Post Image" height="500" src="https://storage.googleapis.com/a1aa/image/BuIV6PkSOsKDApC9vxJ7VOyEPpR045rV8XvEF2fIMfEf0TgnA.jpg" width="500" />
                <div class="post-actions">
                    <i class="far fa-heart" id="post-like-2" onclick="likePost(2)">
                    </i>
                    <i class="far fa-comment" id="post-comment-2" onclick="commentPost(2)">
                    </i>
                    <i class="far fa-paper-plane">
                    </i>
                    <i class="far fa-bookmark" style="margin-left: auto;">
                    </i>
                </div>
                <div class="post-likes" id="post-like-count-2">
                    0 likes
                </div>
            </div>
        </div>
        <div class="suggestions">
            <div class="steps">
                <div class="step" id="step-1">
                    <div class="create-post-container">
                        <h1>Create new post</h1>
                        <form id="create-post-form">
                            <div class="create-post-upload-area" id="upload-area">
                                <i class="fas fa-images"></i>
                                <p>Drag photos and videos here</p>
                                <input type="file" id="post-image" name="post-image" style="display: none;" onchange="showImagePreview(event)">
                                <button class="create-post-upload-button" type="button" onclick="document.getElementById('post-image').click()">Select photo</button>
                            </div>

                            <!-- Image Preview Container -->
                            <div id="image-preview" style="display: none; margin-top: 15px;">
                                <p>Preview:</p>
                                <img id="selected-image" src="" alt="Selected image" style="max-width: 100%; max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                <textarea id="image-description" placeholder="Enter image description here..." style="margin-top: 15px; width: 100%; height: 50px; padding: 5px; font-size: 13px; border-radius: 10px; border: 1px solid #ddd;"></textarea>
                            </div>
                        </form>

                        <button id="next-step-button" onclick="nextStep(2)" style="display: block; background-color: #007bff; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Next</button>
                    </div>
                </div>

                <script>
                    function showImagePreview(event) {
                        const file = event.target.files[0];
                        const preview = document.getElementById('image-preview');
                        const image = document.getElementById('selected-image');
                        const nextButton = document.getElementById('next-step-button');
                        const uploadArea = document.getElementById('upload-area');

                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                image.src = e.target.result;
                                preview.style.display = 'block';
                                uploadArea.style.display = 'none'; // Hide upload area
                                nextButton.style.display = 'inline'; // Show "Next" button
                            };
                            reader.readAsDataURL(file);
                        }
                    }

                    function nextStep(step) {
                        // Move to the next step logic here
                        alert("Proceeding to step " + step);
                    }
                </script>


                <div class="step" id="step-2" style="display: none;">
                    <div class="confirm-and-share-container">
                        <h2>Confirm and Share</h2>
                        <div class="confirm-and-share-preview">
                            <img id="selected-image-step-2" src="" alt="Selected image" style="max-width: 100%; max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                        </div>
                        <button class="confirm-and-share-button" onclick="nextStep(3)">Confirm and Share</button>
                    </div>
                </div>

                <style>
                    .confirm-and-share-container {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                    }

                    .confirm-and-share-preview {
                        margin-bottom: 20px;
                    }

                    .confirm-and-share-button {
                        background-color: #007bff;
                        color: #ffffff;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                        font-size: 16px;
                    }
                </style>
                <script>
                    function showImagePreview(event) {
                        const file = event.target.files[0];
                        const preview = document.getElementById('image-preview');
                        const image = document.getElementById('selected-image');
                        const nextButton = document.getElementById('next-step-button');
                        const uploadArea = document.getElementById('upload-area');
                        const imageStep2 = document.getElementById('selected-image-step-2');

                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                image.src = e.target.result;
                                imageStep2.src = e.target.result;
                                preview.style.display = 'block';
                                uploadArea.style.display = 'none'; // Hide upload area
                                nextButton.style.display = 'inline'; // Show "Next" button
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                </script>
            </div>

            <script>
                function nextStep(stepNumber) {
                    document.querySelectorAll('.step').forEach(step => {
                        step.style.display = 'none';
                    });
                    document.getElementById('step-' + stepNumber).style.display = 'block';
                }
            </script>
        </div>




        <!-- comment section popup -->
        <div class="popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <div class="popup-container">
                <div class="header">
                    <div class="user-info">
                        <img alt="User profile picture" height="40" src="https://storage.googleapis.com/a1aa/image/VLi8UfOMJ7QeFEg96U8V7fX66tjto1zgU3Q8EXpU2CMJ5VgnA.jpg" width="40" />
                        <span class="username">ezsnippet</span>
                    </div>
                </div>
                <i class="fas fa-times" style="float: right;" onclick="document.querySelector('.popup').style.display = 'none';"></i>
                <div class="post-content">
                    <div class="description">
                        <span class="username">ezsnippet</span> Fadeoverlay in my life.
                    </div>
                    <div class="hashtags">#coding #programming #css #javascript</div>
                </div>
                <div class="comments" style="max-height: 200px; overflow-y: auto; scrollbar-width: thin; scrollbar-color: rgba(128, 128, 128, 0.5) rgba(0, 0, 0, 0);">

                    <div class="comment">
                        <img alt="User profile picture" height="30" src="https://storage.googleapis.com/a1aa/image/VLi8UfOMJ7QeFEg96U8V7fX66tjto1zgU3Q8EXpU2CMJ5VgnA.jpg" width="30" />
                        <div class="comment-text">
                            <span class="username">deepe_shhh</span> दिल्ली मेट्रो में आपका स्वागत है 🙏
                            <div class="reply">2h 22 likes Reply See translation</div>
                        </div>
                    </div>
                    <div class="comment">
                        <img alt="User profile picture" height="30" src="https://storage.googleapis.com/a1aa/image/VLi8UfOMJ7QeFEg96U8V7fX66tjto1zgU3Q8EXpU2CMJ5VgnA.jpg" width="30" />
                        <div class="comment-text">
                            <span class="username">i_kannha_sharma</span> Ezi is everywhere 👀
                            <div class="reply">2h 12 likes Reply See translation</div>
                        </div>
                    </div>
                    <div class="comment">
                        <img alt="User profile picture" height="30" src="https://storage.googleapis.com/a1aa/image/VLi8UfOMJ7QeFEg96U8V7fX66tjto1zgU3Q8EXpU2CMJ5VgnA.jpg" width="30" />
                        <div class="comment-text">
                            <span class="username">dont_open_comment_section11</span> Coder kam or editor jyada ho raha hai ya 😂
                            <div class="reply">2h 39 likes Reply See translation</div>
                        </div>
                    </div>
                    <div class="comment">
                        <img alt="User profile picture" height="30" src="https://storage.googleapis.com/a1aa/image/VLi8UfOMJ7QeFEg96U8V7fX66tjto1zgU3Q8EXpU2CMJ5VgnA.jpg" width="30" />
                        <div class="comment-text">
                            <span class="username">kartikgaur01</span> That transition though 🔥😎
                            <div class="reply">1h 4 likes Reply</div>
                        </div>
                    </div>
                    <div class="comment">
                        <img alt="User profile picture" height="30" src="https://storage.googleapis.com/a1aa/image/VLi8UfOMJ7QeFEg96U8V7fX66tjto1zgU3Q8EXpU2CMJ5VgnA.jpg" width="30" />
                        <div class="comment-text">
                            <span class="username">skysahil96</span> Bhai app saktiyo ka galat istemal kar rhe hoo😂😂
                            <div class="reply">2h 6 likes Reply</div>
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <div class="likes">
                        <i class="fas fa-heart"></i>
                        <span>7,278 likes</span>
                    </div>
                    <div class="time">2 hours ago</div>
                </div>
                <div class="add-comment">
                    <input placeholder="Add a comment..." type="text" />
                    <button>Post</button>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.min.js"></script>

        <!-- comment section popup -->
        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.toggle('show'); // Toggles the "show" class to display or hide the sidebar
            }

            // like toggle 

            function likePost(postId) {
                var likeCount = document.getElementById("post-like-count-" + postId);
                var heartIcon = document.getElementById("post-like-" + postId);
                if (heartIcon.classList.contains("fas")) {
                    heartIcon.classList.remove("fas");
                    heartIcon.classList.add("far");
                    likeCount.innerText = parseInt(likeCount.innerText) - 1;
                } else {
                    heartIcon.classList.remove("far");
                    heartIcon.classList.add("fas");
                    likeCount.innerText = parseInt(likeCount.innerText) + 1;
                }
            }
            // like toggle 


            const scroll = new LocomotiveScroll({
                el: document.querySelector('[data-scroll-container]'),
                smooth: true
            });
        </script>
</body>

</html>