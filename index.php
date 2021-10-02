<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/
require __DIR__ . '/vendor/autoload.php';

use App\Matcher\DivisibleBy;
use App\Matcher\GreaterThan;
use App\Matcher\InArray;
use App\Response;

$response = new Response();

// Task 1
$input = [1, 20];
$conditions = [
    ["logic" => [new DivisibleBy(3), new DivisibleBy(5)], "print" => "papow"],
    ["logic" => [new DivisibleBy(3)], "print" => "pa"],
    ["logic" => [new DivisibleBy(5)], "print" => "pow"],
];
$append = " ";
echo "Task v1:" . PHP_EOL;
echo $response->input($input)
    ->conditions($conditions)
    ->append($append)
    ->response() . PHP_EOL;



// Task 2
$input = [1, 15];
$conditions = [
    ["logic" => [new DivisibleBy(2), new DivisibleBy(7)], "print" => "hateeho"],
    ["logic" => [new DivisibleBy(7)], "print" => "ho"],
    ["logic" => [new DivisibleBy(2)], "print" => "hatee"],
];
$append = "-";
echo "Task v2:" . PHP_EOL;
echo $response->input($input)
    ->conditions($conditions)
    ->append($append)
    ->response() . PHP_EOL
;

// // Task 3
$input = [1, 10];
$conditions = [
    ["logic" => [new InArray([1, 4, 9]), new GreaterThan(5)], "print" => "jofftchoff"],
    ["logic" => [new InArray([1, 4, 9])], "print" => "joff"],
    ["logic" => [new GreaterThan(5)], "print" => "tchoff"]
];
$append = "-";
echo "Task v3:" . PHP_EOL;
echo $response->input($input)
    ->conditions($conditions)
    ->append($append)
    ->response() . PHP_EOL
;
