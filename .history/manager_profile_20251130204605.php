<?php
session_start();
if (!isset($_SESSION['managerId'])) {
    header('location:login.php');
    exit();
}

require 'assets/db.php';
require 'assets/autoloader.php';

$managerId = $_SESSION['managerId'];
$query = $con->query("SELECT * FROM managers WHERE id='$managerId'");
if (!$query || $query->num_rows === 0) {
    echo "<h2 style='color:white; text-align:center; margin-top:50px;'>Manager not found.</h2>";
    exit();
}
$manager = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Profile - MCB Bank</title>
    <style>
        body {
            background: url("images/bg-login5.jpg") no-repeat center center fixed;
            background-size: cover;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            padding-top: 80px;
        }
        .card {
            background: rgba(0,0,0,0.7);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.4);
        }
        .btn-update {
            background-color: #00c6ff;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-update:hover {
            background-color: #0072ff;
            transform: translateY(-2px);
        }
        .table th, .table td {
            color: #fff;
        }
    </style>
</head>
<body>
<div style="position: absolute; top: 20px; right: 20px;">
    <!-- Header with logo -->
    <header style="background: rgba(0,0,0,0.8); padding: 15px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,0,0,0.5);">
        <img src="images/logo.png" alt="MCB Bank Logo" style="height:50px; margin-right:15px;">
        <h2 style="margin:0; font-weight:600; color:#00c6ff;">MCB Bank - Manager Profile</h2>
    </header>
  <a href="mindex.php" class="btn btn-secondary btn-sm">⬅ Back</a>
  <a href="index.php" class="btn btn-danger btn-sm">Logout</a>
</div>
<div class="container">
    <div class="card w-75 mx-auto">
        <h3 class="text-center mb-4">Your Profile Info</h3>
        <?php if (isset($_GET['updated'])): ?>
        <div class="alert alert-success text-center w-75 mx-auto">✅ Profile updated successfully!</div>
        <?php endif; ?>
        <table class="table table-striped table-dark w-75 mx-auto">
            <tr><th>Name</th><td><?= htmlspecialchars($manager['name']) ?></td></tr>
            <tr><th>Email</th><td><?= htmlspecialchars($manager['email']) ?></td></tr>
            <tr><th>Username</th><td><?= htmlspecialchars($manager['username']) ?></td></tr>
            <tr><th>Password</th><td>••••••••</td></tr>

        </table>
        <div class="text-center mt-4">
            <a href="edit_manager.php?id=<?= $manager['id'] ?>" class="btn-update">Update Info</a>
        </div>
    </div>
</div>
</body>
</html>