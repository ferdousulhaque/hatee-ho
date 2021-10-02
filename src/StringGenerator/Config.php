<?php

declare(strict_types=1);

namespace App\StringGenerator;

use App\Matcher\MatcherInterface;

class Config
{
    /**
     * @var MatcherInterface[]
     */
    private array $matchers;

    private string $word;

    /**
     * @param MatcherInterface[] $matchers
     */
    public function __construct(array $matchers, string $word)
    {
        $this->matchers = $matchers;     
        $this->word = $word;
    }

    /**
     * @return MatcherInterface[]
     */
    public function getMatchers(): array
    {
        return $this->matchers;
    }

    public function getWord(): string
    {
        return $this->word;
    }
}
