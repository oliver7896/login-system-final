<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Complete Your Payment</h2>
        <p>Please send the payment to the following account number:</p>
        <p><strong>Account Number: 123456789</strong></p>
        <p>After sending the payment, enter the transaction ID below:</p>
        <form action="verify_payment.php" method="POST">
            <input type="text" name="transaction_id" placeholder="Transaction ID" required>
            <button type="submit">Submit Transaction ID</button>
        </form>
    </div>
</body>
</html>
