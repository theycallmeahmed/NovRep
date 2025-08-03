<?php
session_start();
require_once 'dbconnect.php';

// Validate and fetch review ID from URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid review ID.");
}
$review_id = intval($_GET['id']);

// Fetch review details from database
$sql = "SELECT * FROM reviews WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $review_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Review not found.");
}
$review = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($review['novel_title']); ?> - Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .review-header { background-color: #2c3e50; color: white; padding: 40px 0; text-align: center; }
        .review-content { padding: 40px 0; }
        .review-img { max-width: 100%; height: auto; border-radius: 10px; }
        .rating i { color: #f39c12; }
        .btn-back { background-color: #e74c3c; color: white; border: none; }
        .btn-back:hover { background-color: #c0392b; color: white; }
    </style>
</head>
<body>
    <!-- Navigation Header -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color:#2c3e50;">
        <div class="container">
            <a class="navbar-brand" href="#">NOVREP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="review.php">Reviews</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link btn btn-login" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="review-header">
        <div class="container">
            <h1><?php echo htmlspecialchars($review['novel_title']); ?></h1>
            <p>By: <?php echo htmlspecialchars($review['author']); ?></p>
            <div class="rating">
                <?php
                $rating = intval($review['rating']);
                for ($i = 0; $i < 5; $i++) {
                    if ($i < $rating) echo '<i class="fas fa-star"></i>';
                    else echo '<i class="far fa-star"></i>';
                }
                ?>
                <span><?php echo $rating; ?>/5</span>
            </div>
        </div>
    </div>

    <!-- Review Content -->
    <div class="container review-content">
        <div class="row">
            <div class="col-md-4 mb-4">
                <img src="Img/<?php echo htmlspecialchars($review['cover_image']); ?>" alt="<?php echo htmlspecialchars($review['novel_title']); ?>" class="review-img">
            </div>
            <div class="col-md-8">
                <p><?php echo nl2br(htmlspecialchars($review['review_content'])); ?></p>
                <a href="review.php" class="btn btn-back mt-4"><i class="fas fa-arrow-left"></i> Back to Reviews</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Urdu Novels Review. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
