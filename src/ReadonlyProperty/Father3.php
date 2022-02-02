<?php

namespace Src\ReadonlyProperty;

class Father3
{
    public readonly string|int $prop;

    public function __construct()
    {
        $this->prop = 'test';
    }
}
