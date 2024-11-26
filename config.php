<?php


// Database connection settings
$host = 'localhost';
$dbname = 'ground7';
$username = 'root';
$password = '';

// Connect to MySQL database
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}


?>

<?php
$razorpay = array(
    'key_id' => 'rzp_test_lhmCfPyu3URHxq', 
    'key_secret' => 'fxFSts8bnQd4EViInJF6jCn5
    ');
?>