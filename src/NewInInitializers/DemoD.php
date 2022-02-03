<?php

namespace Src\NewInInitializers;

class DemoD
{
    public array $prop;

    public function __construct(array $prop)
    {
        $this->prop = $prop;
    }
}
