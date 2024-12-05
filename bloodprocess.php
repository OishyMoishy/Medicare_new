<?php
// Start PHP session
session_start();

// Include the database connection file
include 'database.php';

// Check if any form field is set
if(isset($_POST['name'])) {
    // Escape user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $NID = mysqli_real_escape_string($con, $_POST['NID']);
    $bloodtype = mysqli_real_escape_string($con, $_POST['bloodtype']);
    
    // Insert user data into the database using prepared statements
    $stmt = $con->prepare("INSERT INTO blood (name, email, phone, NID, bloodtype) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $NID, $bloodtype);

    if($stmt->execute()) {
        // Store user data in session variables
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['NID'] = $NID;
        $_SESSION['bloodtype'] = $bloodtype;

        // Redirect user to profile page
        header("Location: success.php");
        exit();
    } else {
        // Log the error and display a generic message to the user
        error_log("Error inserting data into the database: " . $stmt->error);
        header("Location: error.php");
        exit();
    }
} else {
    // Redirect user or display a different message
    header("Location: blood2.php");
    exit();
}

// Close database connection
$stmt->close();
$con->close();
?>
