<?php

function getAgeFromDatetime($datetime) {
    // Convert the datetime string into a DateTime object
    $birthDate = new DateTime($datetime);
    $currentDate = new DateTime(); // Get the current date

    // Calculate the age using DateTime::diff
    $age = $birthDate->diff($currentDate)->y;

    return $age;
}

function timeAgo($timestamp) {
    $timeNow = time(); // Get the current Unix timestamp
    $timeDifference = $timeNow - strtotime($timestamp);

    if ($timeDifference < 1) {
        return "just now";
    }

    $timeUnits = [
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    ];

    foreach ($timeUnits as $unitInSeconds => $unitName) {
        if ($timeDifference >= $unitInSeconds) {
            $unitValue = floor($timeDifference / $unitInSeconds);
            return $unitValue . ' ' . $unitName . ($unitValue > 1 ? 's' : '') . ' ago';
        }
    }
}
