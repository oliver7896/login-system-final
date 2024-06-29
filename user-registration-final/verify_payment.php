<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaction_id = $_POST['transaction_id'];

    // In a real-world scenario, you would verify this transaction ID with your payment provider or manually check it.
    // For demonstration purposes, let's assume the transaction ID is valid if it's not empty.
    if (!empty($transaction_id)) {
        $_SESSION['transaction_id'] = $transaction_id;
        header("Location: register.php");
        exit();
    } else {
        echo "Invalid transaction ID.";
    }
}
?>
