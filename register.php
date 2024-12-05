<?php
session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize inputs
    $docname = htmlspecialchars($_POST['docname']);
    $degree = htmlspecialchars($_POST['degree']);
    $medical = htmlspecialchars($_POST['medical']);
    $email = htmlspecialchars($_POST['email']);
    $category = htmlspecialchars($_POST['category']);
    $visiting_days = htmlspecialchars($_POST['visiting_days']);
    $visiting_time = htmlspecialchars($_POST['visiting_time']);

    // Prepare and execute SQL query
    $sql = "INSERT INTO doctors (docname, degree, medical, email, category, visiting_days, visiting_time) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $docname, $degree, $medical, $email, $category, $visiting_days, $visiting_time);

    if ($stmt->execute()) {
        echo "Doctor registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
