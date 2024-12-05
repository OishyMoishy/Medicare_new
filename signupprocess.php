<?php
// Start PHP session
session_start();

// Include the database connection file
include 'database.php';

// Check if the form was submitted
if(isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['address'], $_POST['about'], $_POST['phone'])) {
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $about = mysqli_real_escape_string($conn, $_POST['about']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Construct SQL query
    $sql = "INSERT INTO appoint(name, email, password, address, about, phone) VALUES ('$name', '$email', '$password', '$address', '$about', '$phone')";

    // Execute SQL query
    if(mysqli_query($conn, $sql)) {
        // Set session variables
        $_SESSION['id'] = mysqli_insert_id($conn);
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;

        // Redirect user to dashboard page
        header("Location: dashboard.php");
        exit();
    } else {
        // Error inserting data
        echo '<div class="container"><p>Error: ' . mysqli_error($conn) . '</p></div>';
    }
} else {
    // Form not submitted
    echo '<div class="container"><p>Form not submitted.</p></div>';
}

// Close database connection
mysqli_close($conn);
?>
