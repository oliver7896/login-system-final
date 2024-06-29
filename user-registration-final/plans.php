<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Plan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Select a Plan</h2>
        <form action="register.php" method="GET">
            <input type="radio" name="plan_id" value="1" required> Plan 1 (500 Rs) - Earn 10 points daily<br>
            <input type="radio" name="plan_id" value="2" required> Plan 2 (1000 Rs) - Earn 20 points daily<br>
            <button type="submit">Proceed to Registration</button>
        </form>
    </div>
</body>
</html>
