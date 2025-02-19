<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>JSON Data</h1>
    <?php
    // Read the JSON file
    $json_data = file_get_contents('data.json');
    
    // Decode JSON data into an array
    $data = json_decode($json_data, true);
    
    if (!empty($data)) {
        echo '<table>';
        echo '<tr><th>S.No</th><th>News 1</th><th>News 2</th></tr>';
        // Loop through the array and display the data in a table
        foreach ($data as $index => $item) {
            echo '<tr>';
            echo '<td>' . ($index + 1) . '</td>';
            echo '<td>' . htmlspecialchars($item['news1']) . '</td>';
            echo '<td>' . htmlspecialchars($item['news2']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No data available';
    }
    ?>
    <h2>Delete Entry</h2>
    <form action="delete.php" method="post">
        <label for="sno">Enter S.No to delete:</label>
        <input type="number" id="sno" name="sno" required>
        <input type="submit" value="Delete">
    </form>
</body>
</html>
