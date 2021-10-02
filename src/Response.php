<?php

declare(strict_types=1);

namespace App;

use App\ResponseInterface;
use App\StringGenerator\Config;

class Response implements ResponseInterface
{
    /**
     * @var int[]
     */
    private array $input;

    /**
     * @var Config[]
     */
    private array $configs;

    private $append;

    /**
     * @param int[] $input
     */
    public function setInput(array $input): self
    {
        $this->input = $input;

        return $this;
    }

    public function setConfigs(array $configs)
    {
        $this->configs = $configs;

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
        for ($i = $this->input[0]; $i <= $this->input[1]; $i++) {
            $out = $i;
            $append = (($i < $this->input[1]) ? $this->append : "");
            foreach ($this->configs as $config) {
                $testPass = true;
                foreach ($config->getMatchers() as $matcher) {
                    $testPass &= $matcher->match($i);
                }
                if ($testPass && ($out == $i)) {
                    $out = $config->getWord();
                }
            }
            $output .= $out . $append;
        }

        return $output;
    }
}
