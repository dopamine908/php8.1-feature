<?php

namespace Src\ReadonlyProperty;

class TestUnset
{
    public readonly string $prop;

    public function __construct()
    {
        $this->prop = 'test';
        unset($this->prop);
    }
}
