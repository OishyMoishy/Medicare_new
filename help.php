<?php
session_start();
include 'database.php';

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Help & Emergency Contacts</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 90%;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h1 {
            color: #16a085;
            font-size: 32px;
            margin-bottom: 20px;
        }
        h2 {
            color: #16a085;
            font-size: 28px;
            margin-bottom: 15px;
        }
        p {
            color: #555;
            font-size: 18px;
            margin: 10px 0;
        }
        .contact-info {
            margin-top: 30px;
            padding: 20px;
            background-color: #ecf0f1;
            border-radius: 10px;
        }
        .contact-info h2 {
            margin-bottom: 15px;
        }
        .contact-info p {
            margin: 8px 0;
        }
        .highlight {
            color: #16a085;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Help & Emergency Contacts</h1>
        <div class="contact-info">
            <h2>Medicare Hotline</h2>
            <p><span class="highlight">Hotline Number:</span> 111-222-3333</p>
            <p><span class="highlight">Email:</span> support@medicare.com</p>
        </div>
        <div class="contact-info">
            <h2>How to Use Your Profile</h2>
            <p>Welcome, <span class="highlight"><?= htmlspecialchars($name) ?></span>! Here are some tips on how to use your profile effectively:</p>
            <p>1. <span class="highlight">View Appointments:</span> On your dashboard, you can see the details of your upcoming appointments.</p>
            <p>2. <span class="highlight">Request Appointments:</span> Use the 'Appoint a Doctor' button to request a new appointment. Fill in the necessary details such as doctor type, gender preference, and appointment time.</p>
            <p>3. <span class="highlight">Edit Profile:</span> Click on the 'Profile' button to view and edit your personal information such as your name, phone number, email, address, and more. Make sure to save any changes you make.</p>
            <p>4. <span class="highlight">Logout:</span> When you are done, click on the 'Log out' button to securely log out of your account.</p>
            <p>If you need further assistance, feel free to contact our support team using the Medicare hotline number or email provided above.</p>
        </div>
    </div>
</body>
</html>
