<?php

declare(strict_types=1);

namespace App\Matcher;

class DivisibleBy implements MatcherInterface
{
    private int $againstValue;

    public function __construct(int $againstValue)
    {
        $this->againstValue = $againstValue;
    }

    public function match(int $value): bool
    {
        return ($value % $this->againstValue) === 0;
    }
}
