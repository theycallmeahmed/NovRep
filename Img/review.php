<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Urdu Novel Reviews | NovRep</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    :root {
      --primary-color: #002244;
      --secondary-color: #f8f9fa;
      --accent-color: #ff6b6b;
      --text-color: #333;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--text-color);
      background-color: #f5f5f5;
    }
    
    .navbar {
      background-color: var(--primary-color);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .navbar-brand {
      font-weight: 700;
      font-size: 24px;
      letter-spacing: 1px;
    }
    
    .nav-link {
      font-weight: 500;
    }
    
    .btn-login {
      background-color: var(--accent-color);
      color: white;
      font-weight: 600;
    }
    
    .hero-section {
      background: linear-gradient(rgba(0, 34, 68, 0.8), rgba(0, 34, 68, 0.8)), 
                  url('images/library-bg.jpg');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 100px 0;
      text-align: center;
    }
    
    .book-card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      margin-bottom: 30px;
      overflow: hidden;
      background-color: white;
    }
    
    .book-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    
    .book-img {
      height: 350px;
      object-fit: cover;
      width: 100%;
    }
    
    .book-body {
      padding: 20px;
    }
    
    .book-title {
      color: var(--primary-color);
      font-weight: 700;
      margin-bottom: 10px;
    }
    
    .author {
      color: #666;
      font-style: italic;
      margin-bottom: 15px;
    }
    
    .rating {
      color: #ffc107;
      margin-bottom: 15px;
    }
    
    .review-text {
      margin-bottom: 15px;
      text-align: justify;
    }
    
    .read-more {
      color: var(--primary-color);
      font-weight: 600;
      text-decoration: none;
    }
    
    .filter-buttons {
      margin: 30px 0;
    }
    
    .filter-btn {
      margin: 5px;
      border-radius: 20px;
    }
    
    .active-filter {
      background-color: var(--primary-color);
      color: white;
    }
    
    footer {
      background-color: var(--primary-color);
      color: white;
      padding: 40px 0;
    }
    
    .social-icon {
      color: white;
      font-size: 1.5rem;
      margin: 0 10px;
      transition: color 0.3s ease;
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">NOVREP</a>
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
  <section class="hero-section">
    <div class="container">
      <h1 class="display-4 fw-bold mb-3">Urdu Novel Reviews</h1>
      <p class="lead">Discover in-depth reviews of popular Urdu novels</p>
    </div>
  </section>

  <!-- Filter Buttons -->
  <div class="container filter-buttons text-center">
    <button class="btn btn-outline-primary filter-btn active-filter" data-filter="all">All</button>
    <button class="btn btn-outline-primary filter-btn" data-filter="romance">Romance</button>
    <button class="btn btn-outline-primary filter-btn" data-filter="spiritual">Spiritual</button>
    <button class="btn btn-outline-primary filter-btn" data-filter="drama">Drama</button>
  </div>

  <!-- Book Reviews Section -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        <?php
        // Novel data array
        $novels = [
          [
            'title' => 'Alif',
            'author' => 'Umera Ahmed',
            'image' => 'images/alif.jpg',
            'rating' => 4.5,
            'category' => 'spiritual',
            'review' => 'Alif is a spiritual journey that explores the connection between art and faith. The novel follows Momina Sultan, a talented actress who undergoes a transformation after encountering a mysterious script.'
          ],
          [
            'title' => 'Ishq e Atish',
            'author' => 'Nemrah Ahmed',
            'image' => 'images/ishq-e-atish.jpg',
            'rating' => 4,
            'category' => 'romance',
            'review' => 'A passionate love story that explores the destructive power of obsessive love. The novel follows the intense relationship between two individuals whose love burns like fire.'
          ],
          [
            'title' => 'Jannat k Patty',
            'author' => 'Nemrah Ahmed',
            'image' => 'images/jannat-k-patty.jpg',
            'rating' => 5,
            'category' => 'romance',
            'review' => 'This novel presents a beautiful love story with elements of destiny and divine intervention. The protagonist\'s journey through love and loss is both heartbreaking and uplifting.'
          ],
          [
            'title' => 'Lahasil',
            'author' => 'Umera Ahmed',
            'image' => 'images/lahasil.jpg',
            'rating' => 4,
            'category' => 'drama',
            'review' => 'A thought-provoking novel that examines the consequences of greed and materialism. The story follows a young man\'s relentless pursuit of wealth.'
          ],
          [
            'title' => 'Namal',
            'author' => 'Nemrah Ahmed',
            'image' => 'images/namal.jpg',
            'rating' => 4.5,
            'category' => 'drama',
            'review' => 'A gripping mystery thriller with supernatural elements. The novel follows Faris, who wakes up with no memory of his past.'
          ],
          [
            'title' => 'Namoos',
            'author' => 'Razia Butt',
            'image' => 'images/namoos.jpg',
            'rating' => 5,
            'category' => 'drama',
            'review' => 'A classic Urdu novel that explores themes of honor, love, and sacrifice. The story revolves around a family torn between tradition and modern values.'
          ],
          [
            'title' => 'Parizad',
            'author' => 'Ashfaq Ahmed',
            'image' => 'images/parizad.jpg',
            'rating' => 5,
            'category' => 'spiritual',
            'review' => 'A philosophical novel that follows the journey of Parizad, a simple man who becomes a spiritual seeker. Explores the meaning of life and divine wisdom.'
          ],
          [
            'title' => 'Rooh e Yaram',
            'author' => 'Farhat Ishtiaq',
            'image' => 'images/rooh-e-yaram.jpg',
            'rating' => 4,
            'category' => 'romance',
            'review' => 'A beautiful love story that transcends time and circumstances. The novel explores the concept of soulmates through its protagonists.'
          ],
          [
            'title' => 'Zindagi Guzar Hai',
            'author' => 'Farhat Ishtiaq',
            'image' => 'images/zindagi-guzar-hai.jpg',
            'rating' => 4.5,
            'category' => 'drama',
            'review' => 'A poignant story about life\'s struggles and the resilience of the human spirit. Follows multiple characters whose lives intertwine.'
          ]
        ];

        // Display novels
        foreach ($novels as $novel) {
          $stars = str_repeat('<i class="fas fa-star"></i>', floor($novel['rating']));
          if (fmod($novel['rating'], 1) >= 0.5) {
            $stars .= '<i class="fas fa-star-half-alt"></i>';
          }
          $stars .= str_repeat('<i class="far fa-star"></i>', 5 - ceil($novel['rating']));
          
          echo '
          <div class="col-lg-4 col-md-6" data-category="'.$novel['category'].'">
            <div class="book-card">
              <img src="'.$novel['image'].'" alt="'.$novel['title'].'" class="book-img">
              <div class="book-body">
                <h3 class="book-title">'.$novel['title'].'</h3>
                <p class="author">By '.$novel['author'].'</p>
                <div class="rating">
                  '.$stars.'
                  <span class="ms-2">'.$novel['rating'].'/5</span>
                </div>
                <p class="review-text">'.$novel['review'].'...</p>
                <a href="review-detail.php?title='.urlencode($novel['title']).'" class="read-more">Read full review →</a>
              </div>
            </div>
          </div>';
        }
        ?>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <h3>NOVREP</h3>
          <p>Your trusted source for in-depth Urdu novel reviews and literary analysis.</p>
        </div>
        <div class="col-lg-4 mb-4 mb-lg-0">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="index.php" class="text-white">Home</a></li>
            <li class="mb-2"><a href="review.php" class="text-white">Book Reviews</a></li>
            <li class="mb-2"><a href="contact.php" class="text-white">Contact Us</a></li>
            <li><a href="login.php" class="text-white">Login</a></li>
          </ul>
        </div>
        <div class="col-lg-4">
          <h5>Connect With Us</h5>
          <div class="mt-3">
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-goodreads"></i></a>
          </div>
        </div>
      </div>
      <hr class="my-4 bg-light">
      <div class="text-center">
        <p class="mb-0">&copy; <?php echo date("Y"); ?> NovRep. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Filtering Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const filterButtons = document.querySelectorAll('.filter-btn');
      
      filterButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Remove active class from all buttons
          filterButtons.forEach(btn => btn.classList.remove('active-filter'));
          
          // Add active class to clicked button
          this.classList.add('active-filter');
          
          const filterValue = this.getAttribute('data-filter');
          const books = document.querySelectorAll('[data-category]');
          
          books.forEach(book => {
            if (filterValue === 'all' || book.getAttribute('data-category') === filterValue) {
              book.style.display = 'block';
            } else {
              book.style.display = 'none';
            }
          });
        });
      });
    });
  </script>
</body>
</html>