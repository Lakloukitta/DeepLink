<?php
require 'database.php';
header('Content-Type: application/json');

// Generate fake heart rate and oxygen level data
$heartRate = rand(60, 100); // Random heart rate between 60 and 100
$oxygenLevel = rand(90, 100); // Random oxygen level between 90 and 100

$stmt = $mysqli->prepare("SELECT * FROM `patient` WHERE id = 1");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Prepare response
$response = [
    "success" => true,
    "heartrate" => $row['last_heart_beat'],
    "oxygenlevel" => $row['last_o2'],
];

// Send JSON response
echo json_encode($response);
?>