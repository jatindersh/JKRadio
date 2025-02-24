<?php
header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);
$data = json_decode(file_get_contents('data.json'), true);
$data[] = $input;
file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));
echo json_encode($data);
?>
