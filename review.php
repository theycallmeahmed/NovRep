<?php
session_start();
require_once 'dbconnect.php';  // Ensure this path is correct

// Fetch latest reviews from the database
$sql = "SELECT * FROM reviews ORDER BY created_at DESC LIMIT 9";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urdu Novels Review</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* Keep all your existing styles here */
        .novel-img {
            height: 300px;
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>
<body>
     <!-- Navigation -->
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

    <!-- Hero Section -->
    <section class="hero-section text-center text-white py-5" style="background-color:#34495e;">
        <div class="container">
            <h1 class="hero-title">Detailed Reviews of Urdu Novels</h1>
            <p class="hero-subtitle">Quality analysis of the best classic and contemporary Urdu literature</p>
        </div>
    </section>

    <!-- Latest Reviews Section -->
    <section class="latest-section py-5">
        <div class="container">
            <h2 class="text-center mb-5" style="color:#2c3e50;">Latest Reviews</h2>
            <div class="row">
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card novel-card">
                                <img src="Img/<?php echo htmlspecialchars($row['cover_image']); ?>" class="novel-img" alt="<?php echo htmlspecialchars($row['novel_title']); ?>">
                                <div class="card-body">
                                    <h3 class="novel-title"><?php echo htmlspecialchars($row['novel_title']); ?></h3>
                                    <p class="novel-author">By: <?php echo htmlspecialchars($row['author']); ?></p>
                                    <div class="rating">
                                        <?php
                                        $rating = intval($row['rating']);
                                        for ($i = 0; $i < 5; $i++) {
                                            if ($i < $rating) echo '<i class="fas fa-star"></i>';
                                            else echo '<i class="far fa-star"></i>';
                                        }
                                        ?>
                                        <span><?php echo $rating; ?>/5</span>
                                    </div>
                                    <p class="novel-description"><?php echo substr(htmlspecialchars($row['review_content']), 0, 100) . '...'; ?></p>
                                    <a href="review_details.php?id=<?php echo $row['id']; ?>" class="btn btn-review">Read Full Review</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-center">No reviews found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2023 Urdu Novels Review. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>