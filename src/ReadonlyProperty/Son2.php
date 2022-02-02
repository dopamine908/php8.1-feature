<?php

namespace Src\ReadonlyProperty;

class Son2 extends Father2
{
    public readonly string $prop;

    public function __construct()
    {
        $this->prop = 'test';
    }
}
