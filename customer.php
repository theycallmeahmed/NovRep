<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NovRep - Novel Reviews</title>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"/>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
    *{
    color: purple;
    font: size 70px;;
     }

    :root {
      --primary-color: #002244;
      --secondary-color: #f8f9fa;
      --accent-color: #ff6b6b;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
      line-height: 1.6;
      overflow-x: hidden;
    }
    
    .navbar {
      background-color: var(--primary-color);
      padding: 15px 0;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .logo {
      color: white;
      font-size: 28px;
      font-weight: 700;
      margin-left: 20px;
      text-transform: uppercase;
      letter-spacing: 2px;
    }
    
    .nav-links {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
      align-items: center;
    }
    
    .nav-links li {
      margin-left: 30px;
    }
    
    .nav-links a {
      color: white;
      text-decoration: none;
      font-size: 16px;
      transition: all 0.3s ease;
    }
    
    .nav-links a:hover {
      color: var(--accent-color);
    }
    
    .btn-login {
      background-color: var(--accent-color);
      padding: 8px 20px;
      border-radius: 4px;
      font-weight: 600;
    }
    
    .btn-login:hover {
      background-color: #ff5252;
      color: white;
    }
    
    .section1 {
      position: relative;
      height: 500px;
      overflow: hidden;
    }
    
    .main_img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: brightness(0.7);
    }
    
    .img_text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      font-size: 72px;
      font-weight: 700;
      text-align: center;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
      width: 100%;
    }
    
    .welcome_img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .container {
      padding: 60px 0;
    }
    
    h1, h2, h3 {
      color: var(--primary-color);
    }
    
    .desc {
      margin-top: 15px;
      text-align: justify;
    }
    
    .reviews, .teacher {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 20px;
      transition: transform 0.3s ease;
    }
    
    .reviews:hover, .teacher:hover {
      transform: scale(1.03);
    }
    
    .centered {
      padding: 40px 0;
      background-color: var(--secondary-color);
    }
    
    footer {
      background-color: var(--primary-color);
      color: white;
      padding: 30px 0;
      text-align: center;
    }
    
    .social-icons {
      margin: 20px 0;
    }
    
    .social-icons a {
      color: white;
      font-size: 24px;
      margin: 0 10px;
      transition: color 0.3s ease;
    }
    
    .social-icons a:hover {
      color: var(--accent-color);
    }
    
    @media (max-width: 768px) {
      .img_text {
        font-size: 48px;
      }
      
      .section1 {
        height: 300px;
      }
      
      .welcome_img {
        margin-bottom: 30px;
      }
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <label class="navbar-brand logo">novrep</label>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right nav-links">
          <li><a href="#">Home</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="review.php">Reviews</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="section1">
    <label class="img_text">We read for fun.</label>
    <img class="main_img" src="images/classroom.jpg" alt="Classroom" />
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img class="welcome_img" src="Img/bg.jpg" alt="bg" />
      </div>
      <div class="col-md-8">
        <h1>Welcome to NovRep</h1>
        <p class="lead">Discover NovRep, the go-to website for in-depth novel reports, summaries, and analyses! Whether you're a student, book lover, or researcher, NovRep provides detailed, well-structured reports on a wide range of novels—from classic literature to contemporary bestsellers.</p>
        <p>Our platform offers comprehensive summaries, thematic and character analysis, and critical reviews to enhance your understanding of literature. Perfect for students preparing for exams, book clubs looking for discussion guides, or casual readers who want a deeper look into their favorite novels.</p>
      </div>
    </div>
  </div>

  <div class="centered">
    <div class="container">
      <h1>Reviews</h1>
      <p class="text-center">Explore our latest novel reviews and discover your next read</p>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="thumbnail">
          <img class="reviews" src="Img/PeereKamil.jpg" alt="Peerekamil" />
          <div class="caption">
            <h3>Peer e Kamil</h3>
            <p class="desc">Peer-e-Kamil (S.A.W.) by Umera Ahmed is one of the most influential Urdu novels of modern times, blending spiritual awakening with emotional storytelling. The novel follows Imama Hashim, a girl who embraces Islam after a personal journey, and Salar Sikander, a genius grappling with existential emptiness.</p>
            <p><a href="#" class="btn btn-primary" role="button">Read More</a></p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="thumbnail">
          <img class="teacher" src="Img/rajagidht.jpg" alt="Raja Gidh" />
          <div class="caption">
            <h3>Raja Gidh</h3>
            <p class="desc">Raja Gidh by Bano Qudsia is a cornerstone of Urdu literature, renowned for its psychological depth and philosophical undertones. The novel examines human nature, forbidden desires, and moral decay through its complex characters, particularly Qayyum, whose internal conflicts drive the narrative.</p>
            <p><a href="#" class="btn btn-primary" role="button">Read More</a></p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="thumbnail">
          <img class="teacher" src="Img/Musaf.jpg" alt="Musaf" />
          <div class="caption">
            <h3>Mushaf</h3>
            <p class="desc">Mushaf by Nemrah Ahmed offers a refreshing take on supernatural fiction within an Islamic framework, combining mystery, romance, and elements of the unseen. The story revolves around Mehmal, whose life becomes entangled with a haunted Quran, unveiling secrets from a past life.</p>
            <p><a href="#" class="btn btn-primary" role="button">Read More</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3>NovRep</h3>
          <p>Your ultimate destination for novel reviews and analysis.</p>
        </div>
        <div class="col-md-4">
          <h3>Quick Links</h3>
          <ul class="list-unstyled">
            <li><a href="#">Home</a></li>
            <li><a href="#">Reviews</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h3>Connect With Us</h3>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
      <hr>
      <p class="text-center">&copy; 2023 NovRep. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>