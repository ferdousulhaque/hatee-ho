<?php

declare(strict_types=1);

namespace App\Matcher;

use InvalidArgumentException;

class DivisibleBy implements MatcherInterface
{
    /**
     * @param int $against
     */
    public function match(int $value, $against): bool
    {
        if (!is_int($against) && !is_array($against)) {
            throw new InvalidArgumentException('Parameter $against has to be of type array of integers or integer');
        }

        if (is_array($against)) {
            $against_multiply = 1;
            foreach ($against as $each) {
                $against_multiply *= $each;
            }
            $against = $against_multiply;
        }

        return ($value % $against) === 0;
    }
}
