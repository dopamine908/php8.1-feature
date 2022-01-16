<?php

namespace Src\ReadonlyProperty;

class OtherBoy
{
    readonly public string $gender;

    public function __construct(readonly public string $name)
    {
        $this->gender = 'male';
    }

}
