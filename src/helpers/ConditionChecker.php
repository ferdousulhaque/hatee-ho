<?php

namespace App\Helpers;

class ConditionChecker
{
    private $value1;
    private $value2;
    private $operator;

    /**
     * 
     */
    public function set($value, $condition_value)
    {
        $this->value1 = $value;
        $this->value2 = explode(',', $condition_value[1]);
        $this->operator = $condition_value[0];
        return $this;
    }

    /**
     * 
     */
    function match(): bool
    {
        switch ($this->operator) {
            case "=":
                return
                    $this->isEqual($this->value1, $this->value2);
            case "!=":
                return
                    $this->isNotEqual($this->value1, $this->value2);
            case ">=":
                return
                    $this->isGreaterThanAndEqual($this->value1, $this->value2);
            case "<=":
                return
                    $this->isLessThanAndEqual($this->value1, $this->value2);
            case ">":
                return
                    $this->isGreaterThan($this->value1, $this->value2);
            case "<":
                return
                    $this->isLessThan($this->value1, $this->value2);
            case "%":
                return $this->isDivisibleBy($this->value1, $this->value2);
            default:
                return false;
        }
    }

    /**
     * 
     */
    function isEqual($val1, $val2)
    {
        if (count($val2) > 1) {
            foreach ($val2 as $val) {
                if ($val1 == $val) {
                    return true;
                };
            }
            return false;
        }
        return $val1 == $val2[0];
    }

    /**
     * 
     */
    function isNotEqual($val1, $val2)
    {
        if (count($val2) > 1) {
            foreach ($val2 as $val) {
                if ($val1 != $val) {
                    return true;
                };
            }
            return false;
        }
        return $val1 != $val2[0];
    }

    /**
     * 
     */
    function isGreaterThanAndEqual($val1, $val2)
    {
        if (count($val2) > 1) {
            foreach ($val2 as $val) {
                if ($val1 >= $val) {
                    return true;
                };
            }
            return false;
        }
        return $val1 >= $val2[0];
    }

    /**
     * 
     */
    function isLessThanAndEqual($val1, $val2)
    {
        if (count($val2) > 1) {
            foreach ($val2 as $val) {
                if ($val1 <= $val) {
                    return true;
                };
            }
            return false;
        }
        return $val1 <= $val2[0];
    }

    /**
     * 
     */
    function isGreaterThan($val1, $val2)
    {
        if (count($val2) > 1) {
            foreach ($val2 as $val) {
                if ($val1 > $val) {
                    return true;
                };
            }
            return false;
        }
        return $val1 > $val2[0];
    }

    /**
     * 
     */
    function isLessThan($val1, $val2)
    {
        if (count($val2) > 1) {
            foreach ($val2 as $val) {
                if ($val1 > $val) {
                    return true;
                };
            }
            return false;
        }
        return $val1 > $val2[0];
    }

    /**
     * 
     */
    function isDivisibleBy($val1, $val2)
    {
        if (count($val2) > 1) {
            $bool = true;
            foreach ($val2 as $val) {
                $bool &= (($val1 % $val) == 0);
            }
            return $bool;
        }
        return ($val1 % $val2[0]) == 0;
    }
}
