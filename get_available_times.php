<?php
include 'database.php';

header('Content-Type: application/json'); // Ensure the response is JSON

if (isset($_GET['doctorType'])) {
    $doctorType = $_GET['doctorType'];

    // Debugging: Log the doctor type being requested
    error_log("Fetching available days for doctor type: " . $doctorType);

    // Fetch available days for doctors in the selected category
    $sql = "SELECT dt.availday 
            FROM doctorinfo di
            LEFT JOIN doctortime dt ON di.doctorid = dt.doctorid
            WHERE di.catagory = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $doctorType);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        $availday = [];
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['availabledays']) {
                $availday[] = [
                    'days' => $row['availday']
                ];
            }
        }
        mysqli_stmt_close($stmt);

        // Send the available days as a JSON response
        if (!empty($availday)) {
            echo json_encode($availday);
        } else {
            echo json_encode([]); // No days found
        }
    } else {
        // Log error and send an empty response
        error_log("SQL Error: " . mysqli_error($conn));
        echo json_encode([]);
    }
} else {
    // No doctor type provided
    echo json_encode([]);
}

mysqli_close($conn);
?>
