<?php
session_start();
require 'assets/db.php'; 
require 'assets/function.php'; 

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Encrypt password

    // Check if username already exists
    $checkUser = $con->query("SELECT * FROM users WHERE username = '$username'");
    if ($checkUser->num_rows > 0) {
        $message = "⚠ Username already exists. Please choose another one.";
    } else {
        $sql = "INSERT INTO users (name, email, username, password) 
                VALUES ('$name', '$email', '$username', '$password')";
        if ($con->query($sql)) {
            // ✅ Automatically log in after signup
            $_SESSION['userId'] = $con->insert_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;

            header("Location: index.php"); // Redirect to home page
            exit();
        } else {
            $message = "❌ Something went wrong. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup - MCB Bank</title>
    <?php require 'assets/autoloader.php'; ?>
</head>
<!-- <body style="background:#96D678;background-size:100%"> -->
<body style="background: url('images/signup_logo.png') no-repeat center center; background-size: cover;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="index.php">
    <img src="images/logo.png" width="30" height="30" alt="">
 </a>
 <span class="navbar-text text-white ml-2"><strong>MCB Bank</strong></span>
 <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="help.php">Help</a></li>
        <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
      </ul>
 </div>

</nav><br> <br> <br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadowBlack">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Create an Account</h4>
                </div>
                <div class="card-body">
                    <?php if ($message != ""): ?>
                        <div class="alert alert-info"><?= $message ?></div>
                    <?php endif; ?>
                    <form method="POST" action="signup.php">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Signup</button>
                        <p class="mt-3">Already have an account? <a href="login.php">Login here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <br>
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
