<?php
session_start();
require '../assets/db.php';
if (!isset($_SESSION['adminId'])) {
    header("Location: admin_login.php");
    exit();
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $check = $con->query("SELECT * FROM managers WHERE username='$username'");
    if ($check->num_rows > 0) {
        $message = "⚠ Username already exists!";
    } else {
        $sql = "INSERT INTO managers (name, email, username, password)
                VALUES ('$name', '$email', '$username', '$password')";
        if ($con->query($sql)) {
            $message = "✅ Manager added successfully!";
        } else {
            $message = "❌ Error adding manager.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Manager - CEO Panel</title>
<?php require '../assets/autoloader.php'; ?>
<style>

body {
            background: url("../images/bg-login4.jpg") no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;   
            align-items: center;         
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
          }

/* Main Form Container */
.container {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 40px 50px;
    width: 400px;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
    animation: fadeIn 0.8s ease-in-out;
}

/* Header */
.container h3 {
    text-align: center;
    color: #ffffff;
    margin-bottom: 25px;
    font-weight: 600;
    letter-spacing: 1px;
}

/* Labels */
label {
    font-weight: 500;
    color: #e3e3e3;
}

/* Input Fields */
.form-control {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 8px;
    color: #fff;
    padding: 10px 119px;
    margin-top: 5px;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    gap: 15px; 
}

.form-control::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.form-control:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.3);
    box-shadow: 0 0 10px #00c6ff;
}

/* Button */
.btn-success {
    background: linear-gradient(135deg, #00c6ff, #0072ff);
    margin-top: 30px;
    border: none;
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.btn-success:hover {
    background: linear-gradient(135deg, #0072ff, #00c6ff);
    transform: translateY(-2px);
}

.btn-secondary {
    background: linear-gradient(135deg, #6c757d, #5a6268);
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background: linear-gradient(135deg, #5a6268, #6c757d);
    transform: translateY(-2px);
}

.btn-danger {
    background: linear-gradient(135deg, #dc3545, #c82333);
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background: linear-gradient(135deg, #c82333, #dc3545);
    transform: translateY(-2px);
}

/* Alert Messages */
.alert {
    text-align: center;
    font-weight: 500;
    background-color: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #fff;
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 20px;
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>



</head>
<body>
<div style="position:absolute; top:20px; right:20px;">
        <a href="admin_dashboard.php" class="btn btn-secondary btn-sm">⬅ Back</a>
        <a href="admin_logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>    
<div class="container mt-4">
<h3>Add Manager</h3>
<?php if ($message): ?>
    <div class="alert alert-info"><?= $message ?></div>
<?php endif; ?>

<form method="POST">
    <!-- <div style="position:absolute; top:20px; right:20px;">
        <a href="admin_dashboard.php" class="btn btn-secondary btn-sm">⬅ Back</a>
        <a href="admin_logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div> -->

    <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Email</label>
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
    <button class="btn btn-success mt-3">Add Manager</button>
</form>
</div>
</body>
</html>
