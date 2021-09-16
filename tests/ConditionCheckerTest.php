<?php

namespace Tests;

use App\Helpers\ConditionChecker;
use PHPUnit\Framework\TestCase;

class ConditionCheckerTest extends TestCase
{
    private $conditionChecker;

    public function setUp(): void
    {
        $this->conditionChecker = new ConditionChecker();
    }

    public function testIsEqual(): void
    {
        $output = $this->conditionChecker->isEqual(1, [2]);
        $this->assertFalse($output);
    }

    public function testIsGreater(): void
    {
        $output = $this->conditionChecker->isGreaterThan(4, [2]);
        $this->assertTrue($output);
    }
}
