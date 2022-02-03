<?php

namespace Src\NewInInitializers;

class DemoC
{
    public string $prop;

    public function __construct(string $prop)
    {
        $this->prop = $prop;
    }
}
