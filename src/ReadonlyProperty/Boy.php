<?php

namespace Src\ReadonlyProperty;

class Boy
{
    readonly public string $gender;

    public function __construct()
    {
        $this->gender = 'male';
    }
}
