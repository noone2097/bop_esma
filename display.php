<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sample PHP Database Application</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>
</head>
<body>

  <?php

//Change the password to match your configuration
$link = mysqli_connect("localhost", "root", "", "bop_esma");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
echo "<br>";

$sql = "SELECT id, full_name, date_of_birth, mobile_number, email FROM attendees";
$result = $link->query($sql);

echo "<div class='container'>";
echo "<div class='row-fluid'>";

echo "<div class='col-xs-6'>";
echo "<div class='table-responsive'>";

echo "<table class='table table-hover table-inverse'>";

echo "<tr>";
echo "<th>ID</th>";
echo "<th>Full Name</th>";
echo "<th>Date Of Birth</th>";
echo "<th>Mobile Number</th>";
echo "<th>Email</th>";
echo "</tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["full_name"] . "</td>";
        echo "<td>" . $row["date_of_birth"] . "</td>";
        echo "<td>" . $row["mobile_number"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

// Close connection
mysqli_close($link);
?>


</body>
</html>
