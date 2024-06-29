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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify_user_id'])) {
    $user_id = $_POST['verify_user_id'];
    $sql = "UPDATE users SET is_verified = TRUE WHERE id = $user_id";

    if ($conn->query($sql) === TRUE) {
        echo "User verified successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM users WHERE is_verified = FALSE";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Admin Panel</h2>
        <h3>Unverified Users</h3>
        <form action="admin.php" method="POST">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div>User: " . $row['username'] . " - Transaction ID: " . $row['transaction_id'];
                    echo "<button type='submit' name='verify_user_id' value='" . $row['id'] . "'>Verify</button></div>";
                }
            } else {
                echo "No unverified users.";
            }
            ?>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
