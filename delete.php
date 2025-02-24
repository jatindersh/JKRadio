<?php
header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);
$data = json_decode(file_get_contents('data.json'), true);
$data = array_filter($data, function($record) use ($input) {
    return $record['sno'] != $input['sno'];
});
file_put_contents('data.json', json_encode(array_values($data), JSON_PRETTY_PRINT));
echo json_encode($data);
?>
