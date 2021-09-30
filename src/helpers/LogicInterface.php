<?php

namespace App\Helpers;

interface LogicInterface
{
    public function match($value): bool;
}
