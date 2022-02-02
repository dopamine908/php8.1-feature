<?php

namespace Src\ReadonlyProperty;

class Host
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
