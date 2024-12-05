<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="phone"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="phone"]:focus {
            outline: none;
            border-color: #4CAF50;
        }
        button {
            width: 100%;
            padding: 15px 0;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
        button:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration</h1>
        <p>Please fill out the form below to create your account:</p>
        
        <!-- Registration Form -->
        <form id="registrationForm" onsubmit="return validateForm()" method="post" action="signupprocess.php">
            <input type="text" placeholder="Name" name="name" required><br>
            <input type="phone" placeholder="Phone" name="phone" required><br>
            <input type="email" placeholder="Email" name="email" required><br>
            <input type="text" placeholder="About me" name="about"><br>
            <input type="text" placeholder="Address" name="address" required><br>
            <input type="password" placeholder="Password" name="password" id="password" required><br>
            <input type="password" placeholder="Confirm Password" name="confirmPassword" id="confirmPassword" required><br>
            <button type="submit">Register</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
