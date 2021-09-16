<?php

namespace App\Helpers;

class ConditionChecker
{
    private $value1;
    private $value2;
    private $operator;

    private $operatorToMethod = [
        "="     => 'isEqual',
        "!="    => 'isNotEqual',
        ">="    => 'isGreaterThanAndEqual',
        "<="    => 'isLessThanAndEqual',
        ">"     => 'isGreaterThan',
        "<"     => 'isLessThan',
        "%"     => 'isDivisibleBy'
    ];

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
        if ($method = $this->operatorToMethod[$this->operator]) {
            return $this->$method($this->value1, $this->value2);
        }

        throw new \Exception('Unknown Operator.');
    }

    /**
     * 
     */
    public function isEqual($val1, $val2)
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
    public function isNotEqual($val1, $val2)
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
    public function isGreaterThanAndEqual($val1, $val2)
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
    public function isLessThanAndEqual($val1, $val2)
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
    public function isGreaterThan($val1, $val2)
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
    public function isLessThan($val1, $val2)
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
    public function isDivisibleBy($val1, $val2)
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
