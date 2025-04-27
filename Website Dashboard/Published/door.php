<?php
require 'database.php';


if(isset($_GET['open']))
{
    $stmt = $mysqli->prepare("UPDATE `patient` SET `door`='1' WHERE `id` = 1");
    $stmt->execute();
}
if(isset($_GET['close']))
{
    $stmt = $mysqli->prepare("UPDATE `patient` SET `door`='0' WHERE `id` = 1");
    $stmt->execute();
}
