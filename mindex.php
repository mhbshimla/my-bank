<?php
session_start();
if (!isset($_SESSION['managerId'])) {
    header('location:login.php');
    exit();
}

require 'assets/autoloader.php';
require 'assets/db.php';
require 'assets/function.php';

// ✅ Handle Delete Account
if (isset($_GET['delete'])) {
    $deleteId = intval($_GET['delete']);
    if ($con->query("DELETE FROM useraccounts WHERE id = '$deleteId'")) {
        header("Location: mindex.php?msg=deleted");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manager Dashboard - MCB Bank</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        body {
            background: url('images/maddaccount-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            padding-top: 70px;
        }
        .card {
            background: rgba(255,255,255,0.95);
        }
        footer {
            background-color: #212529;
            color: white;
        }
    </style>
</head>
<body>

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">
        <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        <?php echo bankName; ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="mindex.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="maccounts.php">Accounts</a></li>
            <li class="nav-item"><a class="nav-link" href="maddnew.php">Add Account</a></li>
            <li class="nav-item"><a class="nav-link" href="mfeedback.php">Feedback</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="manager_profile.php">Your Profile</a></li> -->
        </ul>
        <?php include 'msideButton.php'; ?>
    </div>
</nav>

<!-- ✅ Main Content -->
<div class="container mt-4">
    <div class="card text-center shadow">
        <div class="card-header bg-dark text-white">
            <h4>All Customer Accounts</h4>
        </div>

        <div class="card-body">
            <!-- Search Form -->
            <form method="GET" class="form-inline justify-content-center mb-3">
                <input type="text" name="search" class="form-control mr-2"
                       placeholder="Search by name, account no, or branch"
                       value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" class="btn btn-success">Search</button>
                <a href="mindex.php" class="btn btn-outline-secondary ml-2">Clear</a>
            </form>

            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Holder Name</th>
                        <th>Account No.</th>
                        <th>Branch</th>
                        <th>Balance</th>
                        <th>Account Type</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                $search = isset($_GET['search']) ? $con->real_escape_string($_GET['search']) : '';

                if (!empty($search)) {
                    $sql = "SELECT * FROM useraccounts 
                            JOIN branch ON useraccounts.branch = branch.branchId 
                            WHERE useraccounts.name LIKE '%$search%'
                            OR useraccounts.accountNo LIKE '%$search%'
                            OR branch.branchName LIKE '%$search%'";
                } else {
                    $sql = "SELECT * FROM useraccounts 
                            JOIN branch ON useraccounts.branch = branch.branchId";
                }

                $result = $con->query($sql);
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        echo "
                        <tr>
                            <td>$i</td>
                            <td>{$row['name']}</td>
                            <td>{$row['accountNo']}</td>
                            <td>{$row['branchName']}</td>
                            <td>৳ {$row['balance']}</td>
                            <td>{$row['accountType']}</td>
                            <td>{$row['number']}</td>
                            <td>
                                <a href='show.php?id={$row['id']}' class='btn btn-success btn-sm'>View</a>
                                <a href='mnotice.php?id={$row['id']}' class='btn btn-primary btn-sm'>Notice</a>
                                <a href='mindex.php?delete={$row['id']}' class='btn btn-danger btn-sm'
                                   onclick=\"return confirm('Are you sure you want to delete this account?');\">Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center text-muted'>No accounts found</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-dark text-white">
            <small>Manager Dashboard - <?php echo bankName; ?></small>
        </div>
    </div>
</div>

<!-- ✅ Footer -->
<footer class="text-center py-3 mt-5">
    <div class="container">
        <p><strong>MCB Bank</strong> — Secure • Reliable • Trusted</p>
        <p>Email: support@mcbank.com | Phone: +880 1234-567890</p>
        <p>&copy; <?php echo date("Y"); ?> MCB Bank. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>
