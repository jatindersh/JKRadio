<!DOCTYPE html>
<html>
<head>
    <title>News Display</title>
    <style>
        .news-container {
            height: 200px;
            width: 400px;
            overflow: auto;
            border: 1px solid #000;
            padding: 10px;
        }
        .news-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>News List</h2>
    <div class="news-container">
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

// SQL query to select all records from the table
$sql = "SELECT sno, news FROM news_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "" . $row["sno"]. " " . $row["news"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
    </div>
</body>
</html>
