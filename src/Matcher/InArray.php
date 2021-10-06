<?php

declare(strict_types=1);

namespace App\Matcher;

class InArray implements MatcherInterface
{
    private array $againstValue;

    public function __construct(array $againstValue)
    {
        $this->againstValue = $againstValue;
    }

    public function match(int $value): bool
    {
        return in_array($value, $this->againstValue);
    }
}
