<?php

namespace App;

interface ResponseInterface
{
    function input(array $input);
    function conditions(array $conditions);
    function append(string $append);
    function response();
}
