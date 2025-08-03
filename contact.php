<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - NovRep</title>
  
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
    
    .btn-login:hover {
      background-color: #e05555;
    }
    
    .contact-header {
      background: linear-gradient(rgba(0, 34, 68, 0.8), rgba(0, 34, 68, 0.8)), 
                  url('https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1673&q=80');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 100px 0;
      text-align: center;
    }
    
    .contact-card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
      margin-bottom: 30px;
    }
    
    .contact-card:hover {
      transform: translateY(-5px);
    }
    
    .contact-icon {
      font-size: 2rem;
      color: var(--primary-color);
      margin-bottom: 15px;
    }
    
    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.25rem rgba(0, 34, 68, 0.25);
    }
    
    .btn-submit {
      background-color: var(--primary-color);
      color: white;
      font-weight: 600;
      padding: 10px 25px;
    }
    
    .btn-submit:hover {
      background-color: #001a36;
      color: white;
    }
    
    .map-container {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    footer {
      background-color: var(--primary-color);
      color: white;
    }
    
    .social-icon {
      color: white;
      font-size: 1.5rem;
      margin: 0 10px;
      transition: color 0.3s ease;
    }
    
    .social-icon:hover {
      color: var(--accent-color);
    }
    
    .floating-label {
      position: relative;
      margin-bottom: 20px;
    }
    
    .floating-label label {
      position: absolute;
      top: 10px;
      left: 15px;
      color: #999;
      transition: all 0.3s ease;
      pointer-events: none;
    }
    
    .floating-label input:focus + label,
    .floating-label input:not(:placeholder-shown) + label,
    .floating-label textarea:focus + label,
    .floating-label textarea:not(:placeholder-shown) + label {
      top: -10px;
      left: 10px;
      font-size: 12px;
      background-color: white;
      padding: 0 5px;
      color: var(--primary-color);
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
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
            <a class="nav-link active" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="review.php">Reviews</a>
          </li>
          <li class="nav-item ms-lg-3">
            <a class="nav-link btn btn-login" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Contact Header -->
  <section class="contact-header">
    <div class="container">
      <h1 class="display-4 fw-bold mb-3">Get In Touch</h1>
      <p class="lead">Have questions or feedback? We'd love to hear from you!</p>
    </div>
  </section>

  <!-- Contact Cards -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="contact-card card h-100 p-4 text-center">
            <div class="contact-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <h3>Our Location</h3>
            <p>123 Book Street, Literary District<br>Karachi, Pakistan</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-card card h-100 p-4 text-center">
            <div class="contact-icon">
              <i class="fas fa-phone-alt"></i>
            </div>
            <h3>Phone Number</h3>
            <p>+92 300 1234567<br>Mon-Fri, 9am-5pm</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-card card h-100 p-4 text-center">
            <div class="contact-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <h3>Email Address</h3>
            <p>info@novrep.com<br>support@novrep.com</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Form and Map -->
  <section class="py-5 bg-white">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6">
          <h2 class="mb-4">Send Us a Message</h2>
          <form id="contactForm">
            <div class="floating-label">
              <input type="text" class="form-control" id="name" placeholder=" " required>
              <label for="name">Your Name</label>
            </div>
            <div class="floating-label">
              <input type="email" class="form-control" id="email" placeholder=" " required>
              <label for="email">Email Address</label>
            </div>
            <div class="floating-label">
              <input type="text" class="form-control" id="subject" placeholder=" ">
              <label for="subject">Subject</label>
            </div>
            <div class="floating-label">
              <textarea class="form-control" id="message" rows="5" placeholder=" " required></textarea>
              <label for="message">Your Message</label>
            </div>
            <button type="submit" class="btn btn-submit mt-3">Send Message</button>
          </form>
        </div>
        <div class="col-lg-6">
          <h2 class="mb-4">Find Us On Map</h2>
          <div class="map-container ratio ratio-16x9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.109811783908!2d67.02886831500082!3d24.86192898404893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e6a38379a49%3A0x9a046166d1c1390e!2sKarachi%2C%20Pakistan!5e0!3m2!1sen!2s!4v1688900000000!5m2!1sen!2s" 
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center mb-5">Frequently Asked Questions</h2>
      <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
              How can I submit a book review request?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              You can submit your book review requests through our contact form above. Please include the book title, author, and any specific aspects you'd like us to focus on in the review. Our team typically responds within 3-5 business days.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
              Do you accept guest reviews from readers?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Yes! We welcome guest reviews from our community of readers. Please send us your review along with a brief bio through our contact form. Our editorial team will review your submission and get back to you if we decide to publish it on our platform.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
              What's the typical response time for inquiries?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              We strive to respond to all inquiries within 24-48 hours during business days (Monday to Friday). For more complex questions or review requests, it may take up to 3-5 business days to provide a comprehensive response.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <h3>NOVREP</h3>
          <p>Your trusted source for in-depth novel reviews and literary analysis.</p>
        </div>
        <div class="col-lg-4 mb-4 mb-lg-0">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="index.html" class="text-white">Home</a></li>
            <li class="mb-2"><a href="reviews.html" class="text-white">Book Reviews</a></li>
            <li class="mb-2"><a href="#" class="text-white">Contact Us</a></li>
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
        <p class="mb-0">&copy; 2023 NovRep. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Contact Form Script -->
  <script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Get form values
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const subject = document.getElementById('subject').value;
      const message = document.getElementById('message').value;
      
      // Here you would typically send the data to a server
      // For demo purposes, we'll just show an alert
      alert(`Thank you, ${name}! Your message has been received. We'll contact you at ${email} soon.`);
      
      // Reset form
      this.reset();
    });
  </script>
</body>
</html>