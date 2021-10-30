<?php

declare(strict_types=1);

namespace App\StringGenerator;

use App\Matcher\MatcherInterface;

class Config
{
    private array $map;

    private string $word;

    public function __construct(array $map, string $word)
    {
        $this->map = $map;     
        $this->word = $word;
    }

    public function getMap(): array
    {
        return $this->map;
    }

    public function getWord(): string
    {
        return $this->word;
    }
}
