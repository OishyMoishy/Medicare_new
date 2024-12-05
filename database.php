<?php
// Connection for 'webprac' database
$servername = "localhost";
$username = "root";
$password = "";
$database = "webprac";

// Create the connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection to webprac database failed: " . mysqli_connect_error());
}
?>
