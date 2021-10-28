<?php

declare(strict_types=1);

namespace App;

use App\StringGenerator\Config;
use App\StringGenerator\Range;

class StringGenerator
{
    /**
     * @params MatcherInterface[] $matchers
     */
    private array $matchers;

    public function __construct(array $matchers)
    {
        $this->matchers = $matchers;
    }

    /**
     * @param Config[] $configs
     */
    public function generate(array $configs, Range $range, string $separator): string
    {
        $generatedString = "";

        for ($i = $range->getMin(); $i <= $range->getMax(); $i++) {
            $append = (($i < $range->getMax()) ? $separator : "");
            $generatedString .= $this->matchConditionAndGetTheWord($i, $configs) . $append;
        }

        return $generatedString;
    }

    /**
     * @param Config[] $configs
     * 
     * @return int|string 
     */
    private function matchConditionAndGetTheWord(int $i, array $configs)
    {
        $out = $i;

        foreach ($configs as $config) {
            $matched = true;

            foreach ($config->getMap() as $matcherIndex => $against) {
                $matched &= $this->matchers[$matcherIndex]->match($i, $against);
            }

            if ($matched && ($out == $i)) {
                $out = $config->getWord();
            }
        }

        return $out;
    }
}
