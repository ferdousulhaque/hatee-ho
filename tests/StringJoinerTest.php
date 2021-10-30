<?php

declare(strict_types=1);

namespace Tests;

use App\StringGenerator;
use App\Matcher\GreaterThan;
use App\Matcher\InArray;
use App\Matcher\DivisibleBy;
use App\StringGenerator\Config;
use App\StringGenerator\Range;
use PHPUnit\Framework\TestCase;

class StringJoinerTest extends TestCase
{
    private StringGenerator $generator;

    public function setUp(): void
    {
        $this->generator = new StringGenerator();
    }

    /**
     * @param array $configs
     * 
     * @dataProvider dataProviderForGenerateTesting
     */
    public function testGenerate(Range $range, array $configs, string $separator, string $expected): void
    {
        $result = $this->generator->generate($configs, $range, $separator);

        $this->assertEquals($expected, $result);
    }

    public function dataProviderForGenerateTesting(): array
    {
        return [
            [
                new Range(1, 20),
                [
                    new Config([new DivisibleBy(3), new DivisibleBy(5)], 'papow'),
                    new Config([new DivisibleBy(3)], 'pa'),
                    new Config([new DivisibleBy(5)], 'pow'),
                ],
                " ", 
                "1 2 pa 4 pow pa 7 8 pa pow 11 pa 13 14 papow 16 17 pa 19 pow"
            ],
            [
                new Range(1, 15),
                [
                    new Config([new DivisibleBy(2), new DivisibleBy(7)], 'hateeho'),
                    new Config([new DivisibleBy(7)], 'ho'),
                    new Config([new DivisibleBy(2)], 'hatee'),
                ],
                "-",
                "1-hatee-3-hatee-5-hatee-ho-hatee-9-hatee-11-hatee-13-hateeho-15"
            ],
            [
                new Range(1, 10),
                [
                    new Config([new InArray([1, 4, 9]), new GreaterThan(5)], 'jofftchoff'),
                    new Config([new InArray([1, 4, 9])], 'joff'),
                    new Config([new GreaterThan(5)], 'tchoff'),
                ],
                "-",
                "joff-2-3-joff-5-tchoff-tchoff-tchoff-jofftchoff-tchoff"
            ],
        ];
    }
}
