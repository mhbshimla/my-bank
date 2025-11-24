<?php 
session_start();
if (!isset($_SESSION['adminId'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CEO Dashboard - MCB Bank</title>
    <?php require '../assets/autoloader.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <style> 
   

/* Base setup */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: url("../images/bg-login.jpg") no-repeat center center fixed;
    background-size: cover;
    height: 100vh;
    display: flex;
    justify-content: center;   
    align-items: center;         
    margin: 0;
} 



.sidebar {
    background: rgba(3, 16, 45, 0.7);
    color: white;
    border-radius: 10px;
    padding: 20px;
    width: 400px;
    margin-right: 10%;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.5);
}

.sidebar:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(29, 161, 150, 0.3);
}


/* ---------- Sidebar ---------- */

.sidebar {
  width: 240px;
  color: white;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  box-shadow: 2px 0 10px rgba(0,0,0,0.2);
} 


.sidebar-header {
  text-align: center;
  padding: 30px 10px 10px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.sidebar-header h2 {
  margin: 0;
  font-size: 22px;
}

.sidebar-header p {
  margin: 5px 0 15px;
  font-size: 14px;
  opacity: 0.8;
}

.sidebar-menu {
  list-style: none;
  padding: 0;
  margin: 0;
}

.sidebar-menu li {
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
} 

.sidebar-menu a {
  display: block;
  padding: 12px 20px;
  color: white;
  text-decoration: none;
  font-size: 15px;
  transition: background 0.3s;
}

.sidebar-menu a:hover,
.sidebar-menu a.active {
  background-color: rgba(255, 255, 255, 0.2);
  font-weight: 500;
}

.sidebar-menu a i {
  margin-right: 10px;
}

.sidebar-menu .logout {
  background-color: #dc3545;
}

.sidebar-menu .logout:hover {
  background-color: #bb2d3b;
}

/* ---------- Main Content ---------- */
.main-content {
  margin-left: -170px;
  padding: 20px;
  flex: 1;
  min-height: 100vh;

}
.main-content:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(36, 61, 200, 0.3);
}
.topbar {
  background-color: #fff;
  margin-top: 10px;
  padding: 15px 20px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  margin-bottom: 25px;
  border-radius: 8px;
}

.topbar h3 {
  margin: 0;
  color: black;
  font-weight: 600;
}

.content {
  background: #fff;
  padding: 25px 30px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.content h2 {
  margin-top: 0;
  color: black;
  font-weight: 600;
}

.dashboard-buttons {
  margin-top: 30px;
  display: flex;
  gap: 15px;
}

/* ---------- Buttons ---------- */
.btn {
  padding: 12px 25px;
  border: none;
  border-radius: 8px;
  text-decoration: none;
  color: white;
  font-weight: 500;
  transition: all 0.3s ease;
}

.btn-succes {
  background-color: #882d51ff;
}

.btn-succes:hover {
  background-color: #5c636a;
  transform: translateY(-2px);
}

.btn-primary {
  background-color: #882d51ff;
}

.btn-primary:hover {
  background-color: #5c636a;
  transform: translateY(-2px);
}

.btn-secondary {
  background-color: #882d51ff;
}

.btn-secondary:hover {
  background-color: #5c636a;
  transform: translateY(-2px);
}

/* ---------- Responsive ---------- */
@media (max-width: 768px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }

  .main-content {
    margin-left: 0;
    margin-top: 10px;
  }

  .dashboard-buttons {
    flex-direction: column;
  }
}

    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        <img src="../images/logo.png" width="40" height="40" alt="MCB Bank Logo">
        <h2>MCB Bank</h2>
        <p>CEO Panel</p>
    </div>
    <ul class="sidebar-menu">
        <li><a href="admin_dashboard.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="add_manager.php"><i class="fas fa-user-plus"></i> Add Manager</a></li>
        <li><a href="manage_manager.php"><i class="fas fa-users-cog"></i> Manage Managers</a></li>
        <li><a href="../index.php"><i class="fas fa-arrow-left"></i> Back to Home</a></li>
        <li><a href="admin_login.php"><i class="fas fa-arrow-left"></i> Back to login</a></li>
        <li><a href="admin_logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="topbar">
        <h3>Welcome, <?= htmlspecialchars($_SESSION['adminName']); ?></h3>
    </div>

    <div class="content">
        <h2>CEO Dashboard</h2>
        <p>Here you can manage your managers, view performance, and oversee the entire banking operation system.</p>

        <div class="dashboard-buttons">
            <a href="add_manager.php" class="btn btn-succes">Add Manager</a>
            <a href="manage_manager.php" class="btn btn-primary">Manage Managers</a>
            <a href="../home.php" class="btn btn-secondary">Back to Home</a>
        </div>
    </div>
</div>

</body>
</html>
