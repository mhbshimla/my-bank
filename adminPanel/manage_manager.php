<?php
session_start();
require '../assets/db.php';
if (!isset($_SESSION['adminId'])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $con->query("DELETE FROM managers WHERE id='$id'");
    header("Location: manage_manager.php");
    exit();
}

$result = $con->query("SELECT * FROM managers");
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Managers - CEO Panel</title>
<?php require '../assets/autoloader.php'; ?>

<style>


body {
  background: linear-gradient(to right, rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
              url("../images/welcome-bg.jpg") no-repeat center center fixed;
  background-size: cover;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  color: #fff;
  margin: 0;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  padding-top: 50px;
}

/* Container box */
.container {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(6px);
  border-radius: 12px;
  padding: 30px;
  width: 85%;
  max-width: 1000px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
}

/* Title */
h3 {
  text-align: center;
  margin-bottom: 25px;
  font-weight: 600;
  letter-spacing: 1px;
  color: #00c3ff;
  text-shadow: 0 0 8px rgba(0, 195, 255, 0.5);
}

/* Table style */
table {
  width: 100%;
  border-collapse: collapse;
  background: rgba(255, 255, 255, 0.15);
  border-radius: 10px;
  overflow: hidden;
}

thead {
  background: #007bff;
  color: #fff;
}

th, td {
  padding: 12px 15px;
  text-align: center;
  font-size: 15px;
}

tbody tr:nth-child(even) {
  background: rgba(255, 255, 255, 0.08);
}

tbody tr:hover {
  background: rgba(0, 195, 255, 0.25);
  transition: 0.3s;
}

.btn-secondary {
  background: linear-gradient(135deg, #6c757d, #5a6268);
  color: white;
  padding: 8px 16px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 500;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
}

.btn-secondary:hover {
  background: linear-gradient(135deg, #5a6268, #6c757d);
  transform: translateY(-2px);
  box-shadow: 0 0 10px rgba(108, 117, 125, 0.8);
}

.btn-danger {
  background: linear-gradient(135deg, #dc3545, #c82333);
  color: white;
  padding: 8px 16px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 500;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
}

.btn-danger:hover {
  background: linear-gradient(135deg, #c82333, #dc3545);
  transform: translateY(-2px);
  box-shadow: 0 0 10px rgba(220, 53, 69, 0.8);
}

/* Responsive */
@media (max-width: 768px) {
  table, thead, tbody, th, td, tr {
    display: block;
  }

  th {
    display: none;
  }

  td {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }

  td::before {
    content: attr(data-label);
    font-weight: bold;
    color: #00c3ff;
  }

  .container {
    width: 95%;
  }
}

</style>
</head>
<body>
<div style="position:absolute; top:20px; right:20px;">
  <a href="admin_dashboard.php" class="btn btn-secondary btn-sm">⬅ Back</a>
  <a href="admin_logout.php" class="btn btn-danger btn-sm">Logout</a>
</div>
<div class="container mt-4">
<h3>All Managers</h3>
<table class="table table-bordered table-striped">
<thead class="bg-dark text-white">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Username</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['username'] ?></td>
<td>
  <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
     onclick="return confirm('Are you sure you want to delete this manager?')">
     Delete
  </a>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
</body>
</html>
