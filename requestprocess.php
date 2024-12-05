<?php
// Start PHP session
session_start();

// Include the database connection file
include 'database.php';

// Check if the form was submitted
if (isset($_POST['category'], $_POST['docname'], $_POST['day'])) {
    // Retrieve form data and sanitize it
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $docname = mysqli_real_escape_string($conn, $_POST['docname']);
    $day = mysqli_real_escape_string($conn, $_POST['day']);

    // Check if the user is logged in
    if (isset($_SESSION['name'])) {
        $user_name = $_SESSION['name'];

        // Retrieve user ID (foreign key) from the `appoint` table
        $sql = "SELECT id FROM appoint WHERE name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $user_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // User ID fetched successfully
            $userid = $row['id'];

            // Construct SQL query to insert the request
            $sql_insert = "INSERT INTO request (userid, category, docname, day) VALUES (?, ?, ?, ?)";
            $stmt_insert = mysqli_prepare($conn, $sql_insert);
            mysqli_stmt_bind_param($stmt_insert, "isss", $userid, $category, $docname, $day);

            // Execute SQL query
            if (mysqli_stmt_execute($stmt_insert)) {
                // Redirect to the dashboard or confirmation page
                header("Location: dashboard.php");
                exit();
            } else {
                // Error inserting data
                echo '<div class="container"><p>Error: ' . mysqli_error($conn) . '</p></div>';
            }

            // Close the insert statement
            mysqli_stmt_close($stmt_insert);
        } else {
            // User not found in the `appoint` table
            echo '<div class="container"><p>User not found in the appoint table.</p></div>';
        }

        // Close the select statement
        mysqli_stmt_close($stmt);
    } else {
        // User not logged in
        echo '<div class="container"><p>User not logged in. Please log in to make a request.</p></div>';
    }
} else {
    // Form not submitted
    echo '<div class="container"><p>Form not submitted. Please complete all fields.</p></div>';
}

// Close the database connection
mysqli_close($conn);
?>
