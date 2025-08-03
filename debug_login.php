<?php
// debug_login.php - Temporary debug version
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Debug Login Information</h2>";

// Check if session variables are set
echo "<h3>Session Information:</h3>";
echo "Session ID: " . session_id() . "<br>";
echo "Session variables: <pre>" . print_r($_SESSION, true) . "</pre>";

// Check POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h3>POST Data Received:</h3>";
    echo "<pre>" . print_r($_POST, true) . "</pre>";
}

// Test database connection
echo "<h3>Database Connection Test:</h3>";
require_once 'dbconnect.php';

if ($conn) {
    echo "✓ Database connection successful<br>";
    
    // Test query
    $result = mysqli_query($conn, "SELECT COUNT(*) as count FROM user");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo "✓ User table accessible. Total users: " . $row['count'] . "<br>";
        
        // Show all users (for debugging only)
        $result = mysqli_query($conn, "SELECT username, usertype FROM user");
        echo "Users in database:<br>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "- " . $row['username'] . " (" . $row['usertype'] . ")<br>";
        }
    } else {
        echo "✗ Error accessing user table: " . mysqli_error($conn) . "<br>";
    }
} else {
    echo "✗ Database connection failed<br>";
}

// Check if logged in
if (isset($_SESSION['user_id'])) {
    echo "<h3>Current Login Status:</h3>";
    echo "✓ User is logged in<br>";
    echo "User ID: " . $_SESSION['user_id'] . "<br>";
    echo "Username: " . $_SESSION['username'] . "<br>";
    echo "User type: " . $_SESSION['usertype'] . "<br>";
    
    if ($_SESSION['usertype'] == 'admin') {
        echo '<a href="admin.php">Go to Admin Panel</a><br>';
    } else {
        echo '<a href="customer.php">Go to Customer Panel</a><br>';
    }
    echo '<a href="logout.php">Logout</a><br>';
} else {
    echo "<h3>Not logged in</h3>";
    echo '<a href="login.php">Go to Login Page</a><br>';
}

echo '<br><a href="setup_db.php">Setup Database</a>';
?>
