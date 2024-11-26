<?php
session_start();
include('../config.php'); // Ensure this contains the PDO connection setup

// Check if user is logged in


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['userid'])) {
        // Redirect to login page if not logged in
        header('Location: login_page.php'); // Change this to your login page
        exit();
    }

    // Get the post ID and comment text from the POST request
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['userid']; // Assuming you store user ID in session
    $comment_text = $_POST['comment_text'];

    // Insert the comment into the database
    $sql = "INSERT INTO comments (post_id, user_id, comment_text) VALUES (:post_id, :user_id, :comment_text)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'post_id' => $post_id,
        'user_id' => $user_id,
        'comment_text' => $comment_text
    ]);

    // Redirect back to the chatbox page after submitting the comment
    header("Location: ./chatbox.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from html/user-bookings.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:16:42 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Ground 7</title>

    <meta name="twitter:description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand." />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand." />
    <meta name="keywords"
        content="badminton, coaching, event, players, training, courts, tournament, athletes, courts rent, lessons, court booking, stores, sports faqs, leagues, chat, wallet, invoice" />
    <meta name="author" content="Dreamguys - Ground7" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@dreamguystech" />
    <meta name="twitter:title" content="Ground7 -  Booking Coaches, Venue for tournaments, Court Rental template" />
    <meta name="twitter:image" content="assets/img/meta-image.jpg" />
    <meta name="twitter:image:alt" content="Ground7" />
    <meta property="og:url" content="https://Ground7.dreamguystech.com/" />
    <meta property="og:title" content="Ground7 -  Booking Coaches, Venue for tournaments, Court Rental template" />
    <meta property="og:description"
        content="Elevate your badminton business with Dream Sports template. Empower coaches & players, optimize court performance and unlock industry-leading success for your brand." />
    <meta property="og:image" content="../assets/img/meta-image.jpg" />
    <meta property="og:image:secure_url" content="assets/img/meta-image.jpg" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="600" />
    <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: -apple-system, system-ui, "Segoe UI", Roboto, Oxygen, Ubuntu,
    Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  background: #fafafa;
}

.navbar {
  position: fixed;
  z-index: 100000;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgb(255, 255, 255);
  width: 100%;
  border: 1px solid rgb(218, 217, 217);
}

.navbar .container {
  /* background-color: #555; */
  padding: 15px 0;
  width: 75%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  /* margin: 0 auto; */
}

.container .logo {
  display: inline-block;
  cursor: pointer;
}

.searchbar {
  width: -10%;
  text-align: end;
}

.searchbar input {
  background-color: #fafafa;
  padding: 0.5rem;
  text-indent: 28px;
  outline: none;
  border: 1px solid rgb(218, 217, 217);
  border-radius: 5px;
  color: rgb(77, 77, 77);
  background: url("https://media.geeksforgeeks.org/wp-content/uploads/20220609093658/search-200x200.png") no-repeat ;
  background-position: 5px;
  background-size: 2.0em auto;
}

.searchbar img {
  position: absolute;
  margin-left: -10.5rem;
  margin-top: 0.25rem;
  display: none;
}

.searchbar input::placeholder {
  font-weight: lighter;
  color: rgb(172, 172, 172);
}

.nav-links {
  font-weight: lighter;
  color: rgb(172, 172, 172);
  /* background: #333 ; */
}

.nav-group .nav-item {
  list-style-type: none;
  margin: 0 8px;
}

.nav-group .nav-item a {
  font-size: 22px;
  display: block;
  color: black;
}

.nav-group {
  display: flex;
  align-items: center;
  justify-content: center;
}

.action .profile {
  position: relative;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}

.action .profile img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

main {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

main .container {
  position: relative;
  margin-top: 60px;
  width: 75%;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  /* background: #ddd; */
}

.col-9 {
  width: 65%;
  margin-top: 30px;
}

.col-3 {
  width: 33%;
  position: -webkit-sticky;
  position: sticky;
  top: 90px;
}

.col-3 h4 {
  color: rgb(100, 100, 100);
}

.col-3 .card {
  margin-bottom: 20px;
  position: relative;
  width: 100%;
  /* min-height: 400px; */
  display: inline-block;
}

.col-3 .card .top {
  padding: 10px 0px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.col-3 .card .top a {
  color: #1d92ff;
}

.col-3 .card .bottom {
  padding: 10px 20px;
}

.col-3 .card .top .userDetails {
  width: 100%;
  display: flex;
  align-items: center;
}

.col-3 .card .top .userDetails h3 {
  font-size: 16px;
  color: #4d4d4f;
  font-weight: 500;
  line-height: 1em;
}

.col-3 .card .top .userDetails h3 span {
  font-size: 0.75em;
}

.col-3 .card .top .userDetails h3 span {
  font-size: 0.75em;
}

.col-9 .card {
  margin-bottom: 20px;
  position: relative;
  width: 100%;
  /* min-height: 400px; */
  display: inline-block;
  border: 1px solid rgba(7, 7, 7, 0.24);
}

.col-9 .card .top {
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.col-9 .card .bottom {
  padding: 10px 20px;
}

.col-9 .card .top .userDetails {
  width: 100%;
  display: flex;
  align-items: center;
}

.profilepic {
  display: inline-block;
  cursor: pointer;
}

.profilepic .profile_img {
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  overflow: hidden;
  width: 30px;
  height: 30px;
  background: linear-gradient(to right, red, orange);
  padding: 2px;
  margin-right: 8px;
  cursor: pointer;
}

.profilepic .profile_img .image {
  position: relative;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 2px solid white;
}

.profilepic .profile_img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.cover {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.col-9 .card .top .userDetails h3 {
  /* width: 100%; */
  font-size: 16px;
  color: #4d4d4f;
  font-weight: 500;
  line-height: 1em;
}

.col-9 .card .top .userDetails h3 span {
  font-size: 0.75em;
}

.col-9 .card .top .userDetails h3 span {
  font-size: 0.75em;
}

.dot {
  transform: scale(0.6);
  cursor: pointer;
}

.imgBx {
  position: relative;
  width: 100%;
  min-height: 400px;
  margin: 10px 0 15px;
}

.actionBtns {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.actionBtns svg {
  cursor: pointer;
}

.actionBtns .left svg {
  margin-right: 8px;
}

.likes {
  font-weight: 500;
  margin-top: 5px;
  font-size: 14px;
  color: #4d4d4f;
}

.message {
  font-weight: 400;
  margin-top: 5px;
  font-size: 14px;
  color: #777;
  line-height: 1.5em;
}

.message b {
  color: #262626;
}

.message span {
  cursor: pointer;
  color: #1d92ff;
}

.comments {
  margin-top: 10px;
  font-weight: 400;
  color: #999;
}

.event-modal {
    background-color: white;
    padding: 20px;
    border-radius: 16px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    border: 1px solid #ddd;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header input {
    border: none;
    font-size: 18px;
    font-weight: bold;
    width: 70%;
    color: #eb1f1f;
}

.header input:focus {
    outline: none;
}

.actions button {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 18px;
}

.details {
    margin-top: 20px;
}

.details label {
    display: block;
    margin-top: 10px;
    font-size: 14px;
    color: #555;
}

.details input, .details select, .details textarea {
    width: 100%;
    padding: 5px;
    margin-top: 5px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 8px;
}

.details textarea {
    resize: none;
    height: 60px;
}

.comments-section {
    margin-top: 20px;
}

.comments-section h3 {
    margin: 0;
    font-size: 16px;
    color: #555;
}

#comments {
    margin-top: 10px;
    max-height: 100px;
    overflow-y: auto;
}

.comment {
    display: flex;
    align-items: flex-start;
    background-color: #f1f1f1;
    padding: 5px;
    margin-bottom: 5px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

.comment img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.comment-content {
    flex: 1;
}

.comment-content p {
    margin: 0;
    font-size: 14px;
    color: #555;
}

.comment-actions {
    display: flex;
    margin-top: 5px;
}

.comment-actions button {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 14px;
    margin-right: 5px;
    color: #007bff;
}

#new-comment {
    width: calc(100% - 30px);
    padding: 5px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 8px;
    resize: none;
    margin-top: 10px;
    height: 40px;
}

#add-comment-btn {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 18px;
    position: absolute;
    margin-left: 5px;
    margin-top: 10px;
}
.logo1{
    
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}
    </style>

</head>

<body>
<!-- Our Header section Starts from here -->

<!-- Code for Showing the Status -->
<main>
  <div class="container">
    <div class="col-9">

      <!-- Code for viewing the Post -->
      <div class="card">
        <div class="top">
          <div class="userDetails">
            <div class="profilepic">
              <div class="profile_img">
                <div class="image">
                  <img src="https://media.geeksforgeeks.org/wp-content/uploads/20220609093229/g-200x200.png" alt="img8">
                </div>
              </div>
            </div>
            <h3>Ayush Agarwal
              <br>
              <span>Mumbai, India</span>
            </h3>
          </div>
          <div>
            <span class="dot">
              <i class="fas fa-ellipsis-h"></i>
            </span>
          </div>
        </div>
        <div class="imgBx">
          <img src="https://media.geeksforgeeks.org/wp-content/uploads/20220609090112/gfg1-298x300.jpeg" alt="post-1" class="cover">
        </div>
        <div class="bottom">
          <div class="actionBtns">
            <div class="left">
              <span class="heart" onclick="addlike()">
                <span>
                  <svg aria-label="Like" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">
                    <!-- Coordinate path -->

                    <path d="M34.6 6.1c5.7 0 10.4 5.2 10.4 
												11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 
												41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 
												11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 
												1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 
												1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 
												1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 
												0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 
												1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 
												1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 
												7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 
												48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                    </path>
                  </svg>
                </span>
              </span>
              <svg aria-label="Comment" class="_8-yf5 " color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">

                <!-- Coordinate path -->
                <path clip-rule="evenodd" d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 
										11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 
										7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 
										4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 
										8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 
										2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 
										44.5 12.7 44.5 24z" fill-rule="evenodd">
                </path>
              </svg>
              <svg aria-label="Share Post" class="_8-yf5 " color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">
                <path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 
										3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 
										1 1.2 1.1h.2c.5 0 1-.3 
										1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 
										6.1h35.5L18 18.7 5.2 6.1zm18.7 
										33.6l-4.4-18.4L42.4 8.6 23.9 39.7z">
                </path>
              </svg>
            </div>
            <div class="right">
              <svg aria-label="Save" class="_8-yf5 " color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">

                <!-- Coordinate path -->
                <path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 
										47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 
										3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 
										1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 
										0 1.6.3 2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 
										1.4-.9 2.2-.9z">
                </path>
              </svg>
            </div>
          </div>
          <a href="#">
            <p class="likes">203 likes</p>

          </a>
          <a href="#">
            <p class="message">
              <b>Raju Modi</b>
            </p>

          </a>
          <a href="#">
            <h4 class="comments">View all 32 comments</h4>
          </a>
          <a href="#">
            <h5 class="postTime">2 hours ago</h5>
          </a>
          <div class="addComments">
          <div class="event-modal">
        <div class="header">
            <input type="text" id="event-title" value="Flower Arrangement">
            <div class="actions">
                <button id="complete-btn" title="Mark as Complete">✔️</button>
                <button id="delete-btn" title="Delete Event">🗑️</button>
            </div>
        </div>
        <div class="details">
            <div class="date-time">
                <label for="event-date">Date and Time:</label>
                <input type="datetime-local" id="event-date" value="2024-12-05T08:00">
            </div>
            <div class="assign-to">
                <label for="assign">Assign to:</label>
            
                <select id="assign">
                    
                    <option value="Jane Smith" >Jane Smith</option>
                    <option value="John Doe">John Doe</option>
                </select>
            </div>
            <div class="note">
                <label for="note">Note:</label>
                <textarea id="note">09382049832&#10;www.flowervendor.com</textarea>
            </div>
        </div>
        <div class="comments-section">
            <h3>Comments</h3>
            <div id="comments">
                <div class="comment">
                    <img src="https://tse3.mm.bing.net/th?id=OIP.IHjz0u5xklfurD7TKVVE-QHaE2&pid=Api&P=0&h=180" alt="Avatar">
                    <div class="comment-content">
                        <p><strong>Jane Smith:</strong> Thanks for assigning me on the task. We’ll get the details ironed out.</p>
                        <div class="comment-actions">
                            <button class="edit-comment-btn">✏️</button>
                            <button class="delete-comment-btn">🗑️</button>
                        </div>
                    </div>
                </div>
            </div>
            <textarea id="new-comment" placeholder="Write comment..."></textarea>
            <button id="add-comment-btn">➤</button>
        </div>
    </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="top">
          <div class="userDetails">
            <div class="profilepic">
              <div class="profile_img">
                <div class="image">
                  <img src="https://media.geeksforgeeks.org/wp-content/uploads/20220609093241/g3-200x200.png" alt="img9">
                </div>
              </div>
            </div>
            <h3>Piyush Agarwal<br>
              <span>Delhi, India</span>
            </h3>
          </div>
          <div>
            <span class="dot">
              <i class="fas fa-ellipsis-h"></i>
            </span>
          </div>
        </div>
        <div class="imgBx">
          <img src="https://media.geeksforgeeks.org/wp-content/uploads/20220609090119/gfg2-300x297.jpeg" alt="post-1" class="cover">
        </div>
        <div class="bottom">
          <div class="actionBtns">
            <div class="left">
              <span class="heart" onclick="addlike()">
                <span>
                  <svg aria-label="Like" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">
                    <!-- Coordinate path -->

                    <path d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 
												0 6.8-5.9 11-11.5 16S25 41.3 24 
												41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 
												11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 
												4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 
												2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 
												0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 
												3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 
												16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 
												6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 
												1.1-.2 1.6-.5 1-.6 2.8-2.2 
												7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 
												29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                    </path>
                  </svg>
                </span>
              </span>
              <svg aria-label="Comment" class="_8-yf5 " color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">
                <path clip-rule="evenodd" <!-- Coordinate path -->

                  d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1
                  2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11
                  47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2
                  1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2
                  1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8
                  1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7
                  3.5 24 3.5 44.5 12.7 44.5 24z"
                  fill-rule="evenodd"></path>
              </svg>
              <svg aria-label="Share Post" class="_8-yf5 " color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">
                <path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 
										3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 
										1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 
										6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 
										8.6 23.9 39.7z">
                </path>
              </svg>
            </div>
            <div class="right">
              <svg aria-label="Save" class="_8-yf5 " color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">
                <!-- Coordinate path -->

                <path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 
										47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 
										3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 
										1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 0 1.6.3 
										2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 1.4-.9 2.2-.9z">
                </path>
              </svg>
            </div>
          </div>

          <!-- Adding number of like and name of people -->

          <a href="#">
            <p class="likes">119 likes</p>

          </a>
          <a href="#">
            <p class="message">
              <b>Piyush Agarwal</b>
            </p>

          </a>
          <a href="#">
            <h4 class="comments">View all 20 comments</h4>
          </a>
          <a href="#">
            <h5 class="postTime">4 hours ago</h5>
          </a>
          <div class="addComments">
            <div class="reaction">
              <h3><i class="far fa-smile"></i></h3>
            </div>
            <input type="text" class="text" placeholder="Add a comment...">
            <a href="#">Post</a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="top">
          <div class="userDetails">
            <div class="profilepic">
              <div class="profile_img">
                <div class="image">
                  <img src="./assets/images/user-3.jpeg" alt="img10">
                </div>
              </div>
            </div>
            <h3>Keshav Agarwal<br>
              <span>Kolkata, India</span>
            </h3>
          </div>
          <div>
            <span class="dot">
              <i class="fas fa-ellipsis-h"></i>
            </span>
          </div>
        </div>
        <div class="imgBx">
          <img src="https://media.geeksforgeeks.org/wp-content/uploads/20220609090130/gfg3-299x300.jpeg" alt="post-1" class="cover">
        </div>
        <div class="bottom">
          <div class="actionBtns">
            <div class="left">
              <span class="heart" onclick="addlike()">
                <span>
                  <svg aria-label="Like" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">
                    <path d="M34.6 6.1c5.7 0 10.4 5.2 10.4 
												11.5 0 6.8-5.9 11-11.5 16S25 41.3 
												24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 
												11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 
												4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 
												2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 
												0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 
												3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 
												1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 
												6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 
												2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 
												29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                    </path>
                  </svg>
                </span>
              </span>
              <svg aria-label="Comment" class="_8-yf5 " color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">
                <path clip-rule="evenodd" d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 
										2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 
										47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 
										1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 
										1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 
										1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 
										3.5 24 3.5 44.5 12.7 44.5 24z" fill-rule="evenodd">
                </path>
              </svg>
              <svg aria-label="Share Post" class="_8-yf5 " color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">
                <path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 
										3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 
										22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 
										1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 
										6.1h35.5L18 18.7 5.2 6.1zm18.7 
										33.6l-4.4-18.4L42.4 8.6 23.9 39.7z">
                </path>
              </svg>
            </div>
            <div class="right">
              <svg aria-label="Save" class="_8-yf5 " color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24">
                <path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 
										47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 
										3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 
										1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 0 
										1.6.3 2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 
										1.4-.9 2.2-.9z">
                </path>
              </svg>
            </div>
          </div>
          <a href="#">
            <p class="likes">184 likes</p>
          </a>
          <a href="#">
            <p class="message">
              <b>Mayank</b> Nature
              <span>#love</span>
              <span>#2021</span>
            </p>
          </a>
          <a href="#">
            <h4 class="comments">View all 25 comments</h4>
          </a>
          <a href="#">
            <h5 class="postTime">9 hours ago</h5>
          </a>
          <div class="addComments">
            <div class="reaction">
              <h3>
                <i class="far fa-smile"></i>
              </h3>
            </div>
            <input type="text" class="text" placeholder="Add a comment...">
            <a href="#">Post</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const eventTitle = document.getElementById('event-title');
    const eventDate = document.getElementById('event-date');
    const assign = document.getElementById('assign');
    const note = document.getElementById('note');
    const commentsSection = document.getElementById('comments');
    const newCommentInput = document.getElementById('new-comment');
    const addCommentBtn = document.getElementById('add-comment-btn');
    const completeBtn = document.getElementById('complete-btn');
    const deleteBtn = document.getElementById('delete-btn');

    // Add new comment
    addCommentBtn.addEventListener('click', () => {
        const commentText = newCommentInput.value.trim();
        if (commentText) {
            const commentDiv = document.createElement('div');
            commentDiv.classList.add('comment');
            commentDiv.innerHTML = `
                <img src="https://tse3.mm.bing.net/th?id=OIP.IHjz0u5xklfurD7TKVVE-QHaE2&pid=Api&P=0&h=180" alt="Avatar">
                <div class="comment-content">
                    <p><strong>${assign.value}:</strong> ${commentText}</p>
                    <div class="comment-actions">
                        <button class="edit-comment-btn">✏️</button>
                        <button class="delete-comment-btn">🗑️</button>
                    </div>
                </div>
            `;
            commentsSection.appendChild(commentDiv);
            newCommentInput.value = '';

            // Add delete functionality to new comment
            commentDiv.querySelector('.delete-comment-btn').addEventListener('click', () => {
                commentDiv.remove();
            });

            // Add edit functionality to new comment
            commentDiv.querySelector('.edit-comment-btn').addEventListener('click', () => {
                editComment(commentDiv);
            });
        }
    });

    // Mark event as complete
    completeBtn.addEventListener('click', () => {
        document.body.style.backgroundColor = '#d4edda';  // Change background color to indicate completion
        alert('Event marked as complete!');
    });

    // Delete event
    deleteBtn.addEventListener('click', () => {
        if (confirm('Are you sure you want to delete this event?')) {
            document.querySelector('.event-modal').remove();
        }
    });

    // Delete and edit existing comments
    document.querySelectorAll('.comment').forEach(commentDiv => {
        commentDiv.querySelector('.delete-comment-btn').addEventListener('click', () => {
            commentDiv.remove();
        });

        commentDiv.querySelector('.edit-comment-btn').addEventListener('click', () => {
            editComment(commentDiv);
        });
    });

    function editComment(commentDiv) {
        const commentText = commentDiv.querySelector('p').innerText.split(': ')[1];
        const newCommentText = prompt('Edit your comment:', commentText);
        if (newCommentText !== null) {
            commentDiv.querySelector('p').innerHTML = `<strong>${assign.value}:</strong> ${newCommentText}`;
        }
    }
});

</script>
</body>

<!-- Mirrored from html/user-bookings.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Sep 2024 06:17:01 GMT -->