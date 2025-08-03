<?php
session_start();
require_once 'dbconnect.php';

// Fetch latest 3 reviews
$sql = "SELECT * FROM reviews ORDER BY created_at DESC LIMIT 3";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NovRep - Novel Reviews</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
    }
    .navbar {
      background-color: #440020;
    }
    .navbar-brand {
      color: white;
      font-weight: bold;
      letter-spacing: 2px;
    }
    .nav-link {
      color: white !important;
      margin-right: 15px;
    }
    .btn-login {
      background-color: #c96bff;
      border: none;
      padding: 6px 15px;
      color: white;
      border-radius: 5px;
    }
    .hero-section {
      background: url('images/classroom.jpg') center center/cover no-repeat;
      height: 400px;
      position: relative;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.6);
    }
    .hero-text {
      font-size: 3rem;
      font-weight: bold;
    }
    .section-title {
      text-align: center;
      margin: 50px 0 30px;
      color: #440020;
    }
    .review-card img {
      height: 250px;
      object-fit: cover;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .review-card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    }
    .review-card:hover {
      transform: translateY(-5px);
    }
    .footer {
      background-color: #440020;
      color: white;
      text-align: center;
      padding: 30px 0;
      margin-top: 50px;
    }
    .social-icons a {
      color: white;
      margin: 0 10px;
      font-size: 1.5rem;
    }
    @media (max-width: 768px) {
      .hero-text { font-size: 2rem; }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">NOVREP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="review.php">Reviews</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
          <li class="nav-item"><a class="nav-link btn-login" href="logout.php">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link btn-login" href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<div class="hero-section">
  <div class="hero-text text-center">We Read for Fun</div>
</div>

<!-- Welcome Section -->
<div class="container my-5">
  <div class="row align-items-center">
    <div class="col-md-6">
      <img src="Img/home.jpg" alt="Welcome" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-md-6">
      <h2>Welcome to NovRep</h2>
      <p>Discover NovRep, your go-to platform for Urdu novel reviews. We provide detailed summaries, author insights, and critical analysis for readers and enthusiasts. Whether you’re into classics or contemporary literature, you’ll find something engaging here.</p>
    </div>
  </div>
</div>

<!-- Latest Reviews Section -->
<div class="container">
  <h2 class="section-title">Latest Reviews</h2>
  <div class="row">
    <?php if (mysqli_num_rows($result) > 0): ?>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="col-md-4 mb-4">
          <div class="card review-card h-100">
            <img src="Img/<?php echo htmlspecialchars($row['cover_image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['novel_title']); ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($row['novel_title']); ?></h5>
              <p class="card-text"><?php echo substr(htmlspecialchars($row['review_content']), 0, 100) . '...'; ?></p>
              <a href="review_details.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Read More</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="text-center">No reviews available at the moment.</p>
    <?php endif; ?>
  </div>
</div>

<!-- Footer -->
<div class="footer">
  <p>&copy; 2023 NovRep. All rights reserved.</p>
  <div class="social-icons">
    <a href="#"><i class="fab fa-facebook"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
