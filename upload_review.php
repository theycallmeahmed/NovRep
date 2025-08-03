<?php
session_start();
require_once 'dbconnect.php';

// Check if admin is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['usertype'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Validate required fields
        if (empty($_POST['novelTitle']) || empty($_POST['author']) || empty($_POST['reviewContent']) || empty($_POST['rating'])) {
            throw new Exception("All fields are required.");
        }

        $novelTitle = trim($_POST['novelTitle']);
        $author = trim($_POST['author']);
        $reviewContent = trim($_POST['reviewContent']);
        $rating = intval($_POST['rating']);

        if ($rating < 1 || $rating > 5) {
            throw new Exception("Rating must be between 1 and 5.");
        }

        $coverImagePath = null;

        if (isset($_FILES['coverImage']) && $_FILES['coverImage']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'Img/';
            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            $maxFileSize = 5 * 1024 * 1024;

            if (!in_array($_FILES['coverImage']['type'], $allowedTypes)) {
                throw new Exception("Only JPG, PNG, and GIF files are allowed.");
            }

            if ($_FILES['coverImage']['size'] > $maxFileSize) {
                throw new Exception("File size must be less than 5MB.");
            }

            $fileExtension = pathinfo($_FILES['coverImage']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . '.' . $fileExtension;
            $targetPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['coverImage']['tmp_name'], $targetPath)) {
                $coverImagePath = $fileName;
            } else {
                throw new Exception("Failed to upload image.");
            }
        }

        $createTableQuery = "CREATE TABLE IF NOT EXISTS reviews (
            id INT AUTO_INCREMENT PRIMARY KEY,
            novel_title VARCHAR(255) NOT NULL,
            author VARCHAR(255) NOT NULL,
            review_content TEXT NOT NULL,
            rating INT NOT NULL,
            cover_image VARCHAR(255),
            admin_id INT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (admin_id) REFERENCES user(id)
        )";

        if (!$conn->query($createTableQuery)) {
            throw new Exception("Error creating table: " . $conn->error);
        }

        $sql = "INSERT INTO reviews (novel_title, author, review_content, rating, cover_image, admin_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Database error: " . $conn->error);
        }

        $stmt->bind_param("sssisi", $novelTitle, $author, $reviewContent, $rating, $coverImagePath, $_SESSION['user_id']);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Review uploaded successfully!";

            // Log the review upload in activity table
            $activityMsg = "New review published: \"$novelTitle\" by $author";
            $logStmt = $conn->prepare("INSERT INTO activity (description) VALUES (?)");
            $logStmt->bind_param("s", $activityMsg);
            $logStmt->execute();
            $logStmt->close();
        } else {
            throw new Exception("Error saving review: " . $stmt->error);
        }

        $stmt->close();

    } catch (Exception $e) {
        $_SESSION['error_message'] = $e->getMessage();
    }
}

// Redirect back to admin page
header("Location: admin.php");
exit();
?>
