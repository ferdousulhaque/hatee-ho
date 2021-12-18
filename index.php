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
            'divisible_by' => [3, 5]
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
    )
], new Range(1, 20), ' ');
echo PHP_EOL;

// Task 2
echo "Task v2:" . PHP_EOL;
echo $response->generate([
    new Config(
        [
            'divisible_by' => [2, 7]
        ],
        'hateeho'
    ),
    new Config(
        [
            'divisible_by' => 7
        ],
        'ho'
    ),
    new Config(
        [
            'divisible_by' => 2
        ],
        'hatee'
    )
], new Range(1, 15), '-');
echo PHP_EOL;

// Task 3
echo "Task v3:" . PHP_EOL;
echo $response->generate([
    new Config(
        [
            'in_array' => [1, 4, 9],
            'greater_than' => 5
        ],
        'jofftchoff'
    ),
    new Config(
        [
            'in_array' => [1, 4, 9]
        ],
        'joff'
    ),
    new Config(
        [
            'greater_than' => 5
        ],
        'tchoff'
    )
], new Range(1, 10), '-');
