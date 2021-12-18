<?php

declare(strict_types=1);

namespace App\Matcher;

use InvalidArgumentException;

class GreaterThan implements MatcherInterface
{
    /**
     * @param int $value
     * @param int $against
     */
    public function match(int $value, $against): bool
    {
        if (!is_int($against)) {
            throw new InvalidArgumentException('$aganst value has to be of type integer');
        }

        return $value > $against;
    }
}
