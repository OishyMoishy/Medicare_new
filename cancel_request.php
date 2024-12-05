<?php
session_start();
include 'database.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_POST['request_id'])) {
    header("Location: dashboard.php");
    exit();
}

$request_id = $_POST['request_id'];
$userid = $_SESSION['id'];

// Check if the request belongs to the logged-in user
$sql = "SELECT * FROM request WHERE userid=? AND requestid=?";
$stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ii", $userid, $request_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Request found, delete it
        $delete_sql = "DELETE FROM request WHERE requestid=?";
        $delete_stmt = mysqli_prepare($conn, $delete_sql);
        if ($delete_stmt) {
            mysqli_stmt_bind_param($delete_stmt, "i", $request_id);
            mysqli_stmt_execute($delete_stmt);
            mysqli_stmt_close($delete_stmt);
        }
    }
    
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

header("Location: dashboard.php");
exit();
?>
