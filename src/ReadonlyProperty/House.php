<?php

namespace Src\ReadonlyProperty;

class House
{
    public readonly Host $host;

    public function __construct(Host $host)
    {
        $this->host = $host;
    }
}
