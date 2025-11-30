<?php
session_start();
if (!isset($_SESSION['managerId'])) {
    header('location:login.php');
    exit();
}

require 'assets/db.php';
require 'assets/autoloader.php';

$managerId = $_SESSION['managerId'];
$message = "";

// ✅ Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if ($password && $password !== $confirm) {
        $message = "❌ Passwords do not match.";
    } else {
        $hashed = $password ? md5($password) : null;

        $updateQuery = "UPDATE managers SET name='$name', email='$email', username='$username'";
        if ($hashed) {
            $updateQuery .= ", password='$hashed'";
        }
        $updateQuery .= " WHERE id='$managerId'";

        if ($con->query($updateQuery)) {
            header("Location: manager_profile.php?updated=1");
            exit();
        } else {
            $message = "❌ Update failed. Please try again.";
        }
    }
}

// ✅ Fetch manager info
$result = $con->query("SELECT * FROM managers WHERE id='$managerId'");
$manager = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile - MCB Bank</title>
    <style>
         body {
            background: url("images/bg-login5.jpg") no-repeat center center fixed;
            background-size: cover;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            padding-top: 100px; /* increased to clear fixed header */
        }
        .card {
            background: rgba(0,0,0,0.7);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.4);
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-save {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-save:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        .alert {
            background-color: #ffc107;
            color: #212529;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .toggle-container {
            position: relative;
        }
        .toggle-container input[type="checkbox"] {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
 <!-- Header with logo aligned left -->
<header style="position: fixed; top: 0; left: 0; width: 100%; background: rgba(0,0,0,0.85); padding: 12px 25px; display: flex; align-items: center; justify-content: flex-start; box-shadow: 0 4px 12px rgba(0,0,0,0.5); z-index: 1000;">
    <img src="images/logo.png" alt="MCB Bank Logo" style="height:40px; margin-right:12px;">
    <h2 style="margin:0; font-weight:600; color:#00c6ff;">MCB Bank</h2>
    <div style="position: absolute; top: 20px; right: 20px;">
    <a href="mindex.php" class="btn btn-secondary btn-sm">⬅ Back</a>
    <a href="index.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</header>
<div class="container">
    <div class="card w-75 mx-auto">
        <h3 class="text-center mb-4">Edit Your Profile</h3>
        <?php if ($message): ?>
            <div class="alert text-center"><?= $message ?></div>
        <?php endif; ?>
        <form method="POST">
            <label>Full Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($manager['name']) ?>" required>

            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($manager['email']) ?>" required>

            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($manager['username']) ?>" required>

            <label>New Password (leave blank to keep current)</label>
            <div class="toggle-container">
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password">
                <!-- <input type="checkbox" onclick="togglePassword()">  -->
            </div>

            <label>Confirm New Password</label>
            <div class="toggle-container">
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Re-enter new password">
                <!-- <input type="checkbox" onclick="togglePassword()">  -->
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn-save">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>
function togglePassword() {
    const pwd = document.getElementById("password");
    const confirm = document.getElementById("confirm_password");
    const type = pwd.type === "password" ? "text" : "password";
    pwd.type = type;
    confirm.type = type;
}
</script>
</body>
</html>