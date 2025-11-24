<!DOCTYPE html>
<html>
<head>
  <title>FAQ - MCB Bank</title>
  <?php require 'assets/autoloader.php'; ?>
  <style>
  .card-dark-green {
    background-color: #15802fff;  /* Dark Green */
    color: white;               /* White text for contrast */
  }
</style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">MCB Bank</a>
  <div class="ml-auto">
    <a href="home.php" class="btn btn-outline-light btn-sm mx-1">Home</a>
     <!-- <a href="aboutourbank.php" class="btn btn-outline-light btn-sm mx-1">About Us</a> -->
    <!-- <a href="faq.php" class="btn btn-outline-light btn-sm mx-1">FAQ</a> -->
    <a href="help.php" class="btn btn-outline-light btn-sm mx-1">Help</a>
    <a href="contact.php" class="btn btn-outline-light btn-sm mx-1">Contact</a>
    <a href="login.php" class="btn btn-success btn-sm mx-1">Login</a>
    <a href="signup.php" class="btn btn-success btn-sm mx-1">Sign Up</a>
  </div>
</nav>

<div class="container mt-4">
  <h2><strong>Frequently Asked Questions</strong></h2>
  <hr>
  <p><strong>Q:</strong> How do I open an account?<br>
     <strong>A:</strong> Click on the <em>Sign Up</em> button on the login page and fill out the registration form.</p>
  
  <p><strong>Q:</strong> Can I access my account from mobile?<br>
     <strong>A:</strong> Yes, our system is mobile-friendly.</p>
  
  <p><strong>Q:</strong> What if I forget my password?<br>
     <strong>A:</strong> Use the password reset option on the login page or contact support.</p>

  <!-- ✅ Why Choose Us Section -->
  <div class="my-5">
    <h2 class="text-center mb-4"><strong>Why Choose Us?</strong></h2>
    <div class="row text-center">
      <div class="col-md-4 mb-3">
        <div class="card shadow h-100">
          <div class="card-body card-dark-green">
            <h4 class="card-title">Secure Banking</h4>
            <p class="card-text">Your money and data are protected with the highest security standards.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card shadow h-100">
          <div class="card-body card-dark-green">
            <h4 class="card-title">24/7 Access</h4>
            <p class="card-text">Manage your account anytime, anywhere with our online banking system.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card shadow h-100">
          <div class="card-body card-dark-green">
            <h4 class="card-title">Trusted Partner</h4>
            <p class="card-text">With years of experience, we are your reliable financial partner.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <footer class="bg-dark text-white text-center py-3">
  &copy; <?php echo date("Y"); ?> MCB Bank. All Rights Reserved.
</footer> -->
<footer style="background-color: #15802fff;" class="text-white pt-5 pb-3 mt-5">
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
