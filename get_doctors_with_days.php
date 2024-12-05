<?php
include 'database.php'; // Database connection file

if (isset($_GET['category'])) {
    $category = $_GET['category'];

    // Prepare the SQL statement to fetch doctor data
    $sql = "SELECT id, docname, visiting_days FROM doctors WHERE category = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $category);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $doctors = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $doctors[] = [
                    'id' => $row['id'],
                    'docname' => $row['docname'],
                    'visiting_days' => array_map('trim', explode(',', $row['visiting_days']))
                ];
            }
            echo json_encode($doctors); // Return the data as JSON
        } else {
            echo json_encode(['error' => 'Failed to fetch data']);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['error' => 'Failed to prepare statement']);
    }
    mysqli_close($conn);
} else {
    echo json_encode(['error' => 'Category not provided']);
}
?>

