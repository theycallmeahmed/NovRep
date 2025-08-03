<?php
session_start();
require_once 'dbconnect.php';

// Check if admin is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['usertype'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Fetch recent activity
$activity_query = "SELECT * FROM activity ORDER BY created_at DESC LIMIT 10";
$activity_result = mysqli_query($conn, $activity_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Novel Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --admin-dark: #1a237e;
            --admin-primary: #303f9f;
            --admin-light: #7986cb;
            --admin-accent: #ffc107;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .admin-header {
            background-color: var(--admin-dark);
            color: white;
            padding: 20px 0;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .admin-card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
            border-left: 4px solid var(--admin-primary);
        }

        .admin-card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            font-weight: 600;
        }

        .btn-admin {
            background-color: var(--admin-primary);
            color: white;
            border: none;
            padding: 10px 20px;
            font-weight: 500;
        }

        .btn-admin:hover {
            background-color: var(--admin-dark);
            color: white;
        }

        .btn-admin-accent {
            background-color: var(--admin-accent);
            color: #212529;
        }

        .btn-logout {
            background-color: #dc3545;
            color: white;
        }

        .btn-logout:hover {
            background-color: #bb2d3b;
            color: white;
        }

        .sidebar {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            height: 100%;
        }

        .sidebar-link {
            color: #495057;
            padding: 10px 15px;
            display: block;
            text-decoration: none;
            border-left: 3px solid transparent;
        }

        .sidebar-link:hover, .sidebar-link.active {
            background-color: #f8f9fa;
            border-left: 3px solid var(--admin-primary);
            color: var(--admin-primary);
        }

        .user-greeting {
            color: var(--admin-accent);
            font-weight: 500;
        }
    </style>
</head>
<body>
    <!-- Admin Header with Logout -->
    <header class="admin-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1><i class="fas fa-book-open"></i> Novel Reviews Admin</h1>
                <div>
                    <span class="user-greeting me-3">
                        <i class="fas fa-user-shield"></i> Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>
                    </span>
                    <a href="?logout=true" class="btn btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-md-3 mb-4">
                <div class="sidebar p-3">
                    <h5 class="mb-3"><i class="fas fa-tachometer-alt"></i> Dashboard</h5>
                    <a href="#" class="sidebar-link active">
                        <i class="fas fa-home"></i> Overview
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-upload"></i> Upload Reviews
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-book"></i> Manage Novels
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-users"></i> Users
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Upload Review Card -->
                <div class="admin-card">
                    <div class="card-header">
                        <i class="fas fa-upload"></i> Upload New Review
                    </div>
                    <div class="card-body">
                        <form action="upload_review.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="novelTitle" class="form-label">Novel Title</label>
                                <input type="text" class="form-control" id="novelTitle" name="novelTitle" required>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" name="author" required>
                            </div>
                            <div class="mb-3">
                                <label for="reviewContent" class="form-label">Review Content</label>
                                <textarea class="form-control" id="reviewContent" name="reviewContent" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="coverImage" class="form-label">Cover Image</label>
                                <input type="file" class="form-control" id="coverImage" name="coverImage" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating (1-5)</label>
                                <select class="form-select" id="rating" name="rating" required>
                                    <option value="5">★★★★★ - Excellent</option>
                                    <option value="4">★★★★ - Good</option>
                                    <option value="3">★★★ - Average</option>
                                    <option value="2">★★ - Below Average</option>
                                    <option value="1">★ - Poor</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-admin">
                                <i class="fas fa-upload"></i> Publish Review
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Recent Activity Card -->
                <div class="admin-card">
                    <div class="card-header">
                        <i class="fas fa-history"></i> Recent Activity
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <?php if (mysqli_num_rows($activity_result) > 0): ?>
                                <?php while($act = mysqli_fetch_assoc($activity_result)): ?>
                                    <div class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1"><?php echo htmlspecialchars($act['description']); ?></h6>
                                            <small><?php echo date('M d, Y H:i', strtotime($act['created_at'])); ?></small>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <div class="list-group-item">No recent activity.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>