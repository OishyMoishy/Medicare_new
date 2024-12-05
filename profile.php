<?php
session_start();
include 'database.php';

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];

$sql = "SELECT * FROM appoint WHERE name=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $name);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Profile</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            color: #333;
            margin-bottom: 5px;
        }

        input, textarea {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #3498db;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .button-group button, .button-group a {
            padding: 15px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            font-weight: bold;
            width: 48%;
            text-align: center;
            text-decoration: none;
        }

        .button-group .update-button {
            background-color: white;
            color: #16a085;
            border: 2px solid #16a085;
        }

        .button-group .update-button:hover {
            background-color: #16a085;
            color: white;
        }

        .button-group .return-button {
            background-color: #16a085;
            color: white;
            border: none;
            
        }

        .button-group .return-button:hover {
            background-color: #149174;
            
        }

        .button-group .return-button i {
            margin-right: 5px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .container {
                margin: 20px;
            }

            input, textarea, .button-group button, .button-group a {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            input, textarea {
                width: 100%;
            }

            .button-group {
                flex-direction: column;
                gap: 10px;
            }

            .button-group button, .button-group a {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Profile</h2>
        <form method="post" action="updateprofile.php">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?= htmlspecialchars($user['address']) ?>" required>

            <label for="about">About:</label>
            <textarea id="about" name="about" required><?= htmlspecialchars($user['about']) ?></textarea>

            <div class="button-group">
                <button type="submit" class="update-button">Update</button>
                <a href="dashboard.php" class="return-button"><i class="fas fa-arrow-left"></i>Return to Home</a>
            </div>
        </form>
    </div>
</body>
</html>
