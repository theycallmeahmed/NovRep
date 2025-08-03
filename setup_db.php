<?php
// setup_db.php - Run this once to set up the database
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$password = "";
$db = "login";

// Create connection
$conn = mysqli_connect($host, $user, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS login";
if (mysqli_query($conn, $sql)) {
    echo "Database 'login' created or already exists.<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

// Select the database
mysqli_select_db($conn, $db);

// Create user table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    usertype ENUM('admin', 'customer') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table 'user' created or already exists.<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

// Insert a test admin user (password: admin123)
$sql = "INSERT INTO user (username, password, usertype) VALUES ('admin', 'admin123', 'admin') 
        ON DUPLICATE KEY UPDATE password='admin123', usertype='admin'";

if (mysqli_query($conn, $sql)) {
    echo "Admin user created/updated: username='admin', password='admin123'<br>";
} else {
    echo "Error creating admin user: " . mysqli_error($conn) . "<br>";
}

// Insert a test customer user (password: customer123)
$sql = "INSERT INTO user (username, password, usertype) VALUES ('customer', 'customer123', 'customer') 
        ON DUPLICATE KEY UPDATE password='customer123', usertype='customer'";

if (mysqli_query($conn, $sql)) {
    echo "Customer user created/updated: username='customer', password='customer123'<br>";
} else {
    echo "Error creating customer user: " . mysqli_error($conn) . "<br>";
}

// Display all users
echo "<h3>Current users in database:</h3>";
$result = mysqli_query($conn, "SELECT id, username, usertype FROM user");
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . ", Username: " . $row['username'] . ", Type: " . $row['usertype'] . "<br>";
    }
} else {
    echo "Error retrieving users: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
