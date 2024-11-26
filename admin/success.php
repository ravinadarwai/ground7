<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Successful</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    /* Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background: linear-gradient(135deg, #6dd5fa, #2980b9);
  color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.success-container {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.success-card {
  background: #fff;
  color: #333;
  padding: 20px 30px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
  max-width: 400px;
  width: 100%;
}

.icon {
  font-size: 50px;
  color: #2ecc71;
  margin-bottom: 20px;
}

h1 {
  font-size: 24px;
  margin-bottom: 10px;
}

p {
  font-size: 16px;
  margin-bottom: 20px;
}

.button {
  display: inline-block;
  padding: 10px 20px;
  background: #2980b9;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  transition: background 0.3s ease;
}

.button:hover {
  background: #6dd5fa;
}

  </style>
</head>
<body>
  <div class="success-container">
    <div class="success-card">
      <div class="icon">
        <i class="checkmark">✔</i>
      </div>
      <h1>Payment Successful</h1>
      <p>Your payment has been successfully processed. Thank you!</p>
      <a href="../index.php" class="button">Go to Home</a>
    </div>
  </div>
</body>
</html>
