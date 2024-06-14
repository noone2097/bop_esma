<?php
include 'db_conn.php';

$fullname = $_POST['user_name'];
$dob = $_POST['user_dob'];
$mobile = $_POST['user_mobile'];
$email = $_POST['user_email'];

$stmt = $conn->prepare("INSERT INTO attendees (full_name, date_of_birth, mobile_number, email) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $fullname, $dob, $mobile, $email);

if ($stmt->execute()) {
    echo "New records created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
