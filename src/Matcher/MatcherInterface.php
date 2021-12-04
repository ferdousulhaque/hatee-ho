<?php

declare(strict_types=1);

namespace App\Matcher;

interface MatcherInterface
{
    public function match(int $value, $against): bool;
}
