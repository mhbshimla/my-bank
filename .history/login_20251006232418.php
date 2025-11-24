<!DOCTYPE html>
<html>
<head>
	<title>Banking</title>
	<?php require 'assets/autoloader.php'; ?>
	<?php require 'assets/function.php'; ?>
	<?php
    $con = new mysqli('localhost','root','','mybank');
    define('bankName', 'MCB Bank');
	
		$error = "";
		if (isset($_POST['userLogin']))
		{
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		    $result = $con->query("select * from userAccounts where email='$user' AND password='$pass'");
		    if($result->num_rows>0)
		    { 
		      session_start();
		      $data = $result->fetch_assoc();
		      $_SESSION['userId']=$data['id'];
		      $_SESSION['user'] = $data;
		      header('location:index.php');
		     }
		    else
		    {
		      $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		    }
		}

		if (isset($_POST['cashierLogin']))
		{
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		    $result = $con->query("select * from login where email='$user' AND password='$pass'");
		    if($result->num_rows>0)
		    { 
		      session_start();
		      $data = $result->fetch_assoc();
		      $_SESSION['cashId']=$data['id'];
		      header('location:cindex.php');
		     }
		    else
		    {
		      $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		    }
		}

		if (isset($_POST['managerLogin']))
		{
  			$user = $_POST['email'];
		    $pass = $_POST['password'];
		    $result = $con->query("select * from login where email='$user' AND password='$pass' AND type='manager'");
		    if($result->num_rows>0)
		    { 
		      session_start();
		      $data = $result->fetch_assoc();
		      $_SESSION['managerId']=$data['id'];
		      header('location:mindex.php');
		     }
		    else
		    {
		      $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		    }
		}
	 ?>
</head>

<!-- <body style="background: url(images/bg-login2.jpg); background-size: cover; min-height:100vh; display:flex; flex-direction:column;"> -->
<body style="background: url(images/bg-login3.jpg); background-size: cover; min-height:100vh; display:flex; flex-direction:column;">

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
      <!-- <li class="nav-item"><a class="btn btn-outline-light mr-2" href="login.php">Login</a></li> -->
      <!-- <li class="nav-item"><a class="btn btn-success" href="signup.php">Register Now</a></li> -->
    </ul>
  </div>
</nav>


<?php echo $error ?>

<!-- <main class="flex-fill d-flex justify-content-end align-items-center"> -->
  <main class="flex-fill d-flex justify-content-center align-items-center">
  <!-- <div id="accordion" role="tablist" class="w-25 shadowBlack me-5"> -->
	<!-- <div id="accordion" role="tablist" class="w-25 float-right shadowBlack" style="margin-right: 222px"> -->
	<div id="accordion" role="tablist" class="col-12 col-sm-8 col-md-6 col-lg-4 col-xl-3 shadowBlack me-lg-5">
  	<br><h4 class="text-center text-white">Select Your Session</h4>
    <div class="card rounded-0">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a style="text-decoration: none;" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
           <button class="btn btn-outline-success btn-block">User Login</button>
          </a>
        </h5>
      </div>
      <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
         <form method="POST">
         	<input type="email" value="some2@gmail.com" name="email" class="form-control" required placeholder="Enter Email">
         	<input type="password" name="password" value="some2" class="form-control" required placeholder="Enter Password">
         	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="userLogin">Enter </button>
         </form>
        </div>
      </div>
    </div>

    <div class="card rounded-0">
      <div class="card-header" role="tab" id="headingTwo">
        <h5 class="mb-0">
          <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Manager Login
          </a>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
           <form method="POST">
         	<input type="email" value="manager@manager.com" name="email" class="form-control" required placeholder="Enter Email">
         	<input type="password" name="password" value="manager" class="form-control" required placeholder="Enter Password">
         	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="managerLogin">Enter </button>
         </form>
        </div>
      </div>
    </div>

    <div class="card rounded-0">
      <div class="card-header" role="tab" id="headingThree">
        <h5 class="mb-0">
          <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
           Cashier Login
          </a>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
          <form method="POST">
         	<input type="email" value="cashier@cashier.com" name="email" class="form-control" required placeholder="Enter Email">
         	<input type="password" name="password" value="cashier" class="form-control" required placeholder="Enter Password">
         	<button type="submit"  class="btn btn-primary btn-block btn-sm my-1" name="cashierLogin">Enter </button>
         </form>
        </div>
      </div>
    </div>
    <!-- Register Prompt -->
    <div class="text-center mt-4 mb-3">
       <p class="text-white">Don’t have an account? <a href="signup.php" class="text-warning font-weight-normal">Register now</a></p>
        <!-- <a href="signup.php" style="color: skyblue; font-weight: normal;">Register now</a> -->
       <!-- <p class="mt-3 text-white">Don’t have an account? <a href="signup.php">Register now</a></p> -->
    </div>
  </div>  
</main>

<!-- <footer class="bg-success text-white pt-5 pb-3 mt-auto"> -->
  <footer class="bg-success text-white pt-1 mt-auto" style="background-color: #146c43;">
  <div class="container">
    <div class="row">
      
      <!-- About Section -->
      <div class="col-md-4 text-sm">
        <h5 class="text-uppercase mb-1 mt-2">About <?php echo bankName; ?></h5>
        <p class="text-sm">
          <?php echo bankName; ?> is a trusted banking system providing secure,
          reliable, and easy-to-use online banking services. We aim to make
          banking simple and accessible for everyone.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-2 text-sm">
        <h5 class="text-uppercase mb-1 mt-2">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="home.php" class="text-white text-decoration-none">Home</a></li>
          <li><a href="help.php" class="text-white text-decoration-none">Help</a></li>
          <li><a href="faq.php" class="text-white text-decoration-none">FAQ</a></li>
          <li><a href="contact.php" class="text-white text-decoration-none">Contact</a></li>
          <li><a href="signup.php" class="text-white text-decoration-none">Sign Up</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="col-md-3 text-sm">
        <h5 class="text-uppercase mb-1 mt-2">Contact Us</h5>
        <p><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</p>
        <p><i class="fas fa-phone"></i> +880 1234-567890</p>
        <p><i class="fas fa-envelope"></i> support@mcbank.com</p>
      </div>

      <!-- Social Media -->
      <div class="col-md-3 text-sm">
        <h5 class="text-uppercase mb-1 mt-2">Follow Us</h5>
        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-2x"></i></a>
        <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-2x"></i></a>
        <a href="#" class="text-white me-3"><i class="fab fa-linkedin fa-2x"></i></a>
        <a href="#" class="text-white"><i class="fab fa-instagram fa-2x"></i></a>
      </div>

    </div>
    <hr class="bg-light">
    <div class="text-center">
      &copy; <?php echo date("Y"); ?> <?php echo bankName; ?>. All Rights Reserved.
    </div>
  </div>
</footer>

<!-- Font Awesome for icons -->
<!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</body>
</html>
