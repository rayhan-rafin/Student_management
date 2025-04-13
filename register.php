<?php
include("db_connect.php"); // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $department = $_POST["department"];
    $major = $_POST["major"];
    $dob = $_POST["dob"];
    $address = trim($_POST["address"]);

    // Validate required fields
    if (empty($name) || empty($email)) {
        die("Error: Name and Email are required.");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }

    // Insert data into the database
    $sql = "INSERT INTO students (id, name, email, department, major, dob, address) 
            VALUES ('$id', '$name', '$email', '$department', '$major', '$dob', '$address')";

    if ($conn->query($sql) === TRUE) {
        header("Location: student_list.php"); // Redirect after successful registration
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
