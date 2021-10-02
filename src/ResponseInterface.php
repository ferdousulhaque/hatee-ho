<?php

namespace App;

interface ResponseInterface
{
    public function setInput(array $input);
    public function setConfigs(array $conditions);
    public function append(string $append);
    public function response();
}
