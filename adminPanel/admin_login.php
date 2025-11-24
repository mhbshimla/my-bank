<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ✅ Correct database connection path
require_once '../assets/db.php';

$message = "";

// ✅ When the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = md5(trim($_POST['password']));

    $stmt = $con->prepare("SELECT * FROM admins WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        $_SESSION['adminId'] = $admin['id'];
        $_SESSION['adminName'] = $admin['name'];

        // ✅ Redirect to admin dashboard
        header("Location: ../adminPanel/admin_dashboard.php");
        exit();
    } else {
        $message = "❌ Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CEO Login - MCB Bank</title>
	<?php require '../assets/function.php'; ?>
        <link rel="stylesheet" href="../css/admin.css">
        <style> 
         body {
            background: url("../images/bg-login5.jpg") no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;   
            align-items: center;         
            margin: 0;
          }

          .card {
    background: rgba(3, 16, 45, 0.7);
    color: white;
    border-radius: 10px;
    padding: 20px;
    width: 400px;
    margin-right: 10%; /* adjust how far from right side */
    box-shadow: 0px 0px 15px rgba(0,0,0,0.5);
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(29, 161, 150, 0.3);
}

/* 🔝 Header */
.card-header {
    background: linear-gradient(135deg, #0c103e, #6b43a0);
    border: none;
    padding: 20px;
    text-align: center;
    font-size: 1.6rem;
    font-weight: 600;
    letter-spacing: 1px;
    color: #fff;
}

/* ✍️ Form fields */
.form-group label {
    font-weight: 800;
    color: #fff;
    
}

.form-control {
    border-radius: 1100px;
    border: 1px solid #ccc;
    padding: 15px 120px;
    transition: all 0.3s ease;
    margin-top: 10px;
    display: flex;
    flex-direction: column;   /* puts all items in one vertical column */
    gap: 15px; 
}



.btn-success {
    background: linear-gradient(135deg, #12123fff, #1f2158ff);
    border: none;
    border-radius: 10px;
    padding: 10px 180px;
    font-weight: 600;
    color: #fff;
    font-size: 1rem;
    transition: all 0.3s ease;
    margin-top: 20px;
}

.btn-success:hover {
    background: linear-gradient(135deg, #786d9eff, #493a7aff);
    box-shadow: 0 4px 10px #fff;
}

    </style>
        

</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadowBlack">
                <div class="card-header bg-dark text-white text-center">
                    <h4>CEO Login</h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($message)): ?>
                        <div class="alert alert-danger text-center"><?= htmlspecialchars($message) ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
