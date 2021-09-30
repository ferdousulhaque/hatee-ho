<?php

namespace App\Test\Logics;

use App\Helpers\isGreaterThan;
use PHPUnit\Framework\TestCase;

class IsGreaterThanTest extends TestCase
{
    /**
     * @dataProvider dataProviderForLogicMethodTest
     * */
    public function testLogicMethod($condition, $value): void
    {
        $box = new isGreaterThan($condition);
        $result = $box->match($value);
        $this->assertTrue($result);
    }

    public function dataProviderForLogicMethodTest(): array
    {
        return [
            [10, 20],
            [0, 10],
            [-100, -10],
        ];
    }
}
