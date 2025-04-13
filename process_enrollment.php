<?php
include("db_connect.php"); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student-id"];
    $course_code = $_POST["course-code"];
    $course_title = $_POST["course-title"];
    $semester = $_POST["semester"];

    // Validate required fields
    if (empty($student_id) || empty($course_code) || empty($semester)) {
        die("Error: Student ID, Course Code, and Semester are required.");
    }

    // Insert data into the enrollment table
    $sql = "INSERT INTO enrollment (student_id, course_code, course_title, semester) 
            VALUES ('$student_id', '$course_code', '$course_title', '$semester')";

    if ($conn->query($sql) === TRUE) {
        echo "Enrollment successful!";
        header("Location: enrollment_history.php"); // Redirect after successful enrollment
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
