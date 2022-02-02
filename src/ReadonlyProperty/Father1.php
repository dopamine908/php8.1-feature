<?php

namespace Src\ReadonlyProperty;

class Father1
{
    public readonly string $prop;

    public function __construct()
    {
        $this->prop = 'test';
    }
}
