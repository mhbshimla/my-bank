<!DOCTYPE html>
<html>
<head>
  <title>Welcome to MCB Bank</title>
  <?php require 'assets/autoloader.php'; ?>
  <style>
    body { background: #f9f9f9; font-family: Arial, sans-serif; }
    .hero { padding: 60px; text-align: center; background: #1bad69ff; color: white; }
    .hero h1 { font-size: 2.5rem; margin-bottom: 15px; }
    .hero p { font-size: 1.2rem; }
    .section { padding: 40px; }
    .announcement-bar {
    animation: fadeIn 1s ease-in-out;
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
  }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">MCB Bank</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
      <!-- <li class="nav-item"><a class="nav-link" href="aboutourbank.php">About Our Bank</a></li> -->
      <li class="nav-item"><a class="nav-link" href="help.php">Help</a></li>
      <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
      <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item"><a class="btn btn-outline-light mr-2" href="login.php">Login</a></li>
      <li class="nav-item"><a class="btn btn-success" href="signup.php">Sign Up</a></li>
    </ul>
  </div>
</nav>
<!-- Announcement Bar -->
<div class="announcement-bar bg-success text-white text-center py-2 shadow-sm sticky-top" style="z-index: 1030; font-size: 1.0rem;">
  <strong>📢 Notice:</strong> Scheduled maintenance on <em>Oct 20, 2AM–4AM</em>. Online services may be temporarily unavailable.
</div>
<!-- <div class="text-center bg-info text-white py-1">
  <button class="btn btn-sm btn-outline-light" data-toggle="collapse" data-target="#announcementDetails">
    📢 View Maintenance Notice
  </button>
</div>
<div id="announcementDetails" class="collapse bg-dark text-white text-center py-2">
  Scheduled maintenance on <em>Oct 20, 2AM–4AM</em>. Online services may be temporarily unavailable.
</div> -->

<div class="hero">
  <h1><strong>Welcome to MCB Bank</strong></h1>
  <p>Your trusted partner in digital banking.</p>
  <a href="login.php" class="btn btn-light btn-lg mt-3">Login to Your Account</a>
</div>
    <div class="section container-fluid text-white" style="background: url('images/about.jpg') no-repeat center center; background-size: cover; padding: 60px;">
  <h1 class="mb-3"><strong>About Our Bank</strong></h1>
      <p>
        Welcome to <strong>Our Bank</strong>, where trust meets innovation.  
        Since our founding, we have been committed to providing safe, reliable, 
        and customer-focused banking solutions. From personal savings to 
        business accounts, we empower communities with financial growth.  
      </p>
      <p>
        With cutting-edge technology, dedicated staff, and years of experience, 
        we ensure that your money is always in safe hands. Our mission is simple:  
        <em>to be your most trusted financial partner.</em>
      </p>
      <ul>
        <li>✔ Secure & reliable banking</li>
        <li>✔ 24/7 online access</li>
        <li>✔ Customer-first policies</li>
        <li>✔ Nationwide branch network</li>
      </ul>
</div>

<footer class="bg-success text-white pt-5 pb-3 mt-auto">
  <div class="container">
    <div class="row">
      
      <!-- About Section -->
      <div class="col-md-4">
        <h5 class="text-uppercase mb-3">About MCB Bank</h5>
        <p>
          MCB Bank is a trusted banking system providing secure,
          reliable, and easy-to-use online banking services. We aim to make
          banking simple and accessible for everyone.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-2">
        <h5 class="text-uppercase mb-3">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="home.php" class="text-white text-decoration-none">Home</a></li>
          <li><a href="help.php" class="text-white text-decoration-none">Help</a></li>
          <li><a href="faq.php" class="text-white text-decoration-none">FAQ</a></li>
          <li><a href="contact.php" class="text-white text-decoration-none">Contact</a></li>
          <li><a href="signup.php" class="text-white text-decoration-none">Sign Up</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="col-md-3">
        <h5 class="text-uppercase mb-3">Contact Us</h5>
        <p><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</p>
        <p><i class="fas fa-phone"></i> +880 1234-567890</p>
        <p><i class="fas fa-envelope"></i> support@mcbank.com</p>
      </div>

      <!-- Social Media -->
      <div class="col-md-3">
        <h5 class="text-uppercase mb-3">Follow Us</h5>
        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-2x"></i></a>
        <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-2x"></i></a>
        <a href="#" class="text-white me-3"><i class="fab fa-linkedin fa-2x"></i></a>
        <a href="#" class="text-white"><i class="fab fa-instagram fa-2x"></i></a>
      </div>

    </div>
    <hr class="bg-light">
    <div class="text-center">
      &copy; <?php echo date("Y"); ?> MCB Bank. All Rights Reserved.
    </div>
  </div>
</footer>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


</body>
</html>
