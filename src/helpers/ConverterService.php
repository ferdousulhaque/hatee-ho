<?php

declare(strict_types=1);

namespace App\Helpers;

use App\Helpers\ConditionChecker;

class ConverterService
{
    private $conditions;
    private $input;
    private $conditionChecker;

    /**
     * 
     */
    public function __construct(ConditionChecker $conditionChecker)
    {
        $this->conditionChecker = $conditionChecker;
    }

    /**
     * 
     */
    public function conditions(array $conditions): ConverterService
    {
        $this->conditions = $conditions;
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
    public function run(): string
    {
        return $this->apply($this->input);
    }

    /**
     * 
     */
    private function apply(): string
    {
        $res = "{$this->input}";
        foreach ($this->conditions as $str => $condition) {
            if ($this->conditionChecker
                ->set($this->input, $condition)
                ->match()
            ) {
                $res = $str;
            }
        }
        return $res;
    }
}
