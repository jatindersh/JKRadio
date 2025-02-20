<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jknews";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$news = $_POST['news'];

// SQL query to insert data
$sql = "INSERT INTO news_table (news) VALUES ('$news')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
