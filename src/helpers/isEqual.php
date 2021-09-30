<?php

namespace App\Helpers;

use App\Helpers\LogicInterface;

class isEqual implements LogicInterface
{

    /**
     * For conditions
     */
    private $condition_value;

    /**
     * @param $condition_value
     */
    public function __construct(int $condition_value)
    {
        $this->condition_value = $condition_value;
    }

    /**
     * @param $value
     * return bool
     */
    public function match($value): bool
    {
        return ($value === $this->condition_value);
    }
}