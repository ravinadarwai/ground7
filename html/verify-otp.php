<?php
session_start();
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $otp = $_POST['otp'];

    if (empty($otp)) {
        echo "OTP is required.";
        exit;
    }

    // Retrieve session ID and phone from the session
    if (!isset($_SESSION['session_id']) || !isset($_SESSION['phone'])) {
        echo "No OTP session found. Please try again.";
        exit;
    }

    $sessionId = $_SESSION['session_id'];
    $phone = $_SESSION['phone'];
    $apiKey = "1b2b5c89-a05c-11ef-8b17-0200cd936042";

    // Verify OTP URL
    $url = "https://2factor.in/API/V1/$apiKey/SMS/VERIFY/$sessionId/$otp";

    // Verify OTP using cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Decode API response
    $result = json_decode($response, true);

    if ($result['Status'] === 'Success') {
        // Construct full name from session or fallback to phone
        $firstName = $_SESSION['first_name'] ?? '';
        $lastName = $_SESSION['last_name'] ?? '';
        $fullName = trim("$firstName $lastName") ?: $phone; // Fallback to phone if name is not provided

        // Save user details in the database
        $stmt = $conn->prepare("
            INSERT INTO users (email, phone, first_name, last_name, full_name, verifiedEmail, created_at)
            VALUES (:email, :phone, :first_name, :last_name, :full_name, :verifiedEmail, NOW())
        ");
        $stmt->execute([
            ':email' => $_SESSION['email'] ?? '', // Ensure email is collected earlier in the flow
            ':phone' => $phone,
            ':first_name' => $firstName,
            ':last_name' => $lastName,
            ':full_name' => $fullName,
            ':verifiedEmail' => 1, // Mark as verified
        ]);

        // Set session for username (full name)
        $_SESSION['username'] = $fullName;

        unset($_SESSION['session_id']); // Clear session ID
        unset($_SESSION['phone']); // Clear phone number
        echo "OTP verified successfully.";
        header("Location: ../index.php");
        exit;
    } else {
        echo "Failed to verify OTP. Error: " . $result['Details'];
    }
}
?>
