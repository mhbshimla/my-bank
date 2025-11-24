<?php 
    //$con = new mysqli('localhost','root','','mybank');
    //define('bankName', 'MCB Bank',true);
    //$ar = $con->query("select * from userAccounts,branch where id = '$_SESSION[userId]' AND userAccounts.branch = branch.branchId");
   // $userData = $ar->fetch_assoc();
//?>
 <script type="text/javascript"> 
	 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 </script> 


<!-- <script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script> -->


<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$con = new mysqli('localhost:3306','root','','mybank');
define('bankName', 'MCB Bank');

$userData = null; // default value

// ✅ Only run this query if the session key exists
if (isset($_SESSION['userId'])) {
    $ar = $con->query("SELECT * FROM userAccounts, branch 
                       WHERE id = '{$_SESSION['userId']}' 
                       AND userAccounts.branch = branch.branchId");
    $userData = $ar->fetch_assoc();
}
?>
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

