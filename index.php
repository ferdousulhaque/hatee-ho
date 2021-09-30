<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/
require __DIR__ . '/vendor/autoload.php';

use App\Helpers\isDivisibleBy;
use App\Helpers\isGreaterThan;
use App\Helpers\isOneOf;
use App\Response;

$response = new Response();

// Task 1
$input = [1, 20];
$conditions = [
    ["logic" => [new isDivisibleBy(3), new isDivisibleBy(5)], "print" => "papow"],
    ["logic" => [new isDivisibleBy(3)], "print" => "pa"],
    ["logic" => [new isDivisibleBy(5)], "print" => "pow"],
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
    ["logic" => [new isDivisibleBy(2), new isDivisibleBy(7)], "print" => "hateeho"],
    ["logic" => [new isDivisibleBy(7)], "print" => "ho"],
    ["logic" => [new isDivisibleBy(2)], "print" => "hatee"],
];
$append = "-";
echo "Task v2:" . PHP_EOL;
echo $response->input($input)
    ->conditions($conditions)
    ->append($append)
    ->response();

// // Task 3
$input = [1, 10];
$conditions = [
    ["logic" => [new isOneOf([1, 4, 9]), new isGreaterThan(5)], "print" => "jofftchoff"],
    ["logic" => [new isOneOf([1, 4, 9])], "print" => "joff"],
    ["logic" => [new isGreaterThan(5)], "print" => "tchoff"]
];
$append = "-";
echo "Task v3:" . PHP_EOL;
echo $response->input($input)
    ->conditions($conditions)
    ->append($append)
    ->response();
