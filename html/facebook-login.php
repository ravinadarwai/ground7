<?php
require_once '../vendor/autoload.php';  // Include Facebook SDK
include('../config.php');  // Include your database connection (Make sure config.php contains the conn connection)

session_start();

// Initialize Facebook SDK
$fb = new \Facebook\Facebook([
    'app_id' => '1604180723846334',
    'app_secret' => '3d42d7bcb079230f989744ae8ad31310',
    'default_graph_version' => 'v15.0',
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email'];  // Permissions you want to request

// If there is a 'state' parameter, set it
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}

// Step 1: Check if the access token is available
if (isset($_GET['code'])) {
    try {
        // Get the access token
        $accessToken = $helper->getAccessToken();

        // If no access token is found, display error
        if (!$accessToken) {
            echo 'Error: Unable to get access token.';
            exit();
        }

        // Store access token in session or use it to make API calls
        $_SESSION['facebook_access_token'] = (string) $accessToken;

        // Use the access token to fetch user data
        $response = $fb->get('/me?fields=id,name,email,first_name,last_name', $accessToken);
        $user = $response->getGraphUser();

        // Check if the necessary fields exist
        $facebook_id = isset($user['id']) ? $user['id'] : '';
        $email = isset($user['email']) ? $user['email'] : '';
        $first_name = isset($user['first_name']) ? $user['first_name'] : '';
        $last_name = isset($user['last_name']) ? $user['last_name'] : '';
        $full_name = isset($user['name']) ? $user['name'] : '';

        // Check if the user already exists in the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE facebook_id = ?");
        $stmt->execute([$facebook_id]);
        $existing_user = $stmt->fetch();

        if ($existing_user) {
            // User already exists, you can update data if needed
            $_SESSION['userid'] = $existing_user['id'];
            $_SESSION['email'] = $existing_user['email'];
            $_SESSION['full_name'] = $existing_user['name'];
        } else {
            // User does not exist, insert into database
            $stmt = $conn->prepare("INSERT INTO users (facebook_id, email, first_name, last_name, full_name) 
                                   VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$facebook_id, $email, $first_name, $last_name, $full_name]);
            $user_id = $conn->lastInsertId();  // Get the last inserted user's ID

            // Store user data in session
            $_SESSION['userid'] = $user_id;
            $_SESSION['email'] = $email;
            $_SESSION['full_name'] = $full_name;
        }

        // Redirect to your application dashboard
        header('Location: ../index.php');
        exit();

    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit();
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit();
    }
}

// Step 2: Get the login URL
$loginUrl = $helper->getLoginUrl('http://localhost/turf_zeeshan/html/facebook-login.php', $permissions);

// Step 3: Redirect to Facebook login page
header('Location: ' . $loginUrl);
exit();
?>
