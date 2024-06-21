<?php
$con = mysqli_connect("localhost", "root", "", "voting");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize user inputs to prevent SQL injection
$un = mysqli_real_escape_string($con, $_POST["name"]);
$em = mysqli_real_escape_string($con, $_POST["email"]);
$pw = mysqli_real_escape_string($con, $_POST["password"]);

// Prepare SQL query
$sql = "INSERT INTO users (name, email, pass) VALUES ('$un', '$em', '$pw')";

// Execute query and check for errors
if (mysqli_query($con, $sql)) {
    echo '<script>alert("Registered successfully!");';
    echo 'setTimeout(function() { window.location.href = "login.html"; }, 1000);</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close connection
mysqli_close($con);
?>
