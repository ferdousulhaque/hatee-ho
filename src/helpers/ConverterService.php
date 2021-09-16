<?php

declare(strict_types=1);

namespace App\Helpers;

class ConverterService
{
    private $condition_arr;
    private $input;

    /**
     * 
     */
    public function conditions(array $conditions): ConverterService
    {
        $this->condition_arr = $conditions;
        return $this;
    }

    /**
     * 
     */
    public function input(int $input): ConverterService
    {
        $this->input = $input;
        return $this;
    }

    /**
     * 
     */
    public function execute(): string
    {
        return $this->apply($this->input);
    }

    /**
     * 
     */
    private function apply(): string
    {
        $res = "{$this->input}";
        foreach ($this->condition_arr as $str => $con) {
            if ($this->num_cond($con)) {
                $res = $str;
            }
        }
        return $res;
    }

    function num_cond($con): bool|int
    {
        $val = intval($con[1]);
        switch ($con[0]) {
            case "=":
                return $this->input == $val;
            case "!=":
                return $this->input != $val;
            case ">=":
                return $this->input >= $val;
            case "<=":
                return $this->input <= $val;
            case ">":
                return $this->input > $val;
            case "<":
                return $this->input < $val;
            case "%":
                return ($this->input % $val) == 0;
            default:
                return false;
        }
    }
}
