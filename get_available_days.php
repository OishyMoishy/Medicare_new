<?php
include 'database.php'; // Your database connection file

if (isset($_GET['name'])) {
    $name = $_GET['name'];

    // Fetch visiting_days for the selected doctor
    $sql = "SELECT visiting_days FROM doctors WHERE name = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $days = [];
    if ($row = mysqli_fetch_assoc($result)) {
        // Split the visiting_days string into an array
        $days = array_map('trim', explode(',', $row['visiting_days']));
    }

    echo json_encode($days);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo json_encode([]); // Return an empty array if name is not set
}
?>

