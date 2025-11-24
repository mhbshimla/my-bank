
<!DOCTYPE html>
<html>
<head>
    <title>Choose Signup - MCB Bank</title>
    <?php require 'assets/autoloader.php'; ?>
    <style>

    body {
    background: url("images/bg-login2.jpg") no-repeat center center fixed;
    background-size: cover;
    height: 100vh;
    display: flex;
    justify-content: flex-end;   /* pushes content to right side */
    align-items: center;         /* centers vertically */
    margin: 0;
    }

.card {
    background: rgba(0, 0, 0, 0.7);
    color: white;
    border-radius: 10px;
    padding: 20px;
    width: 400px;
    margin-right: 10%; /* adjust how far from right side */
    box-shadow: 0px 0px 15px rgba(0,0,0,0.5);
}
    
        .btn-custom {
            width: 100%;
            margin: 10px 0;
            border-radius: 25px;
            font-size: 18px;
        }
    </style>
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" width="30" height="30" alt="">
        </a>
        <span class="navbar-text text-white"><strong>MCB Bank</strong></span>
        <!-- <span class="navbar-text text-white ml-2"><strong>MCB Bank</strong></span> -->
         <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav ms-auto">
             <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
             <li class="nav-item"><a class="nav-link" href="help.php">Help</a></li>
             <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
             <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
           </ul>
        </div>
    </nav>
    <br><br><br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card text-center">
                    <h4 class="mb-4">Select Your Signup Type</h4>
                    <a href="signup.php?role=user" class="btn btn-outline-success btn-custom">Signup as User</a>
                    <a href="signup.php?role=manager" class="btn btn-outline-primary btn-custom">Signup as Manager</a>
                    <a href="signup.php?role=cashier" class="btn btn-outline-warning btn-custom">Signup as Cashier</a>
                    <p class="mt-3">Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
