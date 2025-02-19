<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marquee Display</title>
    <style>
        table {
            width: 100%;
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
        marquee {
            width: 100%;
            font-size: 18px;
            background-color: #f9f9f9;
            padding: 10px;
        }
        .marquee-content {
            display: inline-block;
            white-space: nowrap;
        }
        .news-item {
            display: inline-block;
            padding: 0 50px; /* Adjust this value as needed */
        }
    </style>
</head>
<body>
    <h1>JSON Data Marquee in Table</h1>
 <table>
 <tr>
 <th>Marquee</th>
 </tr>
 <tr>
 <td>
     <?php
         // Read the JSON file
     $json_data = file_get_contents('data.json');
                
        // Decode JSON data into an array
     $data = json_decode($json_data, true);
                
     if (!empty($data)) {
          // Display the data in a marquee
      echo '<marquee behavior="scroll" direction="left" scrollamount="5" scrolldelay="50" onmouseover="this.stop();" onmouseout="this.start();">';
      echo '<div class="marquee-content">';
      foreach ($data as $index => $item) {
   if ($index > 0) {
      echo '<div class="news-item" style="animation-delay: ' . ($index * 2) . 's;">' . htmlspecialchars($item['news1']) . ' - ' . htmlspecialchars($item['news2']) . '</div>';
      } 
else {
      echo '<div class="news-item">' . htmlspecialchars($item['news1']) . ' - ' . htmlspecialchars($item['news2']) . '</div>';
        }
        }
      echo '</div>';
      echo '</marquee>';
      } else {
      echo 'No data available';
       }
      ?>
 </td>
 </tr>
    </table>
</body>
</html>
