<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/
require __DIR__ . '/vendor/autoload.php';

use App\Response;

$response = new Response();

// Task 1
$input = [1, 20];
$conditions = [
    "pa" => ["%", "3"],
    "pow" => ["%", "5"],
    "papow" => ["%", "3,5"]
];
$append = " ";
echo "Task v1:" . PHP_EOL;
echo $response->input($input)
    ->conditions($conditions)
    ->append($append)
    ->response();

// Task 2
$input = [1, 15];
$conditions = [
    "hatee" => ["%", "2"],
    "ho" => ["%", "7"],
    "hateeho" => ["%", "2,7"]
];
$append = "-";
echo "Task v2:" . PHP_EOL;
echo $response->input($input)
    ->conditions($conditions)
    ->append($append)
    ->response();

// Task 3
$input = [1, 10];
$conditions = [
    "joff" => ["=", "1,4,9"],
    "tchoff" => [">", "5"],
    "jofftchoff" => ["=", "9"]
];
$append = "-";
echo "Task v3:" . PHP_EOL;
echo $response->input($input)
    ->conditions($conditions)
    ->append($append)
    ->response();
