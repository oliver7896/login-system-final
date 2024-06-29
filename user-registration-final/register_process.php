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
    <title>Register Process</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Register Process</h2>
        <p>Processing your registration...</p>
    </div>
</body>
</html>
