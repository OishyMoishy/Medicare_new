<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
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
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #4CAF50;
        }
        button {
            width: 100%;
            padding: 15px 0;
            font-size: 18px;
            background-color: white;
            color: #16a085;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            border: 2px solid #16a085;
        }
        button:hover {
            background-color: #16a085;
            color: white;
        }
        button:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="loginprocess.php">
            <input type="text" name="email" placeholder="Enter email" required><br>
            <input type="password" name="password" placeholder="Enter password" required><br>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</body>
</html>
