<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Database connection details
$servername = "localhost";
$db_username = "root"; // Your MySQL username
$db_password = "";     // Your MySQL password
$dbname = "usersdb";

// Establish connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the current user's data
$username = $_SESSION['username'];
$sql = "SELECT points FROM users WHERE username='$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
$points = $user['points'];

// Handle earning points
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $points += 10; // Add 10 points
    $sql = "UPDATE users SET points=$points WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php"); // Reload the page to update points
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>You have <?php echo $points; ?> points.</p>
    <form method="post" action="dashboard.php">
        <button type="submit">Earn 10 Points</button>
    </form>
    <div class="link">
        <a href="logout.php">Logout</a>
    </div>
</div>
</body>
</html>
