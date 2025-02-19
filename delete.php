<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sno'])) {
    $delete_index = (int) $_POST['sno'] - 1; // Adjust for zero-based index
    
    // Read the JSON file
    $json_data = file_get_contents('data.json');
    
    // Decode JSON data into an array
    $data = json_decode($json_data, true);
    
    // Check if the index is valid
    if (is_array($data) && isset($data[$delete_index])) {
        // Remove the item at the specified index
        array_splice($data, $delete_index, 1);
        
        // Save the updated data back to the file
        $json_data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $json_data);
    }
}

// Redirect back to display.php
header("Location: display.php");
exit();
?>
