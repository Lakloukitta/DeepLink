<?php
require 'database.php';
$stmt = $mysqli->prepare("SELECT door FROM `patient` WHERE id=1");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
echo $row['door'];