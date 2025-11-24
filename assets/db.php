<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ✅ Auto-switch between localhost and InfinityFree
if (in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1'])) {
    // Localhost (XAMPP/WAMP)
    $con = new mysqli('localhost', 'root', '', 'mybank');
} else {
    // InfinityFree (Live Hosting)
    $con = new mysqli('sql100.infinityfree.com', 'if0_40476525', 'banK12345', 'if0_40476525_mybank');
}

// ✅ Connection check
if ($con->connect_error) {
    die("Database connection failed: " . $con->connect_error);
}

// ✅ Bank name constant
define('bankName', 'MCB Bank');

// ✅ Fetch user data safely if logged in
$userData = null;
if (isset($_SESSION['userId'])) {
    $stmt = $con->prepare("
        SELECT * 
        FROM userAccounts 
        JOIN branch ON userAccounts.branch = branch.branchId 
        WHERE userAccounts.id = ?
    ");
    if ($stmt) {
        $stmt->bind_param("i", $_SESSION['userId']);
        $stmt->execute();
        $result   = $stmt->get_result();
        $userData = $result->fetch_assoc();
        $stmt->close();
    }
}
?>
<!-- Tooltip initialization -->
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>