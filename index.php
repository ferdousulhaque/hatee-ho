<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/
require __DIR__ . '/vendor/autoload.php';

use App\GenerateString;
use App\Matcher\DivisibleBy;
use App\Matcher\GreaterThan;
use App\Matcher\InArray;
use App\StringGenerator\Config;

$response = new GenerateString();

// Task 1
$input = [1, 20];
$configs = [
    new Config([new DivisibleBy(3), new DivisibleBy(5)], 'papow'),
    new Config([new DivisibleBy(3)], 'pa'),
    new Config([new DivisibleBy(5)], 'pow'),
];

echo "Task v1:" . PHP_EOL;
echo $response->setInput($input)
    ->setConfigs($configs)
    ->append(" ")
    ->generate() . PHP_EOL;

// Task 2
$input = [1, 15];
$configs = [
    new Config([new DivisibleBy(2), new DivisibleBy(7)], 'hateeho'),
    new Config([new DivisibleBy(7)], 'ho'),
    new Config([new DivisibleBy(2)], 'hatee'),
];
echo "Task v2:" . PHP_EOL;
echo $response->setInput($input)
    ->setConfigs($configs)
    ->append('-')
    ->generate() . PHP_EOL;

// Task 3
$input = [1, 10];
$configs = [
    new Config([new InArray([1, 4, 9]), new GreaterThan(5)], 'jofftchoff'),
    new Config([new InArray([1, 4, 9])], 'joff'),
    new Config([new GreaterThan(5)], 'tchoff'),
];

echo "Task v3:" . PHP_EOL;
echo $response->setInput($input)
    ->setConfigs($configs)
    ->append('-')
    ->generate() . PHP_EOL;
