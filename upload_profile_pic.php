<?php
// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Include database connection
    include 'database.php';

    // Get user ID from session or any identifier
    // For demonstration, let's assume you have a session variable for user ID
    session_start();
    $userId = $_SESSION['user_id']; // Change 'user_id' to your actual session variable

    // Check if a file was uploaded without errors
    if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === 0) {
        // Get file details
        $file_name = $_FILES['profile_pic']['name'];
        $file_size = $_FILES['profile_pic']['size'];
        $file_tmp = $_FILES['profile_pic']['tmp_name'];
        $file_type = $_FILES['profile_pic']['type'];

        // Read the file content
        $file_content = file_get_contents($file_tmp);

        // Escape special characters to prevent SQL injection
        $file_name = mysqli_real_escape_string($con, $file_name);
        $file_type = mysqli_real_escape_string($con, $file_type);
        $file_content = mysqli_real_escape_string($con, $file_content);

        // Insert the image data into the database
        $sql = "INSERT INTO profile_pictures (user_id, file_name, file_type, file_content) 
                VALUES ('$userId', '$file_name', '$file_type', '$file_content')";
        if(mysqli_query($con, $sql)) {
            echo "<script>alert('Profile picture uploaded successfully')</script>";
        } else {
            echo "<script>alert('Error uploading profile picture')</script>";
        }
    } else {
        echo "<script>alert('Error uploading profile picture')</script>";
    }

    // Close database connection
    mysqli_close($con);
}
?>
