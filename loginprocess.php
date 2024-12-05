<?php
session_start();
include 'database.php';

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database
    $sql = "SELECT id, name FROM appoint WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    // Check if there is a matching row
    if(mysqli_num_rows($result) > 0) {
        // Fetch user data
        $row = mysqli_fetch_assoc($result);

        // Start session and store user data
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row['id']; // Store user ID
        $_SESSION['name'] = $row['name']; // Store user name

        // Redirect to welcome page
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Wrong email or password')</script>";
    }
}
?>
