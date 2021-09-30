<?php

namespace App\Helpers;

use App\Helpers\LogicInterface;

class isOneOf implements LogicInterface
{

    /**
     * For conditions
     */
    private $condition_value;

    /**
     * @param $condition_value
     */
    public function __construct(array $condition_value)
    {
        $this->condition_value = $condition_value;
    }

    /**
     * @param $value
     * return bool
     */
    public function match($value): bool
    {
        return in_array($value, $this->condition_value);
    }
}
