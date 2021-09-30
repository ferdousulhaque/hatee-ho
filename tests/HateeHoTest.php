<?php

namespace Tests;

use App\Helpers\isGreaterThan;
use App\Helpers\isOneOf;
use App\Helpers\isDivisibleBy;
use App\Response;
use PHPUnit\Framework\TestCase;

class testHateeHo extends TestCase
{
    /**
     * 
     */
    private $responder;

    /**
     * 
     */
    public function setUp(): void
    {
        $this->responder = new Response();
    }

    /**
     * @dataProvider dataProviderForCheckLogicAndPrintMethod
     * */
    public function testHateeHo($input, $conditions, $append, $expectation): void
    {
        $result = $this->responder
            ->input($input)
            ->conditions($conditions)
            ->append($append)
            ->response();
        $this->assertEquals($expectation, $result);
    }


    /**
     * 
     */
    public function dataProviderForCheckLogicAndPrintMethod(): array
    {
        return [
            array([1, 20], [
                ["logic" => [new isDivisibleBy(3), new isDivisibleBy(5)], "print" => "papow"],
                ["logic" => [new isDivisibleBy(3)], "print" => "pa"],
                ["logic" => [new isDivisibleBy(5)], "print" => "pow"],
            ], " ", "1 2 pa 4 pow pa 7 8 pa pow 11 pa 13 14 papow 16 17 pa 19 pow"),
            array([1, 15], [
                ["logic" => [new isDivisibleBy(2), new isDivisibleBy(7)], "print" => "hateeho"],
                ["logic" => [new isDivisibleBy(7)], "print" => "ho"],
                ["logic" => [new isDivisibleBy(2)], "print" => "hatee"],
            ], "-", "1-hatee-3-hatee-5-hatee-ho-hatee-9-hatee-11-hatee-13-hateeho-15"),
            array([1, 10], [
                ["logic" => [new isOneOf([1, 4, 9]), new isGreaterThan(5)], "print" => "jofftchoff"],
                ["logic" => [new isOneOf([1, 4, 9])], "print" => "joff"],
                ["logic" => [new isGreaterThan(5)], "print" => "tchoff"]
            ], "-", "joff-2-3-joff-5-tchoff-tchoff-tchoff-jofftchoff-tchoff"),
        ];
    }
}
