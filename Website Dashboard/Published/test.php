<?php
$appId = "4LEQT7-6XJX4E4K3X";



// Query for Average Heartbeat Rate
$query = urlencode("average resting heart rate");

// WolframAlpha API URL
$url = "http://api.wolframalpha.com/v2/query?input={$query}&appid={$appId}&output=JSON";

// Make the request
$response = file_get_contents($url);

// Decode JSON
$data = json_decode($response, true);

// Find and calculate the average heartbeat rate
$heartbeatText = null;
if (!empty($data['queryresult']['pods'])) {
    foreach ($data['queryresult']['pods'] as $pod) {
        if (strpos(strtolower($pod['title']), 'result') !== false || strpos(strtolower($pod['title']), 'heartbeat') !== false) {
            foreach ($pod['subpods'] as $subpod) {
                $heartbeatText = $subpod['plaintext'];
                break 2; // Exit both loops
            }
        }
    }
}

if ($heartbeatText) {
    // Extract numbers from the text
    if (preg_match('/(\d+)\s*to\s*(\d+)/', $heartbeatText, $matches)) {
        $low = (int)$matches[1];
        $high = (int)$matches[2];
        $average = ($low + $high) / 2;
        echo "The Average Heartbeat Rate is approximately: " . $average . " bpm";
    } else {
        echo "Could not parse heartbeat range. Output: " . $heartbeatText;
    }
} else {
    echo "Could not retrieve the Average Heartbeat Rate.";
}