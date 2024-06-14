<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bop_esma";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, full_name, date_of_birth, mobile_number, email FROM attendees";
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Full Name</th><th>Date of Birth</th><th>Mobile Number</th><th>Email</th></tr>";
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["full_name"] . "</td><td>" . $row["date_of_birth"] . "</td><td>" . $row["mobile_number"] . "</td><td>" . $row["email"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>0 results</td></tr>";
}
echo "</table>";
$conn->close();
