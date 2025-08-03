<?php
session_start();
session_unset();
session_destroy();

// Redirect to login page after logout
header("Location: login.php");
exit();
?>

<!-- Just in case header fails, fallback HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logging Out...</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .message-box {
            background-color: white;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .message-box h2 {
            color: #440020;
        }
        .btn-primary {
            background-color: #440020;
            border: none;
        }
        .btn-primary:hover {
            background-color: #5c0030;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h2>You have been logged out.</h2>
        <p><a href="login.php" class="btn btn-primary mt-3">Login Again</a></p>
    </div>
</body>
</html>