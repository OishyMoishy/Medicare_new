<?php
session_start();
include 'database.php';

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];

if (isset($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['address'], $_POST['about'])) {
    $new_name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $about = mysqli_real_escape_string($conn, $_POST['about']);

    $sql = "UPDATE appoint SET name=?, phone=?, email=?, address=?, about=? WHERE name=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $new_name, $phone, $email, $address, $about, $name);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['name'] = $new_name; // Update session name if name is changed
        header("Location: profile.php");
        exit();
    } else {
        echo '<div class="container"><p>Error updating profile: ' . mysqli_error($conn) . '</p></div>';
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
