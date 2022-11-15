<?php
// $roles = ['admin', 'user', 'dev'];
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require('../main/accesscheck.php');
require('../main/initial.php');
// require('../main/verification.php');
require('../main/connection.php');
require('../main/function.php');

if (isset($_GET['log'])) {
    $log = $_GET['log'];

    $ip = getIPAddress();
    $log_stmt = $db->prepare("INSERT INTO tbl_log VALUES(:itaccount,:log,:ip,NOW())");
    $log_stmt->bindParam(':itaccount', $_SESSION["cmuitaccount_name"]);
    $log_stmt->bindParam(':log', $log);
    $log_stmt->bindParam(':ip', $ip);
    $log_stmt->execute();
    if ($log_stmt->rowCount() > 0) {
        echo json_encode("success");
    }
} else {
    echo json_encode("invalid");
}
