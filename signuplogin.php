<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        button {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049; /* Darker Green */
        }
        button:focus {
            outline: none;
        }
        /* Style the form container to center the buttons */
        .form-container {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Add margin to separate buttons from text */
        }
        /* Style each form */
        form {
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <h1>Make appointment with our doctors!</h1>
    <p>Welcome!</p>
    
    <!-- Buttons Container -->
    <div class="form-container">
        <!-- Login Form -->
        <form action="login.php">
            <button type="submit">Log In</button>
        </form>

        <!-- Sign Up Button -->
        <button onclick="window.location.href='signup.php';">Are you new here? Please sign up</button>
    </div>
</body>
</html>
