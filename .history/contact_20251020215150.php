<!DOCTYPE html>
<html>
<head>
  <title>Contact - MCB Bank</title>
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
    <a href="help.php" class="btn btn-outline-light btn-sm mx-1">Help</a>
    <!-- <a href="contact.php" class="btn btn-outline-light btn-sm mx-1">Contact</a> -->
    <a href="login.php" class="btn btn-success btn-sm mx-1">Login</a>
    <a href="signup.php" class="btn btn-success btn-sm mx-1">Sign Up</a>
  </div>
</nav>

<div class="container mt-4">
  <h2><strong>Contact Us</strong></h2>
  <hr>
  <p>You can reach us at:</p>
  <p>
    📧 Email: support@mcbank.com<br>
    ☎ Phone: +880 123 456 789<br>
    🏢 Address: MCB Bank Headquarters, Dhaka, Bangladesh
  </p>

  <?php
  // Database connection (update these values for your DB setup)
  $conn = new mysqli("localhost", "root", "", "mybank"); 

  if ($conn->connect_error) {
      die("<div class='alert alert-danger'>Database connection failed: " . $conn->connect_error . "</div>");
  }

  if (isset($_POST['send'])) {
      $name = $conn->real_escape_string($_POST['name']);
      $email = $conn->real_escape_string($_POST['email']);
      $message = $conn->real_escape_string($_POST['message']);

      $sql = "INSERT INTO contact_messages (name, email, message) 
              VALUES ('$name', '$email', '$message')";

      if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success'>✅ Message sent successfully!</div>";
      } else {
          echo "<div class='alert alert-danger'>❌ Error: " . $conn->error . "</div>";
      }
  }
  ?>

  <form method="post" action="contact.php">
    <div class="form-group">
      <label>Your Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
       <!-- <input type="text" placeholder="Enter Your Name" required> -->
      
    </div>
    <div class="form-group">
      <label>Your Email</label>
      <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
      <!-- <input type="email" placeholder="Enter Your Email"> -->
      
    </div> 
    
    <div class="form-group">
      <label>Message</label>
      <textarea class="form-control" name="message" rows="4" type="text" placeholder="Write your messages here" required></textarea>
       <!-- <input type="text" placeholder="Write your messages here" required> -->
      
    </div>
    <button type="submit" class="btn btn-success" name="send">Send Message</button>
  </form>
</div>

<!-- <br><br>
<footer class="bg-dark text-white text-center py-3">
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
</footer><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</body>
</html>