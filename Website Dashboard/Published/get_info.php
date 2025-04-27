<?php

$data = [
        "fullname" => "John Doe",
        "age"=> "86",
        "address"=> "1234 30th Street, Los Angeles, California",
        "gender"=> "Male",
        "heart_problems"=> "Yes",
];
$payload = json_encode($data);
echo $payload;