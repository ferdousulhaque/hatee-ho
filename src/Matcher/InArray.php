<?php

declare(strict_types=1);

namespace App\Matcher;

use InvalidArgumentException;

class InArray implements MatcherInterface
{
    public function match(int $value, $against): bool
    {
        if (!is_array($against)) {
            throw new InvalidArgumentException('Parameter $against has to be of type array of integers');
        }

        return in_array($value, $against);
    }
}
