<?php
require 'database.php';
//echo 'HI';
//echo $_GET['message'] .'';
//exit();
$message = $_GET['message'];
preg_match('/O2:(\d+)% HR:(\d+)bpm/', $message, $matches);

if (!empty($matches)) {
    $oxygenLevel = $matches[1]; // The number after O2
    $heartRate = $matches[2];   // The number after HR

    echo "Oxygen Level: " . $oxygenLevel . "%\n";
    echo "Heart Rate: " . $heartRate . " bpm\n";
} else {
    echo "Unable to parse the result.\n";
    echo "Message received: " . $message;
}
$patient_id = 1;
$sensor_name = 'HR';
$sensor_unit = 'BPM';
$measerment_length = 3000;
$stmt = $mysqli->prepare("INSERT INTO `sensors_data`(`patient_id`, `sensor_name`, `sensor_unit`, `value`, `measurement_length_ms`) VALUES (?,?,?,?,?)");
$stmt->bind_param("issii", $patient_id, $sensor_name, $sensor_unit, $heartRate, $measerment_length);
$stmt->execute();

$stmt = $mysqli->prepare("UPDATE `patient` SET `last_heart_beat` = ? WHERE `id` = ?");
$stmt->bind_param("ii", $heartRate, $patient_id);
$stmt->execute();

$sensor_name = 'O2';
$sensor_unit = '%';
$stmt = $mysqli->prepare("INSERT INTO `sensors_data`(`patient_id`, `sensor_name`, `sensor_unit`, `value`, `measurement_length_ms`) VALUES (?,?,?,?,?)");
$stmt->bind_param("issii", $patient_id, $sensor_name, $sensor_unit, $heartRate, $measerment_length);
$stmt->execute();



$stmt = $mysqli->prepare("SELECT `last_o2` FROM `patient` WHERE `id` = 1; ");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if ($row['last_o2'] > 90 && $oxygenLevel <= 90) {
    $apiUrl = 'https://developer.orkescloud.com/webhook/3s9s2f5d170b-22d5-11f0-bbb9-76512c6ab0ea';
    $data = [
        "SomeKey63hin" => "Some-val-laowi"
    ];
    $payload = json_encode($data);
    echo $payload;

    $ch = curl_init($apiUrl);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'SomeKeygk4fxf: Some-val-1zzyr'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
    } else {
        echo 'Response: ' . $response;
    }

    curl_close($ch);
}


$stmt = $mysqli->prepare("UPDATE `patient` SET `last_o2` = ? WHERE `id` = ?");
$stmt->bind_param("ii", $oxygenLevel, $patient_id);
$stmt->execute();

