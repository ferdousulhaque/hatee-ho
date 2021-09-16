<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/
require __DIR__ . '/vendor/autoload.php';

use App\Helpers\ConverterService;

// Task 
$input = [1, 20];
$condition = [
    "pa" => ["%", "3"],
    "pow" => ["%", "5"],
    "papow" => ["%", "15"]
];
$append = " ";
$output = "";

for ($i = $input[0]; $i <= $input[1]; $i++) {
    $converter = new ConverterService();
    $output .= $converter->conditions($condition)->input($i)->execute() . (($i < $input[1]) ? $append : "");
}
echo $output . PHP_EOL;

// Task 
$input = [1, 15];
$condition = [
    "hatee" => ["%", "2"],
    "ho" => ["%", "7"],
    "hateeho" => ["%", "14"]
];
$append = "-";
$output = "";

for ($i = $input[0]; $i <= $input[1]; $i++) {
    $converter = new ConverterService();
    $output .= $converter->conditions($condition)->input($i)->execute() . (($i < $input[1]) ? $append : "");
}
echo $output . PHP_EOL;

// Task 
$input = [1, 10];
$condition = [
    "joff" => ["=", "1,4,9"],
    "tchoff" => [">", "5"],
    // "jofftchoff" => ["=", "1,4,9", ">", "5"]
];
$append = "-";
$output = "";

for ($i = $input[0]; $i <= $input[1]; $i++) {
    $converter = new ConverterService();
    $output .= $converter->conditions($condition)->input($i)->execute() . (($i < $input[1]) ? $append : "");
}
echo $output . PHP_EOL;
