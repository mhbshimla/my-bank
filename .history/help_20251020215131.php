<?php
$con = new mysqli('localhost', 'root', '', 'mybank');
$confirmation = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
  $message = $con->real_escape_string($_POST['message']);
  $query = "INSERT INTO contact_messages (name, email, message) VALUES ('Anonymous', 'anonymous@mcb.com', '$message')";
  if ($con->query($query)) {
    $confirmation = "<div class='alert alert-success text-center'>Thank you for reaching out. We'll get back to you soon.</div>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Help - MCB Bank</title>
  <?php require 'assets/autoloader.php'; ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>
  <a class="navbar-brand" href="home.php">MCB Bank</a>
  <div class="ml-auto">
    <a href="home.php" class="btn btn-outline-light btn-sm mx-1">Home</a>
    <!-- <a href="aboutourbank.php" class="btn btn-outline-light btn-sm mx-1">About Us</a> -->
    <a href="faq.php" class="btn btn-outline-light btn-sm mx-1">FAQ</a>
    <!-- <a href="help.php" class="btn btn-outline-light btn-sm mx-1">Help</a> -->
    <a href="contact.php" class="btn btn-outline-light btn-sm mx-1">Contact</a>
    <a href="login.php" class="btn btn-success btn-sm mx-1">Login</a>
     <a href="signup.php" class="btn btn-success btn-sm mx-1">Sign Up</a>
  </div>
</nav>

<div class="container mt-4">
  <h2><strong>Help & Support</strong></h2>
  <hr>
    <h2 class="text-center mb-4"><strong>How can we help you?</strong></h2>
    <?= $confirmation ?>
  <form method="POST" action="help.php">
    <div class="d-flex input-group-lg mb-4" style="gap: 10px;">
      <input type="text" name="message" class="form-control" placeholder="Feel free to reach us out here..." required>
      <button type="submit" class="btn btn-success">Send</button>
    </div>
  </form>
  <p>
    If you’re facing issues logging in, please ensure your email and password are correct.  
    For security, passwords are case-sensitive.  
  </p>
  <p>
    If you still cannot access your account, please contact our support team via the contact page.
  </p>
  <p>
    🔹 Recommended Browsers: Chrome, Firefox, Edge<br>
    🔹 Mobile Access: Yes, fully supported
  </p>
</div>

<!-- <footer class="bg-dark text-white text-center py-3">
  &copy; <?php echo date("Y"); ?> MCB Bank. All Rights Reserved.
</footer> -->
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
