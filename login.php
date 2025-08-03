<?php
session_start();
require_once 'dbconnect.php';

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Initialize login attempts counter
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['last_attempt_time'] = time();
}

// Process login if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add debug information (remove this in production)
    error_log("Login attempt started for user: " . ($_POST['username'] ?? 'unknown'));
    
    try {
        // Verify CSRF token
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            error_log("CSRF token mismatch");
            throw new Exception("Security token mismatch. Please try again.");
        }

        // Rate limiting check (5 attempts per 15 minutes)
        if ($_SESSION['login_attempts'] >= 5 && (time() - $_SESSION['last_attempt_time']) < 900) {
            throw new Exception("Too many attempts. Please wait 15 minutes.");
        }

        // Input validation
        if (empty($_POST['username']) || empty($_POST['password'])) {
            throw new Exception("Both username and password are required");
        }

        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // Secure database query with prepared statement
        $sql = "SELECT id, username, password, usertype FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            throw new Exception("Database error: " . $conn->error);
        }
        
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        error_log("Database query executed. Rows found: " . ($result ? $result->num_rows : 0));

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            error_log("User found: " . $user['username'] . ", Type: " . $user['usertype']);
            
            // PLAIN TEXT PASSWORD COMPARISON (INSECURE)
            if ($password === $user['password']) {
                // Successful login
                error_log("Password matched. Redirecting to: " . ($user['usertype'] == 'admin' ? 'admin.php' : 'customer.php'));
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['usertype'] = $user['usertype'];
                $_SESSION['login_attempts'] = 0;
                
                header("Location: " . ($user['usertype'] == 'admin' ? 'admin.php' : 'index.php'));
                exit();
            } else {
                error_log("Password mismatch for user: " . $username);
            }
        } else {
            error_log("No user found with username: " . $username);
        }

        // Failed login attempt
        $_SESSION['login_attempts']++;
        $_SESSION['last_attempt_time'] = time();
        throw new Exception("Invalid username or password");
        
    } catch (Exception $e) {
        $_SESSION['login_error'] = $e->getMessage();
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | NovRep</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #440020;
            --accent-color: #c96bff;
            --light-bg: #f8faf9;
        }
        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-image: url('images/book-bg.jpg');
            background-size: cover;
            background-position: center;
        }
        .login-container {
            max-width: 500px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
            border-top: 4px solid var(--primary-color);
            animation: fadeIn 0.5s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header h2 {
            color: var(--primary-color);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-control {
            height: 45px;
            border-radius: 4px;
            border: 1px solid #ddd;
            padding-left: 40px;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(201, 107, 255, 0.2);
        }
        .input-icon {
            position: absolute;
            left: 15px;
            top: 12px;
            color: #777;
        }
        .btn-login {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            margin-top: 10px;
        }
        .btn-login:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
        }
        .alert {
            border-left: 4px solid;
        }
        .alert-danger {
            border-color: #dc3545;
            animation: shake 0.5s;
        }
        .alert-warning {
            border-color: #ffc107;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }
        .footer-links {
            text-align: center;
            margin-top: 20px;
        }
        .footer-links a {
            color: var(--primary-color);
            margin: 0 10px;
            transition: color 0.3s;
        }
        .footer-links a:hover {
            color: var(--accent-color);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-container">
                    <div class="login-header">
                        <h2><i class="fas fa-book-open"></i> NovRep Login</h2>
                        <p>Access your novel reviews and recommendations</p>
                    </div>
                    
                    <?php if (!empty($_SESSION['login_error'])): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?= htmlspecialchars($_SESSION['login_error']) ?>
                        </div>
                        <?php unset($_SESSION['login_error']); ?>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 3): ?>
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i> 
                            You've had <?= $_SESSION['login_attempts'] ?> failed login attempts.
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="login.php" id="loginForm">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-user input-icon"></i></span>
                                <input type="text" class="form-control" name="username" placeholder="Username" required
                                       value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-lock input-icon"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-login btn-block">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </div>
                        
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                    </form>
                    
                    <div class="footer-links">
                        <a href="forgot-password.php"><i class="fas fa-key"></i> Forgot Password?</a>
                        <a href="register.php"><i class="fas fa-user-plus"></i> Create Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Focus animation
            $('.form-control').focus(function() {
                $(this).parent().find('.input-icon').css('color', '#c96bff');
            }).blur(function() {
                $(this).parent().find('.input-icon').css('color', '#777');
            });
            
            // Auto-dismiss alerts
            setTimeout(function() {
                $('.alert').not('.alert-warning').fadeOut('slow');
            }, 5000);
        });
    </script>
</body>
</html>