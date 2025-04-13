<?php
$servername = "localhost";
$username = "root";  // Default XAMPP username
$password = "";  // Default password in XAMPP is empty
$dbname = "student_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
