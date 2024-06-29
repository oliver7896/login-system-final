<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usersdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $transaction_id = $_POST['transaction_id'];
    $plan_id = $_SESSION['plan_id'];

    $sql = "INSERT INTO users (username, password, transaction_id, plan_id, is_verified) VALUES ('$username', '$password', '$transaction_id', '$plan_id', FALSE)";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! Please wait for admin approval.";
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <p>To complete your registration, please make a payment to the following account:</p>
        <p><strong>Account Number:</strong> +92 310 0605617</p>
        <p><strong>Bank:</strong> jazz cash</p>
        <p><strong>Account title:</strong> Faizan chutia</p>
        <p>After making the payment, enter the transaction ID below:</p>
        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="transaction_id" placeholder="Transaction ID" required>
            <button type="submit">Register</button>
        </form>
        <div class="link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
