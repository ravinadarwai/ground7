<?php
require_once '../vendor/autoload.php';
include('../config.php');  // Include the database connection

$client = new Google_Client();
$client->setClientId('552804153010-neqcjmhpjfkap2dgq4hdi1gk3vsbhjsr.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/turf_zeeshan/html/google-login.php');
$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $google_service = new Google_Service_Oauth2($client);
    $data = $google_service->userinfo->get();

    // Extract the user's Google data
    $google_id = $data['id'];
    $email = $data['email'];
    $name = $data['name'];

    // Start a session
    session_start();
    $_SESSION['userid'] = $google_id;
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $name;

    // Check if the user already exists in the database
    $query = "SELECT * FROM users WHERE google_id = :google_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':google_id', $google_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // User exists, update their information if necessary
        $update_query = "UPDATE users SET email = :email, full_name = :full_name WHERE google_id = :google_id";
        $stmt = $conn->prepare($update_query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':full_name', $name);
        $stmt->bindParam(':google_id', $google_id);
        $stmt->execute();
    } else {
        // User does not exist, insert a new record
        $insert_query = "INSERT INTO users (google_id, email, full_name) VALUES (:google_id, :email, :full_name)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bindParam(':google_id', $google_id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':full_name', $name);
        $stmt->execute();
    }

    // Redirect to dashboard or home page
    header('Location: ../index.php');
    exit();
}

// Redirect to Google login page if code is not set
header('Location: ' . $client->createAuthUrl());
