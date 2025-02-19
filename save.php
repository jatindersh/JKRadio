<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $news1 = $_POST['news1'];
    $news2 = $_POST['news2'];
    
    // Create a new record
    $new_data = array('news1' => $news1, 'news2' => $news2);
    
    // Check if the file exists
    if (file_exists('data.json')) {
        // Read the existing file content
        $json_data = file_get_contents('data.json');
        $data = json_decode($json_data, true);
        
        // If the file is empty or invalid JSON, initialize an empty array
        if (!is_array($data)) {
            $data = array();
        }
    } else {
        $data = array();
    }
    
    // Add the new record to the array
    array_push($data, $new_data);
    
    // Save the updated data back to the file
    $json_data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('data.json', $json_data);

    echo "Data saved to data.json";
}
?>
