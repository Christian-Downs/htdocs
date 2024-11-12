<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>You have been logged out</h1>
        <p>Thank you for visiting. You have successfully logged out.</p>
        <a href="login.php">Login again</a>
    </div>
</body>
</html>
<?php
session_start();
session_unset();
session_destroy();
?>