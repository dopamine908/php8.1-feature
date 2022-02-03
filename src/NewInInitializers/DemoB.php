<?php

namespace Src\NewInInitializers;

class DemoB
{
    public int $prop;

    public function __construct(int $prop)
    {
        $this->prop = $prop;
    }
}
