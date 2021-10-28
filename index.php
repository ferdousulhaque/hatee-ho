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
use App\StringGenerator;
use App\StringGenerator\Config;
use App\StringGenerator\Range;

$matchers = [
    'divisible_by' => new DivisibleBy(),
    'in_array' => new InArray(),
    'greater_than' => new GreaterThan(),
];

$response = new StringGenerator($matchers);

// Task 1
echo "Task v1:" . PHP_EOL;
echo $response->generate([
    new Config(
        [
            'divisible_by' =>  3,
            'divisible_by' => 5,
        ], 
        'papow'
    ),
    new Config(
        [
            'divisible_by' =>  3,
        ], 
        'pa'
    ),
    new Config(
        [
            'divisible_by' => 5,
        ], 
        'pow'
    ),
], new Range(1, 20), ' ');

exit(1);

// Task 2
$configs = [
    new Config([new DivisibleBy(2), new DivisibleBy(7)], 'hateeho'),
    new Config([new DivisibleBy(7)], 'ho'),
    new Config([new DivisibleBy(2)], 'hatee'),
];
echo "Task v2:" . PHP_EOL;
echo $response->generate($configs, new Range(1, 15), '-');

// Task 3
$configs = [
    new Config([new InArray([1, 4, 9]), new GreaterThan(5)], 'jofftchoff'),
    new Config([new InArray([1, 4, 9])], 'joff'),
    new Config([new GreaterThan(5)], 'tchoff'),
];

echo "Task v3:" . PHP_EOL;
echo $response->generate($configs, new Range(1, 10), '-');