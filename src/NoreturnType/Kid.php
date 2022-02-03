<?php

namespace Src\NoreturnType;

class Kid extends Person
{
    public function hasAgreedToTerms(): noreturn
    {
        throw new \Exception('whoops');
    }
}
