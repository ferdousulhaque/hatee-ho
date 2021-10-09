<?php

declare(strict_types=1);

namespace App;

use App\StringGenerator\Config;
use App\StringGenerator\Range;

class StringGenerator
{
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

            foreach ($config->getMatchers() as $matcher) {
                $matched &= $matcher->match($i);
            }

            if ($matched && ($out == $i)) {
                $out = $config->getWord();
            }
        }

        return $out;
    }
}
