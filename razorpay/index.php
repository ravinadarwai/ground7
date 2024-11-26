<?php 
require_once('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

$api_key = 'rzp_test_lhmCfPyu3URHxq'; // Your API Key
$api_secret = 'fxFSts8bnQd4EViInJF6jCn5'; // Your API Secret

// Initialize Razorpay API
$razorpay = new Api($api_key, $api_secret);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['amount'])) {
    $amount = $_POST['amount'] * 100; // Convert amount to paise

    try {
        // Create an order
        $order = $razorpay->order->create([
            'receipt' => 'order_receipt_id',
            'amount' => $amount,
            'currency' => 'INR', // Currency
        ]);
        $order_id = $order->id; // Get the order ID

        // Set your callback URL
        $callback_url = "http://localhost:8000/success.html";

        // Include Razorpay Checkout.js library
        echo '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>';

        // Create a payment button with Checkout.js
        echo '<button onclick="startPayment()">Pay with Razorpay</button>';

        // Add a script to handle the payment
        echo '<script>
            function startPayment() {
                var options = {
                    key: "' . $api_key . '", // Enter the Key ID generated from the Dashboard
                    amount: ' . $order->amount . ', // Amount in currency subunits. Default currency is INR. Hence, 100 refers to ₹1.00
                    currency: "INR",
                    name: "Acme Corp",
                    description: "Test transaction",
                    image: "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
                    order_id: "' . $order_id . '", // Use the `id` obtained in the response of Step 1
                    prefill: {
                        name: "Gaurav Kumar",
                        email: "gaurav.kumar@example.com",
                        contact: "9000090000"
                    },
                    notes: {
                        address: "Razorpay Corporate Office"
                    },
                    theme: {
                        "color": "#3399cc"
                    },
                    callback_url: "' . $callback_url . '"
                };
                var rzp = new Razorpay(options);
                rzp.open();
            }
        </script>';
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage(); // Output the exact error message
    }
} else {
    // Display the form to take the amount input
    echo '<form method="POST">
            <label for="amount">Enter Amount:</label>
            <input type="number" name="amount" id="amount" required>
            <button type="submit">Submit</button>
          </form>';
}
?>

