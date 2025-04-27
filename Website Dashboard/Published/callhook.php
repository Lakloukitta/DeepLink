<?php
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
?>
