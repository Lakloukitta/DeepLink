<?php
// database.php

$servername = "localhost";
$username = "deepeoeb_deeplink";
$password = "v]B-azrs=5?2";
$dbname = "deepeoeb_deeplink";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

/*
$date = new DateTime("now", new DateTimeZone("America/Los_Angeles"));
$offset = $date->getOffset();
$offsetHours = $offset / 3600;
if ($offsetHours == -7) {
    $stmt = $mysqli->prepare("SET time_zone = '-07:00';");
} elseif ($offsetHours == -8) {
    $stmt = $mysqli->prepare("SET time_zone = '-08:00';");
} else {
    $stmt = $mysqli->prepare("SET time_zone = '-08:00';");
}
$stmt->execute();*/
