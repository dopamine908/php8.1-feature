<?php

namespace Src\ReadonlyProperty;

class TestUnset1
{
    public readonly string $prop;

    public function __construct()
    {
        unset($this->prop);
        $this->prop = 'test';
    }
}
