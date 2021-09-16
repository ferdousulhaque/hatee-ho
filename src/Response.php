<?php

declare(strict_types=1);

namespace App;

use App\Helpers\ConditionChecker;
use App\Helpers\ConverterService;
use App\ResponseInterface;

class Response implements ResponseInterface
{

    private $input;
    private $conditions;
    private $append;

    /**
     * 
     */
    public function input(array $input)
    {
        $this->input = $input;
        return $this;
    }

    /**
     * 
     */
    public function conditions(array $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }

    /**
     * 
     */
    public function append(string $append)
    {
        $this->append = $append;
        return $this;
    }

    /**
     * 
     */
    public function response(): string
    {
        $output = "";
        $conditionChecker = new ConditionChecker;
        for ($i = $this->input[0]; $i <= $this->input[1]; $i++) {
            $converter = new ConverterService($conditionChecker);
            $output .= $converter->input($i)
                ->conditions($this->conditions)
                ->run() .
                (($i < $this->input[1]) ? $this->append : "");
        }
        return $output . PHP_EOL;
    }
}
