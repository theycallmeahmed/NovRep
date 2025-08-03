<?php
$host = "localhost";
$user = "u403217049_admin";
$password = "Sheikhahmed1523";
$db = "u403217049_NovRep";  

// Commented out HTTPS redirect for development
// if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
//     header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
//     exit();
// }

// Create connection
$conn = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to UTF-8
mysqli_set_charset($conn, "utf8");
?>