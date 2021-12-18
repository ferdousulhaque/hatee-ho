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
        $this->matchers = [
            'divisible_by' => new DivisibleBy(),
            'in_array' => new InArray(),
            'greater_than' => new GreaterThan(),
        ];
        $this->generator = new StringGenerator($this->matchers);
    }

    /**
     * @param array $configs
     * 
     * @dataProvider dataProviderForGenerateTesting
     */
    public function testGenerate(array $configs, Range $range, string $separator, string $expected): void
    {
        $result = $this->generator->generate($configs, $range, $separator);

        $this->assertEquals($expected, $result);
    }

    public function dataProviderForGenerateTesting(): array
    {
        return [
            [
                [
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
                ], new Range(1, 20), " ",
                "1 2 pa 4 pow pa 7 8 pa pow 11 pa 13 14 papow 16 17 pa 19 pow"
            ],
            [
                [
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
                ], new Range(1, 15), "-",
                "1-hatee-3-hatee-5-hatee-ho-hatee-9-hatee-11-hatee-13-hateeho-15"
            ],
            [
                [
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
                ], new Range(1, 10), "-",
                "joff-2-3-joff-5-tchoff-tchoff-tchoff-jofftchoff-tchoff"
            ],
        ];
    }
}
