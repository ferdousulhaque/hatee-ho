<?php

namespace App;

interface ResponseInterface
{
    public function input(array $input);
    public function conditions(array $conditions);
    public function append(string $append);
    public function response();
}
