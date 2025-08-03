<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testing database connection...\n";

$host = "localhost";
$user = "root";
$password = "";
$db = "login";

// Create connection without HTTPS check
$conn = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error() . "\n";
    exit();
}

echo "Connection successful!\n";

// Show tables
$result = mysqli_query($conn, "SHOW TABLES");
if ($result) {
    echo "Tables in database:\n";
    while ($row = mysqli_fetch_array($result)) {
        echo "- " . $row[0] . "\n";
    }
} else {
    echo "Error showing tables: " . mysqli_error($conn) . "\n";
}

// Check user table structure
$result = mysqli_query($conn, "DESCRIBE user");
if ($result) {
    echo "\nUser table structure:\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "- " . $row['Field'] . " (" . $row['Type'] . ")\n";
    }
} else {
    echo "Error describing user table: " . mysqli_error($conn) . "\n";
}

// Check existing users
$result = mysqli_query($conn, "SELECT id, username, usertype FROM user LIMIT 5");
if ($result) {
    echo "\nExisting users:\n";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "- ID: " . $row['id'] . ", Username: " . $row['username'] . ", Type: " . $row['usertype'] . "\n";
    }
} else {
    echo "Error selecting users: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);
?>
