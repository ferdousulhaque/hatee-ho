<?php

declare(strict_types=1);

namespace App\Tests\Matcher;

use App\Matcher\GreaterThan;
use PHPUnit\Framework\TestCase;

class GreaterThanTest extends TestCase
{
    /**
     * @dataProvider dataProviderForMatchTesting
     */
    public function testMatch(int $condition, int $value): void
    {
        $box = new GreaterThan($condition);
        $result = $box->match($value);

        $this->assertTrue($result);
    }

    public function dataProviderForMatchTesting(): array
    {
        return [
            [10, 20],
            [0, 10],
            [-100, -10],
        ];
    }
}
