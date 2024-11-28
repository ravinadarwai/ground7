<?php
// Include your database connection file
include('../config.php'); // Adjust the path to your config.php

// Fetch the Razorpay payment details from the response
$payment_id = $_POST['razorpay_payment_id'];
$order_id = $_POST['razorpay_order_id'];
$signature = $_POST['razorpay_signature'];
$user_id = $_POST['user_id']; // Assuming you have the user ID
$game_id = $_POST['game_id']; // Assuming you have the selected game ID
$booking_date = $_POST['booking_date']; // Booking date
$selected_slot = $_POST['selected_slot']; // Selected slot time

// Razorpay API Key for verification
$key_id = "rzp_test_lFKziUf5eoehFb"; // Your Razorpay API key

// Create the data string for verification
$attributes = $order_id . '|' . $payment_id;
$generated_signature = hash_hmac('sha256', $attributes, $key_id);

// Verify the signature
if ($generated_signature == $signature) {
    // Payment verified, store the booking details in the database

    // Insert booking data into the bookings table
    $query = "INSERT INTO bookings (user_id, game_id, booking_date, selected_slot, payment_id, order_id, payment_status) 
              VALUES (:user_id, :game_id, :booking_date, :selected_slot, :payment_id, :order_id, 'completed')";
    $stmt = $conn->prepare($query);

    // Bind the values to the query
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':game_id', $game_id);
    $stmt->bindParam(':booking_date', $booking_date);
    $stmt->bindParam(':selected_slot', $selected_slot);
    $stmt->bindParam(':payment_id', $payment_id);
    $stmt->bindParam(':order_id', $order_id);

    // Execute the query
    if ($stmt->execute()) {
        echo "Booking confirmed! Your payment has been successfully processed.";
    } else {
        echo "There was an error processing your booking. Please try again.";
    }
} else {
    echo "Payment verification failed. Please try again.";
}
?>
