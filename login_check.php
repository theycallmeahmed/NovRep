<?php
session_start();
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];  // No need for mysqli_real_escape_string anymore
    $password = $_POST['password'];

    // === REPLACE WITH PREPARED STATEMENT ===
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    // =======================================

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_type'] = $user['user_type'];
            
            if ($user['user_type'] == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid username or password";
        }
    } else {
        $_SESSION['login_error'] = "User not found";
    }
    
    header("Location: login.php");
    exit();
}
?>